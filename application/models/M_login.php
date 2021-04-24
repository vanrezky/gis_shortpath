<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class M_login extends CI_Model
{


	public function getLoginData($data)

	{

		$login['username'] = $data['username'];
		$login['password'] = md5($data['password']);

		$cek = $this->db->get_where('tb_user', $login);

		if ($cek->num_rows() > 0) {
			foreach ($cek->result() as $qad) {
				$sess_data['logged_in'] 	= 'yesGetMeLoginBaby';
				$sess_data['id_user'] 	= $qad->id_user;
				$sess_data['nama'] 		= $qad->nama;
				$sess_data['id_role'] 			= $qad->id_role;

				$this->session->set_userdata($sess_data);
				$this->db->where('id_user', $qad->id_user);
				$this->db->update('tb_user', array('last_login' => date('Y-m-d H:i:s')));
			}
			if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "1") {

				helper_log("login", "Admin Berhasil Masuk Aplikasi ");

				echo "<script>
				alert('selamat, login berhasil');
				window.location='" . site_url('admin/dashboard') . "';
				</script>";
			} else if ($this->session->userdata('logged_in') != "" && $this->session->userdata('id_role') == "2") {
				helper_log("login", "Petugas Berhasil Masuk Aplikasi ");

				echo "<script>
				alert('selamat, login berhasil');
				window.location='" . site_url('petugas/aksi_petugas') . "';
				</script>";
			}
		} else {

			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Maaf, kombinasi username dan password yang anda masukkan tidak valid dengan database kami.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

			// $this->session->set_flashdata('result_login', "Maaf, kombinasi username dan password yang anda masukkan tidak valid dengan database kami.");
			redirect('login');
		}
	}
}
