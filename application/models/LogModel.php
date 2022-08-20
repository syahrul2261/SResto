<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LogModel extends CI_Model
{
    private $_table = "log";


    public function getAll()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_log" => $id])->order_by('tanggal', 'ASC')->row();
    }


}