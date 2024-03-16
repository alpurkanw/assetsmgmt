<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ClapAllBar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        // $this->load->library('form_validation');
        // $this->load->model('m_jns_tag', 'mtag');
    }

    public function index()
    {

        $data["judul"] = "Laporan Seluruh Barang";



        // return;
        $sql = " SELECT * from tbl_barang A 
                ";
        // echo $sql;
        // return;
        $data["allBar"] =  $this->db->query($sql)->result();
        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('admin/VlapAllBar', $data);
    }
}
    
    /* End of file Login.php */
