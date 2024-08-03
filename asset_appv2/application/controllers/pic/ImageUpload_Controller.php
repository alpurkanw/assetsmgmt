<?php
class ImageUpload_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load Helper for Form
        // $this->load->helper('url', 'form'); 
        // $this->load->library('form_validation');
    }



    public function upload()
    {

        $kodebar =  $this->input->post('kodebar');
        $from_page =  $this->input->post('from_page');
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

        if ($from_page == "uploadGambar") {
            redirect('pic/uplGambar/barCode');
        } else {
            redirect('pic/UpdateBar/openFormUpdate/' . $kodebar);
        }

        return;
    }
}
