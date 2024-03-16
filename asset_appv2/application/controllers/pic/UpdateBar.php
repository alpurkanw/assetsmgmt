<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UpdateBar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('M_barang', 'bar');
    }



    public function getParm()
    {
        $data["judul"] = "Update barang";
        $data["page"] = "getParm";
        // $this->load->view('pic/VcariFormParm', $data);

        $this->load->view('pic/VupdateBar', $data);
    }




    public function retrieveData()
    {

        $kata = trim($this->input->post('katakunci'));
        $_SESSION["katakunci"] = $kata;

        $data["judul"] = "List Barang";
        $data["page"] = "response";

        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->like('kodebar', $kata, 'both');
        $this->db->or_like('namabar', $kata, 'both');

        $data["brgs"] = $this->db->get()->result_object();

        $this->load->view('pic/VupdateBar', $data);
    }

    public function retrieveDatabySession()
    {

        $kata = $_SESSION["katakunci"];

        $data["judul"] = "List Barang";
        $data["page"] = "response";

        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->like('kodebar', $kata, 'both');
        $this->db->or_like('namabar', $kata, 'both');

        $data["brgs"] = $this->db->get()->result_object();

        $this->load->view('pic/VupdateBar', $data);
    }


    public function updBarOpenForm()
    {
        // $kodebar = $kodeBar;
        $kodebar = $this->input->post('kodebar');
        $data["kata"] = $_SESSION["katakunci"];
        // $kata = 

        // print_r($_POST);
        // return;
        $data["judul"] = "Form Update Barang";
        $data["page"] = "formUpdate";


        $data["brg"] = $this->bar->barPerBarcode($kodebar)->result_object();
        $data["gbrs"] = $this->db->get_where('tbl_gambar', array("kodebar" => $kodebar))->result_object();

        // $data["brg"] = $this->bar->barPerBarcode($kodebar)->result_object();

        $userlok = $_SESSION["lokid"];
        $data["ruangs"] = $this->db->get_where('tbl_ruangan', array("idlok" => $userlok))->result();


        $this->load->view('pic/VupdateBar', $data);
    }

    public function openFormUpdate($kodebar)
    {
        // $kodebar = $kodeBar;
        $kodebar = $kodebar;
        $data["kata"] = $_SESSION["katakunci"];
        // $kata = 

        // print_r($_POST);
        // return;
        $data["judul"] = "Form Update Barang";
        $data["page"] = "formUpdate";


        $data["brg"] = $this->bar->barPerBarcode($kodebar)->result_object();
        $data["gbrs"] = $this->db->get_where('tbl_gambar', array("kodebar" => $kodebar))->result_object();

        // $data["brg"] = $this->bar->barPerBarcode($kodebar)->result_object();

        $userlok = $_SESSION["lokid"];
        $data["ruangs"] = $this->db->get_where('tbl_ruangan', array("idlok" => $userlok))->result();

        // echo "tes";
        // return;
        $this->load->view('pic/VupdateBar', $data);
    }


    public function deleteGambar($id, $kodebar)
    {
        // echo $tes;
        $data["gbr"] = $this->db->get_where('tbl_gambar', array("id" => $id))->result_object();

        // $data["gbr"][0]->file_name;
        // return;

        $this->db->delete('tbl_gambar', array('id' => $id));
        $ret = $this->db->affected_rows();
        if ($ret > 0) {
            $image_path = "assets/image/img_bar/" . $data["gbr"][0]->file_name; // Ganti dengan path sesuai kebutuhan.
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success py-1" role="alert">
                            Gambar berhasil Dihapus
                        </div>'
            );
            // redirect('appv/C_mstTagihan');
            redirect('pic/UpdateBar/openFormUpdate/' . $kodebar);

            // echo "delete";
            // return;
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            Gambar GAGAL Dihapus, error: ' . $this->db->error() . '
                        </div>'
            );
            redirect('pic/UpdateBar/openFormUpdate/' . $kodebar);
            // echo $this->db->error();
        }
    }
}
    
    /* End of file Login.php */
