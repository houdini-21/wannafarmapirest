
<?php
defined("BASEPATH") or exit("No direct script access allowed");

class LoginModel extends CI_Controller
{
    public function login($email, $encripPass)
    {
        $this->db->select();
        $this->db->from("wf_cuenta");
        $this->db->where("correo", $email);
        $this->db->where("contrasena", $encripPass);
        $res = $this->db->get();
        $result = $res->result();
        $exists = $res->num_rows();
        if ($exists > 0) {
            if ($result[0]->estado == 1) {
                return "bienvenido";
            } else {
                return "debes de confirmar tu cuenta";
            }
        } else {
            return "Contrasena y/o correo invalidos";
        }
    }

    public function createUser($data)
    {
        $this->db->insert("wf_cuenta", $data);
        return $this->db->insert_id();
    }

    public function registerUser($data)
    {
        $this->db->insert("wf_persona", $data);
        return $this->db->insert_id();
    }

    public function validarCorreo($email)
    {
        $this->db->select();
        $this->db->from("wf_cuenta");
        $this->db->where("correo", $email);
        $res = $this->db->get();
        return $res->num_rows();
    }

    public function cuentaConfirmada($id)
    {
        $this->db->select();
        $this->db->from("wf_cuenta");
        $this->db->where("id_cuenta", $id);
        $res = $this->db->get()->result();
        if ($res[0]->estado == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function updateCuenta($data, $id)
    {
        $this->db->where("id_cuenta", $id);
        $this->db->update("wf_cuenta", $data);
    }

    public function getEmail($id)
    {
        $this->db->select("correo");
        $this->db->from("wf_cuenta");
        $this->db->where("id_cuenta", $id);
        $res = $this->db->get()->row();
        return $res->correo;
    }
}

