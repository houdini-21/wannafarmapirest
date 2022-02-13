
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landlord extends CRUD_controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('electro_helper');
    $this->load->model('LandLordModel', 'landLord-model');
    $this->load->model('parcelasModel');

  }
  public function index()
  {

    //extructura de creacion de vista con informacion

    //primero se carga la informacion de los controladores o helpers anteriormente cargados en el constructor()
    $idUsuario = user_id(); //el helper user_id() trae el id del usuario
    $resultado = $this->parcelasModel->extrayendoParcelas($idUsuario);
    //se carga en una variable por si el necesario interar con ella, ya sea buscar o agregar mas informacion de la que ya trae la consulta
    $data['parcelas'] = $resultado;
    $this->load->view(template_frontpath('arrendador-templates/dashboard'), $data, false);
  }
}
