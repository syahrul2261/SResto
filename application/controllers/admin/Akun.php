<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	function __Construct()
	{
		parent::__Construct();
		$this->load->model('AkunModel');
	}

	public function index()
	{
		if($this->session->userdata('authenticated')){
			if($this->session->userdata('akses') == 'admin'){
                $data = array(
                    'title' => 'ADMIN - AKUN',
                    'content' => 'admin/Akun',
					'get_akun' => $this->AkunModel->getById($this->session->userdata('id'))
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

	public function update(){
		$config['upload_path']	= './assets/image/profile/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp'; 
        $config['file_name'] = 'Profile-'.date('ymd').'-'.substr(rand(),0, 10);


		$this->load->library('upload', $config);

		if($this->upload->do_upload('profile'))
		{
		$uploadData = $this->upload->data();
		$profile = $uploadData['file_name'];
		$post = $this->input->post();
		
		$data = array(
			'id_user' 	=> $post["id_user"],
			'username' 	=> $post["username"],
			'email' 	=> $post["email"],
			'nama' 		=> $post["nama"],
			'tgl_lahir' => $post["tgl_lahir"],
			'alamat' 	=> $post["alamat"],
			'profile' 	=> $profile
		);
		if($post["password"] != null){
			$data['password'] = md5($post["password"]);
		} else {
			$data['password'] = $post['old_password'];
		}

		$this->db->where('id_user', $post["id_user"]);
		$this->db->update('user', $data);
		redirect(site_url('admin/akun'));
	} else {
		$post = $this->input->post();
		$data = array(
			'id_user' => $post["id_user"],
			'username' => $post["username"],
			'email' => $post["email"],
			'nama' => $post["nama"],
			'tgl_lahir' => $post["tgl_lahir"],
			'alamat' => $post["alamat"],
			'profile' => $post["old_profile"]
		);
		if($post["password"] != null){
			$data['password'] = md5($post["password"]);
		} else {
			$data['password'] = $post['old_password'];
		}
			
			$this->db->where('id_user', $post['id_user']);
			$this->db->update('user', $data);
			
			$this->session->set_flashdata('massage', 'Akun berhasil di update');
			$kode_log = 'MA'.date('Ymd').date('His').rand(10, 100);
			$log = array(
				'id_user'   => $this->session->userdata('id'),
				'kode_log'	=> $kode_log,
				'kegiatan'  => 'Memperbarui Akun',
				'tanggal'   => date('Y-m-d'),
				'waktu'     => date('H:i:s')
			);
			$this->db->insert('log', $log);
			redirect(site_url('admin/akun'));
		}
	}
}
