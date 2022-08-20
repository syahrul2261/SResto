<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('authenticated')){
			if($this->session->userdata('akses') == 'kasir'){
				redirect(site_url('kasir/home'));
			} else if($this->session->userdata('akses') == 'admin'){
				redirect(site_url('admin/home'));
			} else if($this->session->userdata('akses') == 'manager'){
				redirect(site_url('manager/home'));
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
