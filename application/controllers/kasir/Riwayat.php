<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Riwayat extends CI_Controller {

		function __Construct(){
			parent::__Construct();
			$this->load->model(array(['RiwayatModel'], ['PesananModel']));
		}

		public function index()
		{
			if($this->session->userdata('authenticated')){
				if($this->session->userdata('akses') == 'kasir'){
					$data = array(
						'title' => 'KASIR - RIWAYAT',
						'content' => 'kasir/RIWAYAT',
						'get_riwayat' => $this->RiwayatModel->getAll(),
						'get_pesanan' => $this->PesananModel->getAll()
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

		public function struk($id){
        $data = array(
			'title' => 'KASIR - RIWAYAT',
			'get_riwayat' => $this->RiwayatModel->getById($id),
			'get_pesanan' => $this->PesananModel->getById($id)
		);
		
		$this->load->view('struk/struk', $data);
    	}

		public function cetak($id){
        $data = array(
			'title' => 'KASIR - RIWAYAT',
			'get_riwayat' => $this->RiwayatModel->getById($id),
			'get_pesanan' => $this->PesananModel->getById($id)
		);
		
		$this->load->view('cetak/struk', $data);
    	}
	}
