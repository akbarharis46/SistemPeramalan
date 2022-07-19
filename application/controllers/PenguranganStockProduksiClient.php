<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PenguranganStockProduksiClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');

        // $this->API = "http://localhost:8080/dummyTA/penguranganstockproduksi";
        // $this->API1 = "http://localhost:8080/dummyTA/stockbarang";

        $this->API = base_url('PenguranganStockProduksi');
        $this->API1 = base_url('StockBarang');
    }

    public function index($id_detailproduksi)
    {
        $params = array('id_transaksiproduksi' =>  $this->uri->segment(3));
        $data['penguranganstockproduksi'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['title'] = "Pengurangan Stock Produksi";
        $data['id_detailproduksi'] = $id_detailproduksi;
        $this->load->view('header0');
        $this->load->view('data/penguranganstock_produksi', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }
    public function indexproduksi($id_detailproduksi)
    {
        $params = array('id_transaksiproduksi' =>  $this->uri->segment(3));
        $data['penguranganstockproduksi'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['title'] = "Pengurangan Stock Produksi";
        $data['id_detailproduksi'] = $id_detailproduksi;
        $this->load->view('header1');
        $this->load->view('staffproduksi/penguranganstock_produksi', $data);
        $this->load->view('barproduksi');
        $this->load->view('footer');
    }

    // public function indexproduksi()
    // {
    //     $data['kategori'] = json_decode($this->curl->simple_get($this->API));
    //     $data['title'] = "kategori";
    //     $this->load->view('header1');
    //     $this->load->view('bar1');
    //     $this->load->view('staffproduksi/kategori', $data);
    //     $this->load->view('footer');
    // }

    public function indexgudang()
    {
        $data['kategori'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "kategori";
        $this->load->view('header1');
        $this->load->view('staffgudang/kategori', $data);
        $this->load->view('bargudang');
        $this->load->view('footer');
    }


    public function indexpengiriman()
    {
        $data['kategori'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "kategori";
        $this->load->view('header1');
        $this->load->view('staffpengiriman/kategori', $data);
        $this->load->view('bargudang');
        $this->load->view('footer');
    }

    public function post($id_transaksiproduksi)
    {
        $data['title'] = "Pengurangan Stock Produksi";
        $data['detail_semuabarang'] = json_decode($this->curl->simple_get($this->API1));
        $data['id_transaksiproduksi'] = $id_transaksiproduksi;
        $data['count'] = $this->input->post('count');

        $this->load->view('header0');
        $this->load->view('data/post/pengurangan_stockproduksi', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }
    public function postproduksi($id_transaksiproduksi)
    {
        $data['title'] = "Pengurangan Stock Produksi";
        $data['detail_semuabarang'] = json_decode($this->curl->simple_get($this->API1));
        $data['id_transaksiproduksi'] = $id_transaksiproduksi;
        $data['count'] = $this->input->post('count');

        $this->load->view('header1');
        $this->load->view('staffproduksi/post/pengurangan_stockproduksi', $data);
        $this->load->view('barproduksi');
        $this->load->view('footer');
    }




    public function post_process()
    {
        $count = count($this->input->post('jumlah_pengurangan'));


        for ($i = 0; $i < $count; $i++) {
            $detail_suplai = $this->db->get_where('detail_suplai', ['id_bahanbaku' => $this->input->post('id_bahanbaku')[$i]])->row_array();

            $id = $detail_suplai['id_detailsuplai'];

            $data = array(
                'id_transaksiproduksi'                   => $this->input->post('id_transaksiproduksi'),
                'jumlah_pengurangan'                   => $this->input->post('jumlah_pengurangan')[$i],
                'id_detailsuplai'                   => $id,
                'barang_rejectproduksi'                   => $this->input->post('barang_rejectproduksi')[$i],

            );

            $insert =  $this->curl->simple_post($this->API, $data);

            $data1 = array(
                'tanggal_stockgudang'            => date('Y-m-d'),
                'stock_pabrik'            => $detail_suplai['stock_pabrik'] - ($data['jumlah_pengurangan'] + $data['barang_rejectproduksi']),
                'barang_pakai'            => $detail_suplai['barang_pakai'] + $data['jumlah_pengurangan'] + $data['barang_rejectproduksi'],
                'data_stockrejetproduksi'            => $detail_suplai['data_stockrejetproduksi'] + $data['barang_rejectproduksi'],
            );

            $this->db->where('id_detailsuplai', $id);
            $update = $this->db->update('detail_suplai', $data1);
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

        redirect('PenguranganStockProduksiClient/index/' . $this->input->post('id_transaksiproduksi'));
    }
    public function post_processproduksi()
    {
        $count = count($this->input->post('jumlah_pengurangan'));


        for ($i = 0; $i < $count; $i++) {
            $detail_suplai = $this->db->get_where('detail_suplai', ['id_bahanbaku' => $this->input->post('id_bahanbaku')[$i]])->row_array();

            $id = $detail_suplai['id_detailsuplai'];

            $data = array(
                'id_transaksiproduksi'                   => $this->input->post('id_transaksiproduksi'),
                'jumlah_pengurangan'                   => $this->input->post('jumlah_pengurangan')[$i],
                'id_detailsuplai'                   => $id,
                'barang_rejectproduksi'                   => $this->input->post('barang_rejectproduksi')[$i],

            );

            $insert =  $this->curl->simple_post($this->API, $data);

            $data1 = array(
                'tanggal_stockgudang'            => date('Y-m-d'),
                'stock_pabrik'            => $detail_suplai['stock_pabrik'] - ($data['jumlah_pengurangan'] + $data['barang_rejectproduksi']),
                'barang_pakai'            => $detail_suplai['barang_pakai'] + $data['jumlah_pengurangan'] + $data['barang_rejectproduksi'],
                'data_stockrejetproduksi'            => $detail_suplai['data_stockrejetproduksi'] + $data['barang_rejectproduksi'],
            );

            $this->db->where('id_detailsuplai', $id);
            $update = $this->db->update('detail_suplai', $data1);
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
        redirect('PenguranganStockProduksiClient/indexproduksi/' . $this->input->post('id_transaksiproduksi'));
    }








    public function put()
    {
        $id_detailtransaksiproduksi = $this->uri->segment(3);
        $data['penguranganstockproduksi'] = json_decode($this->curl->simple_get($this->API . '?id_detailtransaksiproduksi=' . $id_detailtransaksiproduksi));
        $data['title'] = "Edit Data Pengurangan Stock Produksi";
        $this->load->view('header0');
        $this->load->view('data/put/penguranganstock_produksi', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }
    public function putproduksi()
    {
        $id_detailtransaksiproduksi = $this->uri->segment(3);
        $data['penguranganstockproduksi'] = json_decode($this->curl->simple_get($this->API . '?id_detailtransaksiproduksi=' . $id_detailtransaksiproduksi));
        $data['title'] = "Edit Data Pengurangan Stock Produksi";

        $this->load->view('header1');
        $this->load->view('staffproduksi/put/penguranganstock_produksi', $data);
        $this->load->view('barproduksi');
        $this->load->view('footer');
    }







    public function put_process()
    {
        $detail_suplai = $this->db->get_where('detail_suplai', ['id_bahanbaku' => $this->input->post('id_bahanbaku')])->row_array();

        $id = $detail_suplai['id_detailsuplai'];

        $data = array(
            'id_detail_transaksiproduksi'                   => $this->input->post('id_detail_transaksiproduksi'),
            'id_transaksiproduksi'                   => $this->input->post('id_transaksiproduksi'),
            'id_detailsuplai'                   => $id,
            'jumlah_pengurangan'                   => $this->input->post('jumlah_pengurangan'),
            'barang_rejectproduksi'                   => $this->input->post('barang_rejectproduksi'),
        );

        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));

        $data1 = array(
            'tanggal_stockgudang'            => date('Y-m-d'),
            'stock_pabrik'            => $detail_suplai['stock_pabrik'] - ($this->input->post('jumlah_pengurangan') - $this->input->post('jumlah_pengurangan_lama')) - ($this->input->post('barang_rejectproduksi') - $this->input->post('barang_rejectproduksi_lama')),
            'barang_pakai'            => $detail_suplai['barang_pakai'] + ($this->input->post('jumlah_pengurangan') - $this->input->post('jumlah_pengurangan_lama')) + ($this->input->post('barang_rejectproduksi') - $this->input->post('barang_rejectproduksi_lama')),
            'data_stockrejetproduksi'            => $detail_suplai['data_stockrejetproduksi'] + ($this->input->post('barang_rejectproduksi') - $this->input->post('barang_rejectproduksi_lama')),
        );
        $this->db->where('id_detailsuplai', $id);
        $update = $this->db->update('detail_suplai', $data1);

        if ($update) {
            echo "berhasil";
            // $this->session->set_flashdata('result', 'Update Data kategori Berhasil');
        } else {
            echo "gagal";
            // $this->session->set_flashdata('result', 'Update Data kategori Gagal');
        }
        // print_r($update);
        // die;
        redirect('PenguranganStockProduksiClient/index/' . $this->input->post('id_transaksiproduksi'));
    }

    public function put_processproduksi()
    {

        $detail_suplai = $this->db->get_where('detail_suplai', ['id_bahanbaku' => $this->input->post('id_bahanbaku')])->row_array();

        $id = $detail_suplai['id_detailsuplai'];

        $data = array(
            'id_detail_transaksiproduksi'                   => $this->input->post('id_detail_transaksiproduksi'),
            'id_transaksiproduksi'                   => $this->input->post('id_transaksiproduksi'),
            'id_detailsuplai'                   => $id,
            'jumlah_pengurangan'                   => $this->input->post('jumlah_pengurangan'),
            'barang_rejectproduksi'                   => $this->input->post('barang_rejectproduksi'),
        );

        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));

        $data1 = array(
            'tanggal_stockgudang'            => date('Y-m-d'),
            'stock_pabrik'            => $detail_suplai['stock_pabrik'] - ($this->input->post('jumlah_pengurangan') - $this->input->post('jumlah_pengurangan_lama')) - ($this->input->post('barang_rejectproduksi') - $this->input->post('barang_rejectproduksi_lama')),
            'barang_pakai'            => $detail_suplai['barang_pakai'] + ($this->input->post('jumlah_pengurangan') - $this->input->post('jumlah_pengurangan_lama')) + ($this->input->post('barang_rejectproduksi') - $this->input->post('barang_rejectproduksi_lama')),
            'data_stockrejetproduksi'            => $detail_suplai['data_stockrejetproduksi'] + ($this->input->post('barang_rejectproduksi') - $this->input->post('barang_rejectproduksi_lama')),
        );
        $this->db->where('id_detailsuplai', $id);
        $update = $this->db->update('detail_suplai', $data1);

        if ($update) {
            echo "berhasil";
            // $this->session->set_flashdata('result', 'Update Data kategori Berhasil');
        } else {
            echo "gagal";
            // $this->session->set_flashdata('result', 'Update Data kategori Gagal');
        }
        // print_r($update);
        // die;
        redirect('PenguranganStockProduksiClient/indexproduksi/' . $this->input->post('id_transaksiproduksi'));
    }



    public function delete()
    {
        $params = array('id_detail_transaksiproduksi' =>  $this->uri->segment(4));
        $id_detailproduksi = $this->uri->segment(3);
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data kategori Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data kategori Gagal');
        }
        // print_r($delete);
        // die;
        redirect('PenguranganStockProduksiClient/index/' . $id_detailproduksi);
    }
    public function deleteproduksi()
    {
        $params = array('id_detail_transaksiproduksi' =>  $this->uri->segment(4));
        $id_detailproduksi = $this->uri->segment(3);

        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data kategori Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data kategori Gagal');
        }
        // print_r($delete);
        // die;
        redirect('PenguranganStockProduksiClient/indexproduksi/' . $id_detailproduksi);
    }
}
