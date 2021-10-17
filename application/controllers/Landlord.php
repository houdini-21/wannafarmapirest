
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
  }
  public function index()
  {
  }

  public function login()
  {
  }

  public function createUser()
  {
  }
}
