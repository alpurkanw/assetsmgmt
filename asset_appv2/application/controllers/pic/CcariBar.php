<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CcariBar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('M_barang', 'bar');
    }

    public function CariByName()
    {
        $data["judul"] = "Cari barang";
        $data["show"] = "CariByName";


        $this->load->view('pic/VcariFormParm', $data);
    }
    
    public function barCode()
    {
        $data["judul"] = "Scan barang";
        
        // $this->load->view('pic/VcariFormParm', $data);
        $this->load->view('pic/VbarCode', $data);
    }


    public function barCode_hasil($kodeBar)
    {
        $kodebar = $kodeBar;
        $brg = $this->bar->barPerBarcode($kodeBar)->result();
        // echo $kodebar;
        // return;
        if (count($brg) == 0) {
            echo '
            <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-danger bg-danger">
                            <div class="card-header p-1">
                                <h4>
                                    <strong>PERHATIAN</strong>
                                </h4>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-2">

                               Barang  dengan kode ' . $kodebar . ' Tidak ditemukan 
                               silahkan Dicek kembali 
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>
                ';
        } else {

            $userlok = $_SESSION["lokid"];

            $ruangs = $this->db->get_where('tbl_ruangan', array("idlok" => $userlok))->result();


            $sts = ($brg[0]->sts == "1") ? "Approve" : "Not Approve";


            $opt = '<option value="">.:Pilih Ruangan :.</option>';
            foreach ($ruangs as $key => $ruang) {
                if ($brg[0]->idruang == $ruang->id) {
                    $opt .= '<option value=\'' . json_encode($ruang) . '\' selected>' . $ruang->id . "-" . $ruang->namaruang . '</option>';
                } else {
                    $opt .= '<option value=\'' . json_encode($ruang) . '\' >' . $ruang->id . "-" . $ruang->namaruang . '</option>';
                }
            }


            $nilai = array("BAIK", "RUSAK RINGAN", "RUSAK BERAT", "PROSES PERBAIKAN");
            $opt_kondisi = '<option value="">.:Pilih Kondisi:.</option>';
            foreach ($nilai as $val) {
                if ($brg[0]->kondisi == $val) {
                    $opt_kondisi .= '<option value="' . $val . '" selected>' . $val . '</option>';
                } else {
                    $opt_kondisi .= '<option value="' . $val . '" >' . $val . '</option>';
                }
            }
            // print_r($opt);
            // return;

            $datalist = '<table class="table table-bordered table-sm table-wrap text-sm table-striped">
            <thead>
                <tr>
                    <th>Tgl Update </th>
                    <th>Jenis Update</th>
                    <th>User Update</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>';
            $this->db->order_by('id', 'DESC');
            $his = $this->db->get_where('history_upd', ["kode" => $kodebar])->result();
            if (count($his) == 0) {
                $datalist = '
                <tr>
                    <td colspan = "3">
                    <div class="alert alert-danger" role="alert">
                        <strong>Belum Ada Perubahan Barang</strong>
                    </div>
                    </td>
                </tr>
                ';
            } else {


                foreach ($his as $key => $val) {

                    $datalist .= '
                            <tr>
                                <td>' . $val->tgl . "-" . $val->jam . '</td>
                                <td>' . $val->jns_ubah . '</td>
                                <td>' . $val->iduser . "-" . $val->nmuser . '</td>
                                <td>' . $val->ket . '</td>
                            </tr>    
                    ';
                }
            }

            $datalist .= '</tbody>
                        </table>';

            echo '
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-info">
                            <div class="card-header p-1">
                            <div class="row">
                                    <div class="col-3">
                                    <h5>
                                        Data Detail
                                    </h5>
                                    </div>
                                    <div class="col text-right">
                                        <a class="btn  btn-info" href="' . base_url("pic/Clistbar/detailBar/") .$brg[0]->kodebar. '">Detail</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-2">

                                <div class="row">
                                    <div class="col-lg-3 col-sm-4  font-weight-bold">
                                        Kode Barang
                                    </div>
                                    <div class="col-auto">
                                        ' . $brg[0]->kodebar . '
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 font-weight-bold">
                                        Kode Aset
                                    </div>
                                    <div class="col-auto">
                        ' . $brg[0]->kode_aset .'-'.$brg[0]->no_reg_aset .'
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 font-weight-bold">
                                        Nama Barang
                                    </div>
                                    <div class="col-auto h4">
                                    ' . $brg[0]->namabar          . '
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 font-weight-bold">
                                        Merk Barang
                                    </div>
                                    <div class="col-auto">
                                        ' . $brg[0]->merkbar . '
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 font-weight-bold">
                                        Jumlah Barang
                                    </div>
                                    <div class="col-auto">
                                        ' . $brg[0]->jumbar . '
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 font-weight-bold">
                                        Tahun Anggaran
                                    </div>
                                    <div class="col-auto">
                                        ' . $brg[0]->thn_angg . '

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 font-weight-bold">
                                        Asal Perolehan
                                    </div>
                                    <div class="col-auto">
                                        ' . $brg[0]->asal_peroleh . '

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 font-weight-bold">
                                        Lokasi
                                    </div>
                                    <div class="col-auto">
                                        ' . $brg[0]->idlok . "-" . $brg[0]->namalok . '
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 font-weight-bold">
                                        Ruangan
                                    </div>
                                    <div class="col-auto">
                                        
                                            ' . $brg[0]->idruang . " - " . $brg[0]->ruang . '
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 font-weight-bold">
                                        Harga
                                    </div>
                                    <div class="col-auto">
                                        <h4>
                                            Rp' . number_format($brg[0]->harga, 2) . '
                                        </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 font-weight-bold">
                                        Status
                                    </div>
                                    <div class="col-auto">
                                        
                                            ' . $sts  . '
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 font-weight-bold">
                                        Kondisi
                                    </div>
                                    <div class="col-auto">
                                        
                                            ' . $brg[0]->kondisi . '
                                        
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-4 font-weight-bold">
                                        Keterangan
                                    </div>
                                    <div class="col-auto">
                                        ' . $brg[0]->ket . '
                                    </div>

                                </div>
                                



                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>

                <!-- Modal -->
                <div class="modal fade" id="f_update" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><strong>' . $brg[0]->namabar . '</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="submit_update" action="' . base_url("pic/Clistbar/updBar/") . $kodebar . '"  method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <label for="">
                                                Lokasi
                                            </label>
                                            <input type="hidden" class="form-control form-small" name="kodebar" value="' . $kodebar . '" readonly>
                                            <input type="hidden" class="form-control form-small" name="from" value="fbarcode" readonly>
                                            <input type="text" class="form-control form-small" value="' . $brg[0]->idlok . "-" . $brg[0]->namalok . '" readonly>
                                        </div>
                                    </div>
                                   
                                    <label for="">
                                        Ruangan/Penempatan
                                    </label>
                                    <select name="ruangan" id="ruangan" class="form-control">
                                        ' . $opt . '
                                    </select>
                                    
                                    <label for="">
                                        Kondisi
                                    </label>
                                    <select name="kondisi" class="form-control form-small">
                                        ' . $opt_kondisi . '

                                    </select>
                                    <label for="">
                                        Deskripsi
                                    </label>
                                    <textarea name="desk" id="" rows="5" class="form-control form-small" placeholder="Tulis kondisi trakhir barang jika ada perubahan"></textarea>
                                    <!-- <button type="submit" class="btn btn-warning ">Simpan </button> -->
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-warning btn_submit_change">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>
 
                <!-- Modal -->
                <div class="modal fade" id="history_update" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">History Perubahan Barang <br> <strong>' . $brg[0]->namabar . '</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ' . $datalist . '
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                    ';
        }
    }





    public function CariBynameSubmit()
    {
        // print_r($_POST);
        // return;
        $nameLike = $this->input->post("keyWordCari");
        $data["judul"] = "List Barang";
        $data["show"] = "listBar";
        $data["brgs"] = $this->bar->barByName($nameLike)->result();

        $this->load->view('pic/Vlistbar', $data);
    }

    public function CariByKateg()
    {
        $data["judul"] = "Cari barang";
        $data["show"] = "cariByKateg";

        $data["ktgs"] = $this->db->get("tbl_kateg")->result();
        $this->load->view('pic/VcariFormParm', $data);
    }
    public function CariBykategSubmit()
    {
        // print_r($_POST);
        // return;
        $idkateg = $this->input->post("kateg");
        $data["judul"] = "List Barang";
        $data["show"] = "listBar";

        $data["brgs"] = $this->bar->barBykateg($idkateg)->result();

        $this->load->view('pic/Vlistbar', $data);
    }
}
    
    /* End of file Login.php */
