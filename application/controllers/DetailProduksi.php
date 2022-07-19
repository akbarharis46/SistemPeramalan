<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class DetailProduksi extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('id_transaksiproduksi');
        if ($id == '') {
            $this->db->select('*');
            $this->db->from('transaksi_produksi');
            $this->db->join('pegawai', 'transaksi_produksi.id = pegawai.id');
            $detailproduksi = $this->db->get()->result();
        } else {
            $this->db->where('id_transaksiproduksi', $id);
            $detailproduksi = $this->db->get('transaksi_produksi')->result();
        }
        $this->response($detailproduksi, 200);
    }
    function index_post()
    {
        $data = array(
            'id_hasilproduksi'           => $this->post('id_hasilproduksi'),
            'id'           => $this->post('id'),
            'tanggal'                 => $this->post('tanggal'),
            'shift'                  => $this->post('shift'),

        );
        $insert = $this->db->insert('transaksi_produksi', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put()
    {
        $id = $this->put('id_transaksiproduksi');
        $data = array(

            'id_transaksiproduksi'           => $this->put('id_transaksiproduksi'),
            'id'           => $this->put('id'),
            'tanggal'                  => $this->put('tanggal'),
            'shift'                  => $this->put('shift'),

        );
        $this->db->where('id_transaksiproduksi', $id);
        $update = $this->db->update('transaksi_produksi', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id = $this->delete('id_transaksiproduksi');
        $this->db->where('id_transaksiproduksi', $id);
        $delete = $this->db->delete('transaksi_produksi');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
