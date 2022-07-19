<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Peramalan_model extends CI_Model {
    
        
        function ambil_data() {

            // SELECT peramalan.*, pegawai.nama FROM `peramalan` JOIN pegawai ON pegawai.id = peramalan.id_pegawai;

            // opsi 1 
            $SQL = "SELECT peramalan.*, pegawai.nama FROM `peramalan` JOIN pegawai ON pegawai.id = peramalan.id_pegawai";
            $query = $this->db->query( $SQL );

            // opsi 2
            // $query = $this->db->select('peramalan.*, pegawai.nama')
            //     ->from('peramalan')
            //     ->join('pegawai', 'pegawai.id = peramalan.id_pegawai')
            //     ->get();

            return $query;
        }


        public function ambil_data_id( $id_peramalan ) {

            // $this->db->where('id_peramalan', $id_peramalan);
            // $query = $this->db->get('peramalan');
            // return $query->row_array();


            // opsi 1 
            $SQL = "SELECT peramalan.*, pegawai.nama FROM `peramalan` JOIN pegawai ON pegawai.id = peramalan.id_pegawai
            WHERE id_peramalan = '$id_peramalan'";
            $query = $this->db->query( $SQL );

            return $query->row_array();
        }


        // update status
        public function update( $id_peramalan, $data ){

            $this->db->where('id_peramalan', $id_peramalan)->update('peramalan', $data);
        }





        // ambil data jumlah produksi 
        public function produksi( $tahunAwal = null, $tahunAkhir = null ) {

            if ( empty( $tahunAwal ) && empty($tahunAkhir) ){

                $SQL = "SELECT id_hasilproduksi, MONTH(tanggal) AS m, MONTHNAME(tanggal) AS bulan, YEAR(tanggal) AS tahun, SUM(jumlah_produksi) AS qty 
                        FROM `hasil_produksi` 
                        
                        GROUP BY MONTHNAME(tanggal), YEAR(tanggal) ORDER BY id_hasilproduksi ASC";

            } else {
                if ( $tahunAwal == $tahunAkhir ) {

                    $SQL = "SELECT id_hasilproduksi, MONTH(tanggal) AS m, MONTHNAME(tanggal) AS bulan, YEAR(tanggal) AS tahun, SUM(jumlah_produksi) AS qty 
                        FROM `hasil_produksi` 
                        
                        WHERE YEAR(tanggal) = '$tahunAwal'
                        
                        GROUP BY MONTHNAME(tanggal), YEAR(tanggal) ORDER BY id_hasilproduksi ASC";
                } else {

                    $SQL = "SELECT id_hasilproduksi, MONTH(tanggal) AS m, MONTHNAME(tanggal) AS bulan, YEAR(tanggal) AS tahun, SUM(jumlah_produksi) AS qty 
                        FROM `hasil_produksi` 
                        
                        WHERE YEAR(tanggal) BETWEEN '$tahunAwal' AND '$tahunAkhir'
                        
                        GROUP BY MONTHNAME(tanggal), YEAR(tanggal) ORDER BY id_hasilproduksi ASC";
                }
            }
            

            

            $query = $this->db->query( $SQL );
            return $query;
        }



        // insert hasil peramalan
        function hasil_peramalan( $data ) {

            $this->db->insert( 'peramalan', $data );
            
            return $this->db->insert_id();
        }

        
    }
    
    /* End of file Peramalan_model.php */
    