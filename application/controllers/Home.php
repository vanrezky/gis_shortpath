<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
        $this->load->library('googlemaps');
    }

    public function index()
    {
        $data = array();
        $data['home'] = $this->m_dashboard->get_all_pengaturan();

        $this->home('homepage', $data);
    }

    public function closest()
    {
        // ambil semua data
        $datamap = $this->m_dashboard->all_costumer();

        // config maps
        // $config['map_height'] = "320px";

        $config['center'] = '0.5070677,101.44777929999998';
        $config['zoom'] = 'auto';
        $config['places'] = TRUE;
        $config['disableStreetViewControl'] = true;
        $config['onclick'] = "mapClicked({ map: map, position:event.latLng, icon:{url:'" . base_url("assets/icon/me.png") . "'}});";
        $config['placesAutocompleteInputID'] = 'myPlaceTextBox';
        $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
        $config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';

        $this->googlemaps->initialize($config);

        foreach ($datamap as $value) {

            $marker = array();
            $marker['position'] = "{$value->latitude}, {$value->longitude}";
            $marker['title'] = $value->nama_costumer;
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

        $data = [
            'home' => $this->m_dashboard->get_all_pengaturan(),
            'map' => $this->googlemaps->create_map(),
        ];

        $this->home('v_web_closest', $data);
    }
}
