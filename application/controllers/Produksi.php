<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Produksi extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('id_hasilproduksi');
        if ($id == '') {
            $this->db->select('*');
            $this->db->from('hasil_produksi');
            $this->db->join('pegawai', 'hasil_produksi.id = pegawai.id');
            $produksi = $this->db->get()->result();
        } else {
            $this->db->select('*');
            $this->db->from('hasil_produksi');
            $this->db->where('id_hasilproduksi', $id);
            $this->db->join('pegawai', 'hasil_produksi.id = pegawai.id');
            $produksi = $this->db->get()->result();
        }
        $this->response($produksi, 200);
    }
    function index_post()
    {
        $data = array(
            'id'                   => $this->post('id'),
            'shift'                   => $this->post('shift'),
            'jumlah_produksi'         => $this->post('jumlah_produksi'),
            'produksi_gagal'         => $this->post('produksi_gagal'),
            'tanggal'                 => $this->post('tanggal'),


        );
        $insert = $this->db->insert('hasil_produksi', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
        // print_r($insert);
        //  exit;
    }
    function index_put()
    {
        $id = $this->put('id_hasilproduksi');
        $data = array(
            'id'                     => $this->put('id'),
            'shift'                     => $this->put('shift'),
            'jumlah_produksi'          => $this->put('jumlah_produksi'),
            'produksi_gagal'          => $this->put('produksi_gagal'),
            'tanggal'            => $this->put('tanggal'),


        );
        $this->db->where('id_hasilproduksi', $id);
        $update = $this->db->update('hasil_produksi', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id = $this->delete('id_hasilproduksi');
        $this->db->where('id_hasilproduksi', $id);
        $delete = $this->db->delete('hasil_produksi');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
