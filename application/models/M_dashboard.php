<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    public function get_all_pengaturan()
    {
        $this->db->select('*');
        $this->db->from('tb_website');
        $this->db->where('tb_website.id', 1);
        $info = $this->db->get();
        return $info->row();
    }

    public function update_website_info($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_website', $data);
    }

    public function hitungAllCostumer()
    {
        $query = $this->db->get('tb_costumer');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function hitungCostumerBasic()
    {
        $this->db->select('*');
        $this->db->from('tb_costumer');
        $this->db->where('tb_costumer.jenis_tvkabel', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function hitungCostumerMedium()
    {
        $this->db->select('*');
        $this->db->from('tb_costumer');
        $this->db->where('tb_costumer.jenis_tvkabel', 2);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function hitungCostumerAdvanced()
    {
        $this->db->select('*');
        $this->db->from('tb_costumer');
        $this->db->where('tb_costumer.jenis_tvkabel', 3);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function jenis_berlangganan()
    {
        $this->db->select('*');
        $this->db->from('tb_jenis_tvkabel');
        $info = $this->db->get();
        return $info->result();
    }

    public function aktivitas_user()
    {

        $id = $this->session->userdata('id_user');

        $this->db->select('*');
        $this->db->from('tb_log');
        $this->db->join('tb_user', 'tb_user.id_user=tb_log.log_user');
        $this->db->where('tb_log.log_user', $id);
        $this->db->order_by('id_log', 'DESC');
        $this->db->limit('20');
        $info = $this->db->get();
        return $info->result();
    }

    public function all_costumer()
    {

        // $id = $this->session->userdata('id_user');
        $this->db->select('*');
        $this->db->from('tb_costumer');
        $this->db->join('tb_jenis_tvkabel', 'tb_costumer.jenis_tvkabel=tb_jenis_tvkabel.id');
        $this->db->order_by('id_costumer', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }
}
