<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }

    public function index()
    {
        $data['judul'] = 'Pendaftaran';
        $data['page'] = 'f_daftar';

        $data["grpid"] = 0;

        $this->load->view('v_daftar', $data);
    }



    public function register()
    {


        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[tbl_user.nip]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[3]|matches[pass2]');
        $this->form_validation->set_rules('pass2', 'Password', 'required|trim|matches[pass1]');
        $this->form_validation->set_rules('notelp', 'No Telp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');


        if ($this->form_validation->run() == TRUE) {
            $data_insert = [
                'nip' => htmlspecialchars($this->input->post('nip')),
                'nama' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email')),
                'pass' => password_hash(htmlspecialchars($this->input->post('pass1')), PASSWORD_DEFAULT),
                'notelp' => htmlspecialchars($this->input->post('notelp')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'level' => 0, // jika dia mendaftar sebagai grup warga biasa
                'sts_app' => 0
            ];
            $ret = $this->db->insert('tbl_user', $data_insert);
            // print_r($ret);
            // return;
            if ($ret > 0) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success py-1" role="alert">
                                    Data Ruangan berhasil ditambah
                                </div>'
                );
                redirect("Daftar");
                // return;
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                                    Data Ruangan GAGAL ditambah, error: ' . $this->db->error()["message"] . '
                                </div>'
                );
                redirect("Daftar");
                // return;
            }
        } else {
            // print_r($ret);
            // return;

            // redirect("Daftar");
            // return;
            $this->index();
        }
    }
}
