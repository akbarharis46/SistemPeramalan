<?php


// require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

defined('BASEPATH') or exit('No direct script access allowed');




class BarangClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');


        $this->API = base_url('Barang');
        $this->API2 = base_url('Kategori');
        $this->API3 = base_url('Driver');
    }

    public function index()
    {
        $data['barang'] = json_decode($this->curl->simple_get($this->API));

        // filter
        $tanggal_interval = $this->input->get('interval-tanggal');

        // apakah user melakuan filter ?
        if ($tanggal_interval) {

            $pisah_waktu = explode('-', $tanggal_interval);

            $tanggal_awal = strtotime($pisah_waktu[0]);
            $tanggal_akhir = strtotime($pisah_waktu[1]);
        }



        $data_barang = array();

        // pre-processing
        if (count($data['barang']) > 0) {

            foreach ($data['barang'] as $item) {

                $tanggal_barang = strtotime($item->tanggal);



                if (!empty($tanggal_interval)) {

                    if ($tanggal_barang == $tanggal_awal && $tanggal_barang == $tanggal_akhir) {

                        array_push($data_barang, $item);
                    } else if ($tanggal_barang >= $tanggal_awal && $tanggal_barang <= $tanggal_akhir) {

                        array_push($data_barang, $item);
                    }
                } else {

                    array_push($data_barang, $item);
                }
            }
        }


        $data['title'] = "barang";
        $data['barang']   = (object) $data_barang; // konversi array ke object
        $this->load->view('header0');
        $this->load->view('data/barang', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }


    public function indexproduksi()
    {
        $data['barang'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "barang";
        $this->load->view('header1');
        $this->load->view('staffproduksi/barang', $data);
        $this->load->view('barproduksi');
        $this->load->view('footer');
    }

    public function indexgudang()
    {
        $data['barang'] = json_decode($this->curl->simple_get($this->API));

        // filter
        $tanggal_interval = $this->input->get('interval-tanggal');

        // apakah user melakuan filter ?
        if ($tanggal_interval) {

            $pisah_waktu = explode('-', $tanggal_interval);

            $tanggal_awal = strtotime($pisah_waktu[0]);
            $tanggal_akhir = strtotime($pisah_waktu[1]);
        }



        $data_barang = array();

        // pre-processing
        if (count($data['barang']) > 0) {

            foreach ($data['barang'] as $item) {

                $tanggal_barang = strtotime($item->tanggal);



                if (!empty($tanggal_interval)) {

                    if ($tanggal_barang == $tanggal_awal && $tanggal_barang == $tanggal_akhir) {

                        array_push($data_barang, $item);
                    } else if ($tanggal_barang >= $tanggal_awal && $tanggal_barang <= $tanggal_akhir) {

                        array_push($data_barang, $item);
                    }
                } else {

                    array_push($data_barang, $item);
                }
            }
        }


        $data['title'] = "barang";
        $data['barang']   = (object) $data_barang; // konversi array ke object

        $this->load->view('header1');
        $this->load->view('staffgudang/barang', $data);
        $this->load->view('bargudang');
        $this->load->view('footer');
    }


    public function indexpengiriman()
    {
        $data['barang'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "barang";
        $this->load->view('header1');
        $this->load->view('staffpengiriman/barang', $data);
        $this->load->view('barpengiriman');
        $this->load->view('footer');
    }


    public function post()
    {
        $data['kategori'] = json_decode($this->curl->simple_get($this->API2));
        $data['driver'] = json_decode($this->curl->simple_get($this->API3));
        $data['barang'] = json_decode($this->curl->simple_get($this->API));
        $data['count'] = $this->input->post('count');
        $data['title'] = "Tambah Data barang";
        $this->load->view('header0');
        $this->load->view('data/post/barang', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }


    public function postbarang()
    {
        $data['kategori'] = json_decode($this->curl->simple_get($this->API2));
        $data['driver'] = json_decode($this->curl->simple_get($this->API3));
        $data['barang'] = json_decode($this->curl->simple_get($this->API));
        $data['count'] = $this->input->post('count');
        $data['title'] = "Tambah Data barang";
        $this->load->view('header1');
        $this->load->view('staffgudang/post/barang', $data);
        $this->load->view('bargudang');
        $this->load->view('footer');
    }


    public function post_process()
    {
        $count = count($this->input->post('vendor'));

        for ($i = 0; $i < $count; $i++) {
            $data = array(
                'vendor'                  => $this->input->post('vendor')[$i],
                'id_driver'            => $this->input->post('id_driver')[$i],
                'shift'                  => $this->input->post('shift')[$i],
                'id_bahanbaku'           => $this->input->post('id_bahanbaku')[$i],
                'total'                  => $this->input->post('total')[$i],
                'barang_rejectgudang'     => $this->input->post('barang_rejectgudang')[$i],
                'tanggal'                  => date('Y-m-d'),

            );

            $insert =  $this->curl->simple_post($this->API, $data);

            $detail_suplai = $this->db->get_where('detail_suplai', ['id_bahanbaku' => $data['id_bahanbaku']])->row_array();

            //update stok
            $id = $detail_suplai['id_detailsuplai'];
            $data = array(
                'tanggal_stockgudang'            => date('Y-m-d'),
                'stock_pabrik'            => $detail_suplai['stock_pabrik'] + $data['total'],
                'data_stockrejetgudang'            => $detail_suplai['data_stockrejetgudang'] + $data['barang_rejectgudang'],

            );

            $this->db->where('id_detailsuplai', $id);
            $update = $this->db->update('detail_suplai', $data);
        }

        if ($insert) {
            // echo"berhasil";
            $this->session->set_flashdata('result', 'Data Kategori Berhasil Ditambahkan');
        } else {
            // echo"gagal berhasil";
            $this->session->set_flashdata('result', 'Data Kategori Gagal Ditambahkan');
        }
        // print_r($insert);
        // die;
        $this->session->set_flashdata('successAdd', 'Data berhasil ditambah.');
        redirect('BarangClient');
    }

    public function post_processbarang()
    {

        $count = count($this->input->post('vendor'));


        $total = 0;
        for ($i = 0; $i < $count; $i++) {
            $nama_bahanbaku = $this->input->post('nama_bahanbaku')[$i];
            $data = array(
                'vendor'                  => $this->input->post('vendor')[$i],
                'id_driver'            => $this->input->post('id_driver')[$i],
                'shift'                  => $this->input->post('shift')[$i],
                'id_bahanbaku'           => $this->input->post('id_bahanbaku')[$i],
                'total'                  => $this->input->post('total')[$i],
                'barang_rejectgudang'     => $this->input->post('barang_rejectgudang')[$i],
                'tanggal'                  => date('Y-m-d'),

            );

            $insert =  $this->curl->simple_post($this->API, $data);

            $detail_suplai = $this->db->get_where('detail_suplai', ['id_bahanbaku' => $data['id_bahanbaku']])->row_array();

            //update stok
            $id = $detail_suplai['id_detailsuplai'];
            $data = array(
                'tanggal_stockgudang'            => date('Y-m-d'),
                'stock_pabrik'            => $detail_suplai['stock_pabrik'] + $data['total'],
                'data_stockrejetgudang'            => $detail_suplai['data_stockrejetgudang'] + $data['barang_rejectgudang'],

            );

            $this->db->where('id_detailsuplai', $id);
            $update = $this->db->update('detail_suplai', $data);


            $msg = "Tambahan Gudang baru sebanyak " . $nama_bahanbaku;
            $dataNotify = [

                'receiver'  => "admin",
                'nama'      => "Tambah Barang Baru",
                'notes'     => "Telah dibuat  " . $this->input->post('nama_bahanbaku')[$i] . " baru dengan total " . $this->input->post('total')[$i],
                'url'       => base_url('BarangClient')
            ];
            addNewNotify($dataNotify, $msg);
        }

        if ($insert) {
            // echo"berhasil";
            $this->session->set_flashdata('result', 'Data Kategori Berhasil Ditambahkan');
        } else {
            // echo"gagal berhasil";jml_produksi
            $this->session->set_flashdata('result', 'Data Kategori Gagal Ditambahkan');
        }
        // print_r($insert);
        // die;

        // add notify

        $this->session->set_flashdata('successAdd', 'Data berhasil ditambah.');
        redirect('BarangClient/indexgudang');
    }

    public function put()
    {
        $params = array('id_detailsuplaimasuk' =>  $this->uri->segment(3));
        $data['kategori'] = json_decode($this->curl->simple_get($this->API2));
        $data['barang'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['driver'] = json_decode($this->curl->simple_get($this->API3));
        $data['title'] = "Edit Data Barang";
        $this->load->view('header0');
        $this->load->view('data/put/barang', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }


    public function putbarang()
    {
        $params = array('id_detailsuplaimasuk' =>  $this->uri->segment(3));
        $data['kategori'] = json_decode($this->curl->simple_get($this->API2));
        $data['barang'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['driver'] = json_decode($this->curl->simple_get($this->API3));
        $data['title'] = "Edit Data Barang";
        $this->load->view('header1');
        $this->load->view('staffgudang/put/barang', $data);
        $this->load->view('bargudang');
        $this->load->view('footer');
    }


    public function put_process()
    {
        $data = array(

            'id_detailsuplaimasuk'            => $this->input->post('id_detailsuplaimasuk'),
            'vendor'                  => $this->input->post('vendor'),
            'id_driver'            => $this->input->post('id_driver'),
            'shift'                  => $this->input->post('shift'),
            'id_bahanbaku'           => $this->input->post('id_bahanbaku'),
            'total'                  => $this->input->post('total'),
            'barang_rejectgudang'     => $this->input->post('barang_rejectgudang'),
            'tanggal'                  => date('Y-m-d'),
        );

        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));

        $detail_suplai = $this->db->get_where('detail_suplai', ['id_bahanbaku' => $data['id_bahanbaku']])->row_array();

        //update stok
        $id = $detail_suplai['id_detailsuplai'];
        $data = array(
            'tanggal_stockgudang'            => date('Y-m-d'),
            'stock_pabrik'            => $detail_suplai['stock_pabrik'] + ($data['total'] - $this->input->post('total_lama')),
            'data_stockrejetgudang'            => $detail_suplai['data_stockrejetgudang'] + ($data['barang_rejectgudang'] - $this->input->post('barang_rejectgudang_lama')),

        );

        $this->db->where('id_detailsuplai', $id);
        $update = $this->db->update('detail_suplai', $data);

        if ($update) {
            echo "berhasil";
            // $this->session->set_flashdata('result', 'Update Data kategori Berhasil');
        } else {
            echo "gagal";
            // $this->session->set_flashdata('result', 'Update Data kategori Gagal');
        }
        // print_r($update);
        // die;
        $this->session->set_flashdata('successEdd', 'Data berhasil Diubah.');
        redirect('BarangClient');
    }



    public function put_processbarang()
    {
        $data = array(

            'id_detailsuplaimasuk'            => $this->input->post('id_detailsuplaimasuk'),
            'vendor'                  => $this->input->post('vendor'),
            'id_driver'            => $this->input->post('id_driver'),
            'shift'                  => $this->input->post('shift'),
            'id_bahanbaku'           => $this->input->post('id_bahanbaku'),
            'total'                  => $this->input->post('total'),
            'barang_rejectgudang'     => $this->input->post('barang_rejectgudang'),
            'tanggal'                  => date('Y-m-d'),
        );

        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));

        $detail_suplai = $this->db->get_where('detail_suplai', ['id_bahanbaku' => $data['id_bahanbaku']])->row_array();

        //update stok
        $id = $detail_suplai['id_detailsuplai'];
        $data = array(
            'tanggal_stockgudang'            => date('Y-m-d'),
            'stock_pabrik'            => $detail_suplai['stock_pabrik'] + ($data['total'] - $this->input->post('total_lama')),
            'data_stockrejetgudang'            => $detail_suplai['data_stockrejetgudang'] + ($data['barang_rejectgudang'] - $this->input->post('barang_rejectgudang_lama')),

        );

        $this->db->where('id_detailsuplai', $id);
        $update = $this->db->update('detail_suplai', $data);

        if ($update) {
            echo "berhasil";
            // $this->session->set_flashdata('result', 'Update Data kategori Berhasil');
        } else {
            echo "gagal";
            // $this->session->set_flashdata('result', 'Update Data kategori Gagal');
        }
        // print_r($update);
        // die;
        $this->session->set_flashdata('successEdd', 'Data berhasil Diubah.');
        redirect('BarangClient/indexgudang');
    }






    public function delete()
    {
        $params = array('id_detailsuplaimasuk' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data kategori Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data kategori Gagal');
        }
        // print_r($delete);
        // die;
        $this->session->set_flashdata('successdll', 'Data berhasil dihapus.');
        redirect('BarangClient');
    }



    public function deletebarang()
    {
        $params = array('id_detailsuplaimasuk' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data kategori Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data kategori Gagal');
        }
        // print_r($delete);
        // die;
        $this->session->set_flashdata('successdll', 'Data berhasil dihapus.');
        redirect('BarangClient/indexgudang');
    }








    // cetak pdf
    function exportToPDF()
    {



        // header attribute
        $name_file = 'Barang Masuk-' . rand(1, 999999) . '-' . date('Y-m-d');

        $tanggal_interval = $this->input->get('interval-tanggal');

        // apakah user melakuan filter ?
        if ($tanggal_interval) {

            $pisah_waktu = explode('-', $tanggal_interval);

            $tanggal_awal = strtotime($pisah_waktu[0]);
            $tanggal_akhir = strtotime($pisah_waktu[1]);
        }


        $pdf = $this->header_attr($name_file);

        // add a page
        $pdf->AddPage('P', 'A4');

        // Sub header
        //$pdf->Ln(5, false);
        $html = '<table border="0">
        <tr>
            <td align="center"><h2>LAPORAN DATA BARANG MASUK</h2> <br> </td>
        
        </tr>

    
    </table>';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(5, false);




        // header table
        $table_body = "";
        $data['barang'] = json_decode($this->curl->simple_get($this->API));


        $data_barang = array();

        // pre-processing
        if (count($data['barang']) > 0) {

            foreach ($data['barang'] as $item) {

                $tanggal_barang = strtotime($item->tanggal);



                if (!empty($tanggal_interval)) {

                    if ($tanggal_barang == $tanggal_awal && $tanggal_barang == $tanggal_akhir) {

                        array_push($data_barang, $item);
                    } else if ($tanggal_barang >= $tanggal_awal && $tanggal_barang <= $tanggal_akhir) {

                        array_push($data_barang, $item);
                    }
                } else {

                    array_push($data_barang, $item);
                }
            }
        }




        if (count($data_barang) > 0) {

            $i = 1;
            foreach ($data_barang as $item) {

                $table_body .= '<tr>
          
              <td>' . $i . '</td>
              <td>' . $item->tanggal . '</td>
              <td>' . $item->vendor . '</td>
              <td>' . $item->nama_staff . '</td>
              <td>' . $item->shift . '</td>
              <td>' . $item->nama_bahanbaku . '</td>
              <td>' . $item->total . '</td>
              <td>' . $item->barang_rejectgudang . '</td>


              
          </tr>';

                $i++;
            }
        }



        $table = '
        <table border="1" width="100%" cellpadding="6">
            <tr>
                <th width="5%" height="20" padding="5" align="center"><b>No</b></th>
                <th width="10%" align="center"><b>Tanggal</b></th>
                <th width="15%" align="center"><b>Vendor</b></th>
                <th width="15%" align="center"><b>Nama Driver</b></th>
                <th width="10%" align="center"><b>Shift</b></th>
                <th width="15%" align="center"><b>Nama Barang</b></th>
                <th width="15%" align="center"><b>Jumlah Barang Masuk</b></th>
                <th width="15%" align="center"><b>Brang Reject Masuk</b></th>
        
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
        $pdf->SetAuthor('PT MILAGROS');
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
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'LAPORAN DATA BARANG MASUK');
        $spreadsheet->getActiveSheet()->mergeCells('A1:M1');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(14); // set font



        // Subheader
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'Melaporkan pencatatan barang masuk');
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


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('D5', 'Vendor');
        $spreadsheet->getActiveSheet()->mergeCells('D5:G5');
        $spreadsheet->getActiveSheet()->getStyle('D5:G5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('H5', 'Nama Driver');
        $spreadsheet->getActiveSheet()->mergeCells('H5:J5');
        $spreadsheet->getActiveSheet()->getStyle('H5:J5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('K5', 'Shift');
        $spreadsheet->getActiveSheet()->mergeCells('K5:L5');
        $spreadsheet->getActiveSheet()->getStyle('K5:L5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('M5', 'Nama Barang');
        $spreadsheet->getActiveSheet()->mergeCells('M5:N5');
        $spreadsheet->getActiveSheet()->getStyle('M5:N5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('O5', 'Jumlah Barang Masuk');
        $spreadsheet->getActiveSheet()->mergeCells('O5:Q5');
        $spreadsheet->getActiveSheet()->getStyle('O5:Q5')->applyFromArray($style_header_table);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('R5', 'Barang Masuk Reject');
        $spreadsheet->getActiveSheet()->mergeCells('R5:T5');
        $spreadsheet->getActiveSheet()->getStyle('R5:T5')->applyFromArray($style_header_table);



        // body 
        $baris = 6;
        $urutan = 1;

        $data['barang'] = json_decode($this->curl->simple_get($this->API));

        // filter
        $tanggal_interval = $this->input->get('interval-tanggal');

        // apakah user melakuan filter ?
        if ($tanggal_interval) {

            $pisah_waktu = explode('-', $tanggal_interval);

            $tanggal_awal = strtotime($pisah_waktu[0]);
            $tanggal_akhir = strtotime($pisah_waktu[1]);
        }



        $data_barang = array();

        // pre-processing
        if (count($data['barang']) > 0) {

            foreach ($data['barang'] as $item) {

                $tanggal_barang = strtotime($item->tanggal);


                // user melakukan filter
                if (!empty($tanggal_interval)) {

                    if ($tanggal_barang == $tanggal_awal && $tanggal_barang == $tanggal_akhir) { // apabila sorting hanya 1 hari

                        array_push($data_barang, $item);
                    } else if ($data_barang >= $tanggal_awal && $tanggal_barang <= $tanggal_akhir) { // apabila memiliki interval waktu

                        array_push($data_barang, $item);
                    }
                } else { // user tidak menampilkan filter atau menampilkan keseluruhan

                    array_push($data_barang, $item);
                }
            }
        }

        // end filter
        // ---------------------------------





        foreach ($data_barang as $isi) {

            // nomor
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A' . $baris, $urutan);
            $spreadsheet->getActiveSheet()->getStyle('A' . $baris)->applyFromArray($style_body_table);


            // tanggal
            $kolom_mergetanggal = 'B' . $baris . ':C' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('B' . $baris, $isi->tanggal);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_mergetanggal);
            $spreadsheet->getActiveSheet()->getStyle($kolom_mergetanggal)->applyFromArray($style_body_table);


            // nama barang
            $kolom_barang = 'D' . $baris . ':G' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('D' . $baris, $isi->vendor);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_barang);
            $spreadsheet->getActiveSheet()->getStyle($kolom_barang)->applyFromArray($style_body_table);



            $kolom_jml = 'H' . $baris . ':J' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('H' . $baris, $isi->nama_staff);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_jml);
            $spreadsheet->getActiveSheet()->getStyle($kolom_jml)->applyFromArray($style_body_table);



            $kolom_mergetanggal = 'K' . $baris . ':L' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('K' . $baris, $isi->shift);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_mergetanggal);
            $spreadsheet->getActiveSheet()->getStyle($kolom_mergetanggal)->applyFromArray($style_body_table);



            $kolom_barang = 'M' . $baris . ':N' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('M' . $baris, $isi->nama_bahanbaku);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_barang);
            $spreadsheet->getActiveSheet()->getStyle($kolom_barang)->applyFromArray($style_body_table);



            $kolom_jml = 'O' . $baris . ':Q' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('O' . $baris, $isi->total);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_jml);
            $spreadsheet->getActiveSheet()->getStyle($kolom_jml)->applyFromArray($style_body_table);



            $kolom_jml = 'R' . $baris . ':T' . $baris;
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('R' . $baris, $isi->barang_rejectgudang);
            $spreadsheet->getActiveSheet()->mergeCells($kolom_jml);
            $spreadsheet->getActiveSheet()->getStyle($kolom_jml)->applyFromArray($style_body_table);


            $urutan++;
            $baris++;
        }





        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Report Excel ' . date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan-Barang-Masuk.xlsx"');
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
