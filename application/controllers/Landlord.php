
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
    $this->load->model('ParcelasModel', 'parcelasModel');
  }
  public function index()
  {

    //extructura de creacion de vista con informacion

    //primero se carga la informacion de los controladores o helpers anteriormente cargados en el constructor()
    $idUsuario = user_id(); //el helper user_id() trae el id del usuario
    $resultado = $this->parcelasModel->extrayendoParcelas($idUsuario);

    //se carga en una variable por si el necesario interar con ella, ya sea buscar o agregar mas informacion de la que ya trae la consulta
    //en este caso se va a base de datos y se busca las fotos relacionadas a las parcelas por su id
    $resultado = array_map(function ($item) {
      $item->fotos = $this->parcelasModel->extraerFotosParcelas($item->id_parcelas);
      return $item;
    }, $resultado);

    $data['parcelas'] = $resultado;
    $this->load->view(template_frontpath('arrendador-templates/dashboard'), $data, false);
  }

  public function crearParcela()
  {

    $this->load->view(template_frontpath('arrendador-templates/formParcela'), false);
  }

  public function guardarParcela()
  {


    $data['dimenciones'] = $this->input->post('dimenciones');
    $data['precio'] = $this->input->post('precio');
    $data['ubicacion'] = $this->input->post('ubicacion');
    $data['restricciones'] = $this->input->post('renstricciones');
    $data['caracteristicas'] = $this->input->post('caracteristicas');
    $data['verificacion'] = false;
    $data['ocupadas'] = false;
    $data['fecha_registro'] = date('Y-m-d H:i:s');
    $data['id_persona'] = user_id();
    $res = $this->parcelasModel->registrarParcelas($data);
    if ($res) {
      $this->upload_files('./uploads/parcelas/' . user_id(), 'jinx', $_FILES['file'], $res);

      //guarda la ruta de la foto subida
      echo json_encode(200);
    } else {
      echo json_encode(500);
    }
  }

  //contorlador para subir imagenes automaticamente
  private function upload_files($path, $title, $files, $idParcela)
  {

    //el formato a enviarlo es  upload_files('ruta del archivo', 'nombre del archivo', 'archivo', $idParcela)
    if (!is_dir($path)) {
      mkdir($path, 0777);
    }

    $config = array(
      'upload_path'   => $path,
      'allowed_types' => '*',
      'overwrite'     => 1
    );

    $this->load->library('upload', $config);

    $images = array();

    foreach ($files['name'] as $key => $image) {
      $_FILES['images[]']['name'] = 'hou';
      $_FILES['images[]']['type'] = 'hou';
      $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
      $_FILES['images[]']['error'] = $files['error'][$key];
      $_FILES['images[]']['size'] = $files['size'][$key];

      $fileName = $title;

      $images[] = $fileName;

      $config['file_name'] = time();

      $this->upload->initialize($config);

      if ($this->upload->do_upload('images[]')) {
        $data = $this->upload->data();
        $rutaimagen = str_replace('.', '', $path) . '/' . $data['file_name'];
      } else {
        $error = array('error' => $this->upload->display_errors());
        $rutaimagen = "/uploads/parcelas/defaultParcela.png";
        print_r($error);
      }
      $foto['direccion_foto'] = $rutaimagen;
      $foto['id_parcelas'] = $idParcela;
      $this->parcelasModel->saveRutaFoto($foto);
    }
  }
}
