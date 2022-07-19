<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Kategori extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('id_bahanbaku');
        if ($id == '') {
            $kategori = $this->db->get('bahanbaku')->result();
        } else {
            $this->db->where('id_bahanbaku', $id);
            $kategori = $this->db->get('bahanbaku')->result();
        }
        $this->response($kategori, 200);
    }
    function index_post()
    {
        $data = array(
            'nama_bahanbaku'           => $this->post('nama_bahanbaku'),

        );
        $insert = $this->db->insert('bahanbaku', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put()
    {
        $id = $this->put('id_bahanbaku');
        $data = array(

            'nama_bahanbaku'           => $this->put('nama_bahanbaku'),
        );
        $this->db->where('id_bahanbaku', $id);
        $update = $this->db->update('bahanbaku', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id = $this->delete('id_bahanbaku');
        $delete = $this->db->delete('bahanbaku', array('id_bahanbaku' => $id));
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
