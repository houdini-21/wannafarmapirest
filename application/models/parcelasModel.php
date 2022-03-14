 
<?php
defined("BASEPATH") or exit("No direct script access allowed");

class ParcelasModel extends CI_Model
{
    public function registrarParcelas($data)
    {
        $this->db->insert("wf_parcelas", $data);
        return $this->db->insert_id();
    }

    //extrayendo a las parcelas por id de usuario
    public function extrayendoParcelas($id_persona)
    {
        $this->db->select("*");
        $this->db->from("wf_parcelas");
        $this->db->where("id_persona", $id_persona);
        $res = $this->db->get();
        //solo retoran un array con la informacion de parcelas, lista para cargarase en la vista
        return $res->result();
    }

    public function extraerFotosParcelas($id_parcelas)
    {
        $this->db->select("direccion_foto");
        $this->db->from("wf_fotos");
        $this->db->where("id_parcelas", $id_parcelas);
        $res = $this->db->get();
        //solo retoran un array con la informacion de parcelas, lista para cargarase en la vista
        $respu = $res->result();
        $respu = array_map(function ($item) {
            return $item->direccion_foto;
        }, $respu);
        return $respu;
    }

    public function saveRutaFoto($data)
    {
        $this->db->insert("wf_fotos", $data);
        return $this->db->insert_id();
    }

    public function eliminarParcela($id)
    {
        $this->db->where("id_parcelas", $id);
        $this->db->delete("wf_parcelas");
        return $this->db->affected_rows();
    }
}
