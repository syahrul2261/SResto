<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
    
    public function __construct()
	{
        parent::__construct();
		$this->load->model(array(['ProdukModel'], ['KategoriModel'], ['PesananModel']));
	}
    
	public function index()
	{
        if($this->session->userdata('authenticated')){
            if($this->session->userdata('akses') == 'kasir'){
                $data = array(
                    'title' => 'KASIR - PESANAN',
                    'content' => 'kasir/Pesanan',
					'get_kategori' => $this->KategoriModel->getALL(),
					'get_produk' => $this->ProdukModel->getALL()
                );
				$this->load->view('kasir/template', $data);
			} else{
                $data['title'] = 'AKSES!!!';
				$this->load->view('c_error/akses', $data);
			}
		} else{
            $data['title'] = 'LOGIN!!!';
			$this->load->view('c_error/login', $data);  
		}
	}
    
    function payment(){
        $id = $this->PesananModel->id();
        $kode = date('Ymd').date('His').rand(100, 1000);
        
        foreach ($this->cart->contents() as $key) {
            $pesanan = array(
                'id_detail_pesanan' => $id,
                'id_produk'         => $key['id'],
                'harga_produk'      => $key['price'],
                'qty'               => $key['qty'],
                'total_harga'       => $key['subtotal']
            );
            $this->db->insert('pesanan', $pesanan);
        };
        
        $detail_pesanan = array(
            'id_detail_pesanan' => $id,
            'kode_transaksi'    => $kode,
            'nama_pelanggan'    => $this->input->post('nama_pelanggan'),
            'total_harga'       => $this->cart->total() * 1.1,
            'bayar'             => $this->input->post('bayar'),
            'kembalian'         => $this->input->post('bayar') - ($this->cart->total() * 1.1),
            'catatan'           => $this->input->post('catatan'),
            'tgl_transaksi'     => date('Y-m-d'),
            'jam_transaksi'     => date('H:i:s'),
            'operator'          => $this->session->userdata('id')
        );
        $this->db->insert('detail_pesanan', $detail_pesanan);
        $kode_log = 'TP'.date('Ymd').date('His').rand(10, 99);
        $log = array(
            'id_user'   => $this->session->userdata('id'),
            'kode_log'  => $kode_log,
            'kegiatan'  => 'Melakukan Transaksi',
            'tanggal'   => date('Y-m-d'),
            'waktu'     => date('H:i:s')
        );
        $this->db->insert('log', $log);
        $data = array(
            'title' => 'KASIR - Pesanan',
            'content' => 'kasir/Pesanan',
			'get_kategori' => $this->KategoriModel->getALL(),
			'get_produk' => $this->ProdukModel->getALL()
        );
        $this->cart->destroy();
        redirect(site_url('kasir/pesanan'));
    }
    
    function add_to_cart()
    {
        $data = array(
            'id' => $this->input->post('id_produk'), 
            'name' => $this->input->post('nama_produk'), 
            'price' => $this->input->post('harga_produk'), 
            'qty' => $this->input->post('jumlah_produk'), 
        );
        $this->cart->insert($data);
        echo $this->show_cart();
    }
    
    
	function show_cart()
	{
        $output = '';
        
		$output .='
        <table class="table table-striped" style="font-size: 12px">
            <thead>
                <tr class="bg-primary text-light fw-bold text-center">
                    <th class="p-2" style="width: 5px">NAMA</th>
                    <th class="p-2" style="width: 10px">HARGA</th>
                    <th class="p-2" style="width: 10px">QTY</th>
                    <th class="p-2" style="width: 10px">SUB HARGA</th>
                <th class="p-2" style="width: 15px"><div class="btn btn-sm btn-danger p-2 reset_cart">X</div></th>
                </tr>
            </thead>
        <tbody class="text-center">
        ';
        
        if(!$this->cart->total() == 0 ){
            foreach($this->cart->contents() as $c){
                $output .='
                <tr id="cart_table">
                    <th class="p-2"><nowrap>'.$c['name'].'</nowrap></th>
                    <th class="p-2">'.number_format($c['price']).'</th>
                    <th class="p-2">'.$c['qty'].'</th>
                    <th class="p-2">'.number_format($c['subtotal']).'</th>
                    <th class="p-2"><div id="'.$c['rowid'].'" value="'.$c['name'].'" class="btn btn-sm btn-danger p-2 delete_cart">X</div></th>
                </tr>';
            }
            
            $output .='
            <tr>
                <th colspan="2">GRAND TOTAL</th>
                <th colspan="1"></th>
                <th colspan="2">'.number_format($this->cart->total()).'</th>
            </tr>                        
            <tr>
                <th colspan="2">TAX</th>
                <th colspan="1">10%</th>
                <th colspan="2">'.number_format($this->cart->total()*0.1).'</th>
            </tr>                        
            <tr>
                <th colspan="2">TOTAL</th>
                <th colspan="1"></th>
                <th colspan="2">'.number_format($this->cart->total()*1.1).'</th>
            </tr>                        
            </tbody>
            </table>
            </div>
            ';
            
        } else {
            $output .=' <th colspan="5">CART KOSONG</th>';
        }
        return $output;
    }
    
    
	function load_cart()
	{ //load data cart
		echo $this->show_cart();
	}
    
    function hapus_cart(){ //fungsi untuk menghapus item cart
		$data = array(
            'rowid' => $this->input->post('row_id'), 
			'qty' => 0, 
		);
		$this->cart->update($data);
		echo $this->show_cart();
		echo $this->modal_payment();
	}
    
    function reset_cart(){
        $this->cart->destroy();
        echo $this->show_cart();
        echo $this->modal_payment();
    }
    
    function modal_payment()
    {
        $output = '';
        $output .='
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th colspan="3">TOTAL</th>
                    <th colspan="2"><input type="number" id="total" name="total_harga" value="'.$this->cart->total() * 1.1.'" class="form-control form-control-sm" disabled></th>
                </tr>
                <tr>
                    <th colspan="3">TOTAL PRODUK</th>
                    <th colspan="2"><input type="number" id="" name="total" value="'.$this->cart->total_items().'" class="form-control form-control-sm" disabled></th>
                </tr>
                <tr>
                    <th colspan="3">Kembalian</th>
                    <th><input type="number" id="kembalian" name="kembalian" value="" class="form-control form-control-sm" disabled></th>
                </tr>
                <tr>
                    <th colspan="3">Bayar</th>
                    <th><input type="number" id="input_bayar" name="bayar" value="" class="form-control form-control-sm" required></th>
                </tr>
                <tr>
                    <th colspan="3">Nama Pelanggan</th>
                    <th><input type="text" id="nama_pelanggan" name="nama_pelanggan" value="" class="form-control form-control-sm" required></th>
                </tr>
                <tr>
                    <th colspan="3">Catatan</th>
                    <th><textarea type="text" id="catatan" name="catatan" value="" class="form-control form-control-sm"></textarea></th>
                </tr>
            </tbody>
        </table>';
        
        return $output;
    }
    
    
    function load_modal()
    {
        echo $this->modal_payment();
    }
    
    
    function content()
    {
        $this->load->model('ProdukModel');
        $this->load->model('KategoriModel');
        $get_kategori = $this->KategoriModel->getALL();
		$get_produk = $this->ProdukModel->getALL();
        $output ='';
        
        $y=0;
        foreach($get_kategori as $b){
            $y++;
            
            $output .='
            <div class="tab-pane fade .'($y == 1)?'show active' :''.'" id="tab'.$b->id_kategori.'" role="tabpanel">
                <div class="container overflow-auto" style="height:65vh">
                    <div class="row">';
            
            foreach($get_produk as $p){
            ($p->id_kategori == $b->id_kategori) ? 
            $output .='
                
                
                <div class="card mx-auto my-2 shadow-box p-0 text-center" id="content" style="width: 200px; hight:100%">
                    <div class="card-header bg-primary fw-bold text-light nama_produk">
                        '.$p->nama_produk.'
                    </div>
                    <div class="card-body p-0">
                        <div class="card mt-1 p-1 position-absolute shadow-box border border-dark text-light '.(($p->stock <= 5)?'bg-danger': (($p->stock <= 10)? 'bg-warning' : 'bg-success') ).'" style="margin-left: -20px">Stock: '.$p->stock.'</div>
                        <img src="'.site_url('assets/image/produk/'.$p->foto_produk).'" width="100%" alt="">
                    </div>
                    <div class="card-footer bg-primary fw-bold text-light">
                        <div class="float-start">
                            RP '.number_format($p->harga_produk).'
                        </div>
                        <input type="hidden" name="jumlah_produk" id="'. $p->id_produk.'" value="1" class="quantity form-control">
                        <div class="float-end">
                            <button class="btn btn-sm btn-success add_cart" data-produkid="'.$p->id_produk.'" data-produknama="'.$p->nama_produk.'" data-produkharga="'.$p->harga_produk.'">ADD</button>
                        </div>
                    </div>
                </div>'
                : 
                '""';
            }
            $output .='
            </div>
            </div>
            </div>';
        }
        return $output;
    }
    
    function load_content()
    {
        echo $this->content();
    }
}
