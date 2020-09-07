<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


    class M_kategori extends CI_Model
    {

    public function get_list()
    {
        $query = $this->db->get('tb_kategori');
        if (count($query->result()) > 0) {
            return $query->result();
        }
        
    }

    public function save_entry($data)
    {
        return $this->db->insert('tb_kategori', $data);
    }

}