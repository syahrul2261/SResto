<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->model('AuthModel');
    }
    
    public function index(){
        if($this->session->userdata('authenticated')){
            redirect('home');
        } else {
            $data['title'] = 'LOGIN';
            $this->load->view('auth', $data);
        }
    }
    
    public function login(){
        $username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
        $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
        
        $user = $this->AuthModel->get($username); // Panggil fungsi get yang ada di AuthModel.php
        
        if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
            $this->session->set_flashdata('message', 'User tidak ditemukan'); // Buat session flashdata
            redirect('auth'); // Redirect ke halaman login
        }else{
            if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
                $session = array(
                    'authenticated'=>true, // Buat session authenticated dengan value true
                    'id' => $user->id_user,
                    'username'=>$user->username,  // Buat session username
                    'email'=>$user->email,  // Buat session username
                    'nama'=>$user->nama, // Buat session name
                    'password'=>$user->password, // Buat session name
                    'tgl_hahir'=>$user->tgl_hahir, // Buat session name
                    'alamat'=>$user->alamat, // Buat session name
                    'profile'=>$user->profile, // Buat session name
                    'akses'=>$user->akses, // Buat session role
                );
                
                $this->session->set_userdata($session); // Buat session sesuai $session
                redirect('home'); // Redirect ke halaman home
            }else{
                $this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
                redirect('auth'); // Redirect ke halaman login
            }
        }
    }
    
    public function logout(){
        $this->session->sess_destroy(); // Hapus semua session
        redirect('auth'); // Redirect ke halaman login
    }
}
