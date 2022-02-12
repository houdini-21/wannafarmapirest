
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landlord extends CRUD_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('electro_helper');
    $this->load->model('LandLordModel', 'landLord-model');
  }
  public function index()
  {
    $this->load->view(
      template_frontpath('arrendador-templates/dashboard'),
      false
    );
  }
  public function login()
  {
  }

  public function createUser()
  {
  }
}
