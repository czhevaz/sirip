<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Intensitas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_intensitas');
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
        $data ['main_view'] = 'admin/intensitas/mstr_intensitas_list';
        $this->load->view('theme/template', $data);

    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_intensitas->json();
    }

    public function read($id)
    {
        $row = $this->M_intensitas->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_INTENSITAS' => $row->ID_INTENSITAS,
		'DESCP_INTENSITAS' => $row->DESCP_INTENSITAS,
		'POINT_INTENSITAS' => $row->POINT_INTENSITAS,
	    );
            $data ['main_view'] = 'admin/intensitas/mstr_intensitas_read';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/intensitas'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/intensitas/create_action'),
	    'ID_INTENSITAS' => set_value('ID_INTENSITAS'),
	    'DESCP_INTENSITAS' => set_value('DESCP_INTENSITAS'),
	    'POINT_INTENSITAS' => set_value('POINT_INTENSITAS'),
	);
        $data ['main_view'] = 'admin/intensitas/mstr_intensitas_form';
        $this->load->view('theme/template', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'DESCP_INTENSITAS' => $this->input->post('DESCP_INTENSITAS',TRUE),
		'POINT_INTENSITAS' => $this->input->post('POINT_INTENSITAS',TRUE),
	    );

            $this->M_intensitas->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil ditambahkan.
  </div>');
            redirect(site_url('admin/intensitas'));
        }
    }

    public function update($id)
    {
        $row = $this->M_intensitas->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/intensitas/update_action'),
		'ID_INTENSITAS' => set_value('ID_INTENSITAS', $row->ID_INTENSITAS),
		'DESCP_INTENSITAS' => set_value('DESCP_INTENSITAS', $row->DESCP_INTENSITAS),
		'POINT_INTENSITAS' => set_value('POINT_INTENSITAS', $row->POINT_INTENSITAS),
	    );
            $data ['main_view'] = 'admin/intensitas/mstr_intensitas_form';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/intensitas'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_INTENSITAS', TRUE));
        } else {
            $data = array(
		'DESCP_INTENSITAS' => $this->input->post('DESCP_INTENSITAS',TRUE),
		'POINT_INTENSITAS' => $this->input->post('POINT_INTENSITAS',TRUE),
	    );

            $this->M_intensitas->update($this->input->post('ID_INTENSITAS', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil diubah.
  </div>');
            redirect(site_url('admin/intensitas'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_intensitas->get_by_id($id);

        if ($row) {
            $this->M_intensitas->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil dihapus.
  </div>');
            redirect(site_url('admin/intensitas'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/intensitas'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('DESCP_INTENSITAS', 'descp intensitas', 'trim|required');
	$this->form_validation->set_rules('POINT_INTENSITAS', 'point intensitas', 'trim|required|numeric');

	$this->form_validation->set_rules('ID_INTENSITAS', 'ID_INTENSITAS', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mstr_intensitas.xls";
        $judul = "mstr_intensitas";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "DESCP INTENSITAS");
	xlsWriteLabel($tablehead, $kolomhead++, "POINT INTENSITAS");

	foreach ($this->M_intensitas->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_INTENSITAS);
	    xlsWriteNumber($tablebody, $kolombody++, $data->POINT_INTENSITAS);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Intensitas.php */
/* Location: ./application/controllers/Intensitas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-27 21:56:58 */
/* http://harviacode.com */
