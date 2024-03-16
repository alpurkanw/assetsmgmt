<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ClapPerThnAngg extends CI_Controller
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
        $data["judul"] = "Lapaoran Per Tahun Anggaran";
        $userlok = $_SESSION["lokid"];
        $data["page"] = "index";

        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('admin/VlapPerLokasi', $data);
    }


    public function submit()
    {
        $data["judul"] = "Laporan Perlokasi";

        $lokasi = json_decode($this->input->post('lokasi'), TRUE);
        // print_r($lokasi);
        // return;

        $data["page"] = "showdata";
        // $userlok = $_SESSION["lokid"];

        // $userin = $_SESSION["id"];
        // $tgl1 = str_replace("-", "", $this->input->post("tgl1"));
        // $tgl2 = str_replace("-", "", $this->input->post("tgl2"));

        // return;
        $sql = " SELECT A.*, B.id, B.namakateg from tbl_barang A left join tbl_kateg B on B.id = A.idkateg
                where idlok = '" . $lokasi["id"] . "'";
        // echo $sql;
        // return;
        $data["loks"] =  $this->db->query($sql)->result();
        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('admin/VlapPerLokasi', $data);
    }
}
    
    /* End of file Login.php */
