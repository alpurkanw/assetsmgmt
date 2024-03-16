<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_member extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_user');
    }

    public function getdata($where)
    {
        return $this->db->get_where('tb_user', $where);
    }

    public function update($where, $data)
    {
        $this->db->where($where);
        $this->db->update('tb_user', $data);
        return $this->db->affected_rows();
    }

    // public function member_del($where)
    // {
    //     $this->db->delete('tb_user', $where);
    //     return $this->db->affected_rows();
    // }

    // public function tambah($data)
    // {
    //     $this->db->insert('tb_barang', $data);
    //     return $this->db->affected_rows();
    //     // $this->db->insert('mst_kategori', $data);
    // }



    // public function get_data_like($where)
    // {
    //     $this->db->or_like($where);
    //     return $this->db->get('tb_barang');
    // }
}

/* End of file ModelName.php */
