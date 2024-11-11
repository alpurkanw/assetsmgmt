<?php
class ImageUpload_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load Helper for Form
        // $this->load->helper('url', 'form'); 
        $this->load->library('form_validation');
    }




    private function updBar($kodebar)
    {

        $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim|is_unique[tbl_user.nip]');
        $this->form_validation->set_rules('namabar', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jumbar', 'Jumlah', 'required|trim');
        $this->form_validation->set_rules('thn_angg', 'Tahun Anggaran', 'required|trim');
        $this->form_validation->set_rules('idlok', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('ruang', 'Ruangan', 'required|trim');
        $this->form_validation->set_rules('asal_peroleh', 'Asal Perolehan', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required|trim');


        if ($this->form_validation->run() == TRUE) {

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
                    'katakunci',
                    $katakunci
                );

                // $redir = base_url('pic/UpdateBar/retrieveData/');


                // redirect($redir);
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                            GAGAl Update. ' . $this->db->error()["message"] . '
                        </div>'
                );
            }
        }
    }


    public function upload()
    {

        $kodebar =  $this->input->post('kodebar');

        // update barang dan update log
        $this->updBar($kodebar);
        // print_r($_POST);
        // return;

        // jika sebelumnya barang di cari menggunakan kata kunci maka ambil kata kunci nya... 
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




        if ($katakunci == "") {
            $redir = base_url('pic/uplGambar/barCode');
            redirect($redir);
        } else {
            $this->session->set_flashdata(
                'katakunci',
                $katakunci
            );
            $redir = base_url('pic/UpdateBar/retrieveData/');
            redirect($redir);
        }
    }
}
