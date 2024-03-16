<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cruang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->library('form_validation');
        // $this->sqlsvr = $this->load->database("sqlsvr44", TRUE);
    }

    public function index()
    {
        // echo "tes";
        $data["judul"] = "List Lokasi";
        $data["show"] = "index";

        $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('admin/Vruang', $data);
    }

    public function faddRuang($id)
    {
        $act = ($this->input->get('act') !== NULL)  ? $this->input->get('act') : "";
        if ($act == "upd") {
            // echo "tes";
            $id_lok = $this->input->get('idlok');
            $id = $this->input->get('id');
            $data["judul"] = "Update Ruangan";
            $data["show"] = "form_tambah";

            $data["lok"] = $this->db->get_where('tbl_lok', ["id" => $id_lok])->result();
            $data["ruangs"] = $this->db->get_where('tbl_ruangan', ["idlok" => $id_lok])->result();
            $this->load->view('admin/Vruang', $data);
        } else {
            // echo "tes";
            $id_lok = $id;
            $data["judul"] = "Tambah Ruangan";
            $data["show"] = "form_tambah";

            $data["lok"] = $this->db->get_where('tbl_lok', ["id" => $id_lok])->result();
            $data["ruangs"] = $this->db->get_where('tbl_ruangan', ["idlok" => $id_lok])->result();
            $this->load->view('admin/Vruang', $data);
        }
    }


    public function addRuangProc()
    {


        $this->form_validation->set_rules(
            'namaruang',
            'Nama Ruang',
            'required|trim|is_unique[tbl_ruangan.namaruang]'
        );
        $this->form_validation->set_rules(
            'desk',
            'Ketarangan',
            'trim|required'
        );


        $idlok =  $this->input->post('idlok');


        if ($this->form_validation->run() == TRUE) {
            // print_r($_POST);

            // echo "sudah di proses";
            $data_insert = [
                'idlok' => $idlok,
                'namaruang' => $this->input->post('namaruang'),
                'desk' => $this->input->post('desk'),
            ];


            $ret = $this->db->insert('tbl_ruangan', $data_insert);


            if ($ret > 0) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success py-1" role="alert">
                                    Data Ruangan berhasil ditambah
                                </div>'
                );
                redirect("admin/Cruang/faddRuang/$idlok");
                return;
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                                    Data Ruangan GAGAL ditambah, error: ' . $this->db->error()["message"] . '
                                </div>'
                );
                redirect("admin/Cruang/faddRuang/$idlok");
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                                Data Ruangan GAGAL ditambah, Nama Ruangan Kosong atau Data sudah ada 
                            </div>'
            );

            redirect("admin/Cruang/faddRuang/$idlok");
            // $this->load->view("admin/Cruang/faddRuang/$idlok");
        }
    }

    public function updRuangProc()
    {


        $this->form_validation->set_rules(
            'namaruang',
            'Nama Ruang',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'desk',
            'Ketarangan',
            'trim|required'
        );


        $idruang = $this->input->post('id');
        $idlok = $this->input->post('idlok');

        if ($this->form_validation->run() == TRUE) {
            // print_r($_POST);
            // echo "sudah di proses";
            $where = [
                'id' => $idruang,
            ];
            $data_update = [
                'namaruang' => $this->input->post('namaruang'),
                'desk' => $this->input->post('desk'),
            ];

            $this->db->where($where);
            $this->db->update('tbl_ruangan', $data_update);

            // $data["judul"] = "List Warga";
            if ($this->db->affected_rows() == 1) {

                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success py-1" role="alert">
                            Success Update.
                        </div>'
                );
                redirect("admin/Cruang/faddRuang/$idlok");
                // return;
                // return;
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                            GAGAl Update. ' . $this->db->error()["message"] . '
                        </div>'
                );
                redirect("admin/Cruang/faddRuang/$idlok");
            }
        } else {

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            GAGAL Update, Cek Parameter yang diUpdate, Kemungkinan Data Sudah ada untuk Nama Ruangan tersebut
                        </div>'
            );
            redirect("admin/Cruang/faddRuang/$idlok");
        }
    }
    public function ruangDel($id)
    {
        // echo $id;
        // $data["orangs"] = $this->db->get('tbl_lok')->result();
        // $this->load->view('admin/Vlokasi', $data);

        $ret = $this->db->delete('tbl_ruangan', array('id' => $id));
        if ($ret > 0) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success py-1" role="alert">
                            Data Lokasi berhasil Dihapus
                        </div>'
            );
            // redirect('appv/C_mstTagihan');
            $this->index();
            // return;
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            Data Lokasi GAGAL Dihapus, error: ' . $this->db->error() . '
                        </div>'
            );
            $this->index();
        }
    }
}
