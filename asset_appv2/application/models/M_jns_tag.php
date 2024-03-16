<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_jns_tag extends CI_Model
{

    public function alldata()
    {
        return $this->db->get('mst_jns_tag')->result();
    }

    // public function getdata($where)
    // {

    //     return $this->db->get_where('tb_barang', $where);
    // }

    // public function del_bar($where)
    // {
    //     $this->db->delete('tb_barang', $where);
    //     return $this->db->affected_rows();
    // }

    public function tambah($data)
    {
        $this->db->insert('mst_jns_tag', $data);
        return $this->db->affected_rows();
        // $this->db->insert('mst_kategori', $data);

    }

    // public function edit_data($where, $data)
    // {


    //     $this->db->where($where);
    //     $this->db->update('tb_barang', $data);
    //     return $this->db->affected_rows();
    // }

    // public function get_data_like($where)
    // {

    //     $this->db->or_like($where);
    //     return $this->db->get('tb_barang');
    // }
}


    
    
    /* End of file ModelName.php */
