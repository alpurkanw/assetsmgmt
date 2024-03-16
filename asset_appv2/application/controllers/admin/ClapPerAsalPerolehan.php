<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ClapPerAsalPerolehan extends CI_Controller
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
        $data["judul"] = "Lapaoran Per Asal Perlolahan ";
        $userlok = $_SESSION["lokid"];
        $data["page"] = "index";

        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();

        $data["asal"] = $this->db->query("SELECT asal_peroleh, count(*) jumitem, sum(harga) nominal FROM `tbl_barang` GROUP BY asal_peroleh ORDER BY jumitem desc;")->result();
        $this->load->view('admin/VlapPerAsalPeroleh', $data);
    }


    public function submit()
    {
        $data["judul"] = "Laporan Perlokasi";

        $asal = json_decode($this->input->post('asal'), TRUE);
        // print_r($lokasi);
        // return;

        $data["page"] = "showdata";

        // return;
        $sql = " SELECT A.*, B.id, B.namakateg from tbl_barang A left join tbl_kateg B on B.id = A.idkateg
                where asal_peroleh = '" . $asal["asal_peroleh"] . "'";
        // echo $sql;
        // return;
        $data["asal"] =  $this->db->query($sql)->result();
        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('admin/VlapPerAsalPeroleh', $data);
    }
}
    
    /* End of file Login.php */
