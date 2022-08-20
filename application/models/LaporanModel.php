<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model
{
    private $_table = "detail_pesanan";

    public function rules()
    {
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getAll_harian()
    {
        $query = $this->db->query('SELECT * FROM detail_pesanan WHERE DAY(tgl_transaksi) = DAY(NOW())');
        return $query->result();
    }

    public function getAll_bulanan()
    {
        $query = $this->db->query('SELECT * FROM detail_pesanan WHERE MONTH(tgl_transaksi) = MONTH(NOW())');
        return $query->result();
    }
    
    public function pendapatan_harian()
    {
        $query = $this->db->query('SELECT sum(detail_pesanan.total_harga) as a FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND DAY(tgl_transaksi) = DAY(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan');
        if($query == null){
            return "Belum Terjadi Transaksi";
        } else {
            return $query->row()->a;
        }
    }

    public function produk_terjual_harian()
    {
        $query = $this->db->query('SELECT sum(qty) as a FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND DAY(tgl_transaksi) = DAY(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan');
        if($query == null){
            return "Belum Terjadi Transaksi";
        } else {
            return $query->row()->a;
        }
    }

    public function total_transaksi_harian()
    {
        $query = $this->db->query('SELECT COUNT(id_detail_pesanan) as a FROM detail_pesanan WHERE DAY(tgl_transaksi) = DAY (NOW())');
        if($query == null){
            return "Belum Terjadi Transaksi";
        } else {
            return $query->row()->a;
        }
    }

    public function produk_terlaris_harian()
    {
        $query = $this->db->query('SELECT nama_produk, sum(qty) FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND DAY(tgl_transaksi) = DAY(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan GROUP BY nama_produk LIMIT 1');
        if($query == null){
            return "Belum Terjadi Transaksi";
        } else {
            return $query->row()->nama_produk;
        }
    }
    
    public function pendapatan_bulanan()
    {
        $query = $this->db->query('SELECT sum(detail_pesanan.total_harga) as a FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND MONTH(tgl_transaksi) = MONTH(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan');
        if($query == null){
            return "Belum Terjadi Transaksi";
        } else {
            return $query->row()->a;
        }
    }

    public function produk_terjual_bulanan()
    {
        $query = $this->db->query('SELECT sum(qty) as a FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND MONTH(tgl_transaksi) = MONTH(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan');
        if($query == null){
            return "Belum Terjadi Transaksi";
        } else {
            return $query->row()->a;
        }
    }

    public function total_transaksi_bulanan()
    {
        $query = $this->db->query('SELECT COUNT(id_detail_pesanan) as a FROM detail_pesanan WHERE MONTH(tgl_transaksi) = MONTH(NOW())');
        if($query == null){
            return "Belum Terjadi Transaksi";
        } else {
            return $query->row()->a;
        }
    }

    public function produk_terlaris_bulanan()
    {
        $query = $this->db->query('SELECT nama_produk, sum(qty) FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND MONTH(tgl_transaksi) = MONTH(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan GROUP BY nama_produk LIMIT 1');
        if($query == null){
            return "Belum Terjadi Transaksi";
        } else {
            return $query->row()->nama_produk;
        }
    }
}