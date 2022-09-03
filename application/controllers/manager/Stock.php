<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Stock extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('ProdukModel', 'KategoriModel'));
	}

	public function index()
	{
		if($this->session->userdata('authenticated')){
			if($this->session->userdata('akses') == 'manager'){
                $data = array(
                    'title' => 'MANAGER - STOCK',
                    'content' => 'manager/Stock'
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

	public function update()
	{
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
		
		$this->session->set_flashdata('massage', 'Berhasil Memperbarui Data');
		$kode_log = 'ST'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Memperbarui Data',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		redirect(site_url('manager/stock'));
	}
	
	public function reset()
	{
		$post = $this->input->post();
		$data = array(
			'id_produk'		=>	$post['id_produk'],
			'nama_produk'	=>	$post['nama_produk'],
			'harga_produk'	=>	$post['harga_produk'],
			'id_kategori'	=>	$post['id_kategori'],
			'stock'			=>	0,
			'foto_produk'	=>	$post['foto_produk']
		);
		
		$this->db->where('id_produk', $post['id_produk']);
		$this->db->update('produk', $data);
		
		$this->session->set_flashdata('massage', 'Berhasil Mereset Data');
		$kode_log = 'PR'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Mereset Data',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		redirect(site_url('manager/stock'));
	}

		public function print($code)
	{
		if($code == "true"){
			$this->data['get_produk'] = $this->ProdukModel->getALL();
		} else {
			$this->data['get_produk'] = $this->ProdukModel->getBy($code);
		}
		
		$kode_log = 'PR'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PRINT',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		$this->load->view('cetak/stock',$this->data);
	}
	
	public function cetak($code)
	{
		$this->load->library('pdfgenerator');
    
        // title dari pdf
        $this->data['title_pdf'] = 'DATA STOCK PRODUK';
		if($code == "true"){
			$this->data['get_produk'] = $this->ProdukModel->getALL();
		} else {
			$this->data['get_produk'] = $this->ProdukModel->getBy($code);
		}
        
        // filename dari pdf ketika didownload
        $file_pdf = 'DATA STOCK PRODUK';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('cetak/stock',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);

		$kode_log = 'PR'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PDF',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);
		
		redirect(site_url('manager/stock'));
	}
	
	function export($code)
	{
		$kode_log = 'PR'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak EXCEL',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		if($code == "true"){
			$get_produk= $this->ProdukModel->getAll();
		} else {
			$get_produk= $this->ProdukModel->getBy($code);
		}

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'NO');
		$sheet->setCellValue('B1', 'NAMA');
		$sheet->setCellValue('C1', 'STOCK');
		

		$no = 1;
		$x = 2;
		foreach($get_produk as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->nama_produk);
			$sheet->setCellValue('C'.$x, $row->stock);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'DATA STOCK PRODUK';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
