<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("HomeModel","homeModel");
		$this->load->library('encrypt');
	}
	public function index()
	{
	}

    public function login(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');

       $sql=$this->homeModel->login($email,md5($password));
        print_r($sql);
    }

    public function createUser(){
    }
}
