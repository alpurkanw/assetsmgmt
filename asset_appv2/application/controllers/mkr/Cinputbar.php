<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cinputbar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->library('form_validation');
        // $this->load->model('m_jns_tag', 'mtag');
    }

    public function index()
    {
        $data["judul"] = "Input barang";
        $userlok = $_SESSION["lokid"];

        $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        $data["loks"] = $this->db->get('tbl_lok')->result();
        $data["ruangs"] = $this->db->get_where('tbl_ruangan', array("idlok" => $userlok))->result();
        $this->load->view('mkr/Vinputbar', $data);
    }

    public function tambah()
    {


        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|is_unique[tbl_user.nip]');
        $this->form_validation->set_rules('namabar', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jumbar', 'Jumlah', 'required|trim');
        $this->form_validation->set_rules('thn_angg', 'Tahun Anggaran', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('ruangan', 'Ruangan', 'required|trim');
        $this->form_validation->set_rules('asal_peroleh', 'Asal Perolehan', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required|trim');


        if ($this->form_validation->run() == TRUE) {


            $kateg = json_decode($this->input->post('kategori'), TRUE);
            $ruangan = json_decode($this->input->post('ruangan'), TRUE);
            $lokasi = explode("-", $this->input->post('lokasi'));
            // print_r($kateg["id"]);
            // echo $kateg["id"];
            // return;

            // $idkateg = $this->input->post('kategori');
            $kodebar = $this->crtKodebar($kateg["id"]);
            // echo$this->input->post('kategori')/*  */;
            // return;

            $data_insert = [
                'idkateg' => $kateg["id"],
                'namakateg' => $kateg["namakateg"],
                'kodebar' => $kodebar,
                'merkbar' => htmlspecialchars($this->input->post('merkbar')),
                'namabar' => htmlspecialchars($this->input->post('namabar')),
                'jumbar' => htmlspecialchars($this->input->post('jumbar')),
                'satuan' => "UNIT",
                'thn_angg' => htmlspecialchars($this->input->post('thn_angg')),
                'idlok' => $lokasi[0],
                'namalok' => $lokasi[1],
                'idruang' => $ruangan["id"],
                'ruang' => $ruangan["namaruang"],
                'asal_peroleh' => htmlspecialchars($this->input->post('asal_peroleh')),
                'harga' => htmlspecialchars($this->input->post('harga')),
                'kondisi' => htmlspecialchars($this->input->post('kondisi')),
                'ket' => htmlspecialchars($this->input->post('ket')),
                'userin' => $_SESSION["id"],
                'indat' => date('Ymd')

            ];



            $ret = $this->db->insert('tbl_barang', $data_insert);
            // echo $this->db->error()["message"] . $ret;
            // print_r($_POST);
            // return;
            if ($ret > 0) {

                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success py-1" role="alert">
                                    Data Barang BERHASIL ditambahkan
                                </div>'
                );
                redirect("mkr/Cinputbar");
                // return;
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                                    Data Barang GAGAL ditambahkan, error: ' . $this->db->error()["message"] . '
                                </div>'
                );
                redirect("mkr/Cinputbar");
                // return;
            }
        } else {
            // print_r($ret);
            // return;

            // redirect("mkr/Cinputbar/Ftambah");
            // return;
            $this->index();
        }
    }

    private function crtKodebar($idkateg)
    {
        // cari maksimal dari kategori barang itu dan tambahkan 1 
        $idkateg = $idkateg;
        $this->db->select_max('kodebar');
        $ret = $this->db->get('tbl_barang')->result();
        $kodebar = substr("000000" . ((int) $ret[0]->kodebar + 1), -6);
        return $kodebar;
    }
}
    
    /* End of file Login.php */
