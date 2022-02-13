<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Farmer extends CRUD_controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {

    $data['saludo'] = showSaludo();
    $this->load->view(template_frontpath('granjero-templates/dashboard'), $data, false);
  }

}
