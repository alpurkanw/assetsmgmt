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

    public function all()
    {
        $data["judul"] = "List Semua Barang";
        $data["show"] = "listAll";


        $sql = " SELECT A.id aid,A.*, B.id, B.namakateg from tbl_barang A left join tbl_kateg B on B.id = A.idkateg";

        $data["brgs"] =  $this->db->query($sql)->result();


        $this->load->view('appv/Vlistbar', $data);
    }

    public function listNotApp()
    {
        $data["judul"] = "List Barang Not Approve";
        $data["show"] = "listNotApp";

        $sql = " SELECT A.id aid,A.*, B.id, B.namakateg from tbl_barang A left join tbl_kateg B on B.id = A.idkateg
        where sts  = 0  ";

        $data["brgs"] =  $this->db->query($sql)->result();


        $this->load->view('appv/Vlistbar', $data);
    }

    public function detailBar($id)
    {
        $data["judul"] = "Detail Barang";
        $data["show"] = "detailBar";

        $sql = " SELECT A.id aid, A.*, B.id, B.namakateg, C.namalok namalok from tbl_barang A 
        left join tbl_kateg B on B.id = A.idkateg
        left join tbl_lok C on C.id = A.idlok
        where A.id  = $id  ";

        $data["brgs"] =  $this->db->query($sql)->result();


        $this->load->view('appv/Vlistbar', $data);
    }

    public function approved()
    {
        $data["judul"] = "Approve Barang";
        // $data["show"] = "detailBar";
        $id = $this->input->post("id");
        $user = $_SESSION["id"];
        $tgl = date('Ymd');
        $sql = "update tbl_barang set sts = 1, userapp = $user, appdat = $tgl  where id = " . $id;
        // echo $sql;
        // return;
        $this->db->query($sql);
        echo $this->db->error()["message"];
        redirect("appv/Clistbar/listNotApp");
        // $this->load->view('appv/Vlistbar', $data);
    }
}
