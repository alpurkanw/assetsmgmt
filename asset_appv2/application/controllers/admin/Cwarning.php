<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cwarning extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->library('form_validation');
        $this->load->model('M_peringatan', 'mp');
        // $this->sqlsvr = $this->load->database("sqlsvr44", TRUE);
    }

    public function index()
    {
        // echo "tes";
        $data["judul"] = "Jenis Peringantan";
        $data["show"] = "index";

        $data["kategs"] = $this->mp->getdata();
        $this->load->view('admin/Vwarn', $data);
    }

    public function Ftambah()
    {
        // echo "tes";
        $data["judul"] = "Form Tambah peringatan";
        $data["show"] = "form_tambah";

        // $data["orangs"] = $this->db->get('tbl_lok')->result();
        $this->load->view('admin/Vwarn', $data);
    }

    public function addProc()
    {


        $this->form_validation->set_rules(
            'namaper',
            'Jenis Peringatan',
            'trim|required|is_unique[tbl_peringatan.jenis_peringatan]'
        );



        if ($this->form_validation->run() == TRUE) {
            // print_r($_POST);
            // echo "sudah di proses";
            $data_insert = [
                // 'kodelok' => $this->input->post('kodelok'),
                'jenis_peringatan' => $this->input->post('namaper'),
                'ket' => $this->input->post('ket')
            ];

            $ret = $this->db->insert('tbl_peringatan', $data_insert);


            if ($ret > 0) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success py-1" role="alert">
                            Peringatan Barang berhasil ditambah
                        </div>'
                );
                redirect('admin/Cwarning');
                return;
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                    peringatan Barang GAGAL ditambah, error: ' . $this->db->error() . '
                        </div>'
                );
                redirect('admin/Cwarning/Ftambah');
                return;
            }
        } else {
            $this->Ftambah();
            return;
            // redirect('admin/Cwarning/Ftambah');
            // redirect(base_url("admin/Cwarning/Ftambah"));
            // $this->load->view('admin/Vperingatan', $data);
            // return;
        }
    }

    // update////////////////////////////

    public function fUpdate($id)
    {
        // echo "tes";
        $data["judul"] = "peringatan Barang";
        $data["show"] = "f_update";

        $data["ktg"] = $this->db->get_where('tbl_peringatan', ["id" => $id])->result();
        $this->load->view('admin/Vwarn', $data);
    }

    public function updProc($id)
    {


        $this->form_validation->set_rules(
            'namaper',
            'Jenis Peringatan',
            'trim|required|is_unique[tbl_peringatan.jenis_peringatan]'
        );


        if ($this->form_validation->run() == TRUE) {
            // print_r($_POST);
            // echo "sudah di proses";
            $where = [
                'id' => $id,
            ];
            $data_update = [
                'jenis_peringatan' => $this->input->post('namaper'),
                'ket' => $this->input->post('ket')
            ];



            $this->db->where($where);
            $this->db->update('tbl_peringatan', $data_update);

            // $data["judul"] = "List Warga";
            if ($this->db->affected_rows() == 1) {

                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success py-1" role="alert">
                            Success Update.
                        </div>'
                );
                redirect("admin/Cwarning");
                // return;
                // return;
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                            GAGAl Update. ' . $this->db->error()["message"] . '
                        </div>'
                );
                redirect("admin/Cwarning");
            }
        } else {

            $this->fUpdate($id);
            return;
        }
    }




    ////////////////  update end 

    public function lokDel($id)
    {
        // echo $id;
        // $data["orangs"] = $this->db->get('tbl_lok')->result();
        // $this->load->view('admin/Vperingatan', $data);

        // $ruang = $this->db->get_where('tbl_peringatan', ["id" => $id])->result();
        // if (count($ruang) > 0) {
        //     $this->session->set_flashdata(
        //         'pesan',
        //         '<div class="alert alert-danger py-1" role="alert">
        //                     Data peringatan GAGAL Dihapus karena sudah terinput ruangan, silahkan hapus terlebih dahulu ruangan pada peringatan ini
        //                 </div>'
        //     );
        //     redirect('admin/Cwarning');
        // }

        $ret = $this->db->delete('tbl_peringatan', array('id' => $id));
        if ($ret > 0) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success py-1" role="alert">
                            Data peringatan berhasil Dihapus
                        </div>'
            );
            // redirect('appv/C_mstTagihan');
            redirect('admin/Cwarning');
            // return;
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            Data peringatan GAGAL Dihapus, error: ' . $this->db->error() . '
                        </div>'
            );
            redirect('admin/Cwarning');
        }
    }
}
