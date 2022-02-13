<?php
defined("BASEPATH") or exit("No direct script access allowed");
//cuando crees un controlador con permisos especiales usar un extends CRUD_controller
//para configurar quien puede acceder ir a la ruta core/crud_controller.php
class parcelasController extends CRUD_controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->model("HomeModel", "homeModel");
    $this->load->model('parcelasModel');
  }
  public function index()
  {
    $result = [
      "resultado" => " ",
      "add" => " ",
      "success" => " "
    ];
    $this->load->view(
      template_frontpath('parcelas-template/agregarparcelas'),
      $result,
      false
      // $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), false);
    );
  }


  //almaceando parcelas
  public function almacenandoParcelas()
  { //los datos que se reciben son enviados a una tabla para verificar tu veracidad
    $valor2 = $this->session->userdata('idperson');
    $id_persona = $valor2; //$this->session->user_data('idperson'); //extraemos el id de la variable session que quedo almacenado al iniciar 
    //variables a ser almacenadas
    $dimenciones = $this->input->post('dimenciones');
    $precio = $this->input->post('precio');
    $ubicacion = $this->input->post('ubicacion');
    $restricciones = $this->input->post('restricciones');
    $caracteristicasParcela =  $this->input->post('caracteristicas');
    $id_fotos = $valor2;
    $validacion = false;
    $ocupadas = false;

    $data['dimenciones'] = $dimenciones;
    $data['precio'] = $precio;
    $data['ubicacion'] = $ubicacion;
    $data['restricciones'] = $restricciones;
    $data['caracteristicas'] = $caracteristicasParcela;
    $data['verificacion'] = $validacion;
    $data['ocupadas'] =  $ocupadas;
    // $data['fecha_registro'] = $fecharegistro;
    $data['id_fotos'] = $id_fotos;
    $data['id_persona'] = $id_persona;
    //  $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
    //agregando las fotos de las parcelas
    try {
      $sql = $this->parcelasModel->registrarParcelas($data);
      if ($sql > 0) {
        $idParcelas['id_parcelas'] = $sql;
        $parcelasid = implode($idParcelas);
        if ($_FILES["fotosparcela"]["error"] > 0) //carga el archivo con sus propiedades
        {
          throw new Exception('error al carhar archivo');    //lanza una nueva excepcion
        } else {
          $permtidos = array("image/jpg", "image/png", "image/jpeg"); //son los formatos que se aceptan 
          $limite_kb = 200; //peso maximo permitido
          if (in_array($_FILES["fotosparcela"]["type"], $permtidos) && $_FILES["fotosparcela"]["size"] < $limite_kb * 1024) {        //verifica dentro del arreglo el tipo de archivo si cumple con los requerimientos y si el tamano es el permitido
            $ruta = './files/' . $id_persona . '/' . 'parcelas/' . $parcelasid . '/'; //crea la ruta en la que se guardaran
            $estructura = './files/' . $id_persona . '/' . 'parcelas/' . $parcelasid . '/';
            if (!file_exists($ruta)) //verifica si existe la ruta y sino la crea
            { //ES OBLIGATORIO CREAR LA CARPETA DENTRO DEL DIRECTORIO RAIZ A MANO PARA PODER ALMACENAR LOS DATOS
              mkdir($estructura, 0777, true);
            }
            $archivo = $ruta . $_FILES["fotosparcela"]["name"]; //concatena al archivo la ruta en la que se tiene que guardar con el nombre con el que se subio la imagen
            if (!file_exists($archivo)) //validando si el archivo existe
            {
              $resultado = @move_uploaded_file($_FILES["fotosparcela"]["tmp_name"], $archivo); //la funcion de  @move_uploaded_file mueve el archivo del formulario a la nueva ruta
              if ($resultado) {
                $result = ["resultado" => "archivo guardado"];
              } else {
                throw new Exception('no se guardo');
              }
            } else {
              throw new Exception('el archivo ya existe');
            }
          } else {
            throw new Exception('archivo no permitido o exece el tamano');
          }
        }
        //nueva inserccion de fotos //alamcenando comprobantes 
        if ($_FILES["comprobantepropiedad"]["error"] > 0) {
          throw new Exception('error al carhar archivo');
        } else {
          if (in_array($_FILES["comprobantepropiedad"]["type"], $permtidos) && $_FILES["comprobantepropiedad"]["size"] < $limite_kb * 1024) {
            $ruta = './files/' . $id_persona . '/' . 'comprobantes/' . $parcelasid . '/';
            $estructura = './files/' . $id_persona . '/' . 'comprobantes/' . $parcelasid . '/';
            if (!file_exists($ruta)) {
              mkdir($estructura, 0777, true);
            }
            $archivo = $ruta . $_FILES["comprobantepropiedad"]["name"];
            if (!file_exists($archivo)) {
              $resultado = @move_uploaded_file($_FILES["comprobantepropiedad"]["tmp_name"], $archivo);
              if ($resultado) {
                $result = ["resultado" => "archivo guardado"];
              } else {
                throw new Exception('no se guardo');
              }
            } else {
              throw new Exception('el archivo ya existe');
            }
          } else {
            throw new Exception('archivo no permitido o exece el tamano');
          }
        }
        //documento de identidad al derecho
        if ($_FILES["fotofrontal"]["error"] > 0) {
          throw new Exception('error al carhar archivo');
        } else {
          if (in_array($_FILES["fotofrontal"]["type"], $permtidos) && $_FILES["fotofrontal"]["size"] < $limite_kb * 1024) {
            $ruta = './files/' . $id_persona . '/' . 'identificacion/' . $parcelasid . '/';
            $estructura = './files/' . $id_persona . '/' . 'identificacion/' . $parcelasid . '/';
            if (!file_exists($ruta)) {
              mkdir($estructura, 0777, true);
            }
            $archivo = $ruta . $_FILES["fotofrontal"]["name"];
            if (!file_exists($archivo)) {
              $resultado = @move_uploaded_file($_FILES["fotofrontal"]["tmp_name"], $archivo);
              if ($resultado) {
                $result = ["resultado" => "archivo guardado"];
              } else {
                throw new Exception('no se guardo');
              }
            } else {
              throw new Exception('el archivo ya existe');
            }
          } else {
            throw new Exception('archivo no permitido o exece el tamano');
          }
        }
        //comprobante de identidad al reverso
        if ($_FILES["fotoreverso"]["error"] > 0) {
          throw new Exception('error al carhar archivo');
        } else {
          if (in_array($_FILES["fotoreverso"]["type"], $permtidos) && $_FILES["fotoreverso"]["size"] < $limite_kb * 1024) {
            $ruta = './files/' . $id_persona . '/' . 'identificacion/' . $parcelasid . '/';
            $estructura = './files/' . $id_persona . '/' . 'identificacion/' . $parcelasid . '/';
            if (!file_exists($ruta)) {
              mkdir($estructura, 0777, true);
            }
            $archivo = $ruta . $_FILES["fotoreverso"]["name"];
            if (!file_exists($archivo)) {
              $resultado = @move_uploaded_file($_FILES["fotoreverso"]["tmp_name"], $archivo);
              if ($resultado) {
                $result = ["resultado" => "archivo guardado"];
              } else {
                throw new Exception('no se guardo');
              }
            } else {
              throw new Exception('el archivo ya existe');
            }
          } else {
            throw new Exception('archivo no permitido o exece el tamano');
          }
        }
        //


      } else {
        throw new Exception('error al almacenar archivos');
      }
    } catch (exception $e) {
      $result = [
        "success" => $e
      ];
      $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false);
    } finally {
      $result = [
        "success" => "archivos subidos con exito"
      ];
      $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false);
    }
  }


}
