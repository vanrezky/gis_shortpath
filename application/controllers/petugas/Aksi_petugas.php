<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Aksi_petugas extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_aksipetugas');
        $this->load->library(array('googlemaps'));
    }
    public function index()
    {

        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "2") {

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
                $marker['infowindow_content'] .= '<a style="float:right;"class="btn btn-info" href="' . site_url('petugas/aksi_petugas/route_costumer/' . $value->id_costumer) . '" >Cari </a>';
                if ($value->jenis_tvkabel == 1) {

                    $marker['icon'] = base_url("assets/icon/marker_basic.png");
                    # code...
                } else if ($value->jenis_tvkabel == 2) {
                    $marker['icon'] = base_url("assets/icon/marker_medium.png");
                } else {
                    $marker['icon'] = base_url("assets/icon/marker_advanced.png");
                }
                $this->googlemaps->add_marker($marker);
            }

            $data = array();

            $data['map'] = $this->googlemaps->create_map();

            $data['title'] = ' Administrator Dashboard';
            $data['total_costumer'] = $this->m_dashboard->hitungAllCostumer();
            $data['basic'] = $this->m_dashboard->hitungCostumerBasic();
            $data['medium'] = $this->m_dashboard->hitungCostumerMedium();
            $data['advanced'] = $this->m_dashboard->hitungCostumerAdvanced();
            $data['get_jenisBerlangganan'] = $this->m_dashboard->jenis_berlangganan();
            $data['get_aktivitas_user'] = $this->m_dashboard->aktivitas_user();

            $data['title'] = 'Petugas Dashboard';

            $this->render('petugas/dashboard', $data);
        } else {

            redirect('petugas/aksi_petugas/logout');
        }
    }

    public function view_costumer_data($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "2") {

            $datamap = $this->m_aksipetugas->view_costumer_info($id);

            $config['map_div_id'] = "map-add";
            $config['map_height'] = "250px";
            $config['center'] = $datamap->latitude . ',' . $datamap->longitude;
            $config['zoom'] = '10';
            $config['minzoom'] = '7';
            $config['map_height'] = '300px;';
            $this->googlemaps->initialize($config);

            $marker = array();
            $marker['position'] = $datamap->latitude . ',' . $datamap->longitude;
            $marker['draggable'] = false;
            $marker['animation'] = 'BOUNCE';
            $marker['icon'] = base_url("assets/icon/marker.png");
            $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
            $marker['infowindow_content'] = '<div class="media" style="width:550px;">';
            $marker['infowindow_content'] .= '<div class="media-left">';
            $marker['infowindow_content'] .= '<img src="' . base_url("assets/foto/{$datamap->foto}") . '" class="media-object" style="height:130px;width:150px;">';
            $marker['infowindow_content'] .= '<center style="background-color:#00bcd4;">' . $datamap->jenis . '</center>';
            $marker['infowindow_content'] .= '</div>';
            $marker['infowindow_content'] .= '<div class="media-body">';
            $marker['infowindow_content'] .= '<div class="col-md-12">';
            $marker['infowindow_content'] .= '<h5>' . $datamap->nama_costumer . '</h5>';
            $marker['infowindow_content'] .= '<p> Jenis TV Kabel : <strong>' . $datamap->jenis . '</strong><br>';
            $marker['infowindow_content'] .= 'No. Telp <span style="margin-left:14px;">:</span> <strong>' . $datamap->no_telp . '</strong><br>';
            $marker['infowindow_content'] .= '<a class="btn btn-primary btn-sm" href="' . site_url('admin/costumer/route/' . $datamap->id_costumer) . '" >Find a Route </a>';
            $this->googlemaps->add_marker($marker);

            $data['map'] = $this->googlemaps->create_map();


            $data['get_costumer_detail'] = $this->m_aksipetugas->view_costumer_info($id);

            $data['title'] = "Detail Data Costumer $datamap->nama_costumer ";

            // var_dump($datamap);

            $this->render('petugas/costumer_detail', $data);
        } else {
            redirect('login/logout');
        }
    }

    public function route_costumer($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "2") {

            $datamap = $this->m_aksipetugas->view_costumer_info($id);

            $config['map_div_id'] = "map-add";
            $config['center'] = $datamap->latitude . ',' . $datamap->longitude;
            $config['map_height'] = '600px;';
            $config['zoom'] = '12';
            $config['minzoom'] = '11';
            $config['onclick'] = 'createMarker_map({ map: map, position:event.latLng });' . 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
            $this->googlemaps->initialize($config);

            $marker = array();
            $marker['position'] = $datamap->latitude . ',' . $datamap->longitude;
            $marker['animation'] = 'DROP';
            $marker['icon'] = base_url("assets/icon/marker.png");
            $this->googlemaps->add_marker($marker);

            $data['map'] = $this->googlemaps->create_map();

            $data['title'] = "Rute Costumer : $datamap->nama_costumer ";

            $data['get_costumer_detail'] = $this->m_aksipetugas->view_costumer_info($id);


            $this->render('petugas/costumer_route', $data);

        } else {
            redirect('login/logout');
        }
    }

    public function get_route($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "2") {

            $directionLat = $this->input->post('latitude');
            $directionLng = $this->input->post('longitude');

            if ($directionLat == 0 && $directionLng == 0) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silahkan Tentukan Lokasi Anda Terlebih Dahulu ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('petugas/aksi_petugas/route_costumer/' . $id);
            } else {

                $datamap = $this->m_aksipetugas->view_costumer_info($id);

                $config['map_div_id'] = "map-add";
                $config['center'] = $datamap->latitude . ',' . $datamap->longitude;
                $config['map_height'] = '400px;';
                $config['zoom'] = 'auto';
                $config['minzoom'] = '11';
                $config['directions'] = TRUE;
                $config['directionsStart'] = $directionLat . ',' . $directionLng;
                $config['directionsEnd'] = $datamap->latitude . ',' . $datamap->longitude;
                $config['directionsDraggable'] = TRUE;
                $config['directionsDivID'] = 'directionsDiv';
                $this->googlemaps->initialize($config);

                // $marker = array();
                // $marker['position'] = $datamap->latitude . ',' . $datamap->longitude;
                // $marker['animation'] = 'DROP';
                // $marker['icon'] = base_url("assets/icon/marker.png");
                // $this->googlemaps->add_marker($marker);

                $data['map'] = $this->googlemaps->create_map();

                $data['get_costumer_detail'] = $this->m_aksipetugas->view_costumer_info($id);

                $data['title'] = "Rute Costumer : $datamap->nama_costumer ";


                $this->render('petugas/costumer_route', $data);
            }
        } else {
            redirect('login/logout');
        }
    }


    public function view_costumer()
    {

        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "2") {

            $data = array();
            $data['get_all_costumer'] = $this->m_aksipetugas->get_all_costumer();

            $data['title'] = 'Data Costumer';
            

            $this->render('petugas/costumer_data', $data);
        } else {

            redirect('petugas/aksi_petugas/logout');
        }
    }

    public function view_petugas()
    {

        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "2") {

            $data = array();
            $data['get_all_petugas'] = $this->m_aksipetugas->get_all_petugas();

            $data['title'] = 'Data Costumer';


            $this->render('petugas/petugas_data', $data);
        } else {

            redirect('petugas/aksi_petugas/logout');
        }
    }


    public function view_profile($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "2") {
            $data = array();
            $data['get_admin_detail'] = $this->m_aksipetugas->detail_petugas_info($id);
            $data['get_aktivitas_detail'] = $this->m_aksipetugas->get_all_aktivitas($id);

            $data['title'] = "Data Petugas";

            $this->render('petugas/view_profile', $data);
        } else {
            redirect('petugas/aksi_petugas/logout');
        }
    }


    public function ubahnama($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "2") {

            $data = array();
            $data['nama'] = $this->input->post('nama');

            $this->form_validation->set_rules('nama', 'nama', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Kamu belum memasukkan nama, silahkan masukkan terlebih dahulu!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('petugas/petugas/view_profile/' . $id);
            } else {
                $result = $this->m_aksipetugas->update_nama_info($data, $id);

                if ($result) {

                    helper_log("edit", "Ubah Nama Petugas ");

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Nama petugas berhasil diperbaharui !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('petugas/aksi_petugas/view_profile/' . $id);
                } else {
                    $this->session->set_flashdata('message', 'Data User Gagal di Perbaharui !');
                    redirect('petugas/aksi_petugas/view_profile/' . $id);
                }
            }
        } else {
            redirect('petugas/aksi_petugas/logout');
        }
    }



    public function change_password()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "2") {

            $this->form_validation->set_rules('new', 'New', 'required|alpha_numeric');
            $this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');

            $id_user = $this->session->userdata('id_user');

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password Baru tidak cocok ! Silahkan Ulangi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');


                redirect('petugas/aksi_petugas/view_profile/' . $id_user);
            } else {
                $cek_old = $this->m_aksipetugas->cek_old();
                if ($cek_old == False) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Password Lama Tidak Cocok <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('petugas/aksi_petugas/view_profile/' . $id_user);
                } else {
                    $this->m_aksipetugas->save();
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Passworddi Perbaharui. Silahkan Login Kembali! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    echo "<script>
				alert('Password Berhasil di Perbaharui, Silahkan login Kembali!');
				window.location='" . site_url('petugas/aksi_petugas/logout') . "';
				</script>";
                } //end if valid_user
            }
        } else {
            redirect('petugas/aksi_petugas/logout');
        }
    }

    public function cetak_laporan()
    {

        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "2") {

            $data = array();
            $data['cetak_laporan'] = $this->m_dashboard->all_costumer();

            $this->load->library('pdf');
            $this->pdf->load_view('cetak_laporan', $data);
            $this->pdf->setPaper('A4', 'portrait');
            $this->pdf->render();
            $this->pdf->stream("Cetak Laporan.pdf");
        } else {
            redirect('petugas/aksi_petugas/logout');
        }
    }

    public function logout()
    {

        helper_log("logout", "Keluar Dari Aplikasi ");
        $this->session->sess_destroy();
        redirect('login');
    }
}
