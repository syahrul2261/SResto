<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __Construct()
	{
		parent::__Construct();
		$this->load->model('LaporanModel');
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
			'title' => 'Manager - laporan harian',
			'content' => 'manager/laporan/harian',
			'get_all' => $this->LaporanModel->getAll_harian(),
			'get_pendapatan_harian' => $this->LaporanModel->pendapatan_harian(),
			'get_produk_terjual_harian' => $this->LaporanModel->produk_terjual_harian(),
			'get_total_transaksi_harian' => $this->LaporanModel->total_transaksi_harian(),
			'get_produk_terlaris_harian' => $this->LaporanModel->produk_terlaris_harian()
		);
		$this->load->view('manager/template', $data);
	}

	public function bulanan()
	{
		$data = array(
			'title' => 'Manager - laporan bulanan',
			'content' => 'manager/laporan/bulanan',
			'get_all' => $this->LaporanModel->getAll_bulanan(),
			'get_pendapatan_bulanan' => $this->LaporanModel->pendapatan_bulanan(),
			'get_produk_terjual_bulanan' => $this->LaporanModel->produk_terjual_bulanan(),
			'get_total_transaksi_bulanan' => $this->LaporanModel->total_transaksi_bulanan(),
			'get_produk_terlaris_bulanan' => $this->LaporanModel->produk_terlaris_bulanan()
		);
		$this->load->view('manager/template', $data);
	}

	public function transaksi()
	{
		$data = array(
			'title' => 'Manager - laporan transaksi',
			'content' => 'manager/laporan/transaksi',
			'get_all' => $this->LaporanModel->getAll()
		);
		$this->load->view('manager/template', $data);
	}
}
