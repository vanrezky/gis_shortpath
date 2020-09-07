<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Costumer extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('googlemaps'));
        $this->load->model('M_costumer', 'm_costumer');
    }


	public function index()
	{

		if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1"){

            $data = array();
            $data['get_all_costumer'] = $this->m_costumer->get_all_costumer();

            $data['title'] = 'Data Costumer';
            
			$this->render('admin/costumer_data', $data);
		}
		else {

			redirect('admin/costumer/logout');
			
		}
		
    }

    public function add()
    {

        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {

            $config = array();
            // $config['onboundschanged'] = 'if (!centreGot) {
            //   var mapCentre = map.getCenter();
            //   marker_0.setOptions({
            //     position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()),

            //   });
            // }
            // centreGot = true;';
            $config['map_div_id'] = "map-add";
            $config['map_height'] = "250px";
            $config['center'] = '0.5333593798115907,101.43400637930908';
            $config['zoom'] = '12';
            $config['map_height'] = '600px;';
            $config['onclick'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';

            $this->googlemaps->initialize($config);

            $marker = array();
            $marker['position'] = '0.5333593798115907,101.43400637930908';
            $marker['draggable'] = true;
            $marker['animation'] = 'BOUNCE';
            $marker['icon'] = base_url("assets/icon/marker.png");
            $marker['infowindow_content'] = '<div class="media">';
            $marker['infowindow_content'] .= '<p>Posisi Kamu Sekarang</p>';

            $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
            $this->googlemaps->add_marker($marker);

            $data = array();
            $data['map'] = $this->googlemaps->create_map();
            $data['buat_id'] = $this->m_costumer->buat_id();
            $data['get_jenis'] = $this->m_costumer->get_all_jenis();

            $data['title'] = 'Add Record TV Kabel';

            $this->render('admin/costumer_add', $data);
        } else {

            redirect('admin/costumer/logout');
        }
    }

    public function save()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {

        $data = array();
        $data['id_costumer'] = $this->input->post('id_costumer');
        $data['nama_costumer'] = $this->input->post('nama_costumer');
        $data['jenis_tvkabel'] = $this->input->post('jenis_tvkabel');
        $data['latitude'] = $this->input->post('latitude');
        $data['longitude'] = $this->input->post('longitude');
        $data['alamat'] = $this->input->post('alamat');
        $data['no_telp'] = $this->input->post('no_telp');
        $data['tanggal_insert'] = date('Y-m-d');
        $data['tanggal_update'] = date('Y-m-d');

        $this->form_validation->set_rules('id_costumer', 'id costumer', 'trim|required');
        $this->form_validation->set_rules('nama_costumer', 'nama_costumer', 'trim|required');
        $this->form_validation->set_rules('jenis_tvkabel', 'jenis_tvkabel', 'trim|required');
        $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'trim|required');

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 4096;
            $config['max_width'] = 2000;
            $config['max_height'] = 2000;

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('admin/costumer/');
            } else {
                $post_image = $this->upload->data();
                $data['foto'] = $post_image['file_name'];
            }
        }

        if ($this->form_validation->run() == true) {
            $result = $this->m_costumer->save_costumer_info($data);
            if ($result) {

                helper_log("add", "Menambahkan Data Costumer ");

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/costumer/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data Gagal Diupload <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/costumer/');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('admin/costumer/add');
        }
        } else {

            redirect('admin/costumer/logout');
        }
    }

    public function delete($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {
            
        $result = $this->m_costumer->delete_costumer_info($id);
        if ($result) {

            helper_log("delete", "Menghapus Data Costumer");

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil Dihapus ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/costumer/');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Delete Data Berhasil <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/costumer/');
        }
    } else {
            redirect('admin/costumer/logout');
        }
    }

    public function view($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {

            $datamap = $this->m_costumer->detail_costumer_info($id);

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
            

            $data['get_costumer_detail'] = $this->m_costumer->detail_costumer_info($id);

            $data['title'] = "Detail Data Costumer $datamap->nama_costumer ";

            // var_dump($datamap);

            $this->render('admin/costumer_detail', $data);
        } else {
            redirect('login/logout');
        }
    }

    public function edit($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {

            $datamap = $this->m_costumer->detail_costumer_info($id);

            $config['map_div_id'] = "map-add";
            $config['map_height'] = "250px";
            $config['center'] = $datamap->latitude . ',' . $datamap->longitude;
            $config['zoom'] = '15';
            $config['minzoom'] = '10';
            $config['map_height'] = '300px;';
            $this->googlemaps->initialize($config);

            $marker = array();
            $marker['position'] = $datamap->latitude . ',' . $datamap->longitude;
            $marker['draggable'] = TRUE;
            $marker['animation'] = 'BOUNCE';
            $marker['icon'] = base_url("assets/icon/marker.png");
            $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
            $this->googlemaps->add_marker($marker);

            $data=array();
            $data['map'] = $this->googlemaps->create_map();
            $data['get_jenis'] = $this->m_costumer->get_all_jenis();
            $data['get_costumer_detail'] = $this->m_costumer->detail_costumer_info($id);

            $data['title'] = "Edit Data Costumer $datamap->nama_costumer ";

            // var_dump($datamap);
            $this->render('admin/costumer_edit', $data);
        } else {
            redirect('login/logout');
        }
    }

    public function update($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {
        $data = array();
        $data['id_costumer'] = $this->input->post('id_costumer');
        $data['nama_costumer'] = $this->input->post('nama_costumer');
        $data['jenis_tvkabel'] = $this->input->post('jenis_tvkabel');
        $data['latitude'] = $this->input->post('latitude');
        $data['longitude'] = $this->input->post('longitude');
        $data['alamat'] = $this->input->post('alamat');
        $data['no_telp'] = $this->input->post('no_telp');
        $data['tanggal_update'] = date('Y-m-d');

        $costumer_delete_foto = $this->input->post('costumer_delete_foto');

        $delete_foto = $costumer_delete_foto;

        // $this->form_validation->set_rules('id_costumer', 'id costumer', 'trim|required');
        $this->form_validation->set_rules('nama_costumer', 'nama_costumer', 'trim|required');
        $this->form_validation->set_rules('jenis_tvkabel', 'jenis_tvkabel', 'trim|required');
        $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'trim|required');

            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './assets/foto/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 4096;
                $config['max_width'] = 2000;
                $config['max_height'] = 2000;

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', $error);
                    redirect('admin/costumer/edit/' . $id);
                } else {
                    $post_image = $this->upload->data();
                    $data['foto'] = $post_image['file_name'];
                    unlink('./assets/foto/' . $delete_foto);
                }
            }

            // var_dump('$delete_foto');

        if ($this->form_validation->run() == true) {


            $result = $this->m_costumer->update_costumer_info($data, $id);

            if ($result) {

                helper_log("edit", " Update Data Costumer");

                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert"> Data Berhasil di Perbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/costumer/');
            } else {
                $this->session->set_flashdata('message', 'Data User Gagal di Perbaharui !');
                redirect('admin/costumer/');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('admin/costumer/edit/' . $id);
        }

        } else {
            redirect('login/logout');
        }
    }

    public function route($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {

            $datamap = $this->m_costumer->detail_costumer_info($id);

            $config['map_div_id'] = "map-add";
            $config['center'] = $datamap->latitude . ',' . $datamap->longitude;
            $config['map_height'] = '600px;';
            $config['zoom'] = '12';
            $config['minzoom'] = '11';
            $config['onclick'] = 'createMarker_map({ map: map, position:event.latLng });' . 'setMapToForm(event.latLng.lat(), event.latLng.lng());' ;
            $this->googlemaps->initialize($config);

            $marker = array();
            $marker['position'] = $datamap->latitude . ',' . $datamap->longitude;
            $marker['animation'] = 'DROP';
            $marker['icon'] = base_url("assets/icon/marker.png");
            $this->googlemaps->add_marker($marker);

            $data['map'] = $this->googlemaps->create_map();

            $data['get_costumer_detail'] = $this->m_costumer->detail_costumer_info($id);

            $data['title'] = "Rute Costumer : $datamap->nama_costumer ";


            $this->render('admin/costumer_route', $data);
    } else {
            redirect('login/logout');
        }
    }

    public function get_route($id)
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {

            $directionLat = $this->input->post('latitude');
            $directionLng = $this->input->post('longitude');

            if ($directionLat == 0 && $directionLng == 0) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silahkan Tentukan Lokasi Anda Terlebih Dahulu ! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/costumer/route/' . $id);
            
            } else {

                $datamap = $this->m_costumer->detail_costumer_info($id);

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

                $data['get_costumer_detail'] = $this->m_costumer->detail_costumer_info($id);

                $data['title'] = "Rute Costumer : $datamap->nama_costumer ";

                // var_dump($config);
                // die;


                $this->render('admin/costumer_route', $data);
            }

            
        } else {
            redirect('login/logout');
        }
    }

    public function logout()
    {
        helper_log("logout", "Keluar Dari Aplikasi");

        $this->session->sess_destroy();
        redirect('login');
    }
}
