<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(['ProdukModel'], ['KategoriModel']));
	}

	public function index()
	{
		if($this->session->userdata('authenticated')){
			if($this->session->userdata('akses') == 'manager'){
                $data = array(
                    'title' => 'manager - Produk',
                    'content' => 'manager/Produk'
                );
				$data['get_produk'] = $this->ProdukModel->getALL();
				$data['get_kategori'] = $this->KategoriModel->getALL();
				$this->load->view('manager/template', $data);
			} else{
				$data['title'] = 'AKSES!!!';
				$this->load->view('c_error/akses', $data);
			}
		} else{
			$data['title'] = 'LOGIN!!!';
			$this->load->view('c_error/login', $data);  
		}
	}

	public function cetak()
	{
		$this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penjualan Toko Kita';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penjualan_toko_kita';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
		$data['get_produk'] = $this->ProdukModel->getALL();
		$data['get_kategori'] = $this->KategoriModel->getALL();
        
		$html = $this->load->view('manager/produk',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
	}

	public function add()
	{
		$config['upload_path']	= './assets/image/produk/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp'; 
        $config['max_size'] = '10000'; // max_size in kb 
        $config['file_name'] = 'imageMenu-'.date('ymd').'-'.substr(rand(),0, 10);


		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto_produk'))
		{
			$uploadData = $this->upload->data();
			$foto_produk = $uploadData['file_name'];

			$post = $this->input->post();
			$this->nama_produk = $post['nama_produk'];
			$this->harga_produk = $post['harga_produk'];
			$this->id_kategori = $post['id_kategori'];
			$this->foto_produk = $foto_produk;
			$this->db->insert('produk', $this);

			redirect(site_url('manager/produk'));
		} 
	}

	public function update()
	{
		$config['upload_path']	= './assets/image/produk/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp'; 
        $config['max_size'] = '10000'; // max_size in kb 
        $config['file_name'] = 'imageProduk-'.date('ymd').'-'.substr(rand(),0, 10);


		$this->load->library('upload', $config);

		if($this->upload->do_upload('foto_produk'))
		{
			$uploadData = $this->upload->data();
			$foto_produk = $uploadData['file_name'];

			$post = $this->input->post();
			$data = array(
				'id_produk'		=>	$post['id_produk'],
				'nama_produk'	=>	$post['nama_produk'],
				'harga_produk'	=>	$post['harga_produk'],
				'id_kategori'	=>	$post['id_kategori'],
				'stock'			=>	$post['stock'],
				'foto_produk'	=>	$foto_produk
			);

			$this->db->where('id_produk', $post['id_produk']);
			$this->db->update('produk', $data);
			redirect(site_url('manager/produk'));
		} else {
			$uploadData = $this->upload->data();
			$foto_produk = $uploadData['file_name'];
			
			$post = $this->input->post();
			$data = array(
				'id_produk'		=>	$post['id_produk'],
				'nama_produk'	=>	$post['nama_produk'],
				'harga_produk'	=>	$post['harga_produk'],
				'id_kategori'	=>	$post['id_kategori'],
				'stock'			=>	$post['stock'],
				'foto_produk'	=>	$post['foto_produk']
			);
			
			$this->db->where('id_produk', $post['id_produk']);
			$this->db->update('produk', $data);
			redirect(site_url('manager/produk'));
		}
		// $post = $this->input->post();

		// $data = array(
        // 'id_kategori' => $post["id_kategori"],
        // 'nama_kategori' => $post["nama_kategori"]
		// );

		// $this->db->where('id_kategori', $post["id_kategori"]);
		// $this->db->update('produk', $data);
		// redirect(site_url('manager/produk'));

		//////////////////////////////////////////////////////////
		// $post = $this->input->post();
        // $this->id_kategori = $post["id_kategori"];
        // $this->nama_kategori = $post["nama_kategori"];
        // $this->db->update('produk', $this, array('id_kategori' => $post['id_kategori']));
		// redirect(site_url('manager/produk'));
	}

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->ProdukModel->delete($id)) {
            redirect(site_url('manager/produk'));
        }
    }
	
	public function delete_all()
	{
		$this->db->empty_table('produk');
		redirect(site_url('manager/produk'));
		
	}
}
