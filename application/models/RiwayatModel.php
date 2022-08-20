<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatModel extends CI_Model
{
    private $_table = "detail_pesanan";


    public function getAll()
    {
        $this->db->select(['a.id_detail_pesanan', 'a.kode_transaksi', 'a.nama_pelanggan', 'a.total_harga', 'a.bayar', 'a.kembalian', 'a.catatan', 'a.tgl_transaksi', 'a.jam_transaksi', 'a.operator', 'b.id_user', 'b.nama']);
        $this->db->from('user b');
        $this->db->join('detail_pesanan a', 'a.operator = b.id_user'); 
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_detail_pesanan" => $id])->row();
    }


}