<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('HomeModel', 'homeModel');
    $this->load->helper('url');
    $this->load->helper('electro_helper');
  }
  public function index()
  {
    $data['message']="se confirmo la cuenta";
    $this->load->view(template_frontpath('message'), $data, false);
  }

  public function login()
  {
  }

  public function createUser()
  {
  }
}
