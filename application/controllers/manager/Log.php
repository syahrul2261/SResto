<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

	function __Construct()
	{
		parent::__Construct();
		$this->load->model('LogModel');
	}

	public function index()
	{
		if($this->session->userdata('authenticated')){
			if($this->session->userdata('akses') == 'manager'){
                $data = array(
                    'title' => 'manager - Log',
                    'content' => 'manager/Log',
					'get_log' => $this->LogModel->getAll()
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

	
}
