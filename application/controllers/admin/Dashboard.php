<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
		$this->load->library('googlemaps');
	} 


	public function index()
	{

		if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1"){

			$datamap = $this->m_dashboard->all_costumer();

			$this->data['title'] = "SISTEM INFORMASI GIS";
			$config['map_height'] = "320px";
			$config['center'] = '0.5070677,101.44777929999998';
			$config['zoom'] = 'auto';

			$this->googlemaps->initialize($config);

			foreach ($datamap as $value) {

				$marker = array();
				$marker['position'] = "{$value->latitude}, {$value->longitude}";

				$marker['animation'] = 'BOUNCE';
				$marker['infowindow_content'] = '<div class="media" style="width:450px;">';
				$marker['infowindow_content'] .= '<div class="media-left">';
				$marker['infowindow_content'] .= '<img src="' . base_url("assets/foto/{$value->foto}") . '" class="media-object" style="height:130px;width:150px;">';
				$marker['infowindow_content'] .= '<center style="background-color:#00bcd4;">' . $value->jenis . '</center>';
				$marker['infowindow_content'] .= '</div>';
				$marker['infowindow_content'] .= '<div class="media-body">';
				$marker['infowindow_content'] .= '<div class="col-md-12">';
				$marker['infowindow_content'] .= '<h5>' . $value->nama_costumer . '</h5>';
				$marker['infowindow_content'] .= 'No. Telp <span style="margin-left:14px;">:</span> <strong>' . $value->no_telp . '</strong><br>';
				$marker['infowindow_content'] .= 'Status <span style="margin-left:27px;">:</span> <strong>' . $value->alamat . '</strong></p>';
				$marker['infowindow_content'] .= '<a style="float:right;"class="btn btn-info" href="' . site_url('admin/costumer/route/' . $value->id_costumer) . '" >Cari </a>';
				if ($value->jenis_tvkabel == 1) {

					$marker['icon'] = base_url("assets/icon/marker_basic.png");
				} else if ($value->jenis_tvkabel == 2) {
					$marker['icon'] = base_url("assets/icon/marker_medium.png");
				} else {
					$marker['icon'] = base_url("assets/icon/marker_advanced.png");
				}
				$this->googlemaps->add_marker($marker);

			}

			$data['map'] = $this->googlemaps->create_map();

			$data['title'] = ' Administrator Dashboard';
			$data['total_costumer'] = $this->m_dashboard->hitungAllCostumer();
			$data['basic'] = $this->m_dashboard->hitungCostumerBasic();
			$data['medium'] = $this->m_dashboard->hitungCostumerMedium();
			$data['advanced'] = $this->m_dashboard->hitungCostumerAdvanced();
			$data['get_jenisBerlangganan'] = $this->m_dashboard->jenis_berlangganan();
			$data['get_aktivitas_user'] = $this->m_dashboard->aktivitas_user();


			$this->render('admin/dashboard', $data);
			
		}
		else {

			redirect('login/logout');
			
		}
		
	}

	public function cetak_laporan()
	{

		if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {

			$data = array();
			$data['cetak_laporan'] = $this->m_dashboard->all_costumer();

			$this->load->library('pdf');
			$this->pdf->load_view('cetak_laporan', $data);
			$this->pdf->setPaper('A4', 'portrait');
			$this->pdf->render();
			$this->pdf->stream("Cetak Laporan.pdf");
		} else {
			redirect('login/logout');
		}
	}

	public function pengaturan()
	{

		if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {

			$data['get_pengaturan'] = $this->m_dashboard->get_all_pengaturan();
			

			$data['title'] = 'Pengaturan Website';

			$this->render('admin/pengaturan', $data);
		} else {

			redirect('login/logout');
		}
	}

	public function update_pengaturan($id)
	{
		if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {
			$data = array();

			$data['nama_website'] = $this->input->post('nama_website');
			$data['deskripsi'] = $this->input->post('deskripsi');
			$data['zoom'] = $this->input->post('zoom');

			$logo_delete_foto = $this->input->post('logo_delete_foto');

			$delete_foto = $logo_delete_foto;

			$this->form_validation->set_rules('nama_website', 'nama_website', 'trim|required');
			$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
			$this->form_validation->set_rules('zoom', 'zoom', 'trim|required');

			if (!empty($_FILES['logo']['name'])) {
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 2000;
				$config['max_width'] = 1024;
				$config['max_height'] = 1024;

				$this->upload->initialize($config);

				if (!$this->upload->do_upload('logo')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('message', $error);
					redirect('admin/dashboard/pengaturan/');
				} else {
					$post_image = $this->upload->data();
					$data['logo'] = $post_image['file_name'];
					unlink('./assets/img/' . $delete_foto);
				}
			}

			if ($this->form_validation->run() == true) {

				$result = $this->m_dashboard->update_website_info($data, $id);

				if ($result) {
					$this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"> Data Berhasil di Perbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('admin/dashboard/pengaturan');
				} else {
					$this->session->set_flashdata('message', 'Data User Gagal di Perbaharui !');
					redirect('admin/dashboard/pengaturan');
				}
			} else {
				$this->session->set_flashdata('message', validation_errors());
				redirect('admin/dashboard/pengaturan');
			}
		} else {
			redirect('login/logout');
		}
	}
}
