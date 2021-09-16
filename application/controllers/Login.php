<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
       public function __construct()
       {
            parent::__construct();
            $this->load->model("LoginModel","loginModel");
            $this->load->library('encryption');
            $this->load->helper('url');
       }
       public function index()
       {
        echo 'hello friend';
       }

    public function login(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');

       $sql=$this->loginModel->login($email,md5($password));
        if($sql!=0){
            echo 'bienvenido';
        } 
        else {
            echo 'usuario y/o contransena incorrectos';
        }
    }

       public function createPerson(){
        $code=$this->input->post('code'); 
        $code_decode=$this->encryption->decrypt($code);
        $id_cuenta = $code_decode;
        echo $code_decode;
        $name=$this->input->post('name'); 
        $lastname=$this->input->post('lastname');
        $age=$this->input->post('age');
        $address=$this->input->post('address');
        $departament=$this->input->post('departament');
        $town=$this->input->post('town');
        $phone=$this->input->post('phone');
        $role=$this->input->post('role');
        
        $data['id_cuenta']=$id_cuenta;
        $data['nombres']=$name;
        $data['apellidos']=$lastname;
        $data['edad']=$age;
        $data['id_direcciones']=0;
        $data['telefono']=$phone;
        $data['id_rol']=$role;
        $data['departamento']=$departament;
        $data['municipio']=$town;
        $data['direccion']=$address;


    //    $sql=$this->loginModel->registerUser($data);
    
      //  if($sql>0){
       //     echo 'persona creada';
       // }else{
       //     echo 'error';
       // }
       }


    public function createUser(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');

        $data['correo']=trim($email);
        $data['contrasena']=md5($password);
        
        $sql=$this->loginModel->createUser($data);
        echo $sql;
        $code=$this->encryption->encrypt($sql);
      
        if($sql!=0){
            echo 'usuario creado';
            echo '<br>';
            echo $code;
        } 
        else {
            echo 'error';
        }
    }

}
