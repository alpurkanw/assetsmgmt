<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ClapRuangPerLok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->library('form_validation');
        // $this->load->model('m_jns_tag', 'mtag');
    }

    public function index()
    {
        $data["judul"] = "Lapaoran Barang Per Ruangan";
        $userlok = $_SESSION["lokid"];
        $data["page"] = "index";

        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();
        $data["loks"] = $this->db->get('tbl_lok')->result();
        $this->load->view('pic/VlapRuangPerLok', $data);
    }

    public function ambilRuang($id)
    {
        // $data["judul"] = "Lapaoran Barang Per Ruangan";
        // $userlok = $_SESSION["lokid"];
        // $data["page"] = "index";

        // $data["ktgs"] = $this->db->get('tbl_kateg')->result();

        $this->db->where('idlok', $id);
        $this->db->order_by('id', 'DESC');
        $ruangs = $this->db->get('tbl_ruangan')->result();


        // $this->db->get_where('tbl_ruangan', ["idlok" => $id]);
        // $ruangs = $this->db->order_by('idruang', 'DESC')->result();
        echo '<select name="ruang" class="form-control select2">
                <option value="0">.:Pilih Ruangan :.</option>';
        foreach ($ruangs as $key => $rng) {
            echo "<option value='" . json_encode($rng) . "'>" . $rng->namaruang . "</option>";
        }
        echo '</select>';
        // $this->load->view('pic/VlapRuangPerLok', $data);
    }


    public function submit()
    {
        $data["judul"] = "Laporan Perlokasi";
        // echo $this->input->post('ruang');

        // print_r($_REQUEST);
        if ($this->input->post('ruang') !== null) {
            if ($this->input->post('ruang') !== "0") {
                // print_r($ruang);

                // ambil barang berdasarkan ruangan 
                $data["page"] = "showdata";
                $lokasi = json_decode($this->input->post('lokasi'), TRUE);
                $ruang = json_decode($this->input->post('ruang'), TRUE);

                $sql = " SELECT A.*, C.file_name as gambar from tbl_barang A 
                left join tbl_kateg B on B.id = A.idkateg
                LEFT JOIN tbl_gambar C on C.kodebar = A.kodebar
                 where A.harga <> 0 and  A.idlok = '" . $lokasi["id"] . "' and A.idruang = '" . $ruang["id"] . "' and A.harga <> 0 ";
                // // echo $sql;
                // // return;
                $data["bars"] =  $this->db->query($sql)->result();
                // print_r($data["bars"]);
                // return;


                $data["lokasi"] = $lokasi;
                $data["ruang"] = $ruang;

                $this->load->view('pic/VlapBarPerRuang', $data);
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-warning py-1" role="alert">
                                    Pilih Ruangan Terlebih Dahulu
                                </div>'
                );
                redirect(base_url("pic/ClapRuangPerLok"));
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-warning py-1" role="alert">
                                Pilih Ruangan Terlebih Dahulu
                            </div>'
            );
            redirect(base_url("pic/ClapRuangPerLok"));
        }
    }
}
    
    /* End of file Login.php */
