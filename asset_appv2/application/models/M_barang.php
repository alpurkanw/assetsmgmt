<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_Model
{

    public function all()
    {
        return $this->db->get('tbl_barang');
    }

    public function allPerLok($where)
    {
        return $this->db->get_where('tbl_barang', $where);
    }
    public function barPerId($id)
    {
        $sql = "SELECT A.id aid, A.*, B.id, B.namakateg, C.namalok namalok from tbl_barang A 
        left join tbl_kateg B on B.id = A.idkateg
        left join tbl_lok C on C.id = A.idlok
        where A.id  = $id";
        return $this->db->query($sql);
    }
    public function barPerBarcode($id)
    {
        $sql = "SELECT A.id aid, A.*, C.namalok namalok from tbl_barang A 
        left join tbl_kateg B on B.id = A.idkateg
        left join tbl_lok C on C.id = A.idlok
        where A.kodebar  = '$id'";
        return $this->db->query($sql);
    }

    public function barByName($name)
    {
        $sql = "SELECT A.id aid, A.*, B.id, C.namalok namalok, D.file_name gambar from tbl_barang A 
        left join tbl_kateg B on B.id = A.idkateg
        left join tbl_lok C on C.id = A.idlok
         LEFT JOIN tbl_gambar D on D.kodebar = A.kodebar
        where A.namabar  like'%" . $name . "%' and A.harga <> 0 ";
        return $this->db->query($sql);
    }
    public function barBykateg($idkateg)
    {
        $sql = "SELECT A.id aid, A.*, B.id, C.namalok namalok, D.file_name gambar from tbl_barang A 
        left join tbl_kateg B on B.id = A.idkateg
        left join tbl_lok C on C.id = A.idlok
         LEFT JOIN tbl_gambar D on D.kodebar = A.kodebar
        where A.idkateg  = '$idkateg' and A.harga <> 0 ";
        return $this->db->query($sql);
    }


    public function hisBarById($id)
    {
        $sql = "SELECT A.id aid, A.*, C.namalok namalok from tbl_barang A 
        left join tbl_kateg B on B.id = A.idkateg
        left join tbl_lok C on C.id = A.idlok
        where A.id  = $id";
        return $this->db->query($sql);
    }
}


    
    
    /* End of file ModelName.php */
