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
						'title' => 'KASIR - Riwayat',
						'content' => 'kasir/Riwayat',
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

		
	}
