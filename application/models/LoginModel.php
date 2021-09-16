
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Controller {
    public function login($email,$encripPass){
        $this->db->select();
        $this->db->from('wf_usuario');
        $this->db->where('email', $email);
        $this->db->where('contrasena', $encripPass);
        $res=$this->db->get();
        return $res->num_rows();
    }

    public function createUser($data){
        $this->db->insert('wf_cuenta', $data);
        return $this->db->insert_id(); 
    }

    public function registerUser($data){
        $this->db->insert('wf_persona', $data);
        return $this->db->insert_id(); 
    }

}
