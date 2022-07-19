<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class DetailStockProduksi extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('id_detailhasilproduksi');
        if ($id == '') {
            $detailproduksi = $this->db->get('detail_hasilproduksi')->result();
        } else {
            $this->db->where('id_detailhasilproduksi', $id);
            $detailproduksi = $this->db->get('detail_hasilproduksi')->result();
        }
        $this->response($detailproduksi, 200);
    }

    function index_post()
    {
        $data = array(
            'stock_produksi'   => $this->post('stock_produksi'),
            'produksi_reject'   => $this->post('produksi_reject'),
            'tanggal_stockproduksi'   => $this->post('tanggal_stockproduksi'),


        );
        $insert = $this->db->insert('detail_hasilproduksi', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put()


    {
        $id = $this->put('id_detailhasilproduksi');
        $data = array(

            'stock_produksi'           => $this->put('stock_produksi'),
            'tanggal_stockproduksi'           => $this->put('tanggal_stockproduksi'),
            'produksi_reject'           => $this->put('produksi_reject'),

        );
        $this->db->where('id_detailhasilproduksi', $id);
        $update = $this->db->update('detail_hasilproduksi', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }



    function index_delete()
    {
        $id = $this->delete('id_detailhasilproduksi');
        $this->db->where('id_detailhasilproduksi', $id);
        $delete = $this->db->delete('detail_hasilproduksi');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
