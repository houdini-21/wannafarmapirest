
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landlord extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->helper('url');
    $this->load->helper('electro_helper');
    $this->load->model('LandLordModel', 'landLord-model');
    $this->load->library('session');
  
  }
  public function index()//el lanlord hace referencia al dash del arrendatario
  {
   $this->isLogged();//verificamos si esta logueado
  }

  public function isLogged()
  {
    $session = $this->session->userdata('islog');//extraemos la informacion de la session
    if($session == 0)//si no hay session se manda al login
    {
      $this->load->view(
        template_frontpath('sign-templates/sign-up'),false
      );
    }
  else{
    $this->load->view(
      template_frontpath('arrendador-templates/dashboard'), 
      false
    );
  }
  }

  public function login()
  {
  }

  public function createUser()
  {
  }
}
