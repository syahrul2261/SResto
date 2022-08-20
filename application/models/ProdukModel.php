<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model
{
    private $_table = "produk";

    public $id_produk;
    public $nama_produk;
    public $harga_produk;
    public $id_kategori;
    public $foto_produk;
    public $stock;
    // public function rules()
    // {
    //     return [
    //         ['field' => 'name',
    //         'label' => 'Name',
    //         'rules' => 'required'],

    //         ['field' => 'price',
    //         'label' => 'Price',
    //         'rules' => 'numeric'],
            
    //         ['field' => 'description',
    //         'label' => 'Description',
    //         'rules' => 'required']
    //     ];
    // }

    public function getAll()
    {
        $this->db->select(['a.id_produk', 'a.nama_produk', 'a.harga_produk', 'a.foto_produk', 'a.stock', 'b.id_kategori', 'b.nama_kategori']);
        $this->db->from('kategori b');
        $this->db->join('produk a', 'a.id_kategori = b.id_kategori'); 
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_produk" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_produk = $post["nama_produk"];
        $this->harga_produk = $post["harga_produk"];
        $this->id_kategori = $post["id_kategori"];
        $this->foto_produk = $post["foto_produk"];
        $this->stock = $post["stock"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_produk = $post["id_produk"];
        $this->nama_produk = $post["nama_produk"];
        return $this->db->update($this->_table, $this, array('id_produk' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_produk" => $id));
    }
}