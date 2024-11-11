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

        // print_r($_POST);
        // return;

        $ruang = json_decode($this->input->post('ruangan'), TRUE);
        $kondisi = $this->input->post('kondisi');
        $ket = $this->input->post('desk');
        $from = $this->input->post('from');
        $idruang = $ruang["id"];
        $namaruang = $ruang["namaruang"];

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
        $no_platbaru = $this->input->post('no_platbaru');

        // Array ( [merkbar] => TOYOTA AVANZA / 1300G GMMFJJ [namabar] => Mini Bus ( Penumpang 14 Orang Kebawah ) [no_seri] => [no_mesin] => DE40102 [no_rangka] => MHFM1B379K171057 [no_bpkb] => 8670938F [no_platlama] => BN 2075 CZ [no_platbaru] => BN-1510-TZ [jns_per] => 1 [tgl_kalibrasi] => [from] => fcariByName [ruangan] => {"id":"11","idlok":"1","namaruang":"RUANG KABAG TATA USAHA","desk":"2"} [kondisi] => BAIK [katakunci] => 000009 [thn_angg] => [desk] => RSUD )


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

            print_r($_POST);
            return;
            if ($_SESSION["katakunci"] <> "") {
                $redir = base_url('pic/UpdateBar/retrieveDatabySession/');
            } else {
                $redir = base_url('pic/UpdateBar/retrieveDatabySessionthn_angg/');
            }

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

        $this->load->view('mkr/Vbarcode', $data);
    }
}
    
    /* End of file Login.php */
