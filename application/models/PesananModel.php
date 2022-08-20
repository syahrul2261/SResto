<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PesananModel extends CI_Model
{
    private $_table = "pesanan";

    public function getAll()
    {
        $this->db->select(['a.id_pesanan', 'a.id_detail_pesanan', 'a.harga_produk', 'a.qty', 'a.total_harga', 'b.id_produk', 'b.nama_produk']);
        $this->db->from('produk b');
        $this->db->join('pesanan a', 'a.id_produk = b.id_produk'); 
        $query = $this->db->get();
        return $query->result();
    }

    public function id()
    {
        $row = $this->db->select('*')->limit(1)->order_by('id_detail_pesanan', 'DESC')->get("detail_pesanan")->row();
        if ($row == null) {
            return 1;
        } else {
            return $row->id_detail_pesanan+1;
        }


    }
}











