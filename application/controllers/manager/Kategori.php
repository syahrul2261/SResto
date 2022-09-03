<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriModel');

	}

	public function index()
	{
		if($this->session->userdata('authenticated')){
			if($this->session->userdata('akses') == 'manager'){
                $data = array(
                    'title' => 'MANAGER - KATEGORI',
                    'content' => 'manager/Kategori',
					'get_kategori' => $this->KategoriModel->getAll()
                );
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
    
		public function print()
	{
        $this->data['get_kategori'] = $this->KategoriModel->getAll();
		$kode_log = 'KA'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PRINT',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);
		$this->load->view('cetak/kategori',$this->data);
	}
	
	public function cetak()
	{
		$this->load->library('pdfgenerator');
    
        // title dari pdf
        $this->data['title_pdf'] = 'DATA KATEGORI';
	
        $this->data['get_kategori'] = $this->KategoriModel->getAll();
        
        // filename dari pdf ketika didownload
        $file_pdf = 'DATA KATEGORI';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('cetak/kategori',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
		$kode_log = 'KA'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PDF',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);
		redirect(site_url('manager/kategori'));
	}

	function export()
	{
		$kode_log = 'KA'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak EXCEL',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);
		
        $get_kategori = $this->KategoriModel->getAll();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'NO');
		$sheet->setCellValue('B1', 'KATEGORI');
		

		$no = 1;
		$x = 2;
		foreach($get_kategori as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->nama_kategori);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'DATA KATEGORI';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

    public function add()
    {
        $kategori = $this->KategoriModel;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());
		$kategori->save();


		$this->session->set_flashdata('massage', 'Berhasil Menambahkan Data');
		$kode_log = 'KA'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Menambah Data',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);
		redirect(site_url('manager/kategori'));
    }

	public function update()
	{
		$post = $this->input->post();

		$data = array(
        'id_kategori' => $post["id_kategori"],
        'nama_kategori' => $post["nama_kategori"]
		);

		$this->db->where('id_kategori', $post["id_kategori"]);
		$this->db->update('kategori', $data);
		$this->session->set_flashdata('massage', 'Berhasil Memperbarui Data');
		$kode_log = 'KA'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Mengupdate Data',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);
		redirect(site_url('manager/kategori'));

	}

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->KategoriModel->delete($id)) {
			$this->session->set_flashdata('massage', 'Berhasil Menghapus Data');
			$kode_log = 'KA'.date('Ymd').date('His').rand(10, 99);
			$log = array(
				'id_user'   => $this->session->userdata('id'),
				'kode_log'	=> $kode_log,
				'kegiatan'  => 'Menghapus Data',
				'tanggal'   => date('Y-m-d'),
				'waktu'     => date('H:i:s')
			);
			$this->db->insert('log', $log);
			redirect(site_url('manager/kategori'));
        }
    }
	
	public function delete_all()
	{
		$this->db->empty_table('kategori');
		$this->session->set_flashdata('massage', 'Berhasil Menghapus Semua Data');
		$kode_log = 'KA'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Mengapus Seluruh Data',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);
		redirect(site_url('manager/kategori'));
		
	}
}
