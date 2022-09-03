<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller {

	function __Construct()
	{
		parent::__Construct();
		$this->load->model(array('LaporanModel', 'AkunModel', 'PesananModel', 'RiwayatModel'));
	}

	public function index()
	{
		if($this->session->userdata('authenticated')){
			if($this->session->userdata('akses') == 'manager'){
                $data = array(
                    'title' => 'manager - laporan',
                    'content' => 'manager/laporan'
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

	public function harian()
	{
		$data = array(
			'title' => 'MANAGER - LAPORAN HARIAN',
			'content' => 'manager/laporan/harian',
			'get_all' => $this->LaporanModel->getAll_harian(),
			'get_pendapatan_harian' => $this->LaporanModel->pendapatan_harian(),
			'get_produk_terjual_harian' => $this->LaporanModel->produk_terjual_harian(),
			'get_total_transaksi_harian' => $this->LaporanModel->total_transaksi_harian(),
			'get_produk_terlaris_harian' => $this->LaporanModel->produk_terlaris_harian(),
			'get_akun' => $this->AkunModel->getAll(),
			'get_riwayat' => $this->RiwayatModel->getAll(),
			'get_pesanan' => $this->PesananModel->getAll()
		);
		$this->load->view('manager/template', $data);
	}
	
	
	public function harian_print($code, $code1)
	{
		$kode_log = 'LH'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PRINT',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		if($code == 'true' && $code1 == 'true'){
			$this->data['dashboard'] = '';
			$this->data['get_harian'] =  $this->LaporanModel->getAll_harian();
		} else if($code == 'true' && $code1 != 'true'){
			$this->data['dashboard'] = '';
			$this->data['get_harian'] =  $this->LaporanModel->getAll_harian_by($code1);
		} else if($code != 'true' && $code1 == 'true'){
			$this->data['dashboard'] = 'none';
			$this->data['get_harian'] =  $this->LaporanModel->getAll_harian();
		} else if($code != 'true' && $code1 != 'true'){
			$this->data['dashboard'] = 'none';
			$this->data['get_harian'] =  $this->LaporanModel->getAll_harian_by($code1);
		}
		
			$this->data['get_pendapatan_harian'] = $this->LaporanModel->pendapatan_harian();
			$this->data['get_produk_terjual_harian'] = $this->LaporanModel->produk_terjual_harian();
			$this->data['get_total_transaksi_harian'] = $this->LaporanModel->total_transaksi_harian();
			$this->data['get_produk_terlaris_harian'] = $this->LaporanModel->produk_terlaris_harian();
		
		$this->load->view('cetak/laporan/harian',$this->data);
	}
	
	public function harian_cetak($code, $code1)
	{
		$kode_log = 'LH'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PDF',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		if($code == 'true' && $code1 == 'true'){
			$this->data['dashboard'] = '';
			$this->data['get_harian'] =  $this->LaporanModel->getAll_harian();
		} else if($code == 'true' && $code1 != 'true'){
			$this->data['dashboard'] = '';
			$this->data['get_harian'] =  $this->LaporanModel->getAll_harian_by($code1);
		} else if($code != 'true' && $code1 == 'true'){
			$this->data['dashboard'] = 'none';
			$this->data['get_harian'] =  $this->LaporanModel->getAll_harian();
		} else if($code != 'true' && $code1 != 'true'){
			$this->data['dashboard'] = 'none';
			$this->data['get_harian'] =  $this->LaporanModel->getAll_harian_by($code1);
		}
			$this->data['get_pendapatan_harian'] = $this->LaporanModel->pendapatan_harian();
			$this->data['get_produk_terjual_harian'] = $this->LaporanModel->produk_terjual_harian();
			$this->data['get_total_transaksi_harian'] = $this->LaporanModel->total_transaksi_harian();
			$this->data['get_produk_terlaris_harian'] = $this->LaporanModel->produk_terlaris_harian();
		$this->load->library('pdfgenerator');
    
        // title dari pdf
        $this->data['title_pdf'] = 'DATA LAPORAN HARIAN';

        
        // filename dari pdf ketika didownload
        $file_pdf = 'DATA LAPORAN HARIAN';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('cetak/laporan/harian',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
		redirect(site_url('manager/log'));
	}

	function harian_export($code, $code1)
	{
		$kode_log = 'LH'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak EXCEL',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		if($code1 == 'true'){
			$get_harian =  $this->LaporanModel->getAll_harian();
		} else if($code1 != 'true'){
			$get_harian =  $this->LaporanModel->getAll_harian_by($code1);
		}

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'NO');
		$sheet->setCellValue('B1', 'KODE TRANSAKSI');
		$sheet->setCellValue('C1', 'OPERATOR');
		$sheet->setCellValue('D1', 'NAMA PELANGGAN');
		$sheet->setCellValue('E1', 'TANGGAL');
		$sheet->setCellValue('F1', 'JAM');
		
		$no = 1;
		$x = 2;
		foreach($get_harian as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->kode_transaksi);
			$sheet->setCellValue('C'.$x, $row->nama);
			$sheet->setCellValue('D'.$x, $row->nama_pelanggan);
			$sheet->setCellValue('E'.$x, $row->tgl_transaksi);
			$sheet->setCellValue('F'.$x, $row->jam_transaksi);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'DATA LAPORAN HARIAN';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		
		$writer->save('php://output');
	}
	
	



	
	
	
	
	
	
	
	

	public function bulanan()
	{
		$data = array(
			'title' => 'MANAGER - LAPORAN BULANAN',
			'content' => 'manager/laporan/bulanan',
			'get_all' => $this->LaporanModel->getAll_bulanan(),
			'get_pendapatan_bulanan' => $this->LaporanModel->pendapatan_bulanan(),
			'get_produk_terjual_bulanan' => $this->LaporanModel->produk_terjual_bulanan(),
			'get_total_transaksi_bulanan' => $this->LaporanModel->total_transaksi_bulanan(),
			'get_produk_terlaris_bulanan' => $this->LaporanModel->produk_terlaris_bulanan(),
			'get_akun' => $this->AkunModel->getAll(),
			'get_riwayat' => $this->RiwayatModel->getAll(),
			'get_pesanan' => $this->PesananModel->getAll()
		);
		$this->load->view('manager/template', $data);
	}
	
	public function bulanan_print($code, $code1)
	{
		$kode_log = 'LB'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PRINT',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		if($code == 'true' && $code1 == 'true'){
			$this->data['dashboard'] = '';
			$this->data['get_bulanan'] =  $this->LaporanModel->getAll_bulanan();
		} else if($code == 'true' && $code1 != 'true'){
			$this->data['dashboard'] = '';
			$this->data['get_bulanan'] =  $this->LaporanModel->getAll_bulanan_by($code1);
		} else if($code != 'true' && $code1 == 'true'){
			$this->data['dashboard'] = 'none';
			$this->data['get_bulanan'] =  $this->LaporanModel->getAll_bulanan();
		} else if($code != 'true' && $code1 != 'true'){
			$this->data['dashboard'] = 'none';
			$this->data['get_bulanan'] =  $this->LaporanModel->getAll_bulanan_by($code1);
		}
		
			$this->data['get_pendapatan_bulanan'] = $this->LaporanModel->pendapatan_bulanan();
			$this->data['get_produk_terjual_bulanan'] = $this->LaporanModel->produk_terjual_bulanan();
			$this->data['get_total_transaksi_bulanan'] = $this->LaporanModel->total_transaksi_bulanan();
			$this->data['get_produk_terlaris_bulanan'] = $this->LaporanModel->produk_terlaris_bulanan();
		
		$this->load->view('cetak/laporan/bulanan',$this->data);
	}
	
	public function bulanan_cetak($code, $code1)
	{
		$kode_log = 'LB'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PDF',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		if($code == 'true' && $code1 == 'true'){
			$this->data['dashboard'] = '';
			$this->data['get_bulanan'] =  $this->LaporanModel->getAll_bulanan();
		} else if($code == 'true' && $code1 != 'true'){
			$this->data['dashboard'] = '';
			$this->data['get_bulanan'] =  $this->LaporanModel->getAll_bulanan_by($code1);
		} else if($code != 'true' && $code1 == 'true'){
			$this->data['dashboard'] = 'none';
			$this->data['get_bulanan'] =  $this->LaporanModel->getAll_bulanan();
		} else if($code != 'true' && $code1 != 'true'){
			$this->data['dashboard'] = 'none';
			$this->data['get_bulanan'] =  $this->LaporanModel->getAll_bulanan_by($code1);
		}
			$this->data['get_pendapatan_bulanan'] = $this->LaporanModel->pendapatan_bulanan();
			$this->data['get_produk_terjual_bulanan'] = $this->LaporanModel->produk_terjual_bulanan();
			$this->data['get_total_transaksi_bulanan'] = $this->LaporanModel->total_transaksi_bulanan();
			$this->data['get_produk_terlaris_bulanan'] = $this->LaporanModel->produk_terlaris_bulanan();
		$this->load->library('pdfgenerator');
	
		// title dari pdf
		$this->data['title_pdf'] = 'DATA LAPORAN bulanan';

		
		// filename dari pdf ketika didownload
		$file_pdf = 'DATA LAPORAN bulanan';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";
		
		$html = $this->load->view('cetak/laporan/bulanan',$this->data, true);	    
		
		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
		redirect(site_url('manager/log'));
	}

	function bulanan_export($code, $code1)
	{
		$kode_log = 'LB'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak EXCEL',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		if($code1 == 'true'){
			$get_bulanan =  $this->LaporanModel->getAll_bulanan();
		} else if($code1 != 'true'){
			$get_bulanan =  $this->LaporanModel->getAll_bulanan_by($code1);
		}

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'NO');
		$sheet->setCellValue('B1', 'KODE TRANSAKSI');
		$sheet->setCellValue('C1', 'OPERATOR');
		$sheet->setCellValue('D1', 'NAMA PELANGGAN');
		$sheet->setCellValue('E1', 'TANGGAL');
		$sheet->setCellValue('F1', 'JAM');
		
		$no = 1;
		$x = 2;
		foreach($get_bulanan as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->kode_transaksi);
			$sheet->setCellValue('C'.$x, $row->nama);
			$sheet->setCellValue('D'.$x, $row->nama_pelanggan);
			$sheet->setCellValue('E'.$x, $row->tgl_transaksi);
			$sheet->setCellValue('F'.$x, $row->jam_transaksi);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'DATA LAPORAN bulanan';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		
		$writer->save('php://output');
	}



















	public function transaksi()
	{
		$data = array(
			'title' => 'MANAGER - LAPORAN TRANSAKSI',
			'content' => 'manager/laporan/transaksi',
			'get_all' => $this->LaporanModel->getAll(),
			'get_akun' => $this->AkunModel->getAll(),
			'get_pendapatan_transaksi' => $this->LaporanModel->pendapatan_transaksi(),
			'get_produk_terjual_transaksi' => $this->LaporanModel->produk_terjual_transaksi(),
			'get_total_transaksi_transaksi' => $this->LaporanModel->total_transaksi_transaksi(),
			'get_produk_terlaris_transaksi' => $this->LaporanModel->produk_terlaris_transaksi(),
			'get_riwayat' => $this->RiwayatModel->getAll(),
			'get_pesanan' => $this->PesananModel->getAll()
			
		);
		$this->load->view('manager/template', $data);
	}


	public function print($code5, $code, $code1, $code2)
	{
		$kode_log = 'LT'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PRINT',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		if ($code5 == 'true'){
			$this->data['dashboard'] = '';
		} else{
			$this->data['dashboard'] = 'none';
		}
		if ($code == 'true') {
			if($code1 == 'true' && $code2 == 'true'){
				$this->data['get_transaksi'] = $this->LaporanModel->get1();
			} else if($code2 == 'true'){
				$this->data['get_transaksi'] = $this->LaporanModel->get2($code1);
			} else if($code1 == 'true'){
				$this->data['get_transaksi'] = $this->LaporanModel->get3($code2);
			} else {
				$this->data['get_transaksi'] = $this->LaporanModel->get4($code1, $code2);
			}
		} else{
			if($code1 == 'true' && $code2 == 'true'){
				$this->data['get_transaksi'] = $this->LaporanModel->get5($code);
			} else if($code2 == 'true'){
				$this->data['get_transaksi'] = $this->LaporanModel->get6($code, $code1);
			} else if($code1 == 'true'){
				$this->data['get_transaksi'] = $this->LaporanModel->get7($code, $code2);
			} else {
				$this->data['get_transaksi'] = $this->LaporanModel->get8($code, $code1, $code2);
			}
		}
		$this->data['get_pendapatan_transaksi'] = $this->LaporanModel->pendapatan_transaksi();
		$this->data['get_produk_terjual_transaksi'] = $this->LaporanModel->produk_terjual_transaksi();
		$this->data['get_total_transaksi_transaksi'] = $this->LaporanModel->total_transaksi_transaksi();
		$this->data['get_produk_terlaris_transaksi'] = $this->LaporanModel->produk_terlaris_transaksi();
		$this->load->view('cetak/laporan/transaksi',$this->data);
	}
	
	public function cetak($code5, $code, $code1, $code2)
	{
		$kode_log = 'LT'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PDF',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		$this->load->library('pdfgenerator');
		if ($code5 == 'true'){
			$this->data['dashboard'] = '';
		} else{
			$this->data['dashboard'] = 'none';
		}

		// title dari pdf
        $this->data['title_pdf'] = 'DATA LAPORAN TRANSAKSI';
		
		if ($code == 'true') {
			if($code1 == 'true' && $code2 == 'true'){
				$this->data['get_transaksi'] = $this->LaporanModel->get1();
			} else if($code2 == 'true'){
				$this->data['get_transaksi'] = $this->LaporanModel->get2($code1);
			} else if($code1 == 'true'){
				$this->data['get_transaksi'] = $this->LaporanModel->get3($code2);
			} else {
				$this->data['get_transaksi'] = $this->LaporanModel->get4($code1, $code2);
			}
		} else{
			if($code1 == 'true' && $code2 == 'true'){
				$this->data['get_transaksi'] = $this->LaporanModel->get5($code);
			} else if($code2 == 'true'){
				$this->data['get_transaksi'] = $this->LaporanModel->get6($code, $code1);
			} else if($code1 == 'true'){
				$this->data['get_transaksi'] = $this->LaporanModel->get7($code, $code2);
			} else {
				$this->data['get_transaksi'] = $this->LaporanModel->get8($code, $code1, $code2);
			}
		}

		$this->data['get_pendapatan_transaksi'] = $this->LaporanModel->pendapatan_transaksi();
		$this->data['get_produk_terjual_transaksi'] = $this->LaporanModel->produk_terjual_transaksi();
		$this->data['get_total_transaksi_transaksi'] = $this->LaporanModel->total_transaksi_transaksi();
		$this->data['get_produk_terlaris_transaksi'] = $this->LaporanModel->produk_terlaris_transaksi();
        
        // filename dari pdf ketika didownload
        $file_pdf = 'DATA LAPORAN TRANSAKSI';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('cetak/laporan/transaksi',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
		redirect(site_url('manager/log'));
	}

	function export($code5, $code, $code1, $code2)
	{
		$kode_log = 'LT'.date('Ymd').date('His').rand(10, 99);
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
				$get_transaksi = $this->LaporanModel->get1();
			} else if($code2 == 'true'){
				$get_transaksi = $this->LaporanModel->get2($code1);
			} else if($code1 == 'true'){
				$get_transaksi = $this->LaporanModel->get3($code2);
			} else {
				$get_transaksi = $this->LaporanModel->get4($code1, $code2);
			}
		} else{
			if($code1 == 'true' && $code2 == 'true'){
				$get_transaksi = $this->LaporanModel->get5($code);
			} else if($code2 == 'true'){
				$get_transaksi = $this->LaporanModel->get6($code, $code1);
			} else if($code1 == 'true'){
				$get_transaksi = $this->LaporanModel->get7($code, $code2);
			} else {
				$get_transaksi = $this->LaporanModel->get8($code, $code1, $code2);
			}
		}

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'NO');
		$sheet->setCellValue('B1', 'KODE TRANSAKSI');
		$sheet->setCellValue('C1', 'OPERATOR');
		$sheet->setCellValue('D1', 'NAMA PELANGGAN');
		$sheet->setCellValue('E1', 'TANGGAL');
		$sheet->setCellValue('F1', 'JAM');
		

		$no = 1;
		$x = 2;
		foreach($get_transaksi as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->kode_transaksi);
			$sheet->setCellValue('C'.$x, $row->nama);
			$sheet->setCellValue('D'.$x, $row->nama_pelanggan);
			$sheet->setCellValue('E'.$x, $row->tgl_transaksi);
			$sheet->setCellValue('F'.$x, $row->jam_transaksi);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'DATA LAPORAN TRANSAKSI';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		
		$writer->save('php://output');
	}
}
