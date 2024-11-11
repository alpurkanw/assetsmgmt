<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UpdateBar_byThnAngg extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
    }


    public function getParmthn()
    {



        $data["judul"] = "Update barang";
        $data["page"] = "bythn";

        $_SESSION["page"] = "formgetkeyword";


        $sql = "SELECT thn_angg, count(*) jumitem FROM `tbl_barang` where harga <> 0  GROUP BY thn_angg order by thn_angg  ";
        $data["thn_angg"]  = $this->db->query($sql)->result();

        // $data["ktgs"] = $this->db->get("tbl_kateg")->result();
        $this->load->view('pic/VupdateBar', $data);
    }


    public function caribythnangg()
    {
        // print_r($_POST);
        // return;
        $thn_angg =  $this->input->post("thn_angg");
        $_SESSION["param"] = $thn_angg;
        // $idkateg =  $this->input->post("kateg");
        $data["judul"] = "List Barang";
        $data["show"] = "responsethn_angg";


        $sql = "SELECT a.kodebar, kode_aset,no_reg_aset, thn_angg,merkbar, namakateg, asal_peroleh,sts,namabar, idruang,ruang, harga, kondisi, file_name FROM `tbl_barang` a
                LEFT JOIN tbl_gambar b on b.kodebar = a.kodebar
                where thn_angg = $thn_angg  and harga <> 0 order by a.kodebar  ";
        $data["brgs"]  = $this->db->query($sql)->result();


        $this->load->view('pic/Vlistbar', $data);
    }
}
    
    /* End of file Login.php */
