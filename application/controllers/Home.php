<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("HomeModel","homeModel");
		
	}
	public function index()
	{
        echo 'hello friend';
	}

    public function login(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');

       $sql=$this->homeModel->login($email,md5($password));
        print_r($sql);
    }

    public function createUser(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $data['email']=trim($email);
        $data['contrasena']=md5($password);
     $sql=$this->homeModel->createUser($data);
        if($sql!=0){
            echo 'usuario creado';
        } 
        else {
            echo 'error';
        }
    }
}
