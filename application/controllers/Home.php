<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("HomeModel", "homeModel");
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
