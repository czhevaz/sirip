<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Det_indeks extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_det_indeks');
    }

    // untuk add
    public function index()
    {
        $data = array(
            'mstr_level' => $this->M_det_indeks->get_level(),
//            'kota' => $this->Chain_model->get_kota(),
//            'kecamatan' => $this->Chain_model->get_kecamatan(),
            'mstr_level_selected' => '',
//            'kota_selected' => '',
//            'kecamatan_selected' => '',
        );
        $this->load->view('det_indeks', $data);
    }

    // untuk edit
    public function edit()
    {
        // realnya ambil data dari database, misalnya kita dapatkan data sbb:
        $id_kecamatan = 4;
        // kita ambil data selected nya untuk selected option
        $selected = $this->Chain_model->get_selected_by_id_kecamatan($id_kecamatan);

        $data = array(
            'provinsi' => $this->Chain_model->get_provinsi(),
            'kota' => $this->Chain_model->get_kota(),
            'kecamatan' => $this->Chain_model->get_kecamatan(),
            'provinsi_selected' => $selected->id_provinsi,
            'kota_selected' => $selected->id_kota,
            'kecamatan_selected' => $selected->id_kecamatan,
        );
        $this->load->view('chain', $data);
    }

    public function aksi_form()
    {
        // datanya bisa kita insert ke DB atau yang lain
        // di sini saya hanya menampilkan datanya saja
        var_dump($this->input->post());
    }
}
