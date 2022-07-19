<?php

defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class StockBarangClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');

        $this->API = base_url('StockBarang');
        $this->API2 = base_url('Kategori');
        // $this->API = "http://localhost:8080/dummyTA/stockbarang";
        // $this->API2 = "http://localhost:8080/dummyTA/kategori";
    }

    public function index()
    {
        $data['stockbarang'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Stock Barang";
        $this->load->view('header0');
        $this->load->view('data/stock_barang', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }


    public function indexproduksi()
    {
        $data['stockbarang'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Stock Barang";
        $this->load->view('header1');
        $this->load->view('staffproduksi/stock_barang', $data);
        $this->load->view('barproduksi');
        $this->load->view('footer');
    }

    public function indexgudang()
    {
        $data['stockbarang'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Stock Barang";
        $this->load->view('header1');
        $this->load->view('staffgudang/stock_barang', $data);
        $this->load->view('bargudang');
        $this->load->view('footer');
    }


    public function indexpengiriman()
    {
        $data['stockbarang'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Stock Barang";
        $this->load->view('header1');
        $this->load->view('staffpengiriman/stock_barang', $data);
        $this->load->view('barpengiriman');
        $this->load->view('footer');
    }




    public function post()
    {
        $data['stockbarang'] = json_decode($this->curl->simple_get($this->API));
        $data['kategori'] = json_decode($this->curl->simple_get($this->API2));
        $data['title'] = "Tambah Data Detai Produksi";
        $this->load->view('header0');
        $this->load->view('data/post/stock_barang', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }


    public function poststock()
    {
        $data['stockbarang'] = json_decode($this->curl->simple_get($this->API));
        $data['kategori'] = json_decode($this->curl->simple_get($this->API2));
        $data['title'] = "Tambah Data Detai Produksi";
        $this->load->view('header1');
        $this->load->view('staffgudang/post/stock_barang', $data);
        $this->load->view('bargudang');
        $this->load->view('footer');
    }
    public function post_process()
    {
        $data = array(

            'id_bahanbaku'            => $this->input->post('id_bahanbaku'),
            'tanggal_stockgudang'            => $this->input->post('tanggal_stockgudang'),
            'stock_pabrik'            => $this->input->post('stock_pabrik'),
            'data_stockrejetgudang'            => $this->input->post('data_stockrejetgudang'),
            'barang_pakai'            => $this->input->post('barang_pakai'),
            'data_stockrejetproduksi'            => $this->input->post('data_stockrejetproduksi'),

        );


        $insert =  $this->curl->simple_post($this->API, $data);

        // print_r($data);
        // exit;

        if ($insert) {
            echo "berhasil";
            $this->session->set_flashdata('result', 'Data Kategori Berhasil Ditambahkan');
        } else {
            echo "gagal";
            $this->session->set_flashdata('result', 'Data Kategori Gagal Ditambahkan');
        }
        // print_r($data);
        // die;
        redirect('StockBarangClient');
    }
    public function post_processstock()
    {
        $data = array(


            'id_bahanbaku'            => $this->input->post('id_bahanbaku'),
            'tanggal_stockgudang'            => $this->input->post('tanggal_stockgudang'),
            'stock_pabrik'            => $this->input->post('stock_pabrik'),
            'data_stockrejetgudang'            => $this->input->post('data_stockrejetgudang'),
            'barang_pakai'            => $this->input->post('barang_pakai'),
            'data_stockrejetproduksi'            => $this->input->post('data_stockrejetproduksi'),

        );
        $insert =  $this->curl->simple_post($this->API, $data);
        // print_r($data);
        // exit;

        if ($insert) {
            echo "berhasil";
            $this->session->set_flashdata('result', 'Data Kategori Berhasil Ditambahkan');
        } else {
            echo "gagal";
            $this->session->set_flashdata('result', 'Data Kategori Gagal Ditambahkan');
        }
        // print_r($data);
        // die;
        redirect('StockBarangClient/indexgudang');
    }






    public function put()
    {
        $params = array('id_detailsuplai' =>  $this->uri->segment(3));
        $data['stockbarang'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['kategori'] = json_decode($this->curl->simple_get($this->API2));
        $data['title'] = "Edit Data Barang";
        $this->load->view('header0');
        $this->load->view('data/put/stock_barang', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }

    public function putstock()
    {
        $params = array('id_detailsuplai' =>  $this->uri->segment(3));
        $data['stockbarang'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['kategori'] = json_decode($this->curl->simple_get($this->API2));
        $data['title'] = "Edit Data Barang";
        $this->load->view('header1');
        $this->load->view('staffgudang/put/stock_barang', $data);
        $this->load->view('bargudang');
        $this->load->view('footer');
    }




    public function put_process()
    {
        $data = array(

            'id_detailsuplai'            => $this->input->post('id_detailsuplai'),
            'id_bahanbaku'            => $this->input->post('id_bahanbaku'),
            'tanggal_stockgudang'            => $this->input->post('tanggal_stockgudang'),
            'stock_pabrik'            => $this->input->post('stock_pabrik'),
            'barang_pakai'            => $this->input->post('barang_pakai'),
            'data_stockrejetgudang'            => $this->input->post('data_stockrejetgudang'),
            'data_stockrejetproduksi'            => $this->input->post('data_stockrejetproduksi'),

        );

        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($update) {
            echo "berhasil";
            // $this->session->set_flashdata('result', 'Update Data kategori Berhasil');
        } else {
            echo "gagal";
            // $this->session->set_flashdata('result', 'Update Data kategori Gagal');
        }
        // print_r($update);
        // die;
        redirect('StockBarangClient');
    }
    public function put_processstock()
    {
        $data = array(

            'id_detailsuplai'            => $this->input->post('id_detailsuplai'),
            'id_bahanbaku'            => $this->input->post('id_bahanbaku'),
            'tanggal_stockgudang'            => $this->input->post('tanggal_stockgudang'),
            'stock_pabrik'            => $this->input->post('stock_pabrik'),
            'barang_pakai'            => $this->input->post('barang_pakai'),
            'data_stockrejetgudang'            => $this->input->post('data_stockrejetgudang'),
            'data_stockrejetproduksi'            => $this->input->post('data_stockrejetproduksi'),
        );

        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
        if ($update) {
            echo "berhasil";
            // $this->session->set_flashdata('result', 'Update Data kategori Berhasil');
        } else {
            echo "gagal";
            // $this->session->set_flashdata('result', 'Update Data kategori Gagal');
        }
        // print_r($update);
        // die;
        redirect('StockBarangClient/indexgudang');
    }

    public function date()
    {
        $stockbarang = json_decode($this->curl->simple_get($this->API));

        foreach ($stockbarang as $s) {
            $data = array(

                'id_detailsuplai'            => $s->id_detailsuplai,
                // 'id_barang'            => $s->id_barang,
                'tanggal_stockgudang'            => date('Y-m-d'),
                'id_bahanbaku'            => $s->id_bahanbaku,
                'stock_pabrik'            => $s->stock_pabrik,
                'data_stockrejetgudang'            => $s->data_stockrejetgudang,
                'data_stockrejetproduksi'            => $s->data_stockrejetproduksi,
                'barang_pakai'            => $s->barang_pakai,

            );

            $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
        }
        redirect('StockBarangClient');
    }

    public function reset()
    {
        $stockbarang = json_decode($this->curl->simple_get($this->API));

        foreach ($stockbarang as $s) {
            $data = array(

                'id_detailsuplai'            => $s->id_detailsuplai,
                // 'id_barang'            => $s->id_barang,
                'tanggal_stockgudang'            => date('Y-m-d'),
                'id_bahanbaku'            => $s->id_bahanbaku,
                'stock_pabrik'            => $s->stock_pabrik,
                'data_stockrejetgudang'            => 0,
                'data_stockrejetproduksi'            => 0,
                'barang_pakai'            => 0,

            );

            $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
        }
        redirect('StockBarangClient');
    }


    public function resetgudang()
    {
        $stockbarang = json_decode($this->curl->simple_get($this->API));

        foreach ($stockbarang as $s) {
            $data = array(

                'id_detailsuplai'            => $s->id_detailsuplai,
                // 'id_barang'            => $s->id_barang,
                'tanggal_stockgudang'            => date('Y-m-d'),
                'id_bahanbaku'            => $s->id_bahanbaku,
                'stock_pabrik'            => $s->stock_pabrik,
                'data_stockrejetgudang'            => 0,
                'data_stockrejetproduksi'            => 0,
                'barang_pakai'            => 0,

            );

            $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
        }
        redirect('StockBarangClient/indexgudang');
    }


    public function dategudang()
    {
        $stockbarang = json_decode($this->curl->simple_get($this->API));

        foreach ($stockbarang as $s) {
            $data = array(

                'id_detailsuplai'            => $s->id_detailsuplai,
                // 'id_barang'            => $s->id_barang,
                'tanggal_stockgudang'            => date('Y-m-d'),
                'id_bahanbaku'            => $s->id_bahanbaku,
                'stock_pabrik'            => $s->stock_pabrik,
                'data_stockrejetgudang'            => $s->data_stockrejetgudang,
                'data_stockrejetproduksi'            => $s->data_stockrejetproduksi,
                'barang_pakai'            => $s->barang_pakai,

            );

            $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));
        }
        redirect('StockBarangClient/indexgudang');
    }




    public function delete()
    {
        $params = array('id_detailsuplai' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data kategori Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data kategori Gagal');
        }
        // print_r($delete);
        // die;
        redirect('StockBarangClient');
    }
    public function deletestock()
    {
        $params = array('id_detailsuplai' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data kategori Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data kategori Gagal');
        }
        // print_r($delete);
        // die;
        redirect('StockBarangClient/indexgudang');
    }








    // cetak pdf
    function exportToPDF()
    {

        // header attribute
        $name_file = 'STOCK BARANG-' . rand(1, 999999) . '-' . date('Y-m-d');

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
        $pdf->Ln(5, false);
        $html = '<table border="0">
        <tr>
            <td align="center"><h2>LAPORAN DATA STOCK PRODUKSI</h2> <br> </td>
        
        </tr>

    
    </table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(5, false);




        // header table
        $table_body = "";
        $data['stockbarang'] = json_decode($this->curl->simple_get($this->API));


        $data_stkbarang = array();

        // pre-processing
        if (count($data['stockbarang']) > 0) {

            foreach ($data['stockbarang'] as $item) {

                $tanggal_stkbarang = strtotime($item->tanggal_stockgudang);


                // user melakukan filter
                if (!empty($tanggal_interval)) {

                    if ($tanggal_stkbarang == $tanggal_awal && $tanggal_stkbarang == $tanggal_akhir) { // apabila sorting hanya 1 hari

                        array_push($data_stkbarang, $item);
                    } else if ($tanggal_stkbarang >= $tanggal_awal && $tanggal_stkbarang <= $tanggal_akhir) { // apabila memiliki interval waktu

                        array_push($data_stkbarang, $item);
                    }
                } else { // user tidak menampilkan filter atau menampilkan keseluruhan

                    array_push($data_stkbarang, $item);
                }
            }
        }



        if (count($data_stkbarang) > 0) {

            $i = 1;
            foreach ($data_stkbarang as $item) {

                $table_body .= '<tr>
            
                <td>' . $i . '</td>
                <td>' . $item->tanggal_stockgudang . '</td>
                <td>' . $item->nama_bahanbaku . '</td>
                <td>' . $item->stock_pabrik . '</td>
                <td>' . $item->barang_pakai . '</td>
                <td>' . $item->data_stockrejetgudang . '</td>
                <td>' . $item->data_stockrejetproduksi . '</td>
                

            
            </tr>';

                $i++;
            }
        }



        $table = '
        <table border="1" width="100%" cellpadding="6">
            <tr>
                <th width="10%" height="20" padding="5" align="center"><b>No</b></th>
                <th width="15%" align="center"><b>Tanggal</b></th>
                <th width="15%" align="center"><b>Nama Barang</b></th>
                <th width="15%" align="center"><b>Stok Barang Gudang</b></th>
                <th width="15%" align="center"><b>Penggunaan Produksi</b></th>
                <th width="15%" align="center"><b>Data Barang Reject Gudang</b></th>
                <th width="15%" align="center"><b>Data Barang Reject Produksi</b></th>
                
        
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
        $pdf->SetAuthor('MILAGROS');
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
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'LAPORAN DATA STOCK PRODUKSI');
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


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B5', 'Tanggal');
        $spreadsheet->getActiveSheet()->mergeCells('B5:C5');
        $spreadsheet->getActiveSheet()->getStyle('B5:C5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('D5', 'Nama Barang');
        $spreadsheet->getActiveSheet()->mergeCells('D5:F5');
        $spreadsheet->getActiveSheet()->getStyle('D5:F5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G5', 'Stok Barang Gudang');
        $spreadsheet->getActiveSheet()->mergeCells('G5:J5');
        $spreadsheet->getActiveSheet()->getStyle('G5:J5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('K5', 'Penggunaan Produksi');
        $spreadsheet->getActiveSheet()->mergeCells('K5:N5');
        $spreadsheet->getActiveSheet()->getStyle('K5:N5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('O5', 'Data Barang Reject Gudang');
        $spreadsheet->getActiveSheet()->mergeCells('O5:R5');
        $spreadsheet->getActiveSheet()->getStyle('O5:R5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('S5', 'Data Barang Reject Produksi');
        $spreadsheet->getActiveSheet()->mergeCells('S5:V5');
        $spreadsheet->getActiveSheet()->getStyle('S5:V5')->applyFromArray($style_header_table);






        // body 
        $baris = 6;
        $urutan = 1;

        $data_stkproduksi = json_decode($this->curl->simple_get($this->API));
        $data['detailstockproduksi'] = json_decode($this->curl->simple_get($this->API));



        foreach ($data_stkproduksi as $isi) {

            // nomor
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A' . $baris, $urutan);
            $spreadsheet->getActiveSheet()->getStyle('A' . $baris)->applyFromArray($style_body_table);


            // tanggal
            $kolom_mergetanggal = 'B' . $baris . ':C' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('B' . $baris, $isi->tanggal_stockgudang);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_mergetanggal);
            $spreadsheet->getActiveSheet()->getStyle($kolom_mergetanggal)->applyFromArray($style_body_table);


            // nama pengawas
            $kolom_pengawas = 'D' . $baris . ':F' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('D' . $baris, $isi->nama_bahanbaku);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_pengawas);
            $spreadsheet->getActiveSheet()->getStyle($kolom_pengawas)->applyFromArray($style_body_table);



            $kolom_shift = 'G' . $baris . ':J' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('G' . $baris, $isi->stock_pabrik);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_shift);
            $spreadsheet->getActiveSheet()->getStyle($kolom_shift)->applyFromArray($style_body_table);



            $kolom_mergetanggal = 'K' . $baris . ':N' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('K' . $baris, $isi->barang_pakai);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_mergetanggal);
            $spreadsheet->getActiveSheet()->getStyle($kolom_mergetanggal)->applyFromArray($style_body_table);



            $kolom_pengawas = 'O' . $baris . ':R' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('O' . $baris, $isi->data_stockrejetgudang);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_pengawas);
            $spreadsheet->getActiveSheet()->getStyle($kolom_pengawas)->applyFromArray($style_body_table);



            $kolom_shift = 'S' . $baris . ':V' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('S' . $baris, $isi->data_stockrejetproduksi);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_shift);
            $spreadsheet->getActiveSheet()->getStyle($kolom_shift)->applyFromArray($style_body_table);




            $urutan++;
            $baris++;
        }
















        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Stock Barang.xlsx"');
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
