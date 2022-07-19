<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class PenguranganStockProduksi extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id_transaksiproduksi = $this->get('id_transaksiproduksi');
        $id = $this->get('id');
        $id_detailtransaksiproduksi = $this->get('id_detailtransaksiproduksi');
        if ($id_transaksiproduksi == '' && $id_detailtransaksiproduksi == '') {
            $this->db->select('*');
            $this->db->from('detail_transaksi_produksi');
            $this->db->join('detail_suplai', 'detail_suplai.id_detailsuplai = detail_transaksi_produksi.id_detailsuplai');
            $this->db->join('bahanbaku', 'bahanbaku.id_bahanbaku = detail_suplai.id_bahanbaku');
            $this->db->join('transaksi_produksi', 'detail_transaksi_produksi.id_transaksiproduksi = transaksi_produksi.id_transaksiproduksi');
            $detail_transaksi_produksi = $this->db->get()->result();
        } else if ($id_transaksiproduksi) {
            $this->db->select('*');
            $this->db->from('detail_transaksi_produksi');
            $this->db->where('detail_transaksi_produksi.id_transaksiproduksi', $id_transaksiproduksi);
            $this->db->join('detail_suplai', 'detail_suplai.id_detailsuplai = detail_transaksi_produksi.id_detailsuplai');
            $this->db->join('bahanbaku', 'bahanbaku.id_bahanbaku = detail_suplai.id_bahanbaku');
            $this->db->join('transaksi_produksi', 'detail_transaksi_produksi.id_transaksiproduksi = transaksi_produksi.id_transaksiproduksi');
            $detail_transaksi_produksi = $this->db->get()->result();
        } else if ($id_detailtransaksiproduksi) {
            $this->db->select('*');
            $this->db->from('detail_transaksi_produksi');
            $this->db->where('id_detail_transaksiproduksi', $id_detailtransaksiproduksi);
            $this->db->join('detail_suplai', 'detail_suplai.id_detailsuplai = detail_transaksi_produksi.id_detailsuplai');
            $this->db->join('bahanbaku', 'bahanbaku.id_bahanbaku = detail_suplai.id_bahanbaku');
            $this->db->join('transaksi_produksi', 'detail_transaksi_produksi.id_transaksiproduksi = transaksi_produksi.id_transaksiproduksi');
            $detail_transaksi_produksi = $this->db->get()->row();
        }
        $this->response($detail_transaksi_produksi, 200);
    }
    function index_post()
    {
        $data = array(
            'id_detailsuplai'           => $this->post('id_detailsuplai'),
            'id_transaksiproduksi'           => $this->post('id_transaksiproduksi'),
            'jumlah_pengurangan'           => $this->post('jumlah_pengurangan'),
            'barang_rejectproduksi'           => $this->post('barang_rejectproduksi'),

        );
        $insert = $this->db->insert('detail_transaksi_produksi', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put()
    {
        $id = $this->put('id_detail_transaksiproduksi');
        $data = array(

            'id_transaksiproduksi'           => $this->put('id_transaksiproduksi'),
            'jumlah_pengurangan'           => $this->put('jumlah_pengurangan'),
            'id_detailsuplai'           => $this->put('id_detailsuplai'),
            'barang_rejectproduksi'           => $this->put('barang_rejectproduksi'),
        );
        $this->db->where('id_detail_transaksiproduksi', $id);
        $update = $this->db->update('detail_transaksi_produksi', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id = $this->delete('id_detail_transaksiproduksi');
        $this->db->where('id_detail_transaksiproduksi', $id);
        $delete = $this->db->delete('detail_transaksi_produksi');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
