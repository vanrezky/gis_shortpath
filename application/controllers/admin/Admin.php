<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('m_admin');
        

    }    
  public function index() {
  	if($this->session->userdata('logged_in')!="" && $this->session->userdata('id_role') == "1")
    {
      $data = array();
      $data['get_all_admin']=$this->m_admin->get_all_admin();

      $data['title']="Daftar Administrator";

      $this->render('admin/admin_data', $data);


    	}
  else
    {
      redirect('admin/admin/logout');
    }
  }

  public function save() {
    if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {
        $data = array();
        $data['nama'] = $this->input->post('nama');
        $data['username'] = $this->input->post('username');
        $data['password']=md5($this->input->post('password'));
        $data['last_login'] = date('Y-m-d H:m:s');
        $data['id_role'] = 1;

        $this->form_validation->set_rules('nama', ' Nama Adminstrator', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == true) {

        helper_log("add", "Menambahkan Data User Administrator Aplikasi ");
          
            $result = $this->m_admin->save_admin_info($data);
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Gagal Diupload <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/admin');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('admin/admin');
        }
            //silahkan di ganti2 aja kalimatnya
    }else
    {
      redirect('admin/admin/logout');
    }
  }

  public function view($id)
  {
    if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {
      $data = array();
      $data['get_admin_detail'] = $this->m_admin->detail_admin_info($id);
      $data['get_aktivitas_detail'] = $this->m_admin->get_all_aktivitas($id);

      $data['title'] = "User Aplikasi";

      $this->render('admin/view_profile', $data);

    } else {
      redirect('admin/admin/logout');
    }
  }

  public function edit($id)
  {
    if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {
      $data = array();
      $data['get_admin_detail'] = $this->m_admin->detail_admin_info($id);

      $data['title'] = "Edit Administrator";


            $this->render('admin/user_edit', $data);
    } else {
      redirect('admin/admin/logout');
    }
  }

    public function update()
  {
    if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {


        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required|alpha_numeric');

        $id_role = $this->input->post('id_role');

        helper_log("edit", "Edit Data User Administrator Aplikasi ");

        if ($this->form_validation->run() == FALSE) {

            if ($id_role == 1) {

                $this->m_admin->update_data_user();

                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"> Data Berhasil di Perbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/admin');
            } else {

                $this->m_admin->update_data_user();

                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"> Data Berhasil di Perbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/petugas');
            }
        } else {

            if ($id_role == 1) {

              $this->m_admin->update_data_password();

              $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"> Data dan Password Berhasil di Perbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
              redirect('admin/admin');
            } else {

              $this->m_admin->update_data_password();

              $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"> Data dan Password Berhasil di Perbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
              redirect('admin/petugas');

            }
        }
      }
    else {
      redirect('admin/admin/logout');
    }
  }


  public function delete($id)
  {
    if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {

    $result = $this->m_admin->delete_user_info($id);
    if ($result) {

      helper_log("delete", "Delete Data Administrator Aplikasi");

      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('admin/admin/');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Delete Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
      redirect('admin/admin/');
    }
  } else {
      redirect('admin/admin/logout');
    }
  }

    public function ubahnama($id)
    {
    if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {
      $data = array();
      $data['nama'] = $this->input->post('nama');

      $this->form_validation->set_rules('nama', 'nama', 'trim|required');

      if ($this->form_validation->run() == FALSE) {

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Kamu belum memasukkan nama, silahkan masukkan terlebih dahulu!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/admin/view/' . $id);

      } else {

      $result = $this->m_admin->update_nama_info($data, $id);

        if ($result) {
          echo "<script>
          alert('Nama Berhasil di Perbaharui, Silahkan login Kembali');
          window.location='" . site_url('admin/admin/logout') . "';
          </script>";
        } else {
          $this->session->set_flashdata('message', 'Data User Gagal di Perbaharui !');
          redirect('admin/admin/view/' . $id);
        }
      }
    }
    else {
      redirect('admin/admin/logout');
    }
  }



  public function change_password()
  {
    if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {

    $this->form_validation->set_rules('new', 'New', 'required|alpha_numeric');
    $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

    $id_user = $this->session->userdata('id_user');

    if ($this->form_validation->run() == FALSE) {

      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Baru tidak cocok ! Silahkan Ulangi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

      
      redirect('admin/admin/view/' . $id_user);
      

    } else {
      $cek_old = $this->m_admin->cek_old();
      if ($cek_old == False) {
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Password Lama Tidak Cocok <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/admin/view/' . $id_user);
      } else {
        $this->m_admin->save();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Passworddi Perbaharui. Silahkan Login Kembali! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        echo "<script>
				alert('Password Berhasil di Perbaharui, Silahkan login Kembali!');
				window.location='" . site_url('admin/admin/logout') . "';
				</script>";
      } //end if valid_user
    }
  } else {
      redirect('admin/admin/logout');
    }
  }

    public function logout(){

        helper_log("logout", "Keluar Dari Aplikasi ");
        $this->session->sess_destroy();
        redirect('login');
    }

  }