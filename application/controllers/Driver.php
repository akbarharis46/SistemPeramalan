<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Driver extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('id_driver');
        if ($id == '') {
            $driver = $this->db->get('driver')->result();
        } else {
            $this->db->where('id_driver', $id);
            $driver = $this->db->get('driver')->result();
        }
        $this->response($driver, 200);
    }
    function index_post()
    {
        $data = array(
            'nama_staff'           => $this->post('nama_staff'),
            'nohp'           => $this->post('nohp'),
            'shift'           => $this->post('shift'),

        );
        $insert = $this->db->insert('driver', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put()
    {
        $id = $this->put('id_driver');
        $data = array(

            'nama_staff'           => $this->put('nama_staff'),
            'nohp'           => $this->put('nohp'),
            'shift'          => $this->put('shift'),
        );
        $this->db->where('id_driver', $id);
        $update = $this->db->update('driver', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id = $this->delete('id_driver');
        $this->db->where('id_driver', $id);
        $delete = $this->db->delete('driver');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
