<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class M_invoice extends CI_Model {
    
        public function tampil_data(){
            return $this->db->get('tb_invoice');
            
        }

        // public function getdata($where){

        //     return $this->db->get_where('tb_barang', $where);
            
        // }

        // public function del_bar($where){
        //     $this->db->delete('tb_barang',$where ); 
        //     return $this->db->affected_rows();
        // }

        public function tambah($data)
        {
            
            
            $data_inv = [
                "nama" => $data["nama"],
                "alamat" => $data["alamat"],
                "email" => $data["email"],
                "no_telp" => $data["no_telp"],
                "kurir" => $data["kurir"],
                "bank" => $data["bank"],
                "tgl_pesan" => $data["tgl_pesan"],
                "batas_bayar" => $data["batas_bayar"]
            ];


            $this->db->insert('tb_invoice', $data_inv);
            $insert_id = $this->db->insert_id();
            // echo $insert_id;
            // return;
            if($insert_id){
                foreach($data['pesanan'] as $item ){
                    $det_inv = [
                        "id_inv" => $insert_id,
                        "id_brg" => intval($item['id']),
                        "nama_brg" => $item["name"],
                        "jumlah" => $item["qty"],
                        "harga" => $item["price"],
                        "pilihan" => ""
        
                    ];
                    // echo json_encode($det_inv);
                    $this->db->insert('tb_pesanan', $det_inv);
        
                }
                
                return true;
            }
            
            return false;
            
            
        } 


    
    }


    
    
    /* End of file ModelName.php */
 