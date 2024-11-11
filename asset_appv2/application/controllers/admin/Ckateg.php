<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ckateg extends CI_Controller
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
        $data["judul"] = "List Kategori";
        $data["show"] = "index";

        $data["kategs"] = $this->db->get('tbl_kateg')->result();
        $this->load->view('admin/Vkateg', $data);
    }

    public function Ftambah()
    {
        // echo "tes";
        $data["judul"] = "Form Tambah Kategori";
        $data["show"] = "form_tambah";

        // $data["orangs"] = $this->db->get('tbl_lok')->result();
        $this->load->view('admin/Vkateg', $data);
    }

    public function addProc()
    {


        $this->form_validation->set_rules(
            'namakateg',
            'Kategori Barang',
            'trim|required'
        );



        if ($this->form_validation->run() == TRUE) {
            // print_r($_POST);
            // echo "sudah di proses";
            $data_insert = [
                // 'kodelok' => $this->input->post('kodelok'),
                'namakateg' => $this->input->post('namakateg'),
                'deskkateg' => $this->input->post('deskkateg')
            ];

            $ret = $this->db->insert('tbl_kateg', $data_insert);


            if ($ret > 0) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success py-1" role="alert">
                            Kategori Barang berhasil ditambah
                        </div>'
                );
                redirect('admin/Ckateg');
                return;
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                    Kategori Barang GAGAL ditambah, error: ' . $this->db->error() . '
                        </div>'
                );
                redirect('admin/Ckateg/Ftambah');
                return;
            }
        } else {
            $this->Ftambah();
            return;
            // redirect('admin/Ckateg/Ftambah');
            // redirect(base_url("admin/Ckateg/Ftambah"));
            // $this->load->view('admin/Vlokasi', $data);
            // return;
        }
    }

    // update////////////////////////////

    public function fUpdate($id)
    {
        // echo "tes";
        $data["judul"] = "Kategori Barang";
        $data["show"] = "f_update";

        $data["ktg"] = $this->db->get_where('tbl_kateg', ["id" => $id])->result();
        $this->load->view('admin/Vkateg', $data);
    }

    public function updProc($id)
    {


        $this->form_validation->set_rules(
            'namakateg',
            'Kategori Barang',
            'trim|required'
        );


        if ($this->form_validation->run() == TRUE) {
            // print_r($_POST);
            // echo "sudah di proses";
            $where = [
                'id' => $id,
            ];
            $data_update = [
                'namakateg' => $this->input->post('namakateg'),
                'deskkateg' => $this->input->post('deskkateg')
            ];



            $this->db->where($where);
            $this->db->update('tbl_kateg', $data_update);

            // $data["judul"] = "List Warga";
            if ($this->db->affected_rows() == 1) {

                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success py-1" role="alert">
                            Success Update.
                        </div>'
                );
                redirect("admin/Ckateg");
                // return;
                // return;
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                            GAGAl Update. ' . $this->db->error()["message"] . '
                        </div>'
                );
                redirect("admin/Ckateg");
            }
        } else {

            $this->fUpdate($id);
            return;
        }
    }




    ////////////////  update end 

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
            redirect('admin/Ckateg');
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
            redirect('admin/Ckateg');
            // return;
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            Data Lokasi GAGAL Dihapus, error: ' . $this->db->error() . '
                        </div>'
            );
            redirect('admin/Ckateg');
        }
    }
}
