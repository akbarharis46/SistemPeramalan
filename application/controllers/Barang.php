<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Barang extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('id_detailsuplaimasuk');
        if ($id == '') {
            $this->db->select('*');
            $this->db->from('detail_suplaimasuk');
            $this->db->join('driver', 'driver.id_driver = detail_suplaimasuk.id_driver');
            $this->db->join('bahanbaku', 'bahanbaku.id_bahanbaku = detail_suplaimasuk.id_bahanbaku');
            $barang = $this->db->get()->result();
        } else {
            $this->db->where('id_detailsuplaimasuk', $id);
            $barang = $this->db->get('detail_suplaimasuk')->result();
        }
        $this->response($barang, 200);
    }

    function index_post()
    {
        $data = array(
            'id_bahanbaku'           => $this->post('id_bahanbaku'),
            'vendor'                  => $this->post('vendor'),
            'id_driver'            => $this->post('id_driver'),
            'shift'                  => $this->post('shift'),
            'tanggal'                  => $this->post('tanggal'),
            'total'                  => $this->post('total'),
            'barang_rejectgudang'                  => $this->post('barang_rejectgudang'),

        );
        $insert = $this->db->insert('detail_suplaimasuk', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put()
    {
        $id = $this->put('id_detailsuplaimasuk');
        $data = array(

            'id_bahanbaku'           => $this->put('id_bahanbaku'),
            'vendor'                  => $this->put('vendor'),
            'id_driver'            => $this->put('id_driver'),
            'shift'                  => $this->put('shift'),
            'tanggal'                  => $this->put('tanggal'),
            'total'                  => $this->put('total'),
            'barang_rejectgudang'                  => $this->put('barang_rejectgudang'),

        );
        $this->db->where('id_detailsuplaimasuk', $id);
        $update = $this->db->update('detail_suplaimasuk', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id = $this->delete('id_detailsuplaimasuk');
        $this->db->where('id_detailsuplaimasuk', $id);
        $delete = $this->db->delete('detail_suplaimasuk');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
