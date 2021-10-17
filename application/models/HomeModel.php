<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

    public function login($email,$encripPass){
        $this->db->select();
        $this->db->from('wf_cuenta');
        $this->db->where('correo', $email);
        $this->db->where('contrasena', $encripPass);
        $res=$this->db->get();
        return $res->num_rows();
    }

    public function createUser($data){
        $this->db->insert('wf_cuenta', $data);
        return $this->db->insert_id(); 
    }
}
