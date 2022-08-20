<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProdukModel');
	}

	public function index()
	{
		if($this->session->userdata('authenticated')){
			if($this->session->userdata('akses') == 'manager'){
                $data = array(
                    'title' => 'manager - Stock',
                    'content' => 'manager/Stock'
                );
				$data['get_produk'] = $this->ProdukModel->getALL();
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
		redirect(site_url('manager/stock'));
	}
}
