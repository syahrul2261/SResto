<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AkunModel extends CI_Model
{
    private $_table = "user";

        public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function getBy($code)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('akses', $code);
        return $this->db->get()->result();
    }
}