<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_login');
        // $this->load->helper('Aplikasi');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') == "") {


            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');


            if ($this->form_validation->run() == FALSE) {

                $data['title'] = 'Login Admin';

                $this->load->view('login', $data);
            } else {
                $dt['username']     = $this->input->post('username');
                $dt['password']     = $this->input->post('password');
                $dt['last_login'] = date('Y-m-d H:i:s');



                $this->M_login->getLoginData($dt);
            }
        } else if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {
            redirect('admin/dashboard');
        }
    }


    public function logout()
    {
        helper_log("logout", "Keluar Dari Aplikasi ");
        $this->session->sess_destroy();
        redirect('login');
    }
}
