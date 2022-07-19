<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class PeramalanApi extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('id_peramalan');
        if ($id == '') {
            $kategori = $this->db->get('peramalan')->result();
        } else {
            $this->db->where('id_peramalan', $id);
            $kategori = $this->db->get('peramalan')->result();
        }
        $this->response($kategori, 200);
    }
    function index_post()
    {
        $data = array(
            'id_pegawai'           => $this->post('id_pegawai'),
            'tanggal_awal'           => $this->post('tanggal_awal'),
            'tanggal_awal'           => $this->post('tanggal_awal'),

        );
        $insert = $this->db->insert('peramalan', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put()
    {
        $id = $this->put('id_peramalan');
        $data = array(

            'nama_peramalan'           => $this->put('nama_peramalan'),
        );
        $this->db->where('id_peramalan', $id);
        $update = $this->db->update('peramalan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id = $this->delete('id_peramalan');
        $delete = $this->db->delete('peramalan', array('id_peramalan' => $id));
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
