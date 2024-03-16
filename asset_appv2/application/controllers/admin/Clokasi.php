<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Clokasi extends CI_Controller
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
        $this->load->view('admin/Vlokasi', $data);
    }

    public function Ftambah()
    {
        // echo "tes";
        $data["judul"] = "Form Tambah Lokasi";
        $data["show"] = "form_tambah";

        // $data["orangs"] = $this->db->get('tbl_lok')->result();
        $this->load->view('admin/Vlokasi', $data);
    }

    public function lokDel($id)
    {
        // echo $id;
        // $data["orangs"] = $this->db->get('tbl_lok')->result();
        // $this->load->view('admin/Vlokasi', $data);

        $ruang = $this->db->get_where('tbl_ruangan', ["idlok" => $id])->result();
        if (count($ruang) > 0) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            Data Lokasi GAGAL Dihapus karena sudah terinput ruangan, silahkan hapus terlebih dahulu ruangan pada lokasi ini
                        </div>'
            );
            redirect('admin/Clokasi');
        }

        $ret = $this->db->delete('tbl_lok', array('id' => $id));
        if ($ret > 0) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success py-1" role="alert">
                            Data Lokasi berhasil Dihapus
                        </div>'
            );
            // redirect('appv/C_mstTagihan');
            redirect('admin/Clokasi');
            // return;
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            Data Lokasi GAGAL Dihapus, error: ' . $this->db->error() . '
                        </div>'
            );
            redirect('admin/Clokasi');
        }
    }

    public function addProc()
    {


        $this->form_validation->set_rules(
            'namalok',
            'Nama Lokasi',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'ket',
            'Ketarangan',
            'trim|required'
        );

        // $this->form_validation->set_rules(
        //     'kodelok',
        //     'Kode Lokasi',
        //     'required|trim|is_unique[tbl_lok.kodelok]'
        // );

        if ($this->form_validation->run() == TRUE) {
            // print_r($_POST);
            // echo "sudah di proses";
            $data_insert = [
                // 'kodelok' => $this->input->post('kodelok'),
                'namalok' => $this->input->post('namalok'),
                'ket' => $this->input->post('ket'),
            ];
            $this->tambahkan($data_insert);
        } else {

            redirect('admin/Clokasi/Ftambah');
            // redirect(base_url("admin/Clokasi/Ftambah"));
            // $this->load->view('admin/Vlokasi', $data);
            // return;
        }
    }

    private function tambahkan($data)
    {

        $ret = $this->db->insert('tbl_lok', $data);


        if ($ret > 0) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success py-1" role="alert">
                            Data Lokasi berhasil ditambah
                        </div>'
            );
            redirect('admin/Clokasi');
            return;
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            Data Lokasi GAGAL ditambah, error: ' . $this->db->error() . '
                        </div>'
            );
            redirect('admin/Clokasi/Ftambah');
            return;
        }
    }


    // update////////////////////////////

    public function fUpdate($id)
    {
        // echo "tes";
        $data["judul"] = "Form Update Lokasi";
        $data["show"] = "f_update";

        $data["lok"] = $this->db->get_where('tbl_lok', ["id" => $id])->result();
        $this->load->view('admin/Vlokasi', $data);
    }

    public function updProc($id)
    {


        $this->form_validation->set_rules(
            'namalok',
            'Nama Lokasi',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'ket',
            'Ketarangan',
            'trim|required'
        );



        if ($this->form_validation->run() == TRUE) {
            // print_r($_POST);
            // echo "sudah di proses";
            $where = [
                'id' => $id,
            ];
            $data_update = [
                'namalok' => $this->input->post('namalok'),
                'ket' => $this->input->post('ket'),
            ];
            $this->update($data_update, $where);
        } else {

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            GAGAL Update.
                        </div>'
            );
            redirect("admin/Clokasi");
        }
    }



    private function update($data, $where)
    {

        $this->db->where($where);
        $this->db->update('tbl_lok', $data);

        // $data["judul"] = "List Warga";
        if ($this->db->affected_rows() == 1) {

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success py-1" role="alert">
                            Success Update.
                        </div>'
            );
            redirect("admin/Clokasi");
            // return;
            // return;
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            GAGAl Update. ' . $this->db->error()["message"] . '
                        </div>'
            );
            redirect("admin/Clokasi");
        }
    }

    ////////////////  update end 


}
