<?php
class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
    }

    function render($view, $data)
    {

        $data['nama_website'] = $this->m_dashboard->get_all_pengaturan();

        $this->load->view('inc/backend/head', $data);
        $this->load->view('inc/backend/side');
        $this->load->view('inc/backend/top_bar');
        $this->load->view($view, $data);
        $this->load->view('inc/backend/footer');
    }

    function home($view, $data)
    {
        $data['home'] = $this->m_dashboard->get_all_pengaturan();

        $this->load->view('inc/frontend/head', $data);
        $this->load->view($view);
        $this->load->view('inc/frontend/footer');
    }
}
