<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct() {
    parent::__construct();
//    $this->load->library('template');

//if($this->session->userdata('status') != "login"){
// redirect(base_url("admin/login"));
//}
//$this->load->vars(array(
//'home_page' => TRUE));
  }

  public function index() {
//    $data['main_view'] = 'admin/dashboard';
$data['main_view'] = 'admin/v_dashboard';
$this->load->view('theme/template', $data);
  }
}
?>