<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model
{
    private $_table = "detail_pesanan";


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_log" => $id])->row();
    }

    public function laporan_tahunan()
    {
        $query = $this->db->query('SELECT
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())) AND (MONTH(tgl_transaksi) = 1)))), 0) as "a", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())) AND (MONTH(tgl_transaksi) = 2)))), 0) as "b",
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())) AND (MONTH(tgl_transaksi) = 3)))), 0) as "c", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())) AND (MONTH(tgl_transaksi) = 4)))), 0) as "d", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())) AND (MONTH(tgl_transaksi) = 5)))), 0) as "e", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())) AND (MONTH(tgl_transaksi) = 6)))), 0) as "f", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())) AND (MONTH(tgl_transaksi) = 7)))), 0) as "g", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())) AND (MONTH(tgl_transaksi) = 8)))), 0) as "h", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())) AND (MONTH(tgl_transaksi) = 9)))), 0) as "i", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())) AND (MONTH(tgl_transaksi) = 10)))), 0) as "j", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())) AND (MONTH(tgl_transaksi) = 11)))), 0) as "k", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())) AND (MONTH(tgl_transaksi) = 12)))), 0) as "l" 
        FROM detail_pesanan GROUP BY YEAR(tgl_transaksi),MONTH(tgl_transaksi)
        
        
        ');
        return $query->row();
    }
    
    public function laporan_tahunan_lalu()
    {
        $query = $this->db->query('SELECT
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())-1) AND (MONTH(tgl_transaksi) = 1)))), 0) as "a", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())-1) AND (MONTH(tgl_transaksi) = 2)))), 0) as "b",
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())-1) AND (MONTH(tgl_transaksi) = 3)))), 0) as "c", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())-1) AND (MONTH(tgl_transaksi) = 4)))), 0) as "d", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())-1) AND (MONTH(tgl_transaksi) = 5)))), 0) as "e", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())-1) AND (MONTH(tgl_transaksi) = 6)))), 0) as "f", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())-1) AND (MONTH(tgl_transaksi) = 7)))), 0) as "g", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())-1) AND (MONTH(tgl_transaksi) = 8)))), 0) as "h", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())-1) AND (MONTH(tgl_transaksi) = 9)))), 0) as "i", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())-1) AND (MONTH(tgl_transaksi) = 10)))), 0) as "j", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())-1) AND (MONTH(tgl_transaksi) = 11)))), 0) as "k", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((YEAR(tgl_transaksi) = (YEAR(NOW())-1) AND (MONTH(tgl_transaksi) = 12)))), 0) as "l" 
        FROM detail_pesanan GROUP BY YEAR(tgl_transaksi),MONTH(tgl_transaksi)
        ');
        return $query->row();
    }

    public function laporan_bulanan()
    {
        $query = $this->db->query('SELECT
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 1)))), 0) as "h1", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 2)))), 0) as "h2",
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 3)))), 0) as "h3", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 4)))), 0) as "h4", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 5)))), 0) as "h5", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 6)))), 0) as "h6", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 7)))), 0) as "h7", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 8)))), 0) as "h8", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 9)))), 0) as "h9", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 10)))), 0) as "h10", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 11)))), 0) as "h11", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 12)))), 0) as "h12", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 13)))), 0) as "h13", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 14)))), 0) as "h14",
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 15)))), 0) as "h15", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 16)))), 0) as "h16", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 17)))), 0) as "h17", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 18)))), 0) as "h18", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 19)))), 0) as "h19", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 20)))), 0) as "h20", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 21)))), 0) as "h21", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 22)))), 0) as "h22", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 23)))), 0) as "h23", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 24)))), 0) as "h24", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 25)))), 0) as "h25", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 26)))), 0) as "h26",
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 27)))), 0) as "h27", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 28)))), 0) as "h28", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 29)))), 0) as "h29", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 30)))), 0) as "h30", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())) AND (DAY(tgl_transaksi) = 31)))), 0) as "h31"
        FROM detail_pesanan GROUP BY YEAR(tgl_transaksi),MONTH(tgl_transaksi)
        ');
        return $query->row();
    }

    public function laporan_bulanan_lalu()
    {
        $query = $this->db->query('SELECT
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 1)))), 0) as "h1", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 2)))), 0) as "h2",
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 3)))), 0) as "h3", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 4)))), 0) as "h4", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 5)))), 0) as "h5", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 6)))), 0) as "h6", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 7)))), 0) as "h7", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 8)))), 0) as "h8", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 9)))), 0) as "h9", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 10)))), 0) as "h10", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 11)))), 0) as "h11", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 12)))), 0) as "h12", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 13)))), 0) as "h13", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 14)))), 0) as "h14",
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 15)))), 0) as "h15", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 16)))), 0) as "h16", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 17)))), 0) as "h17", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 18)))), 0) as "h18", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 19)))), 0) as "h19", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 20)))), 0) as "h20", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 21)))), 0) as "h21", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 22)))), 0) as "h22", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 23)))), 0) as "h23", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 24)))), 0) as "h24", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 25)))), 0) as "h25", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 26)))), 0) as "h26",
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 27)))), 0) as "h27", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 28)))), 0) as "h28", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 29)))), 0) as "h29", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 30)))), 0) as "h30", 
        ifnull((SELECT sum(total_harga) FROM (detail_pesanan) WHERE ((MONTH(tgl_transaksi) = (MONTH(NOW())-1) AND (DAY(tgl_transaksi) = 31)))), 0) as "h31"
        FROM detail_pesanan GROUP BY YEAR(tgl_transaksi),MONTH(tgl_transaksi)
        ');
        return $query->row();
    }

    public function laporan_produk_terlaris_bulan()
    {
        $query = $this->db->query('SELECT nama_produk, sum(qty) as a, kategori.id_kategori,kategori.nama_kategori, tgl_transaksi FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND MONTH(tgl_transaksi) = MONTH(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan GROUP BY nama_produk ORDER BY sum(qty) DESC LIMIT 5');

        return $query;
    }

    public function laporan_produk_terlaris_bulan_lalu()
    {
        $query = $this->db->query('SELECT nama_produk, sum(qty) as a, kategori.id_kategori,kategori.nama_kategori, tgl_transaksi FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND MONTH(tgl_transaksi) = MONTH(NOW())-1 AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan GROUP BY nama_produk ORDER BY sum(qty) DESC LIMIT 5');

        return $query;
    }

    public function laporan_produk_tidak_laris_bulan()
    {
        $query = $this->db->query('SELECT nama_produk, sum(qty) as a, kategori.id_kategori,kategori.nama_kategori, tgl_transaksi FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND MONTH(tgl_transaksi) = MONTH(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan GROUP BY nama_produk ORDER BY sum(qty) ASC LIMIT 5 ');

        return $query;
    }

    public function laporan_produk_tidak_laris_bulan_lalu()
    {
        $query = $this->db->query('SELECT nama_produk, sum(qty) as a, kategori.id_kategori,kategori.nama_kategori, tgl_transaksi FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND MONTH(tgl_transaksi) = MONTH(NOW())-1 AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan GROUP BY nama_produk ORDER BY sum(qty) ASC LIMIT 5');

        return $query;
    }

    public function produk_terlaris_bulan()
    {
        $query = $this->db->query('SELECT nama_produk, sum(qty) as a, kategori.id_kategori,kategori.nama_kategori, tgl_transaksi FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND MONTH(tgl_transaksi) = MONTH(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan GROUP BY nama_produk ORDER BY sum(qty) DESC LIMIT 1');
        if($query->row() == null){
            return '<h6 class="fw-bold">Belum Terjadi Transaksi</h6>';
        } else {
        return $query->row()->nama_produk;
        }
    }

    public function produk_terlaris_hari()
    {
        $query = $this->db->query('SELECT nama_produk, sum(qty) as a, kategori.id_kategori,kategori.nama_kategori, tgl_transaksi FROM `pesanan` JOIN `produk` JOIN `kategori`JOIN `detail_pesanan` WHERE pesanan.id_produk = produk.id_produk AND DAY(tgl_transaksi) = DAY(NOW()) AND detail_pesanan.id_detail_pesanan = pesanan.id_detail_pesanan GROUP BY nama_produk ORDER BY sum(qty) DESC LIMIT 1');
        if($query->row() == null){
            return '<h6 class="fw-bold">Belum Terjadi Transaksi</h6>';
        } else {
            return $query->row()->nama_produk;
        }
    }

    public function penghasilan_bulan()
    {
        $query = $this->db->query(' SELECT 
        tgl_transaksi, SUM(total_harga) as t FROM detail_pesanan WHERE MONTH(tgl_transaksi) = MONTH(NOW()) GROUP BY MONTH(tgl_transaksi);
        ');
        if($query->row() == null){
            return '<h6 class="fw-bold">Belum Terjadi Transaksi</h6>';
        } else {
            return number_format($query->row()->t);
        }
    }

    public function penghasilan_hari()
    {
        $query = $this->db->query(' SELECT 
        tgl_transaksi, SUM(total_harga) as t FROM detail_pesanan WHERE DAY(tgl_transaksi) = DAY(NOW()) GROUP BY DAY(tgl_transaksi);
        ');
        if($query->row() == null){
            return '<h6 class="fw-bold">Belum Terjadi Transaksi</h6>';
        } else {
            return number_format($query->row()->t);
        }
    }
        
}

