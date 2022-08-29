<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriModel');

	}

	public function index()
	{
		if($this->session->userdata('authenticated')){
			if($this->session->userdata('akses') == 'manager'){
                $data = array(
                    'title' => 'manager - Kategori',
                    'content' => 'manager/Kategori',
					'get_kategori' => $this->KategoriModel->getAll()
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
    
		public function print($code)
	{
        $this->data['get_kategori'] = $this->KategoriModel->getAll();
		
		$this->load->view('cetak/kategori',$this->data);
	}
	
	public function cetak($code)
	{
		$this->load->library('pdfgenerator');
    
        // title dari pdf
        $this->data['title_pdf'] = 'DATA KATEGORI';
	
        $this->data['get_kategori'] = $this->KategoriModel->getAll();
        
        // filename dari pdf ketika didownload
        $file_pdf = 'DATA KATEGORI';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('cetak/kategori',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
		redirect(site_url('manager/kategori'));
	}

	function export($code)
	{
		
        $get_kategori = $this->KategoriModel->getAll();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'NO');
		$sheet->setCellValue('B1', 'KATEGORI');
		

		$no = 1;
		$x = 2;
		foreach($get_kategori as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->nama_kategori);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'DATA KATEGORI';
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

    public function add()
    {
        $kategori = $this->KategoriModel;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());
		$kategori->save();

        if ($validation->run()) {
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect(site_url('manager/kategori'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('manager/kategori');

        $kategori = $this->KategoriModel;
        $validation = $this->form_validation;
        $validation->set_rules($kategori->rules());
		$kategori->update();

        if ($validation->run()) {
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kategori"] = $kategori->getById($id);
        if (!$data["kategori"]) show_404();
        
        $this->load->view("manager/kategori/edit_form", $data);
    }

	public function update()
	{
		$post = $this->input->post();

		$data = array(
        'id_kategori' => $post["id_kategori"],
        'nama_kategori' => $post["nama_kategori"]
		);

		$this->db->where('id_kategori', $post["id_kategori"]);
		$this->db->update('kategori', $data);
		redirect(site_url('manager/kategori'));

		// $post = $this->input->post();
        // $this->id_kategori = $post["id_kategori"];
        // $this->nama_kategori = $post["nama_kategori"];
        // $this->db->update('kategori', $this, array('id_kategori' => $post['id_kategori']));
		// redirect(site_url('manager/kategori'));
	}

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->KategoriModel->delete($id)) {
            redirect(site_url('manager/kategori'));
        }
    }
	
	public function delete_all()
	{
		$this->db->empty_table('kategori');
		redirect(site_url('manager/kategori'));
		
	}
}
