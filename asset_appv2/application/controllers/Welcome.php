<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		// $data["judul"] = "home";
		// $data["page"] = "open_index";
		// $data['brgs'] = $this->M_barang->tampil_data()->result();
		if (!$this->session->userdata('usernm')) {
			$this->load->view('v_login');
		} else {
			if ($this->session->userdata('level') == "1") {
				redirect("admin/home");
			} else if ($this->session->userdata('level') == "2") {
				redirect("appv/home");
			} else if ($this->session->userdata('level') == "3") {
				redirect("pic/home");
			} else if ($this->session->userdata('level') == "4") {
				redirect("mkr/home");
			} else {
				session_destroy();
				redirect('welcome');
			}
		}

		// echo "tes";
	}
}
