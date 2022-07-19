<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DetailHasilProduksiBulananClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Peramalan_model');

        $this->load->library('curl');


        $this->API = base_url('DetailHasilProduksiBulanan');

        // $this->API = "http://localhost:8080/dummyTA/kategori";
    }

    public function index()
    {
        $data['produksibulanan'] = json_decode($this->curl->simple_get($this->API));

        $data['bulanan'] = $this->Peramalan_model->produksi();
        $data['title'] = "produksibulanan";
        $this->load->view('header0');
        $this->load->view('data/produksibulanan', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }

    public function indexproduksi()
    {
        // $data['produksibulanan'] = json_decode($this->curl->simple_get($this->API));
        // $data['title'] = "kategori";
        // $this->load->view('header1');
        // $this->load->view('staffproduksi/produksibulanan', $data);
        // $this->load->view('barproduksi');
        // $this->load->view('footer');

        $data['produksibulanan'] = json_decode($this->curl->simple_get($this->API));

        $data['bulanan'] = $this->Peramalan_model->produksi();
        $data['title'] = "produksibulanan";
        $this->load->view('header0');
        $this->load->view('staffproduksi/produksibulanan', $data);
        $this->load->view('barproduksi');
        $this->load->view('footer');


    }



    public function post()
    {
        $data['produksibulanan'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Tambah Data produksibulanan";
        $this->load->view('header0');
        $this->load->view('data/post/produksibulanan', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }




    public function postproduksi()
    {
        $data['produksibulanan'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "Tambah Data produksibulanan";
        $this->load->view('header1');
        $this->load->view('staffproduksi/post/produksibulanan', $data);
        $this->load->view('barproduksi');
        $this->load->view('footer');
    }




    public function post_process()
    {
        $data = array(
            'tanggal'                   => $this->input->post('tanggal'),
            'total_produksibulanan'                   => $this->input->post('total_produksibulanan')

        );
        // print_r($data);
        // die;
        $insert =  $this->curl->simple_post($this->API, $data);
        if ($insert) {
            // echo"berhasil";
            $this->session->set_flashdata('result', 'Data Rekap Bulanan Berhasil Ditambahkan');
        } else {
            // echo"gagal berhasil";
            $this->session->set_flashdata('result', 'Data Rekap Bulanan Gagal Ditambahkan');
        }
       
        redirect('DetailHasilProduksiBulananClient');
    }



    public function post_processproduksi()
    {
        $data = array(
            'tanggal'                   => $this->input->post('tanggal'),
            'total_produksibulanan'                   => $this->input->post('total_produksibulanan')

        );
        $insert =  $this->curl->simple_post($this->API, $data);
        if ($insert) {
            // echo"berhasil";
            $this->session->set_flashdata('result', 'Data Kategori Berhasil Ditambahkan');
        } else {
            // echo"gagal berhasil";
            $this->session->set_flashdata('result', 'Data Kategori Gagal Ditambahkan');
        }
        // print_r($insert);
        // die;
        redirect('DetailHasilProduksiBulananClient/indexproduksi');
    }



    public function put()
    {
        $params = array('id_totalproduksibulanan' =>  $this->uri->segment(3));
        $data['produksibulanan'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['title'] = "Edit Data produksibulanan";
        $this->load->view('header0');
        $this->load->view('data/put/produksibulanan', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }


    public function putproduksi()
    {
        $params = array('id_totalproduksibulanan' =>  $this->uri->segment(3));
        $data['produksibulanan'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['title'] = "Edit Data Kategori";
        $this->load->view('header1');
        $this->load->view('staffproduksi/put/produksibulanan', $data);
        $this->load->view('barproduksi');
        $this->load->view('footer');
    }



    public function put_process()
    {
        $data = array(
            'id_totalproduksibulanan'                   => $this->input->post('id_totalproduksibulanan'),
            'tanggal'                   => $this->input->post('tanggal'),
            'total_produksibulanan'                   => $this->input->post('total_produksibulanan'),
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
        redirect('DetailHasilProduksiBulananClient');
    }

    public function put_processproduksi()
    {
        $data = array(
            'id_totalproduksibulanan'                   => $this->input->post('id_totalproduksibulanan'),
            'tanggal'                   => $this->input->post('tanggal'),
            'total_produksibulanan'                   => $this->input->post('total_produksibulanan'),
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
        redirect('DetailHasilProduksiBulananClient/indexproduksi');
    }


    public function delete()
    {
        $params = array('id_totalproduksibulanan' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data kategori Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data kategori Gagal');
        }
        // print_r($delete);
        // die;
        redirect('DetailHasilProduksiBulananClient');
    }


    public function deleteproduksi()
    {
        $params = array('id_totalproduksibulanan' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data kategori Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data kategori Gagal');
        }
        // print_r($delete);
        // die;
        redirect('DetailHasilProduksiBulananClient/indexproduksi');
    }
}
