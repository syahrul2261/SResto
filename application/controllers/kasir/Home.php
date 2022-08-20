<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __Construct()
	{
		parent::__Construct();
		$this->load->model('DashboardModel');
	}

	public function index()
	{
		if($this->session->userdata('authenticated')){
			if($this->session->userdata('akses') == 'kasir'){
                $data = array(
                    'title' => 'KASIR - HOME',
                    'content' => 'kasir/home',
					// 'get_tahunan_1' => $this->DashboardModel->getTahunan_1(),
					// 'get_tahunan_2' => $this->DashboardModel->getTahunan_2(),
					// 'get_tahunan_3' => $this->DashboardModel->getTahunan_3(),
					// 'get_tahunan_4' => $this->DashboardModel->getTahunan_4(),
					// 'get_tahunan_5' => $this->DashboardModel->getTahunan_5(),
					// 'get_tahunan_6' => $this->DashboardModel->getTahunan_6(),
					// 'get_tahunan_7' => $this->DashboardModel->getTahunan_7(),
					// 'get_tahunan_8' => $this->DashboardModel->getTahunan_8(),
					// 'get_tahunan_9' => $this->DashboardModel->getTahunan_9(),
					// 'get_tahunan_10' => $this->DashboardModel->getTahunan_10(),
					// 'get_tahunan_11' => $this->DashboardModel->getTahunan_11(),
					// 'get_tahunan_12' => $this->DashboardModel->getTahunan_12(),
					'laporan_tahunan' => $this->DashboardModel->laporan_tahunan(),
					'laporan_tahunan_lalu' => $this->DashboardModel->laporan_tahunan_lalu(),
					'laporan_bulanan' => $this->DashboardModel->laporan_bulanan(),
					'laporan_bulanan_lalu' => $this->DashboardModel->laporan_bulanan_lalu(),
					'produk_terlaris_bulan' => $this->DashboardModel->produk_terlaris_bulan(),
					'produk_terlaris_hari' => $this->DashboardModel->produk_terlaris_hari(),
					'penghasilan_bulan' => $this->DashboardModel->penghasilan_bulan(),
					'penghasilan_hari' => $this->DashboardModel->penghasilan_hari()
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
}
