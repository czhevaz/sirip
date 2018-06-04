<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Risiko extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_risiko');
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
        $data ['main_view'] = 'admin/risiko/mstr_risiko_kerja_list';
        $this->load->view('theme/template', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->M_risiko->json();
    }

    public function read($id)
    {
        $row = $this->M_risiko->get_by_id($id);
        if ($row) {
            $data = array(
		'ID_RISIKO' => $row->ID_RISIKO,
		'DESCP_RISIKO' => $row->DESCP_RISIKO,
		'POINT_RISIKO' => $row->POINT_RISIKO,
	    );
            $data ['main_view'] = 'admin/risiko/mstr_risiko_kerja_read';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
    </div>');
            redirect(site_url('admin/risiko'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/risiko/create_action'),
	    'ID_RISIKO' => set_value('ID_RISIKO'),
	    'DESCP_RISIKO' => set_value('DESCP_RISIKO'),
	    'POINT_RISIKO' => set_value('POINT_RISIKO'),
	);
        $data ['main_view'] = 'admin/risiko/mstr_risiko_kerja_form';
        $this->load->view('theme/template', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'DESCP_RISIKO' => $this->input->post('DESCP_RISIKO',TRUE),
		'POINT_RISIKO' => $this->input->post('POINT_RISIKO',TRUE),
	    );

            $this->M_risiko->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil ditambahkan.
    </div>');
            redirect(site_url('admin/risiko'));
        }
    }

    public function update($id)
    {
        $row = $this->M_risiko->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/risiko/update_action'),
		'ID_RISIKO' => set_value('ID_RISIKO', $row->ID_RISIKO),
		'DESCP_RISIKO' => set_value('DESCP_RISIKO', $row->DESCP_RISIKO),
		'POINT_RISIKO' => set_value('POINT_RISIKO', $row->POINT_RISIKO),
	    );
            $data ['main_view'] = 'admin/risiko/mstr_risiko_kerja_form';
            $this->load->view('theme/template', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
    </div>');
            redirect(site_url('admin/risiko'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_RISIKO', TRUE));
        } else {
            $data = array(
		'DESCP_RISIKO' => $this->input->post('DESCP_RISIKO',TRUE),
		'POINT_RISIKO' => $this->input->post('POINT_RISIKO',TRUE),
	    );

            $this->M_risiko->update($this->input->post('ID_RISIKO', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil diubah.
    </div>');
            redirect(site_url('admin/risiko'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_risiko->get_by_id($id);

        if ($row) {
            $this->M_risiko->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data berhasil dihapus.
    </div>');
            redirect(site_url('admin/risiko'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Data Not Found!</strong>
    </div>');
            redirect(site_url('admin/risiko'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('DESCP_RISIKO', 'descp risiko', 'trim|required');
	$this->form_validation->set_rules('POINT_RISIKO', 'point risiko', 'trim|required|numeric');

	$this->form_validation->set_rules('ID_RISIKO', 'ID_RISIKO', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "mstr_risiko_kerja.xls";
        $judul = "mstr_risiko_kerja";
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
	xlsWriteLabel($tablehead, $kolomhead++, "DESCP RISIKO");
	xlsWriteLabel($tablehead, $kolomhead++, "POINT RISIKO");

	foreach ($this->M_risiko->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DESCP_RISIKO);
	    xlsWriteNumber($tablebody, $kolombody++, $data->POINT_RISIKO);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Risiko.php */
/* Location: ./application/controllers/Risiko.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-27 06:45:12 */
/* http://harviacode.com */
