<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Clistbar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        // $this->load->model('m_jns_tag', 'mtag');

    }

    public function index()
    {
        $data["judul"] = "List Barang";
        $data["show"] = "index";
        $userlok = $_SESSION["lokid"];

        $sql = " SELECT A.*, B.id, B.namakateg from tbl_barang A left join tbl_kateg B on B.id = A.idkateg
        where idlok = $userlok  ";
        // echo $sql;
        // return;
        $data["brgs"] =  $this->db->query($sql)->result();
        // print_r($data["brgs"]);
        // return;

        // $data["brgs"] = $this->db->get_where('tbl_barang', ["idlok" => $userlok])->result();

        $this->load->view('mkr/Vlistbar', $data);
    }

    public function barcode($id)
    {

        $data["judul"] = "Barcode Create";
        $data["id"] = $id;

        // $data["brgs"] = $this->db->get_where('tbl_barang', ["idlok" => $userlok])->result();

        $this->load->view('mkr/Vbarcode', $data);
    }
}
    
    /* End of file Login.php */
