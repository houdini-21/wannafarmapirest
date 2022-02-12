 
<?php
defined("BASEPATH") or exit("No direct script access allowed");

class parcelasModel extends CI_Model
{
    public function registrarParcelas($data)
    {
        $this->db->insert("wf_parcelas", $data);
        return $this->db->insert_id();
    }

    //extrayendo a las parcelas de cada id
    public function extrayendoParcelas($id_persona)
    {
        $this->db->select("*");
        $this->db->from("wf_parcelas");
        $this->db->where("id_persona", $id_persona);
        $res = $this->db->get();
        return $res;
    }
}