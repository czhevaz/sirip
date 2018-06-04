<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Input_kehadiran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kehadiran');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'input_kehadiran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'input_kehadiran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'input_kehadiran/index.html';
            $config['first_url'] = base_url() . 'input_kehadiran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_kehadiran->total_rows($q);
        $input_kehadiran = $this->M_kehadiran->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'input_kehadiran_data' => $input_kehadiran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('input_kehadiran/skor_pegawai_list', $data);
    }

    public function read($id) 
    {
        $row = $this->M_kehadiran->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pegawai' => $row->id_pegawai,
		'nama_pegawai' => $row->nama_pegawai,
		'point' => $row->point,
	    );
            $this->load->view('input_kehadiran/skor_pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('input_kehadiran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('input_kehadiran/create_action'),
	    'id_pegawai' => set_value('id_pegawai'),
	    'nama_pegawai' => set_value('nama_pegawai'),
	    'point' => set_value('point'),
	);
        $this->load->view('input_kehadiran/skor_pegawai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pegawai' => $this->input->post('id_pegawai',TRUE),
		'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
		'point' => $this->input->post('point',TRUE),
	    );

            $this->M_kehadiran->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('input_kehadiran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_kehadiran->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('input_kehadiran/update_action'),
		'id_pegawai' => set_value('id_pegawai', $row->id_pegawai),
		'nama_pegawai' => set_value('nama_pegawai', $row->nama_pegawai),
		'point' => set_value('point', $row->point),
	    );
            $this->load->view('input_kehadiran/skor_pegawai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('input_kehadiran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_pegawai' => $this->input->post('id_pegawai',TRUE),
		'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
		'point' => $this->input->post('point',TRUE),
	    );

            $this->M_kehadiran->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('input_kehadiran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_kehadiran->get_by_id($id);

        if ($row) {
            $this->M_kehadiran->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('input_kehadiran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('input_kehadiran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pegawai', 'id pegawai', 'trim|required');
	$this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'trim|required');
	$this->form_validation->set_rules('point', 'point', 'trim|required|numeric');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Input_kehadiran.php */
/* Location: ./application/controllers/Input_kehadiran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-16 00:47:48 */
/* http://harviacode.com */