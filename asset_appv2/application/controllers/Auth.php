<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {


        if ($this->session->userdata('usernm') == '') {
            // jika email kosong maka kirim ke form login 
            $this->logout();
        } else {

            // jika email ada cek level nya 
            if ($this->session->userdata('level')  == 1) {
                $data['judul'] = 'Admin Home';
                $this->load->view('admin/Vhome', $data);
            } else if ($this->session->userdata('level')  == 2) {
                $data['judul'] = 'Approval Home';
                $this->load->view('appv/vhome', $data);
            } else if ($this->session->userdata('level')  == 3) {
                $data['judul'] = 'Maker Home';
                $this->load->view('pic/Home', $data);
            } else if ($this->session->userdata('level')  == 4) {
                $data['judul'] = 'Penanggung Jawab Lokasi Home';
                $this->load->view('mkr/Home', $data);
            } else {
                $this->logout();
            }
        }
    }
    public function gagal()
    {
        $data['judul'] = 'Login Gagal';
        // $data['method'] = "open_index";
        $this->load->view('v_login', $data);
    }


    public function login()
    {


        $this->form_validation->set_rules(
            'usernm',
            'Username',
            'trim|required'
        );
        $this->form_validation->set_rules(
            'pass',
            'pass',
            'trim|required'
        );

        if ($this->form_validation->run() == TRUE) {

            $usernm = $this->input->post('usernm');
            $pass = $this->input->post('pass');


            // $this->db->select('*');
            // $this->db->from('tbl_user as A');
            // $this->db->join('tbl_lok as B', 'A.idlok = B.id', 'left');
            // $user = $this->db
            //     ->get_where('tbl_user', [
            //         'email' => $email,
            //         'sts_app' => 1
            //     ])->row_array();

            $this->db->select('A.usernm,A.email, A.nama, A.nip,A.lokid, A.id iduser, A.level, A.pass,  B.namalok');
            $this->db->from('tbl_user A');
            $this->db->join('tbl_lok B', 'B.id = A.lokid', 'left');
            $this->db->where(["usernm" => $usernm]);

            $user = $this->db->get()->row_array();

            // print_r($user["iduser"]);
            // echo $this->db->error()["message"];
            // return;



            if ($user) {
                if (password_verify($pass, $user["pass"])) {
                    $data = [
                        'email' => $user['email'],
                        'usernm' => $user['usernm'],
                        'nama' => $user['nama'],
                        'nip' => $user['nip'],
                        'lokid' => $user['lokid'],
                        'namalok' => $user['namalok'],
                        'id' => $user['iduser'],
                        'level' => $user['level'],
                        'sessionid' => $this->session->session_id,
                    ];

                    $this->session->set_userdata($data);
                    if ($data['level'] == '1') {
                        redirect('admin/Home');
                        return;
                    } elseif ($data['level'] == '2') {
                        redirect('appv/Home');
                        return;
                    } elseif ($data['level'] == '3') {
                        redirect('pic/Home');
                        return;
                    } elseif ($data['level'] == '4') {
                        redirect('mkr/Home');
                        return;
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class= "alert alert-danger" role="alert" >Level Belum disetting, Silahkan Hubungi Admin!</div>'
                        );
                        // $this->logout();
                        redirect('auth/gagal');
                        return;
                    }
                } else {

                    $this->session->set_flashdata(
                        'pesan',
                        '<div class= "alert alert-danger" role="alert" >Password Salah</div>'
                    );
                    redirect('auth/gagal');
                    return;
                }
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class= "alert alert-danger" role="alert" >Anda Belum Registrasi / Approve, Silahkan Hubungi Admin!</div>'
                );
                redirect('auth/gagal');
                return;
            }
        } else {
            // redirect('C_daftar/');
            // $data['judul'] = 'Login';
            $this->session->set_flashdata(
                'pesan',
                '<div class= "alert alert-danger" role="alert" >Parameter Belum Lengkap!</div>'
            );
            redirect(base_url());
            return;
        }
    }
    // public

    public function gantiPass()
    {
        $data['judul'] = 'Ubah Password';
        // $data['method'] = "open_index";
        $this->load->view('V_chgpass', $data);
    }


    public function gantiPass_Proses()
    {


        // $data['title'] = 'Ganti Password';
        // $data['user'] = $this->session->userdata('usernm');


        $this->form_validation->set_rules('old_password', 'Password Lama', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required');
        $this->form_validation->set_rules('new_password_confirm', 'Konfirmasi Password Baru', 'required|trim|matches[new_password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('Auth/gantiPass', $data);
        } else {
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');

            $usernm =  $this->session->userdata('usernm');
            $email =  $this->session->userdata('email');

            $this->db->select('A.usernm,A.email, A.nama, A.nip,A.lokid, A.id iduser, A.level, A.pass,  B.namalok');
            $this->db->from('tbl_user A');
            $this->db->join('tbl_lok B', 'B.id = A.lokid', 'left');
            $this->db->where(["usernm" => $usernm]);
            $this->db->where(["email" => $email]);

            $user = $this->db->get()->row_array();


            // print_r($user);
            // return;



            // if ($user) {
            //     if (password_verify($pass, $user["pass"])) {




            // $user = $this->user_model->get_user_by_id($this->session->userdata('id_user'));

            if (password_verify($old_password, $user['pass'])) {
                echo "boleh ganti pass";

                $data = array(
                    'pass' => password_hash($new_password, PASSWORD_DEFAULT)
                );

                $this->db->where(["usernm" => $usernm]);
                $this->db->where(["email" => $email]);
                $this->db->update('tbl_user', $data);


                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success py-1" role="alert">
                                Password berhasil diubah!
                            </div>'
                );
                redirect('Auth/gantiPass');
            } else {

                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger py-1" role="alert">
                                Password Gagal diubah!
                            </div>'
                );
                redirect('Auth/gantiPass');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('usernm');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata(
            'pesan',
            '<div class= "alert alert-success" role="alert" >Logout berhasil!</div>'
        );

        session_destroy();
        // session_destroy();
        redirect('Welcome');
    }

    public function register()
    {
        $data['judul'] = 'Register';
        // $data['method'] = "open_index";
        $this->load->view('v_regis', $data);
    }

    public function regis_submit()
    {
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'trim|required|max_length[50]'
        );
        $this->form_validation->set_rules(
            'nohp',
            'No Hp',
            'trim|required|max_length[16]'
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|is_unique[tb_user.email]'
        );
        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|max_length[25]|is_unique[tb_user.username]'
        );
        $this->form_validation->set_rules(
            'pass1',
            'Pass1',
            'trim|required|matches[pass2]'
        );
        $this->form_validation->set_rules(
            'pass2',
            'Pass2',
            'trim|required|matches[pass1]'
        );

        if ($this->form_validation->run() == true) {
            $data = [
                'nama' => $this->input->post('nama'),
                'nohp' => $this->input->post('nohp'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('pass1'),
                'tglTimeInput' => date('yyyymmdd His'),
                'role_id' => 2,
            ];

            $this->db->insert('tb_user', $data);
            if ($this->db->affected_rows() == 1) {
                //kirim telegram ke gw kalo ada yang daftar baru
                $text =
                    'Ada Pendaftaran User bos... Usernamenya : ' .
                    $data['username'] .
                    ' Emailnya : ' .
                    $data['email'] .
                    ' dan No Hp : ' .
                    $data['nohp'];
                sendNotif('123045474', $text);
                //////////////////////////////////////////////////
                echo 'Sukses';
            } else {
                echo 'Gagal';
            }

            redirect('auth');
            # code...
        } else {
            $this->register();
        }
    }

    public function blocked()
    {
        $this->load->view('tmp/v_forbidden');
        return;
    }
}
