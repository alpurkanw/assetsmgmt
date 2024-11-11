<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('M_peringatan', 'mp');
    }

    public function index()
    {
        $data["judul"] = "Home";

        $data["pers"] = $this->mp->getdata();
        $this->load->view('admin/Vhome', $data);
    }

    public function dshHome()
    {
        $data["judul"] = "Home";

        $this->db->select('count(namabar) jumitem, sum(harga) nominal');
        $data["dshBarApp"] = $this->db->get_where('tbl_barang', array("sts" => 1))->result();

        $this->db->select('count(namabar) jumitem, sum(harga) nominal');
        $data["dshBar"] = $this->db->get_where('tbl_barang', array("sts" => 0))->result();

        $data["kondisi"] = $this->db->query("SELECT kondisi, count(*) jumitem, sum(harga) nominal FROM `tbl_barang` GROUP BY kondisi;")->result();
        $data["lokasi"] = $this->db->query("SELECT namalok, count(*) jumitem, sum(harga) nominal FROM `tbl_barang` GROUP BY namalok;")->result();
        $data["ruang"] = $this->db->query("SELECT idlok,idruang,ruang, count(*) jumitem, sum(harga) nominal FROM `tbl_barang` GROUP BY idlok,idruang,ruang ORDER BY jumitem desc;")->result();
        $data["asal"] = $this->db->query("SELECT asal_peroleh, count(*) jumitem, sum(harga) nominal FROM `tbl_barang` GROUP BY asal_peroleh ORDER BY jumitem desc;")->result();

        $data["kategs"] = $this->db->query("SELECT a.idkateg , count(*) jumitem, b.namakateg, sum(a.harga) nominal  FROM `tbl_barang` a
        LEFT JOIN tbl_kateg b on a.idkateg = b.idkat
        GROUP BY a.idkateg,b.namakateg ORDER BY jumitem desc")->result();

        $data["jumgambar"] = $this->db->query("select ada_gambar, (ada_gambar + belum_ada_Gambar) as Total_Data, (ada_gambar/(ada_gambar + belum_ada_Gambar) * 100) as 'persentase_gambar' from (
        select (
        SELECT count(*) 
        FROM `tbl_barang` a
                        LEFT JOIN tbl_gambar b on b.kodebar = a.kodebar
            where file_name <> '' ) ada_gambar, (
        SELECT count(*) 
        FROM `tbl_barang` a
                        LEFT JOIN tbl_gambar b on b.kodebar = a.kodebar
            where  ISNULL(file_name) ) belum_ada_Gambar ) x")->result();


        $this->load->view('admin/VdshHome', $data);
    }
}
    
    /* End of file Login.php */
