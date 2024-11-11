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
        $data["page"] = "formgetkeyword";
        $data["param"] = "formgetkeyword";
        // $_SESSION["page"] = "formgetkeyword";

        $this->load->view('pic/VupdateBar', $data);
    }



    public function retrieveData()
    {

        // print_r($_POST);

        $kata = (trim($this->input->post('katakunci'))) ? trim($this->input->post('katakunci')) : $this->session->flashdata('katakunci');
        if ($kata == "") {
            echo "Error : kata Kunci tidak ada";
            return;
        }
        // $_SESSION["katakunci"] = $kata;
        // echo $this->session->flashdata('katakunci');
        // return;

        $data["katakunci"] = $kata;

        $data["judul"] = "List Barang";
        $data["page"] = "response";


        $sql = "SELECT a.kodebar, kode_aset,no_reg_aset, thn_angg,merkbar, namakateg, asal_peroleh,sts,namabar, idruang,ruang, harga, kondisi, file_name FROM `tbl_barang` a
                LEFT JOIN tbl_gambar b on b.kodebar = a.kodebar
                where (a.kodebar like  '%$kata%' or a.namabar like '%$kata%') and harga <> 0 order by a.kodebar  ";
        $data["brgs"]  = $this->db->query($sql)->result_object();

        // $data["brgs"] = $this->db->get()->result_object();

        $this->load->view('pic/VupdateBar', $data);
    }

    public function updBarOpenForm($kodebar = "")
    {
        // $kodebar = $kodeBar;
        $kodebar = ($kodebar == "") ? $this->input->post('kodebar') : $kodebar;
        // ($this->input->post('kodebar')) ? $this->input->post('kodebar') : $this->input->get('kodebar');
        $data["katakunci"] = $this->input->post('katakunci');
        $data["judul"] = "Form Update Barang";
        $data["page"] = "formUpdate";



        $sql = "SELECT * from tbl_barang A 
        where A.kodebar  = '$kodebar'";
        $data["brg"]  = $this->db->query($sql)->result_object();


        $data["gbrs"] = $this->db->get_where('tbl_gambar', array("kodebar" => $kodebar))->result_object();

        $userlok = $_SESSION["lokid"];
        $data["ruangs"] = $this->db->get_where('tbl_ruangan', array("idlok" => $userlok))->result();
        $this->load->view('pic/VupdateBar', $data);
    }

    public function updBar($kodebar)
    {

        $ruang = json_decode($this->input->post('ruangan'), TRUE);
        $kondisi = $this->input->post('kondisi');
        $ket = $this->input->post('desk');
        // $from = $this->input->post('from');
        $idruang = $ruang["id"];
        $namaruang = $ruang["namaruang"];

        $katakunci = $this->input->post('katakunci');
        $merkbar = $this->input->post('merkbar');
        $namabar = $this->input->post('namabar');
        $no_seri = $this->input->post('no_seri');
        $no_mesin = $this->input->post('no_mesin');
        $no_rangka = $this->input->post('no_rangka');
        $no_bpkb = $this->input->post('no_bpkb');
        $no_platlama = $this->input->post('no_platlama');
        $no_platbaru = $this->input->post('no_platbaru');
        $jns_per = $this->input->post('jns_per');
        $tgl_kalibrasi = $this->input->post('tgl_kalibrasi');


        //ambil data sebelumnya untuk di simpan di log
        $sql = "SELECT * from tbl_barang A 
        where A.kodebar  = '$kodebar'";
        $data_sebelum_update  = $this->db->query($sql)->result_array();

        //  print_r($data_sebelum_update);
        //  return;
        $where = [
            'kodebar' => $kodebar,
        ];



        $data_update = [
            'idruang' => $idruang,
            'ruang' => $namaruang,
            'kondisi' => $kondisi,
            'ket' => $ket,
            'merkbar' => $merkbar,
            'namabar' => $namabar,
            'no_seri' => $no_seri,
            'no_mesin' => $no_mesin,
            'no_rangka' => $no_rangka,
            'no_bpkb' => $no_bpkb,
            'no_platlama' => $no_platlama,
            'no_platbaru' => $no_platbaru,
            'jns_per' => $jns_per,
            'tgl_kalibrasi' => $tgl_kalibrasi,
            'no_platbaru' => $no_platbaru
        ];
        $this->db->where($where);
        $this->db->update('tbl_barang', $data_update);


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




            // echo "berhasil:" . $katakunci;
            // return;

            $this->session->set_flashdata(
                'katakunci',
                $katakunci
            );

            $redir = base_url('pic/UpdateBar/retrieveData/');


            redirect($redir);
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            GAGAl Update. ' . $this->db->error()["message"] . '
                        </div>'
            );

            // echo "gagal:" . $katakunci;
            // return;
            $this->session->set_flashdata(
                'katakunci',
                $katakunci
            );

            // echo "gagal";
            $redir = base_url('pic/UpdateBar/retrieveData/');
            redirect($redir);
        }
    }




    public function upload()
    {

        $kodebar =  $this->input->post('kodebar');
        $katakunci =  $this->input->post('katakunci');
        // echo $kodebar;
        // return;
        // return;
        // $config['upload_path'] = FCPATH.'assets\image\img_bar\\';
        $config['upload_path'] = FCPATH . 'assets/image/img_bar/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 5000;
        $config['overwrite'] = TRUE;
        // $redir = base_url('pic/UpdateBar/retrieveDatabySession/');
        //   echo $config['upload_path'];;
        //   return;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_pic')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                        Upload Foto Barang Gagal, dengan error berikut : ' . $error["error"] . '
                    </div>'
            );
        } else {
            $data = array('image_metadata' => $this->upload->data());

            $data_insert = [
                'kodebar' => $kodebar,
                'file_name' => $data["image_metadata"]["file_name"],
                'tgl_upl' => date('Ymd'),
                'iduser_upl' => $_SESSION["id"]

            ];

            $ret = $this->db->insert('tbl_gambar', $data_insert);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-info py-1" role="alert">
                        Upload Foto Barang Berhasil
                    </div>'
            );
        }

        // if ($from_page == "uploadGambar") {
        //     redirect('pic/uplGambar/barCode');
        // } else {
        //     redirect('pic/UpdateBar/openFormUpdate/' . $kodebar);
        // }



        $this->session->set_flashdata(
            'katakunci',
            $katakunci
        );

        $redir = base_url('pic/UpdateBar/retrieveData/');


        redirect($redir);
        return;
    }


    public function retrieveDatabySession()
    {

        $kata = $_SESSION["katakunci"];

        $data["judul"] = "List Barang";
        $data["page"] = "response";

        $sql = "SELECT a.kodebar, kode_aset,no_reg_aset,namakateg,asal_peroleh, thn_angg,merkbar, namabar, idruang,ruang, harga, 
                kondisi, file_name FROM `tbl_barang` a
                LEFT JOIN tbl_gambar b on b.kodebar = a.kodebar
                where a.kodebar like  '%$kata%' or a.namabar like '%$kata%' and harga <> 0 order by a.kodebar ";
        $data["brgs"]  = $this->db->query($sql)->result_object();

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
        // print_r($_REQUEST);
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
            $this->session->set_flashdata(
                'katakunci',
                $_POST["katakunci"]
            );

            // echo "gagal";
            $redir = base_url('pic/UpdateBar/updBarOpenForm/') . $kodebar;
            redirect($redir);
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger py-1" role="alert">
                            Gambar GAGAL Dihapus, error: ' . $this->db->error() . '
                        </div>'
            );

            $this->session->set_flashdata(
                'katakunci',
                $_POST["katakunci"]
            );
            // echo "gagal";
            $redir = base_url('pic/UpdateBar/updBarOpenForm/') . $kodebar;
            redirect($redir);
        }
    }
}
    
    /* End of file Login.php */
