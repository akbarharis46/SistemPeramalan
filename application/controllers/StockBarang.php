<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class StockBarang extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('id_detailsuplai');
        if ($id == '') {
            $this->db->select('*');
            $this->db->from('detail_suplai');
            $this->db->join('bahanbaku', 'bahanbaku.id_bahanbaku = detail_suplai.id_bahanbaku');
            $stockbarang = $this->db->get()->result();
        } else {
            $this->db->where('id_detailsuplai', $id);
            $stockbarang = $this->db->get('detail_suplai')->result();
        }
        $this->response($stockbarang, 200);
    }
    function index_post()
    {
        $data = array(
            'tanggal_stockgudang'                 => $this->post('tanggal_stockgudang'),
            'id_bahanbaku'           => $this->post('id_bahanbaku'),
            'stock_pabrik'                 => $this->post('stock_pabrik'),
            'barang_pakai'                 => $this->post('barang_pakai'),
            'data_stockrejetgudang'            => $this->post('data_stockrejetgudang'),
            'data_stockrejetproduksi'            => $this->post('data_stockrejetproduksi'),

        );
        $insert = $this->db->insert('detail_suplai', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put()
    {
        $id = $this->put('id_detailsuplai');
        $data = array(

            'tanggal_stockgudang'           => $this->put('tanggal_stockgudang'),
            'id_bahanbaku'           => $this->put('id_bahanbaku'),
            'stock_pabrik'          => $this->put('stock_pabrik'),
            'barang_pakai'          => $this->put('barang_pakai'),
            'data_stockrejetgudang'            => $this->put('data_stockrejetgudang'),
            'data_stockrejetproduksi'            => $this->put('data_stockrejetproduksi'),

        );
        $this->db->where('id_detailsuplai', $id);
        $update = $this->db->update('detail_suplai', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id = $this->delete('id_detailsuplai');
        $this->db->where('id_detailsuplai', $id);
        $delete = $this->db->delete('detail_suplai');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
