<?php
    class MY_Controller extends CI_Controller{

    function __construct(){ 
        parent::__construct();
        $this->load->model('m_dashboard');
        }

    function render ($view,$data){

        $data['nama_website'] = $this->m_dashboard->get_all_pengaturan();

        $this->load->view('inc/head', $data);
        $this->load->view('inc/side');
        $this->load->view('inc/top_bar');
        $this->load->view($view, $data);
        $this->load->view('inc/footer');

    }
}