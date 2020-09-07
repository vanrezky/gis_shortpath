<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


    class M_admin extends CI_Model
    {

    public function save_admin_info($data)
    {
        return $this->db->insert('tb_user', $data);
    }

    public function get_all_admin()
    {
    $id_user = $this->session->userdata('id_user');

        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_role', 'tb_user.id_role=tb_role.id_role');
        $this->db->order_by('id_user', 'DESC');
        $this->db->where('tb_user.id_role', 1);
        $this->db->where_not_in('id_user', $id_user);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_petugas()
    {
        // $id_user = $this->session->userdata('id_user');

        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_role', 'tb_user.id_role=tb_role.id_role');
        $this->db->order_by('id_user', 'DESC');
        $this->db->where('tb_user.id_role', 2);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_aktivitas($id)
    {
        $this->db->select('*');
        $this->db->from('tb_log');
        $this->db->join('tb_user', 'tb_user.id_user=tb_log.log_user');
        $this->db->where('log_user', $id);
        $this->db->order_by('id_log', 'DESC');
        $this->db->limit(15);
        $info = $this->db->get();
        return $info->result();
    }

    public function delete_user_info($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete('tb_user');
    }

    public function update_nama_info($data, $id)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('tb_user', $data);
    }

    public function detail_admin_info($id)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_role', 'tb_user.id_role=tb_role.id_role');
        $this->db->where('id_user', $id);
        $this->db->order_by('id_user', 'DESC');
        $info = $this->db->get();
        return $info->row();
    }

    public function update_data_user()
    {   
        $id_user = $this->input->post('id_user');

        $nama = $this->input->post('nama');
        $data = array(
            'nama' => $nama
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user', $data);
    }

    public function update_data_password()
    {
        $id_user = $this->input->post('id_user');

        $nama = $this->input->post('nama');
        $pass = md5($this->input->post('password'));
        $data = array(
            'nama' => $nama,
            'password' => $pass
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user', $data);
    }

    public function cek_old()
    {
        $old = md5($this->input->post('old'));
        $this->db->where('password', $old);
        $query = $this->db->get('tb_user');
        return $query->result();
    }

    public function save()
    {
        $pass = md5($this->input->post('new'));
        $data = array(
            'password' => $pass
        );
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('tb_user', $data);
    }


}