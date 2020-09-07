<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


    class M_costumer extends CI_Model
    {

    public function buat_id()
    {
        $this->db->select('RIGHT(tb_costumer.id_costumer,4) as kode', FALSE);
        $this->db->order_by('id_costumer', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_costumer');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "C-TVK-" . $kodemax;
        return $kodejadi;
    }

    public function save_costumer_info($data)
    {
        return $this->db->insert('tb_costumer', $data);
    }

    public function get_all_costumer()
    {
        $this->db->select('*');
        $this->db->from('tb_costumer');
        $this->db->join('tb_jenis_tvkabel', 'tb_costumer.jenis_tvkabel=tb_jenis_tvkabel.id');
        $this->db->order_by('id_costumer', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_jenis()
    {
        $this->db->select('*');
        $this->db->from('tb_jenis_tvkabel');
        $this->db->order_by('id', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }

    public function delete_costumer_info($id)
    {
        $this->db->where('id_costumer', $id);
        $query = $this->db->get('tb_costumer');
        $row = $query->row();
        unlink("./assets/foto/$row->foto");

        $this->db->delete('tb_costumer', array('id_costumer' => $id));
    }

    public function update_costumer_info($data, $id)
    {
        $this->db->where('id_costumer', $id);
        return $this->db->update('tb_costumer', $data);
    }

    public function detail_costumer_info($id)
    {
        $this->db->select('*');
        $this->db->from('tb_costumer');
        $this->db->join('tb_jenis_tvkabel', 'tb_costumer.jenis_tvkabel=tb_jenis_tvkabel.id');
        $this->db->order_by('tb_costumer.id_costumer', 'DESC');
        $this->db->where('id_costumer', $id);
        $info = $this->db->get();
        return $info->row();
    }

}