<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DriverClient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        $this->API = base_url('Driver');
    }

    public function index()
    {
        $data['driver'] = json_decode($this->curl->simple_get($this->API));
        $data['title'] = "driver";
        $this->load->view('header0');
        $this->load->view('data/driver', $data, FALSE);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }
    public function post()
    {
        $data['title'] = "Tambah Data Driver";
        $this->load->view('header0');
        $this->load->view('data/post/driver', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }

    public function post_process()
    {
        // $data = array(
        //     'nama_staff'             => $this->input->post('nama_staff'),
        //     'nohp'         => $this->input->post('nohp'),
        //     'shift'         => $this->input->post('shift'),
        //     'level'            => $this->input->post('level'),
        // );
        // $insert =  $this->curl->simple_post($this->API,$data);
        // if ($insert) {
        //     // echo"berhasil";
        //     $this->session->set_flashdata('result', 'Data User Berhasil Ditambahkan');
        // } else {
        //     // echo"gagal berhasil";
        //     $this->session->set_flashdata('result', 'Data User Gagal Ditambahkan');
        // }
        // // print_r($insert);
        // // die;

        $data = array(
            'nama_staff'    => $this->input->post('nama_staff'),
            'nohp'          => $this->input->post('nohp'),
            'shift'         => $this->input->post('shift'),
        );

        $this->db->insert('driver', $data);
        redirect('DriverClient');
    }


    public function put()
    {
        $params = array('id_driver' => $this->uri->segment(3));
        $data['driver'] = json_decode($this->curl->simple_get($this->API, $params));
        $data['title'] = "Edit Data driver";
        $this->load->view('header0');
        $this->load->view('data/put/driver', $data);
        $this->load->view('baradmin');
        $this->load->view('footer');
    }
    public function put_process()
    {
        $data = array(
            'id_driver'               => $this->input->post('id_driver'),
            'nama_staff'       => $this->input->post('nama_staff'),
            'nohp'             => $this->input->post('nohp'),
            'shift'            => $this->input->post('shift'),

        );
        $update =  $this->curl->simple_put($this->API, $data, array(CURLOPT_BUFFERSIZE => 10));

        if ($update) {
            echo "berhasil";
            // $this->session->set_flashdata('result', 'Update Data User Berhasil');
        } else {
            echo "gagal";
            // $this->session->set_flashdata('result', 'Update Data User Gagal');
        }
        // print_r($update);
        // exit;
        redirect('DriverClient');
    }
    public function delete()
    {
        $params = array('id_driver' =>  $this->uri->segment(3));
        $delete =  $this->curl->simple_delete($this->API, $params);
        if ($delete) {
            $this->session->set_flashdata('result', 'Hapus Data User Berhasil');
        } else {
            $this->session->set_flashdata('result', 'Hapus Data User Gagal');
        }
        redirect('DriverClient');
    }
}
