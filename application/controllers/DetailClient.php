<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class DetailClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');

        $this->API = base_url('Detail');
        // $this->API = "http://localhost:8080/dummyTA/detail";
    }

    public function index()
    {

        $data['detail'] = json_decode($this->curl->simple_get($this->API));

        $tanggal_interval = $this->input->get('interval-tanggal');

        // apakah user melakuan filter ?
        if ($tanggal_interval) {

            $pisah_waktu = explode('-', $tanggal_interval);

            $tanggal_awal = strtotime($pisah_waktu[0]);
            $tanggal_akhir = strtotime($pisah_waktu[1]);
        }

        $data_detail = array();

        // pre-processing
        if (count($data['detail']) > 0) {

            foreach ($data['detail'] as $item) {

                $tanggal_detail = strtotime($item->tanggal_diterima);


                // user melakukan filter
                if (!empty($tanggal_interval)) {

                    if ($tanggal_detail == $tanggal_awal && $tanggal_detail == $tanggal_akhir) { // apabila sorting hanya 1 hari

                        array_push($data_detail, $item);
                    } else if ($tanggal_detail >= $tanggal_awal && $tanggal_detail <= $tanggal_akhir) { // apabila memiliki interval waktu

                        array_push($data_detail, $item);
                    }
                } else { // user tidak menampilkan filter atau menampilkan keseluruhan

                    array_push($data_detail, $item);
                }
            }
        }


        $data['title'] = "Kategori";
        $data['detail']   = (object) $data_detail; // konversi array ke object

        $this->load->view('header0');
        $this->load->view('data/barang_keluar', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }


    public function indexproduksi()
    {
        $data['detail'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Kategori";
        $this->load->view('header1');
        $this->load->view('staffproduksi/barang_keluar', $data);
        $this->load->view('barproduksi');
        $this->load->view('footer');
    }
    public function indexgudang()
    {
        $data['detail'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Kategori";
        $this->load->view('header1');
        $this->load->view('staffgudang/barang_keluar', $data);
        $this->load->view('bargudang');
        $this->load->view('footer');
    }

    
    public function indexpengiriman()
    {
        $data['detail'] = json_decode($this->curl->simple_get($this->API));

        $tanggal_interval = $this->input->get('interval-tanggal');

        // apakah user melakuan filter ?
        if ($tanggal_interval) {

            $pisah_waktu = explode('-', $tanggal_interval);

            $tanggal_awal = strtotime($pisah_waktu[0]);
            $tanggal_akhir = strtotime($pisah_waktu[1]);
        }

        $data_detail = array();

        // pre-processing
        if (count($data['detail']) > 0) {

            foreach ($data['detail'] as $item) {

                $tanggal_detail = strtotime($item->tanggal_diterima);


                // user melakukan filter
                if (!empty($tanggal_interval)) {

                    if ($tanggal_detail == $tanggal_awal && $tanggal_detail == $tanggal_akhir) { // apabila sorting hanya 1 hari

                        array_push($data_detail, $item);
                    } else if ($tanggal_detail >= $tanggal_awal && $tanggal_detail <= $tanggal_akhir) { // apabila memiliki interval waktu

                        array_push($data_detail, $item);
                    }
                } else { // user tidak menampilkan filter atau menampilkan keseluruhan

                    array_push($data_detail, $item);
                }
            }
        }

        $data['title'] = "Kategori";
        $data['detail']   = (object) $data_detail; // konversi array ke object

        $this->load->view('header1');
        $this->load->view('staffpengiriman/barang_keluar', $data);
        $this->load->view('barpengiriman');
        $this->load->view('footer');
    }



    public function delete()
    {
        $params = array('id_detailpengiriman' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data produksi Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data produksi Gagal');
        }
        // print_r($delete);
        // die;
        redirect('DetailClient/index');
    }



    public function deletestaffpengiriman()
    {
        $params = array('id_detailpengiriman' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data produksi Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data produksi Gagal');
        }
        // print_r($delete);
        // die;
        redirect('DetailClient/indexpengiriman');
    }




    // cetak pdf
    function exportToPDF()
    {



        // header attribute
        $name_file = 'Status Pengiriman-' . rand(1, 999999) . '-' . date('Y-m-d');

        $tanggal_interval = $this->input->get('interval-tanggal');

        // apakah user melakuan filter ?
        if ($tanggal_interval) {

            $pisah_waktu = explode('-', $tanggal_interval);

            $tanggal_awal = strtotime($pisah_waktu[0]);
            $tanggal_akhir = strtotime($pisah_waktu[1]);
        }

        $pdf = $this->header_attr($name_file);

        // add a page
        $pdf->AddPage('L', 'A4');


        // Sub header
        // $pdf->Ln(5, false);
        $html = '<table border="0">
        <tr>
            <td align="center"><h2>LAPORAN STATUS PENGIRIMAN</h2> <br> </td>
        
        </tr>

    
    </table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(5, false);




        // header table
        $table_body = "";
        $data['detail'] = json_decode($this->curl->simple_get($this->API));

        $data_detail = array();

        // pre-processing
        if (count($data['detail']) > 0) {

            foreach ($data['detail'] as $item) {

                $tanggal_detail = strtotime($item->tanggal_diterima);


                // user melakukan filter
                if (!empty($tanggal_interval)) {

                    if ($tanggal_detail == $tanggal_awal && $tanggal_detail == $tanggal_akhir) { // apabila sorting hanya 1 hari

                        array_push($data_detail, $item);
                    } else if ($tanggal_detail >= $tanggal_awal && $tanggal_detail <= $tanggal_akhir) { // apabila memiliki interval waktu

                        array_push($data_detail, $item);
                    }
                } else { // user tidak menampilkan filter atau menampilkan keseluruhan

                    array_push($data_detail, $item);
                }
            }
        }


        if (count($data_detail) > 0) {

            $i = 1;
            foreach ($data_detail as $item) {

                $table_body .= '<tr>
          
              <td>' . $i . '</td>
              <td>' . $item->nama_staff . '</td>
              <td>' . $item->no_hp . '</td>
              <td>' . $item->tujuan_pengiriman . '</td>
              <td>' . $item->jumlah_pengiriman . '</td>
              <td>' . $item->jeniskendaraan . '</td>
              <td>' . $item->no_kendaraan . '</td>
              <td>' . $item->tanggal_masuk . '</td>
              <td>' . $item->tanggal_diterima . '</td>
              <td>' . $item->status . '</td>

          </tr>';

                $i++;
            }
        }



        $table = '
        <table border="1" width="100%" cellpadding="6">
            <tr>
                <th width="5%" height="20" padding="5" align="center"><b>No</b></th>
                <th width="15%" align="center"><b>Nama Pengirim</b></th>
                <th width="10%" align="center"><b>Nomor Hp Petugas</b></th>
                <th width="10%" align="center"><b>Tujuan Pengiriman</b></th>
                <th width="10%" align="center"><b>Jumlah</b></th>
                <th width="10%" align="center"><b>Jenis Kendaraan</b></th>
                <th width="10%" align="center"><b>Nomor Kendaraan</b></th>
                <th width="10%" align="center"><b>Tanggal Pengiriman</b></th>
                <th width="10%" align="center"><b>Tanggal Barang Diterima</b></th>
                <th width="10%" align="center"><b>Status Pengiriman</b></th>
                
        
            </tr>
            ' . $table_body . '
        </table>';

        $pdf->writeHTML($table, true, false, true, false, '');



        $pdf->Ln(10, false);
        $ttd = '
        <table border="0">
            <tr>
                <td colspan="2" align="right">,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' . date('Y') . '</td>
            </tr>
            <tr>
                <td colspan="2" height="80"></td>
            </tr>
            <tr>
                <td width="75%"></td>
                <td width="20%" align="center">(. . . . . . . . . . . . . . . . .)</td>
            </tr>
        </table>
    ';

        $pdf->writeHTML($ttd, true, false, true, false, '');


        // output
        $pdf->Output($name_file . '.pdf', 'I');
    }


    // header attr
    function header_attr($title)
    {

        // create new PDF document
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dwi Nur Cahyo');
        $pdf->SetTitle($title);
        // $pdf->SetSubject('TCPDF Tutorial');
        // $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 006', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('times', '', 10);

        return $pdf;
    }

    // cetak excel
    function exportToExcel()
    {


        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('PT.Milagos')
            ->setLastModifiedBy('Haris')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');



        // Header
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'LAPORAN DATA PRODUKSI');
        $spreadsheet->getActiveSheet()->mergeCells('A1:M1');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(14); // set font



        // Subheader
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'Melaporkan hasil pencatatan hasil produksi');
        $spreadsheet->getActiveSheet()->mergeCells('A2:M2');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(false); // set bold
        $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // set font




        // start content
        $style_header_table = array(

            'font' => array('bold' => true, 'size' => 12), // Set font nya jadi bold
            'alignment'      => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top'   => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left'  => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );


        $style_body_table = array(

            'font' => array('false' => true, 'size' => 12), // Set font nya jadi bold
            'alignment'      => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top'   => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left'  => array('borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );




        // header table
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A5', 'No');
        $spreadsheet->getActiveSheet()->getStyle('A5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B5', 'Nama Pengirim');
        $spreadsheet->getActiveSheet()->mergeCells('B5:D5');
        $spreadsheet->getActiveSheet()->getStyle('B5:D5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('E5', 'Nomor HP Petugas');
        $spreadsheet->getActiveSheet()->mergeCells('E5:F5');
        $spreadsheet->getActiveSheet()->getStyle('E5:F5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G5', 'Tujuan');
        $spreadsheet->getActiveSheet()->mergeCells('G5:H5');
        $spreadsheet->getActiveSheet()->getStyle('G5:H5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('I5', 'Jumlah');
        $spreadsheet->getActiveSheet()->mergeCells('I5:J5');
        $spreadsheet->getActiveSheet()->getStyle('I5:J5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('K5', 'Jenis Kendaraan');
        $spreadsheet->getActiveSheet()->mergeCells('K5:L5');
        $spreadsheet->getActiveSheet()->getStyle('K5:L5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('M5', 'Nomor Kendaraan');
        $spreadsheet->getActiveSheet()->mergeCells('M5:N5');
        $spreadsheet->getActiveSheet()->getStyle('M5:N5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('O5', 'Tanggal');
        $spreadsheet->getActiveSheet()->mergeCells('O5:P5');
        $spreadsheet->getActiveSheet()->getStyle('O5:P5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('Q5', 'Tanggal Diterima');
        $spreadsheet->getActiveSheet()->mergeCells('Q5:R5');
        $spreadsheet->getActiveSheet()->getStyle('Q5:R5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('S5', 'Status Pengiriman');
        $spreadsheet->getActiveSheet()->mergeCells('S5:V5');
        $spreadsheet->getActiveSheet()->getStyle('S5:V5')->applyFromArray($style_header_table);



        // body 
        $baris = 6;
        $urutan = 1;

        $data['detail'] = json_decode($this->curl->simple_get($this->API));

        $tanggal_interval = $this->input->get('interval-tanggal');

        // apakah user melakuan filter ?
        if ($tanggal_interval) {

            $pisah_waktu = explode('-', $tanggal_interval);

            $tanggal_awal = strtotime($pisah_waktu[0]);
            $tanggal_akhir = strtotime($pisah_waktu[1]);
        }


        $data_detail = array();

        // pre-processing
        if (count($data['detail']) > 0) {

            foreach ($data['detail'] as $item) {

                $tanggal_detail = strtotime($item->tanggal_diterima);


                // user melakukan filter
                if (!empty($tanggal_interval)) {

                    if ($tanggal_detail == $tanggal_awal && $tanggal_detail == $tanggal_akhir) { // apabila sorting hanya 1 hari

                        array_push($data_detail, $item);
                    } else if ($tanggal_detail >= $tanggal_awal && $tanggal_detail <= $tanggal_akhir) { // apabila memiliki interval waktu

                        array_push($data_detail, $item);
                    }
                } else { // user tidak menampilkan filter atau menampilkan keseluruhan

                    array_push($data_detail, $item);
                }
            }
        }

        // $detail = json_decode($this->curl->simple_get($this->API));
        foreach ($data_detail as $isi) {

            // nomor
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A' . $baris, $urutan);
            $spreadsheet->getActiveSheet()->getStyle('A' . $baris)->applyFromArray($style_body_table);


            // nama Pengirim
            $kolom_nama_staff = 'B' . $baris . ':C' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('B' . $baris, $isi->nama_staff);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_nama_staff);
            $spreadsheet->getActiveSheet()->getStyle($kolom_nama_staff)->applyFromArray($style_body_table);


            // NO HP
            $kolom_nohp = 'D' . $baris . ':F' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('D' . $baris, $isi->no_hp);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_nohp);
            $spreadsheet->getActiveSheet()->getStyle($kolom_nohp)->applyFromArray($style_body_table);


            // Tujuan
            $kolom_tujuan = 'G' . $baris . ':H' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('G' . $baris, $isi->tujuan_pengiriman);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_tujuan);
            $spreadsheet->getActiveSheet()->getStyle($kolom_tujuan)->applyFromArray($style_body_table);


            // Jumlah
            $kolom_jml = 'I' . $baris . ':J' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('I' . $baris, $isi->jumlah_pengiriman . ' item');
            $spreadsheet->getActiveSheet()->mergeCells($kolom_jml);
            $spreadsheet->getActiveSheet()->getStyle($kolom_jml)->applyFromArray($style_body_table);



            // Jenis Kendaraan
            $kolom_jeniskendaraan = 'K' . $baris . ':L' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('K' . $baris, $isi->jeniskendaraan);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_jeniskendaraan);
            $spreadsheet->getActiveSheet()->getStyle($kolom_jeniskendaraan)->applyFromArray($style_body_table);


            // Nomor Kendaraan
            $kolom_nokendaraan = 'M' . $baris . ':N' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('M' . $baris, $isi->no_kendaraan);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_nokendaraan);
            $spreadsheet->getActiveSheet()->getStyle($kolom_nokendaraan)->applyFromArray($style_body_table);


            // Tanggal
            $kolom_tgl = 'O' . $baris . ':P' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('O' . $baris, $isi->tanggal_masuk);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_tgl);
            $spreadsheet->getActiveSheet()->getStyle($kolom_tgl)->applyFromArray($style_body_table);


            // Tanggal diterima
            $kolom_tglsampai = 'Q' . $baris . ':R' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('Q' . $baris, $isi->tanggal_diterima);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_tglsampai);
            $spreadsheet->getActiveSheet()->getStyle($kolom_tglsampai)->applyFromArray($style_body_table);


            // Status
            $kolom_status = 'S' . $baris . ':V' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('S' . $baris, $isi->status);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_status);
            $spreadsheet->getActiveSheet()->getStyle($kolom_status)->applyFromArray($style_body_table);



            $urutan++;
            $baris++;
        }
















        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Status Pengiriman.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}
