<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Peramalan extends CI_Controller {
        
        public function __construct() {

            parent::__construct();

            // load model
        $this->API = base_url('PeramalanApi');

            $this->load->library('curl');

            $this->load->model('Peramalan_model');
        }

        public function index(){
            
            $data['title'] = "Peramalan";
            $data['peramalan'] = $this->Peramalan_model->ambil_data();
            
            $this->load->view('header0');
            $this->load->view('peramalan/index', $data, FALSE);
            $this->load->view('baradmin');
        }
        public function index_produksi(){
            
            $data['title'] = "Peramalan";
            $data['peramalan'] = $this->Peramalan_model->ambil_data();
            
            $this->load->view('header1');
            $this->load->view('peramalan/index_produksi', $data, FALSE);
            $this->load->view('barproduksi');
        }


        public function detail( $id_peramalan ) {


            $hasil_peramalan_detail = $this->Peramalan_model->ambil_data_id( $id_peramalan );

            $data['title'] = "Peramalan";
            

            // ambil data pengujian
            $perhitungan = $hasil_peramalan_detail['perhitungan'];
            $pengujian = $hasil_peramalan_detail['pengujian'];

            $data['nama']      = $hasil_peramalan_detail['nama'];

            $data['start'] = $hasil_peramalan_detail['tanggal_awal'];
            $data['end']   = $hasil_peramalan_detail['tanggal_akhir'];
            $data['jenis']   = $hasil_peramalan_detail['jenis_pemulusan'];
            $data['alpha']      = $hasil_peramalan_detail['nilai_pemulusan'];
            $data['perhitungan']  = json_decode($perhitungan);
            $data['pengujian']  = json_decode($pengujian);
            
            $data['status_pengajuan'] = $hasil_peramalan_detail['status_pengajuan'];
            $data['id_peramalan'] = $id_peramalan;
            $data['keterangan'] =  $hasil_peramalan_detail['keterangan'];
            // $data['pengujian']   = $hasil_pengujian;

            
            $this->load->view('header0');
            $this->load->view('peramalan/preview_detail', $data, FALSE);
            $this->load->view('baradmin');
        }


        
        public function detailproduksi( $id_peramalan ) {


            $hasil_peramalan_detail = $this->Peramalan_model->ambil_data_id( $id_peramalan );

            $data['title'] = "Peramalan";
            

            // ambil data pengujian
            $perhitungan = $hasil_peramalan_detail['perhitungan'];
            $pengujian = $hasil_peramalan_detail['pengujian'];

            $data['nama']      = $hasil_peramalan_detail['nama'];

            $data['start'] = $hasil_peramalan_detail['tanggal_awal'];
            $data['end']   = $hasil_peramalan_detail['tanggal_akhir'];
            $data['jenis']   = $hasil_peramalan_detail['jenis_pemulusan'];
            $data['alpha']      = $hasil_peramalan_detail['nilai_pemulusan'];
            $data['perhitungan']  = json_decode($perhitungan);
            $data['pengujian']  = json_decode($pengujian);
            
            $data['status_pengajuan'] = $hasil_peramalan_detail['status_pengajuan'];
            $data['id_peramalan'] = $id_peramalan;
            $data['keterangan'] =  $hasil_peramalan_detail['keterangan'];
            // $data['pengujian']   = $hasil_pengujian;

            
            $this->load->view('header0');
            $this->load->view('peramalan/preview_detailproduksi', $data, FALSE);
            $this->load->view('barproduksi');
        }

        // pengajuan konfirmasi :: manajer
        public function pengajuan( $id_peramalan ) {

            $data = array(

                'status_pengajuan'  => $this->input->post('status_pengajuan'),
                'keterangan'        => $this->input->post('keterangan'),
            );

            $this->Peramalan_model->update( $id_peramalan, $data );
            redirect('peramalan/index/'. $id_peramalan);
        }


        public function tambah() {

            $data['title'] = "Peramalan";
            // $data['peramalan'] = $this->Peramalan_model->ambil_data();
            
            $this->load->view('header0');
            $this->load->view('peramalan/tambah_info', $data, FALSE);
            // $this->load->view('baradmin');
            $this->load->view('barproduksi');
        }


        // proses perhitungan
        function proses_perhitungan() {

            /**
             *  1. Interval waktu
             *  2. Ambil nilai jenis peramalan
             *  3. Hitung Peramalan Triple Exponential
             *  4. Menjadikan data JSON
             *  5. Insert ke database
             */


            // @TODO 1 : Interval Waktu 
            $awal = $this->input->get('start');
            $akhir = $this->input->get('end');

            // @TODO 2 
            $jenis = $this->input->get('pemulusan');
            $alpha = $this->input->get('alpha');


            // @TODO 3 : Hitung Peramalan
            $bulanAwal = date('m', strtotime($awal));
            $tahunAwal = date('Y', strtotime($awal));

            
            $bulanAkhir = date('m', strtotime($akhir));
            $tahunAkhir = date('Y', strtotime($akhir));
            

            /**
             * 
             *  PERSIAPAN DATASET
             */
            
            $startInterval = $this->convertMonthYear( $tahunAwal, $bulanAwal );
            $endInterval = $this->convertMonthYear( $tahunAkhir, $bulanAkhir );


            // data produksi 
            $dt_produksi = $this->Peramalan_model->produksi( $tahunAwal, $tahunAkhir );
            $dataset = [];


            // pembuatan dataset berdasarkan permintaan waktu peramalan
            if ( $dt_produksi->num_rows() > 0 ) {

                foreach ( $dt_produksi->result_array() AS $dt ) {

                    $dt_date = $this->convertMonthYear( $dt['tahun'], intval($dt['m']) );

                    if ( ($dt_date >= $startInterval) && ($endInterval >= $dt_date) ) {

                        array_push( $dataset, array(

                            'tahun' => $dt['tahun'],
                            'bulan'     => $dt['bulan'],
                            'num_bulan' => $dt['m'],
                            'qty'   => $dt['qty']
                        ) );
                    }
                }



            } else{

                echo "Data Produksi Kosong";
            }
            

            

            
            // panggil peramalan
            
            $hasil_peramalan = [];
            $hasil_pengujian = [];

            if ( $jenis == "keseluruhan" ) {

                for ( $i = 1; $i < 10; $i++ ) {

                    $alpha = $i / 10; // 0.1 | 0.2 | 0.3 | 0.4 ---- 0.9
                    $peramalan = $this->forecast_TripleExponentialSmoothing( $dataset, $alpha );


                    $informasi_keseluruhan_peramalan = array(

                        'alpha' => $alpha,
                        'perhitungan'   => $peramalan['perhitungan']
                    );
                    
                    $informasi_keseluruhan_pengujian = array(

                        'alpha' => $alpha,
                        'pengujian'   => $peramalan['pengujian']
                    );

                    array_push( $hasil_peramalan, $informasi_keseluruhan_peramalan );
                    array_push( $hasil_pengujian, $informasi_keseluruhan_pengujian );
                }
            } else {

                $peramalan = $this->forecast_TripleExponentialSmoothing( $dataset, $alpha );
                
                array_push( $hasil_peramalan, $peramalan['perhitungan'] );
                array_push( $hasil_pengujian, $peramalan['pengujian'] );

                

                
            }





            // insert data
            $data_insert = array(

                'id_pegawai'        => $this->session->userdata('id'),
                'tanggal_awal'      => $startInterval,
                'tanggal_akhir'     => $endInterval,
                'jenis_pemulusan'   => $jenis,
                'nilai_pemulusan'   => $alpha,
                'perhitungan'       => json_encode($hasil_peramalan, JSON_PRETTY_PRINT),
                'pengujian'         => json_encode($hasil_pengujian, JSON_PRETTY_PRINT),
            );

            $this->session->set_userdata('peramalan', $data_insert);
            // do insert
            // $id_terakhir = $this->Peramalan_model->hasil_peramalan( $data_insert );

            


            // load view
            $data['title'] = "Peramalan";
            $data['start'] = $awal;
            $data['end']   = $akhir;
            $data['jenis']   = $jenis;
            $data['alpha']   = $this->input->get('alpha');
            $data['pengujian']   = $hasil_pengujian;
            $data['peramalan'] = $hasil_peramalan;

            // header('Content-Type: application/json');
            // print_r( $hasil_peramalan );

            $this->load->view('header0');
            $this->load->view('peramalan/preview_info', $data, FALSE);
            $this->load->view('barproduksi');

            // $this->load->view('baradmin');


            
        }


        // proses simpan 
        public function proses_simpan() {

            header('Content-Type: application/json');
            $hasil = $this->session->userdata('peramalan');

            $this->Peramalan_model->hasil_peramalan( $hasil );

            redirect('peramalan/index_produksi');
        }







        // perhitungan peramalan 
        public function forecast_TripleExponentialSmoothing( $dataset, $a ) {

            

            $hasil = array(); // menampung hasil

            $urutan = 0;
            $temporary_Ft = 0;
            $waktuAkhir = "";
            foreach ( $dataset AS $dp ) {

                if ( $urutan == 0 ) {

                    $peramalan = array(

                        'tahun' => $dp['tahun'],
                        'bulan' => $dp['bulan'],
                        'actual'=> $dp['qty'],
                        'pemulusan_1'=> $dp['qty'],
                        'pemulusan_2'=> $dp['qty'],
                        'pemulusan_3'=> $dp['qty'],
                        'at'   => 0,
                        'bt'   => 0,
                        'ct'   => 0,
                        'Ft'   => 0
                    );


                    // push array $hasil
                    array_push( $hasil, $peramalan );

                } else {

                    // data peramalan sebelumnya
                    $t = $urutan - 1;
                    $St_1 = $hasil[$t];

                    // @TODO 1 : Pemulusan Tunggal - Triple
                    $S1 = ($a * $dp['qty']) + (1 - $a) * $St_1['pemulusan_1'];
                    $S2 = ($a * $S1) + (1 - $a) * $St_1['pemulusan_2'];
                    $S3 = ($a * $S2) + (1 - $a) * $St_1['pemulusan_3'];


                    // @TODO 2 : Nilai at
                    $at = (3 * $S1) - (3 * $S2) + $S3;

                    // @TODO 3 : Nilai bt
                    $bt = ( pow($a, 2) / (2 * (pow((1 - $a), 2))) ) * 
                        ( 
                            ( (6 - (5 * $a)) * $S1 ) - 
                            ( (10 - (8 * $a)) * $S2 ) +
                            ( (4 - (3 * $a)) * $S3 )
                        );

                    // @TODO 4 : Nilai ct
                    $ct = ( pow($a, 2) / (pow((1 - $a), 2)) ) * 
                        ( $S1 - (2 * $S2) + $S3 );


                    // @TODO 5 : Forecasting
                    $Ft = $at + $bt + (0.5 * $ct);

                    $peramalan = array(

                        'tahun' => $dp['tahun'],
                        'bulan' => $dp['bulan'],
                        'actual'=> $dp['qty'],
                        'pemulusan_1'=> $S1,
                        'pemulusan_2'=> $S2,
                        'pemulusan_3'=> $S3,
                        'at'   => $at,
                        'bt'   => $bt,
                        'ct'   => $ct,
                        'Ft'   => $temporary_Ft
                    );


                    // hasil temporary peramalan
                    $waktuAkhir = $dp['tahun'].'-'.$dp['num_bulan'].'-01';
                    // $waktuAkhir = $waktu;
                    $temporary_Ft = $Ft;

                    


                    // push array $hasil
                    array_push( $hasil, $peramalan );

                }
                // increment 
                $urutan++;
            }


            /** Hasil Peramalan pada bulan kedepannya */
            // data peramalan sebelumnya

            // echo $waktuAkhir;
            $waktuAkhir = strtotime( $waktuAkhir );
            $waktuPeramalanFinal = strtotime("next month", $waktuAkhir);
            $peramalan = array(

                'tahun' => date('Y', $waktuPeramalanFinal),
                'bulan' => date('F', $waktuPeramalanFinal),
                'num_bulan' => date('m', $waktuPeramalanFinal),
                'actual'=> "",
                'pemulusan_1'=> "",
                'pemulusan_2'=> "",
                'pemulusan_3'=> "",
                'at'   => "",
                'bt'   => "",
                'ct'   => "",
                'Ft'   => $temporary_Ft
            );


            // push array $hasil
            array_push( $hasil, $peramalan );


            

            /**
             * 
             *  Penyesuaian
             */
            $urutan = 0;

            $actual_forecast = $hasil;

            /**
             * 
             * 
             *  Perhitungan MAPE 
             * 
             * 
             */
            $pengujian = array();
            $total_ape = 0;
            $total_pe = 0;

            $urutan = 0;
            $max = count( $dataset );

            foreach ( $actual_forecast AS $af ) {

                if ( $urutan <= $max ) {

                
                    $PE = "-";
                    $APE = "-";

                    if ( $urutan > 1 ) {

                        if ( $af['actual'] != 0 && !empty($af['actual']) ) {

                            $PE = (( $af['actual'] - $af['Ft'] ) / $af['actual']) * 100;
                            $APE = abs($PE);

                            $total_ape += $APE;
                            $total_pe += $PE;
                        }
                    }


                    $hitung_mape = array(

                        'tahun' => $af['tahun'],
                        'bulan' => $af['bulan'],
                        'actual'=> $af['actual'],
                        'Ft'    => $af['Ft'],
                        'PE'    => $PE,
                        'APE'   => $APE
                    );

                    array_push( $pengujian, $hitung_mape );
                }


                $urutan++;
            }

            $dt_peramalan = count($dataset) - 2;

            $MAPE = $total_ape / $dt_peramalan;
            $MPE = $total_pe / $dt_peramalan;



            // FINAL 
            $hasil_keseluruhan = array(

                'perhitungan'   => $hasil,
                'pengujian'     => $pengujian
            );


            return $hasil_keseluruhan;
            

            // $data_json = json_encode( $data_prediksi, JSON_PRETTY_PRINT );
        }





        function session() {

            print_r( $this->session->userdata() );
        }






        // convert to str between month and year
        function convertMonthYear( $year, $month ) {


            $date = date('Y-m', strtotime( $year.'-'.$month ));
            $result = strtotime($date);

            return $result;
        }



        function algorithm() {

            $data = [

                ["month" => 1, "year" => 2022],
                ["month" => 2, "year" => 2022],
                ["month" => 3, "year" => 2022],
                ["month" => 4, "year" => 2022],
                ["month" => 5, "year" => 2022],
                ["month" => 6, "year" => 2022],
                ["month" => 7, "year" => 2022],
                ["month" => 8, "year" => 2022],
                ["month" => 9, "year" => 2022],
                ["month" => 10, "year" => 2022],
                ["month" => 11, "year" => 2022],
                ["month" => 12, "year" => 2022],

                ["month" => 1, "year" => 2023],
                ["month" => 2, "year" => 2023],
                ["month" => 3, "year" => 2023],
                ["month" => 4, "year" => 2023],
                ["month" => 5, "year" => 2023],
            ];



            $startMonth = 10;
            $startYear  = 2022;
            $startDate = date('Y-m', strtotime( $startYear.'-'.$startMonth ));
            $startStr = strtotime($startDate);

            $endMonth = 3;
            $endYear  = 2023;
            $endDate = date('Y-m', strtotime( $endYear.'-'.$endMonth ));
            $endStr = strtotime($endDate);

            foreach ( $data AS $dt ) {

                $resMonth = $dt['month'];
                $resYear  = $dt['year'];;
                $resDate = date('Y-m', strtotime( $resYear.'-'.$resMonth ));
                $resStr = strtotime($resDate);

                if ( ($resStr >= $startStr) && ($endStr >= $resStr) ) {

                    echo $dt['month'].' '.$dt['year'].'<br>';
                }

            }


            // echo $startStr.' | '.$endStr;
        }


        // function index_delete()
        // {
        //     $id = $this->delete('id_peramalan)');
        //     $this->db->where('id_peramalan', $id);
        //     $delete = $this->db->delete('id_peramalan');
        //     if ($delete) {
        //         $this->response(array('status' => 'success'), 201);
        //     } else {
        //         $this->response(array('status' => 'fail', 502));
        //     }
        // }

        public function delete()
        {
            $params = array('id_peramalan' =>  $this->uri->segment(3));
            $delete =  $this->curl->simple_delete($this->API, $params);
            // var_dump($delete);
            // exit;
            if ($delete) {
                $this->session->set_flashdata('result', 'Hapus Data produksi Berhasil');
            } else {
                $this->session->set_flashdata('result', 'Hapus Data produksi Gagal');
            }
            // print_r($delete);
            // die;
            $this->session->set_flashdata('successdll', 'Data berhasil dihapus.');
            redirect('Peramalan');
        }

        public function deleteproduksi()
        {
            $params = array('id_peramalan' =>  $this->uri->segment(3));
            $delete =  $this->curl->simple_delete($this->API, $params);
            // var_dump($delete);
            // exit;
            if ($delete) {
                $this->session->set_flashdata('result', 'Hapus Data produksi Berhasil');
            } else {
                $this->session->set_flashdata('result', 'Hapus Data produksi Gagal');
            }
            // print_r($delete);
            // die;
            $this->session->set_flashdata('successdll', 'Data berhasil dihapus.');
            redirect('peramalan/index_produksi');
        }
    
    }
    
    /* End of file Peramalan.php */
