<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Farmer extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
  }
  
  public function index()
  {
    $data['dataUser'] = get_metadata();
    $this->load->view(
      template_frontpath('granjero-templates/dashboard'),
      $data,
      false
    );
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('/');
  }
}
