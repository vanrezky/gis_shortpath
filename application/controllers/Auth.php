<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_login');
    }

    public function index()
    {
        $data = [
            'test' => '',
        ];

        $this->load->view('auth/v_auth_index', $data);
    }


    public function logout()
    {
        helper_log("logout", "Keluar Dari Aplikasi ");
        $this->session->sess_destroy();
        redirect('login');
    }
}
