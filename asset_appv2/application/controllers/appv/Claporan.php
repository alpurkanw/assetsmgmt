<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Claporan  extends CI_Controller
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
        $data["page"] = "index";
        $data["tgl1"] = date('Y-m-d');
        $data["tgl2"] = date('Y-m-d');

        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('appv/Vlaporan', $data);
    }


    public function submit()
    {
        $data["judul"] = "Laporan Approve Barang " . $_SESSION["nama"];

        $data["page"] = "showdata";
        $userlok = $_SESSION["lokid"];

        $userin = $_SESSION["id"];
        $tgl1 = str_replace("-", "", $this->input->post("tgl1"));
        $tgl2 = str_replace("-", "", $this->input->post("tgl2"));

        // echo $userlok;
        // return;
        // echo "SELECT * from tbl_barang where indat between $tgl1 and $tgl2 and userin = $userin and idlok = $userlok";
        // return;
        $sql = " SELECT A.*, B.id, B.namakateg from tbl_barang A left join tbl_kateg B on B.id = A.idkateg
                where appdat between $tgl1 and $tgl2 and userapp = $userin  ";
        // echo $sql;
        // return;
        $data["tgl1"] = $this->input->post("tgl1");
        $data["tgl2"] = $this->input->post("tgl2");


        $data["brgs"] =  $this->db->query($sql)->result();
        // print_r($data["brgs"]);
        // return;

        // $data["brgs"] = $this->db->get_where('tbl_barang', $where)->result();


        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('appv/Vlaporan', $data);
    }
}
    
    /* End of file Login.php */
