<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Level extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_level');
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
        $data ['main_view'] = 'admin/level/mstr_level_list';
        $this->load->view('theme/template', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_level->json();
    }

    public function read($id)
    {
        $row = $this->M_level->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_LEVEL' => $row->ID_LEVEL,
		'DESCP_LEVEL' => $row->DESCP_LEVEL,
		'POINT_LEVEL' => $row->POINT_LEVEL,
	    );

            $data ['main_view'] = 'admin/level/mstr_level_read';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
    </div>');
            redirect(site_url('admin/level'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/level/create_action'),
	    'ID_LEVEL' => set_value('ID_LEVEL'),
	    'DESCP_LEVEL' => set_value('DESCP_LEVEL'),
	    'POINT_LEVEL' => set_value('POINT_LEVEL'),
	);
        $data ['main_view'] = 'admin/level/mstr_level_form';
        $this->load->view('theme/template', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    'ID_LEVEL' => $this->input->post('ID_LEVEL',TRUE),
		'DESCP_LEVEL' => $this->input->post('DESCP_LEVEL',TRUE),
		'POINT_LEVEL' => $this->input->post('POINT_LEVEL',TRUE),
	    );

            $this->M_level->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil ditambahkan.
  </div>');
            redirect(site_url('admin/level'));
        }
    }

    public function update($id)
    {
        $row = $this->M_level->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/level/update_action'),
		'ID_LEVEL' => set_value('ID_LEVEL', $row->ID_LEVEL),
		'DESCP_LEVEL' => set_value('DESCP_LEVEL', $row->DESCP_LEVEL),
		'POINT_LEVEL' => set_value('POINT_LEVEL', $row->POINT_LEVEL),
	    );
            $data ['main_view'] = 'admin/level/mstr_level_form';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('level'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_LEVEL', TRUE));
        } else {
            $data = array(
    'ID_LEVEL' => $this->input->post('ID_LEVEL',TRUE),
		'DESCP_LEVEL' => $this->input->post('DESCP_LEVEL',TRUE),
		'POINT_LEVEL' => $this->input->post('POINT_LEVEL',TRUE),
	    );

            $this->M_level->update($this->input->post('ID_LEVEL', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil diubah.
  </div>');
            redirect(site_url('admin/level'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_level->get_by_id($id);

        if ($row) {
            $this->M_level->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil dihapus.
  </div>');
            redirect(site_url('admin/level'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
  </div>');
            redirect(site_url('admin/level'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('DESCP_LEVEL', 'descp level', 'trim|required');
	$this->form_validation->set_rules('POINT_LEVEL', 'point level', 'trim|required|numeric');

	$this->form_validation->set_rules('ID_LEVEL', 'ID_LEVEL', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mstr_level.xls";
        $judul = "mstr_level";
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
	xlsWriteLabel($tablehead, $kolomhead++, "DESCP LEVEL");
	xlsWriteLabel($tablehead, $kolomhead++, "POINT LEVEL");

	foreach ($this->M_level->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_LEVEL);
	    xlsWriteNumber($tablebody, $kolombody++, $data->POINT_LEVEL);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Level.php */
/* Location: ./application/controllers/Level.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-26 21:08:51 */
/* http://harviacode.com */
