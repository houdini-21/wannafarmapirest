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
    $message = '';
    $hora=date('H');
    if($hora>=1 && $hora<= 11){
        $message = "Buenos dias,";
    }
    if($hora>=12 && $hora<=18){
        $message = "Buenas tardes,";
    }
    if($hora>=19 && $hora<=23){
        $message = "Buenas noches,";
    }
    $data['saludo'] = $message;
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
