<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model
{
    private $_table = "detail_pesanan";

    public function getAll()
    {
                $query = $this->db->query('SELECT * FROM `detail_pesanan` JOIN user ON user.id_user = detail_pesanan.operator');
        return $query->result();
    }

    public function getAll_by($code1)
    {
        return $this->db->get($this->_table)->result();
    }

    public function getAll_harian()
    {
        $query = $this->db->query('SELECT * FROM detail_pesanan JOIN user ON user.id_user = detail_pesanan.operator WHERE DAY(tgl_transaksi) = DAY(NOW())');
        return $query->result();
    }
    
    public function getAll_harian_by($code1)
    {
        $query = $this->db->query('SELECT * FROM detail_pesanan JOIN user ON user.id_user = detail_pesanan.operator WHERE DAY(tgl_transaksi) = DAY(NOW()) AND user.nama = "'.$code1.'"');
        return $query->result();
    }

    public function getAll_bulanan()
    {
        $query = $this->db->query('SELECT * FROM detail_pesanan JOIN user ON user.id_user = detail_pesanan.operator WHERE MONTH(tgl_transaksi) = MONTH(NOW())');
        return $query->result();
    }

    public function getAll_bulanan_by($code1)
    {
        $query = $this->db->query('SELECT * FROM detail_pesanan JOIN user ON user.id_user = detail_pesanan.operator WHERE MONTH(tgl_transaksi) = MONTH(NOW()) AND user.nama = "'.$code1.'"');
        return $query->result();
    }
    
    public function pendapatan_transaksi()
    {
        $query = $this->db->query('SELECT sum(detail_pesanan.total_harga) as a FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan');
        if($query->row() == null){
            return "<h6 class='fw-bold'>Belum Terjadi Transaksi</h6>";
        } else {
            return $query->row()->a;
        }
    }

    public function produk_terjual_transaksi()
    {
        $query = $this->db->query('SELECT sum(qty) as a FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan');
        if($query->row()->a == ""){
            return "<h6 class='fw-bold'>Belum Terjadi Transaksi</h6>";
        } else {
            return $query->row()->a;
        }
    }

    public function total_transaksi_transaksi()
    {
        $query = $this->db->query('SELECT COUNT(id_detail_pesanan) as a FROM detail_pesanan');
        if($query->row() == null){
            return "<h6 class='fw-bold'>Belum Terjadi Transaksi</h6>";
        } else {
            return $query->row()->a;
        }
    }

    public function produk_terlaris_transaksi()
    {
        $query = $this->db->query('SELECT nama_produk as a, sum(qty) FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan GROUP BY nama_produk LIMIT 1');
        if($query->row() == null){
            return "<h6 class='fw-bold'>Belum Terjadi Transaksi</h6>";
        } else {
            return $query->row()->a;
        }
    }

    public function pendapatan_harian()
    {
        $query = $this->db->query('SELECT sum(detail_pesanan.total_harga) as a FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND DAY(tgl_transaksi) = DAY(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan');
        if($query->row() == null){
            return "<h6 class='fw-bold'>Belum Terjadi Transaksi</h6>";
        } else {
            return $query->row()->a;
        }
    }

    public function produk_terjual_harian()
    {
        $query = $this->db->query('SELECT sum(qty) as a FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND DAY(tgl_transaksi) = DAY(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan');
        if($query->row()->a == ""){
            return "<h6 class='fw-bold'>Belum Terjadi Transaksi</h6>";
        } else {
            return $query->row()->a;
        }
    }

    public function total_transaksi_harian()
    {
        $query = $this->db->query('SELECT COUNT(id_detail_pesanan) as a FROM detail_pesanan WHERE DAY(tgl_transaksi) = DAY (NOW())');
        if($query->row() == null){
            return "<h6 class='fw-bold'>Belum Terjadi Transaksi</h6>";
        } else {
            return $query->row()->a;
        }
    }

    public function produk_terlaris_harian()
    {
        $query = $this->db->query('SELECT nama_produk as a, sum(qty) FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND DAY(tgl_transaksi) = DAY(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan GROUP BY nama_produk LIMIT 1');
        if($query->row() == null){
            return "<h6 class='fw-bold'>Belum Terjadi Transaksi</h6>";
        } else {
            return $query->row()->a;
        }
    }
    
    public function pendapatan_bulanan()
    {
        $query = $this->db->query('SELECT sum(detail_pesanan.total_harga) as a FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND MONTH(tgl_transaksi) = MONTH(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan');
        if($query->row() == null){
            return "<h6 class='fw-bold'>Belum Terjadi Transaksi</h6>";
        } else {
            return $query->row()->a;
        }
    }

    public function produk_terjual_bulanan()
    {
        $query = $this->db->query('SELECT sum(qty) as a FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND MONTH(tgl_transaksi) = MONTH(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan');
        if($query->row()->a == ""){
            return "<h6 class='fw-bold'>Belum Terjadi Transaksi</h6>";
        } else {
            return $query->row()->a;
        }
    }

    public function total_transaksi_bulanan()
    {
        $query = $this->db->query('SELECT COUNT(id_detail_pesanan) as a FROM detail_pesanan WHERE MONTH(tgl_transaksi) = MONTH(NOW())');
        if($query->row() == null){
            return "<h6 class='fw-bold'>Belum Terjadi Transaksi</h6>";
        } else {
            return $query->row()->a;
        }
    }

    public function produk_terlaris_bulanan()
    {
        $query = $this->db->query('SELECT nama_produk, sum(qty) FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND MONTH(tgl_transaksi) = MONTH(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan GROUP BY nama_produk LIMIT 1');
        if($query->row() == null){
            return "<h6 class='fw-bold'>Belum Terjadi Transaksi</h6>";
        } else {
            return $query->row()->nama_produk;
        }
    }

    public function get1(){
        $query = $this->db->query('SELECT * FROM `detail_pesanan` JOIN user ON user.id_user = detail_pesanan.operator');
        return $query->result();
    }

    public function get2($code1){
        $query = $this->db->query('SELECT * FROM `detail_pesanan` JOIN user ON user.id_user = detail_pesanan.operator WHERE tgl_transaksi >= "'.$code1.'"');
        return $query->result();
    }

    public function get3($code2){
        $query = $this->db->query('SELECT * FROM `detail_pesanan` JOIN user ON user.id_user = detail_pesanan.operator WHERE tgl_transaksi <= "'.$code2.'"');
        return $query->result();
    }

    public function get4($code1, $code2){
        $query = $this->db->query('SELECT * FROM `detail_pesanan` JOIN user ON user.id_user = detail_pesanan.operator WHERE tgl_transaksi >= "'.$code1.'"'.' AND tgl_transaksi <= "'.$code2.'"');
        return $query->result();
    }

    public function get5($code){
        $query = $this->db->query('SELECT * FROM `detail_pesanan` JOIN user ON user.id_user = detail_pesanan.operator WHERE user.nama = "'.$code.'"');
        return $query->result();
    }

    public function get6($code, $code1){
        $query = $this->db->query('SELECT * FROM `detail_pesanan` JOIN user ON user.id_user = detail_pesanan.operator WHERE user.nama = "'.$code.'"'.' AND tgl_transaksi >= "'.$code1.'"');
        return $query->result();
    }

    public function get7($code, $code2){
        $query = $this->db->query('SELECT * FROM `detail_pesanan` JOIN user ON user.id_user = detail_pesanan.operator WHERE user.nama = "'.$code.'"'.' AND tgl_transaksi <= "'.$code2.'"');
        return $query->result();
    }

    public function get8($code, $code1, $code2){
        $query = $this->db->query('SELECT * FROM `detail_pesanan` JOIN user ON user.id_user = detail_pesanan.operator WHERE user.nama = "'.$code.'"'.' AND tgl_transaksi >= "'.$code1.'"'.' AND tgl_transaksi <= "'.$code2.'"');
        return $query->result();
    }
}