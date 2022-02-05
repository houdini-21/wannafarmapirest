 
<?php
defined("BASEPATH") or exit("No direct script access allowed");

class parcelasModel extends CI_Model
{
    public function registrarParcelas($data)
    {
        $this->db->insert("wf_parcelas", $data);
        return $this->db->insert_id();
    }
}