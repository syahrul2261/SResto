<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LogModel extends CI_Model
{
    private $_table = "log";

    public function getAll()
    {

        return $this->db->query('SELECT * FROM `log` JOIN user ON user.id_user = log.id_user ORDER BY tanggal DESC, waktu DESC')->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_log" => $id])->order_by('tanggal', 'ASC')->row();
    }

    public function get1()
    {
        return $this->db->query('SELECT * FROM `log` JOIN user ON user.id_user = log.id_user')->result();
    }

    public function get2($code1)
    {
        return $this->db->query('SELECT * FROM `log` JOIN user ON user.id_user = log.id_user WHERE log.tanggal >= "'.$code1.'"')->result();
    }

    public function get3($code2)
    {
        return $this->db->query('SELECT * FROM `log` JOIN user ON user.id_user = log.id_user WHERE log.tanggal <= "'.$code2.'"')->result();
    }

    public function get4($code1, $code2)
    {
        return $this->db->query('SELECT * FROM `log` JOIN user ON user.id_user = log.id_user WHERE log.tanggal >= "'.$code1.'"'.' AND  log.tanggal <= "'.$code2.'"')->result();
    }

    public function get5($code)
    {
        return $this->db->query('SELECT * FROM `log` JOIN user ON user.id_user = log.id_user WHERE log.id_user = "'.$code.'"')->result();
    }

    public function get6($code, $code1)
    {
        return $this->db->query('SELECT * FROM `log` JOIN user ON user.id_user = log.id_user WHERE log.id_user = "'.$code.'"'.' AND log.tanggal >= "'.$code1.'"')->result();
    }

    public function get7($code, $code2)
    {
        return $this->db->query('SELECT * FROM `log` JOIN user ON user.id_user = log.id_user WHERE log.id_user = "'.$code.'"'.' AND log.tanggal <= "'.$code2.'"')->result();
    }

    public function get8($code, $code1, $code2)
    {
        return $this->db->query('SELECT * FROM `log` JOIN user ON user.id_user = log.id_user WHERE log.id_user = "'.$code.'"'.' AND  log.tanggal >= "'.$code1.'"'.' AND TANGGAL <= "'.$code2.'"')->result();
    }
}