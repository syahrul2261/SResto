<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Log extends CI_Controller {

	function __Construct()
	{
		parent::__Construct();
		$this->load->model(array('LogModel', 'AkunModel'));
	}

	public function index()
	{
		if($this->session->userdata('authenticated')){
			if($this->session->userdata('akses') == 'admin'){
                $data = array(
                    'title' => 'ADMIN - LOG',
                    'content' => 'admin/log',
					'get_log' => $this->LogModel->getAll(),
					'get_akun' => $this->AkunModel->getAll()
                );
				$this->load->view('admin/template', $data);
			} else{
				$data['title'] = 'AKSES!!!';
				$this->load->view('c_error/akses', $data);
			}
		} else{
			$data['title'] = 'LOGIN!!!';
			$this->load->view('c_error/login', $data);  
		}
	}

	public function print($code, $code1, $code2)
	{
		$kode_log = 'LO'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PRINT',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		if ($code == 'true') {
			if($code1 == 'true' && $code2 == 'true'){
				$this->data['get_log'] = $this->LogModel->get1();
			} else if($code2 == 'true'){
				$this->data['get_log'] = $this->LogModel->get2($code1);
			} else if($code1 == 'true'){
				$this->data['get_log'] = $this->LogModel->get3($code2);
			} else {
				$this->data['get_log'] = $this->LogModel->get4($code1, $code2);
			}
		} else{
			if($code1 == 'true' && $code2 == 'true'){
				$this->data['get_log'] = $this->LogModel->get5($code);
			} else if($code2 == 'true'){
				$this->data['get_log'] = $this->LogModel->get6($code, $code1);
			} else if($code1 == 'true'){
				$this->data['get_log'] = $this->LogModel->get7($code, $code2);
			} else {
				$this->data['get_log'] = $this->LogModel->get8($code, $code1, $code2);
			}
		}
		$this->load->view('cetak/log',$this->data);
	}
	
	public function cetak($code, $code1, $code2)
	{
		$kode_log = 'LO'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PDF',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		$this->load->library('pdfgenerator');
    
        // title dari pdf
        $this->data['title_pdf'] = 'DATA LOG';

		if ($code == 'true') {
			if($code1 == 'true' && $code2 == 'true'){
				$this->data['get_log'] = $this->LogModel->get1();
			} else if($code2 == 'true'){
				$this->data['get_log'] = $this->LogModel->get2($code1);
			} else if($code1 == 'true'){
				$this->data['get_log'] = $this->LogModel->get3($code2);
			} else {
				$this->data['get_log'] = $this->LogModel->get4($code1, $code2);
			}
		} else{
			if($code1 == 'true' && $code2 == 'true'){
				$this->data['get_log'] = $this->LogModel->get5($code);
			} else if($code2 == 'true'){
				$this->data['get_log'] = $this->LogModel->get6($code, $code1);
			} else if($code1 == 'true'){
				$this->data['get_log'] = $this->LogModel->get7($code, $code2);
			} else {
				$this->data['get_log'] = $this->LogModel->get8($code, $code1, $code2);
			}
		}
        
        // filename dari pdf ketika didownload
        $file_pdf = 'DATA LOG';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('cetak/log',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
		redirect(site_url('admin/log'));
	}

	function export($code, $code1, $code2)
	{
		$kode_log = 'LO'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak EXCEL',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		if ($code == 'true') {
			if($code1 == 'true' && $code2 == 'true'){
				$get_log = $this->LogModel->get1();
			} else if($code2 == 'true'){
				$get_log = $this->LogModel->get2($code1);
			} else if($code1 == 'true'){
				$get_log = $this->LogModel->get3($code2);
			} else {
				$get_log = $this->LogModel->get4($code1, $code2);
			}
		} else{
			if($code1 == 'true' && $code2 == 'true'){
				$get_log = $this->LogModel->get5($code);
			} else if($code2 == 'true'){
				$get_log = $this->LogModel->get6($code, $code1);
			} else if($code1 == 'true'){
				$get_log = $this->LogModel->get7($code, $code2);
			} else {
				$get_log = $this->LogModel->get8($code, $code1, $code2);
			}
		}

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'NO');
		$sheet->setCellValue('B1', 'KODE');
		$sheet->setCellValue('C1', 'USER');
		$sheet->setCellValue('D1', 'KEGIATAN');
		$sheet->setCellValue('E1', 'TANGGAL');
		$sheet->setCellValue('F1', 'JAM');
		

		$no = 1;
		$x = 2;
		foreach($get_log as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->kode_log);
			$sheet->setCellValue('C'.$x, $row->nama);
			$sheet->setCellValue('D'.$x, $row->kegiatan);
			$sheet->setCellValue('E'.$x, $row->tanggal);
			$sheet->setCellValue('F'.$x, $row->waktu);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'DATA LOG';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		
		$writer->save('php://output');
	}
}
