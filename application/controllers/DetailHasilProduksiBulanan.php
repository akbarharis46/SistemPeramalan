<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class DetailHasilProduksiBulanan extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }



    function index_get()
    {
        
        $id = $this->get('id_totalproduksibulanan');
        if ($id == '') {
            $detail_hasilproduksibulanan = $this->db->get('detail_hasilproduksibulanan')->result();
        } else {
            $this->db->where('id_totalproduksibulanan', $id);
            $detail_hasilproduksibulanan = $this->db->get('detail_hasilproduksibulanan')->result();
        }
        $this->response($detail_hasilproduksibulanan, 200);
        
    }


    function index_post()
    {
          $data = array(
            'id_totalproduksibulanan'           => $this->post('id_totalproduksibulanan'),
            'tanggal'                  => $this->post('tanggal'),
            'total_produksibulanan'            => $this->post('total_produksibulanan'),
         
        );
        $insert = $this->db->insert('detail_hasilproduksibulanan', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put()
    {
        $id = $this->put('id_totalproduksibulanan');
        $data = array(

            'id_totalproduksibulanan'           => $this->put('id_totalproduksibulanan'),
            'tanggal'                  => $this->put('tanggal'),
            'total_produksibulanan'                  => $this->put('total_produksibulanan'),

        );
        $this->db->where('id_totalproduksibulanan', $id);
        $update = $this->db->update('detail_hasilproduksibulanan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    function index_delete()
    {
        $id = $this->delete('id_totalproduksibulanan');
        $this->db->where('id_totalproduksibulanan', $id);
        $delete = $this->db->delete('detail_hasilproduksibulanan');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
