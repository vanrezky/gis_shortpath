<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
    }

	public function index()
	{   
        $data = array();
        $data['home'] = $this->m_dashboard->get_all_pengaturan();

		$this->load->view('homepage', $data);
	}
}
