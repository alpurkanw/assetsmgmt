<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Clistbar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('M_barang', 'bar');
    }

    public function index()
    {
        redirect("pic/CcariBar/barCode");
    }

    public function detailBar($id)
    {
        /// $data["brgs"] = $this->db->get_where('tbl_barang', ["idlok" => $userlok])->result();
        $data["judul"] = "Detail Barang";
        $data["show"] = "detailBar";

        $data["brg"] = $this->bar->barPerBarcode($id)->result();

        $userlok = $_SESSION["lokid"];

        $data["ruangs"] = $this->db->get_where('tbl_ruangan', array("idlok" => $userlok))->result();
        $data["gbrs"] = $this->db->get_where('tbl_gambar', array("kodebar" => $id))->result();

        $this->db->select('*');
        $this->db->from('history_upd');
        $this->db->where('kode', $id);
        $this->db->order_by('tgl, jam', 'DESC');
        $data["hstrs"] = $this->db->get()->result();
        // $data["hstrs"] = $this->db->get_where('history_upd', ["kode" => $id])->result();

        $this->load->view('pic/Vlistbar', $data);
    }

    public function updBar($kodebar)
    {


        $ruang = json_decode($this->input->post('ruangan'), TRUE);
        $kondisi = $this->input->post('kondisi');
        $ket = $this->input->post('desk');
        $from = $this->input->post('from');
        $idruang = $ruang["id"];
        $namaruang = $ruang["namaruang"];



        $data_sebelum_update = $this->bar->barPerBarcode($kodebar)->result_array();
        //  print_r($data_sebelum_update);
        //  return;
        $where = [
            'kodebar' => $kodebar,
        ];

        $data_update = [
            'idruang' => $idruang,
            'ruang' => $namaruang,
            'kondisi' => $kondisi,
            'ket' => $ket

        ];
        $this->db->where($where);
        $this->db->update('tbl_barang', $data_update);

        // echo $this->db->error()["message"];
        // echo $this->db->affected_rows();
        // // print_r($where);
        // // print_r($data_sebelum_update);
        // // print_r($data_update);
        // return;

        if ($this->db->affected_rows() == 1) {


            $data_inserlog = [
                'kode' => $kodebar,
                'jns_ubah' => "barang_update",
                'tgl' => date('Ymd'),
                'jam' => date('His'),
                'iduser' => $_SESSION["id"],
                'nmuser' => $_SESSION["nama"],
                'data' => json_encode($data_sebelum_update),
                'ket' => $ket

            ];
            $this->db->insert('history_upd', $data_inserlog);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-info py-1" role="alert">
                            Barang berhasil di Update
                        </div>'
            );

            $this->session->set_flashdata(
                'kata',
                $this->input->post('kata')
            );
            $redir = base_url('pic/UpdateBar/retrieveDatabySession/');
            redirect($redir);
        }
        if ($this->db->affected_rows() == 0) {


            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            Tidak ada barang yang diUpdate
                        </div>'
            );
            $redir = base_url('pic/UpdateBar/updBarOpenForm/') . $kodebar;
            redirect($redir);
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            GAGAl Update. ' . $this->db->error()["message"] . '
                        </div>'
            );
            // echo "gagal";
            $redir = base_url('pic/UpdateBar/updBarOpenForm/') . $kodebar;
            redirect($redir);
        }
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
