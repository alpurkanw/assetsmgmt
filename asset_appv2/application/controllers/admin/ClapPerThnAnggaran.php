<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ClapPerthnAnggaran extends CI_Controller
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
        $data["judul"] = "Lapaoran Per Per Tahun Anggaran ";
        $userlok = $_SESSION["lokid"];
        $data["page"] = "index";

        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();

        $data["thns"] = $this->db->query("SELECT thn_angg, count(*) jumitem, sum(harga) nominal FROM `tbl_barang` GROUP BY thn_angg;")->result();
        $this->load->view('admin/VlapPerThnAnggaran', $data);
    }


    public function submit()
    {
        $data["judul"] = "Laporan Per Tahun Anggaran";

        $asal = json_decode($this->input->post('thn'), TRUE);
        // print_r($lokasi);
        // return;

        $data["page"] = "showdata";

        // return;
        $sql = " SELECT A.*, B.id, B.namakateg from tbl_barang A left join tbl_kateg B on B.id = A.idkateg
                where thn_angg = '" . $asal["thn_angg"] . "'";
        // echo $sql;
        // return;
        $data["asal"] =  $this->db->query($sql)->result();
        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        // $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('admin/VlapPerThnAnggaran', $data);
    }
}
    
    /* End of file Login.php */
