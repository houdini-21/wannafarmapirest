<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
       public function __construct()
       {
            parent::__construct();
            $this->load->model("LoginModel","loginModel");
            $this->load->helper('url');
            $this->load->helper('electro_helper');
       }
       public function index()
       {
        $this->load->view(template_frontpath("login"), false);
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

       public function crearUsuario($token=""){
        if($token!=''){
            $code_decode=decryptToken($token);
            if($code_decode['status']==200){
                $data['id']=$code_decode['data']->id;
                $this->load->view(template_frontpath("createUser"),$data, false);
            }
            else {
                echo 'token invalido';
            }
        }else {    
            redirect('login', 'refresh');
        }
       }

       public function createPerson(){

        $id_cuenta = $this->input->post('id_cuenta');
        $name=$this->input->post('name'); 
        $lastname=$this->input->post('lastname');
        $age=$this->input->post('age');
        $address=$this->input->post('address');
        $departament=21;
        $town=21;
        $phone=$this->input->post('phone');
        $role=23;
        
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


        $sql=$this->loginModel->registerUser($data);
    
        if($sql>0){
            echo 'persona creada';
         } else{
            echo 'error';
         }
       }


    public function createUser(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');

        $data['correo']=trim($email);
        $data['contrasena']=md5($password);
        
        $sql=$this->loginModel->createUser($data);
        $encript['id']=$sql;
        $code = createToken($encript);  

        if($sql!=0){
            echo 'usuario creado';
            $url = base_url().'login/crearUsuario/'.$code;
            $this->enviar($url, $email);
        } 
        else {
            echo 'error';
        }
    }

   public function enviar($data, $email){
       $this->load->library('email');
        
        $config['protocol'] = 'smtp';
         
        $config["smtp_host"] = 'smtp.titan.email';
         
        $config["smtp_user"] = 'noreplay@wannnafarm.com';
         
        $config["smtp_pass"] = 'Houdini&&21';   
         
        $config["smtp_port"] = '587';
        
        $config['charset'] = 'utf-8';
 
        $config['wordwrap'] = TRUE;
         
       $config['validate'] = true;
       
        
        $this->email->initialize($config);
 
        $this->email->from('noreplay@wannnafarm.com', 'Wannafarm');
         
        $this->email->to($email);
          
        $this->email->message($data);
      
        $this->email->send();         
   } 

}
