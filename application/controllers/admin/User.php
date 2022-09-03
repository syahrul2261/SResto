<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class User extends CI_Controller {

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
                    'title' => 'ADMIN - USER',
                    'content' => 'admin/user',
					'get_user' => $this->AkunModel->getAll()
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

	public function print($code)
	{
		$kode_log = 'US'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak PRINT',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);
		
		if($code == "true"){
			$this->data['get_user'] = $this->AkunModel->getALL();
		} else {
			$this->data['get_user'] = $this->AkunModel->getBy($code);
		}
		$this->load->view('cetak/USER',$this->data);
	}
	
	public function cetak($code)
	{
		$kode_log = 'US'.date('Ymd').date('His').rand(10, 99);
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
        $this->data['title_pdf'] = 'DATA USER';
		if($code == "true"){
			$this->data['get_user'] = $this->AkunModel->getALL();
		} else {
			$this->data['get_user'] = $this->AkunModel->getBy($code);
		}
        
        // filename dari pdf ketika didownload
        $file_pdf = 'DATA USER';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('cetak/USER',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
		redirect(site_url('ADMIN/USER'));
	}

	function export($code)
	{
		$kode_log = 'US'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Melakukan Cetak EXCEL',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);

		if($code == "true"){
			$get_user= $this->AkunModel->getAll();
		} else {
			$get_user= $this->AkunModel->getBy($code);
		}

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'NO');
		$sheet->setCellValue('B1', 'USERNAME');
		$sheet->setCellValue('C1', 'EMAIL');
		$sheet->setCellValue('D1', 'NAMA');
		$sheet->setCellValue('E1', 'TANGGAL LAHIR');
		$sheet->setCellValue('F1', 'ALAMAT');
		$sheet->setCellValue('G1', 'PROFILE');
		$sheet->setCellValue('H1', 'AKSES');
		

		$no = 1;
		$x = 2;
		foreach($get_user as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->username);
			$sheet->setCellValue('C'.$x, $row->email);
			$sheet->setCellValue('D'.$x, $row->nama);
			$sheet->setCellValue('E'.$x, $row->tgl_lahir);
			$sheet->setCellValue('F'.$x, $row->alamat);
			$sheet->setCellValue('G'.$x, $row->profile);
			$sheet->setCellValue('H'.$x, $row->akses);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'DATA USER';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function add()
	{
		$config['upload_path']		= './assets/image/profile/';
        $config['allowed_types'] 	= 'jpg|jpeg|png|gif|webp'; 
        $config['max_size'] 		= '10000'; // max_size in kb 
        $config['file_name'] 		= 'Profile-'.date('ymd').'-'.substr(rand(),0, 10);

		$this->load->library('upload', $config);

		if($this->upload->do_upload('profile'))
		{
			$uploadData = $this->upload->data();
			$profile 	= $uploadData['file_name'];

			$post 		= $this->input->post();
			$profile	= $uploadData['file_name'];

			$user 		= array(
				'username' 	=> $post["username"],
				'email' 	=> $post["email"],
				'nama' 		=> $post["nama"],
				'password'	=> $post["password"],
				'tgl_lahir' => $post["tgl_lahir"],
				'alamat' 	=> $post["alamat"],
				'profile' 	=> $profile
			);
			$this->db->insert('user', $user);

			$this->session->set_flashdata('massage', 'Berhasil Menambah Data');
			$kode_log = 'US'.date('Ymd').date('His').rand(10, 100);
			$log = array(
				'id_user'   => $this->session->userdata('id'),
				'kode_log'	=> $kode_log,
				'kegiatan'  => 'Menambah Data',
				'tanggal'   => date('Y-m-d'),
				'waktu'     => date('H:i:s')
			);
			$this->db->insert('log', $log);

			redirect(site_url('admin/user'));
		}
		redirect(site_url('admin/user'));
	}

	public function update(){
		$config['upload_path']	= './assets/image/profile/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp'; 
        $config['max_size'] = '10000'; // max_size in kb 
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

		$this->session->set_flashdata('massage', 'Berhasil Melakukan Cetak EXCEL');
		$kode_log = 'US'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Memperbarui Data',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);
		redirect(site_url('admin/user'));
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
			
			$this->session->set_flashdata('massage', 'Berhasil Memperbarui Data');
			$kode_log = 'US'.date('Ymd').date('His').rand(10, 99);
			$log = array(
				'id_user'   => $this->session->userdata('id'),
				'kode_log'	=> $kode_log,
				'kegiatan'  => 'Memperbarui Data',
				'tanggal'   => date('Y-m-d'),
				'waktu'     => date('H:i:s')
			);
			$this->db->insert('log', $log);
			redirect(site_url('admin/user'));
		}
	}

	public function delete($id){
		$this->db->where('id_user', $id);
		$this->db->delete('user');
		$this->session->set_flashdata('massage', 'Berhasil menghapus Data');
		$kode_log = 'US'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'menghapus Data',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);
		redirect(site_url('admin/user'));
	}
	
	public function delete_all()
	{
		$this->db->where('akses','kasir');
		$this->db->delete('user');
		$this->db->where('akses','ADMIN');
		$this->db->delete('user');
		
		$this->session->set_flashdata('massage', 'Berhasil Memperbarui Data');
		$kode_log = 'US'.date('Ymd').date('His').rand(10, 99);
		$log = array(
			'id_user'   => $this->session->userdata('id'),
			'kode_log'	=> $kode_log,
			'kegiatan'  => 'Memperbarui Data',
			'tanggal'   => date('Y-m-d'),
			'waktu'     => date('H:i:s')
		);
		$this->db->insert('log', $log);
		redirect(site_url('admin/user'));
	}
}
