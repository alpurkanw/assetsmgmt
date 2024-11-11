<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cact_peringatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->library('form_validation');
        // $this->load->model('M_peringatan', 'mp');
        // $this->sqlsvr = $this->load->database("sqlsvr44", TRUE);
    }

    public function index()
    {
        // echo "tes";
        $data["judul"] = "Tambah Peringantan";
        $data["show"] = "index";



        // return;
        $sql = " SELECT * from tbl_barang A 
                ";
        // echo $sql;
        // return;
        $data["allBar"] =  $this->db->query($sql)->result();
        $this->load->view('admin/Vadd_peringatan', $data);
    }
}
