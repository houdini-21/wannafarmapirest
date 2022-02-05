<?php
defined("BASEPATH") or exit("No direct script access allowed");

class parcelasController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->load->model("HomeModel", "homeModel");
    $this->load->model('parcelasModel');
  }
  public function index()
  {
    //verificando si el usuario esta logueado
    $this->isLogged();
  }
  public function isLogged() //funcion del log
  {
    $session = $this->session->userdata('islog'); //extraemos la informacion de la session
    if ($session == 0) //si no hay session se manda al login
    {
      $this->load->view(
        template_frontpath('sign-templates/sign-up'),
        false
      );
    } else {
      //carganmos un mensjae para la vista 
      $result = [
        "resultado" => " ",
        "add" => " ",
        "success" => " "
      ];
      //
      $this->load->view(
        template_frontpath('parcelas-template/agregarparcelas'),
        $result,
        false
        // $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), false);
      );
    }
  }
  public function logout() //funcion para cerrar sesion
  {
    $this->session->sess_destroy();
    return redirect(base_url());
  }

  //almaceando parcelas
  public function almacenandoParcelas()
  { //los datos que se reciben son enviados a una tabla para verificar tu veracidad
    $valor2 = $this->session->userdata('idperson');
    $id_persona = $valor2;//$this->session->user_data('idperson'); //extraemos el id de la variable session que quedo almacenado al iniciar 
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
  try
  {
    $sql = $this->parcelasModel->registrarParcelas($data);
    if ($sql > 0) 
    {
     $idParcelas['id_parcelas'] = $sql;
     $parcelasid = implode($idParcelas);
  //   print_r($parcelasid);
      if ($_FILES["fotosparcela"]["error"] > 0) //carga el archivo con sus propiedades
        {
       // $result = [ "resultado" => "error al carhar archivo" ];
      //  $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
      throw new Exception('error al carhar archivo');    //lanza una nueva excepcion
     }
      else
       {
          $permtidos = array("image/jpg", "image/png", "image/jpeg");//son los formatos que se aceptan 
          $limite_kb = 200;//peso maximo permitido
          if (in_array($_FILES["fotosparcela"]["type"], $permtidos) && $_FILES["fotosparcela"]["size"] < $limite_kb * 1024)
          {        //verifica dentro del arreglo el tipo de archivo si cumple con los requerimientos y si el tamano es el permitido
           $ruta = './files/'.$id_persona.'/'.'parcelas/'.$parcelasid.'/' ;//crea la ruta en la que se guardaran
                    //files/14/parcelas/24/foto   
            $estructura = './files/'.$id_persona.'/'.'parcelas/'.$parcelasid.'/';
           if (!file_exists($ruta)) //verifica si existe la ruta y sino la crea
                {//ES OBLIGATORIO CREAR LA CARPETA DENTRO DEL DIRECTORIO RAIZ A MANO PARA PODER ALMACENAR LOS DATOS
                mkdir($estructura,0777, true);
                }
           $archivo = $ruta . $_FILES["fotosparcela"]["name"];//concatena al archivo la ruta en la que se tiene que guardar con el nombre con el que se subio la imagen
           if (!file_exists($archivo)) //validando si el archivo existe
           {
             $resultado = @move_uploaded_file($_FILES["fotosparcela"]["tmp_name"], $archivo);//la funcion de  @move_uploaded_file mueve el archivo del formulario a la nueva ruta
                  if ($resultado) 
                  {
                    $result = [ "resultado" => "archivo guardado" ];
                  // $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
                  } 
                  else 
                    {
                    //   $result = [
                    //   "resultado" => "no se guardado"
                    //   ];
                    //   $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
                    // // echo "no se guardo";
                    throw new Exception('no se guardo');
                    }
            } 
            else 
            {
            //     $result = [
            //       "resultado" => "el archivo ya existe"
            //     ];
            //     $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false);
            // //  echo "el archivo ya existe";
            throw new Exception('el archivo ya existe');
            }
          } 
         else 
         {
            // $result = [
            //   "resultado" => "archivo no permitido o exece el tamano"
            // ];
            // $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false);
            // //echo "archivo no permitido o exece el tamano";
            throw new Exception('archivo no permitido o exece el tamano');
          }
        }
      }
    else 
    {
      // $result = [
      //   "success" => "error al almacenar archivos"
      // ];
      // $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
       throw new Exception('error al almacenar archivos');
    }

  }
  catch(exception $e ){
       $result = [
         "success" =>$e
       ];
       $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
      

  }
  finally{
    $result = [
      "success" => "archivos subidos con exito"
    ];
    $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
 
  }




        
        

//***********agrgando comprobante de propiedad************
      //  if ($_FILES["comprobantepropiedad"]["error"] > 0) //carga el archivo con sus propiedades
      //  {
      //    $result = [
      //               "resultado" => "error al carhar archivo"
      //              ];
      //    $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
      //   // echo "error al carhar archivo";
      //  }
      //  else
      //  {
      //    $permtidos = array("image/jpg", "image/png", "image/jpeg");//son los formatos que se aceptan 
      //    $limite_kb = 200;//peso maximo permitido
      //    if (in_array($_FILES["comprobantepropiedad"]["type"], $permtidos) && $_FILES["comprobantepropiedad"]["size"] < $limite_kb * 1024)
      //     {        //verifica dentro del arreglo el tipo de archivo si cumple con los requerimientos y si el tamano es el permitido
      //      $ruta = './files/' . $id_persona . '/';//crea la ruta en la que se guardaran
      //      $archivo = $ruta . $_FILES["fotosparcela"]["name"];//concatena al archivo la ruta en la que se tiene que guardar con el nombre con el que se subio la imagen
      //      if (!file_exists($ruta)) //verifica si existe la ruta y sino la crea
      //      {
      //        mkdir($ruta);
      //      }
      //      if (!file_exists($archivo)) //validando si el archivo existe
      //      {
      //        $resultado = @move_uploaded_file($_FILES["fotosparcela"]["tmp_name"], $archivo);//la funcion de  @move_uploaded_file mueve el archivo del formulario a la nueva ruta
      //        if ($resultado) 
      //        {
      //          $result = [
      //            "resultado" => "archivo guardado",
      //            "add" => " otras "
      //          ];
      //          $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
      //        } 
      //        else 
      //        {
      //          $result = [
      //            "resultado" => "no se guardado"
      //          ];
      //          $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
      //         // echo "no se guardo";
      //        }
      //      } 
      //      else 
      //      {
      //        $result = [
      //          "resultado" => "el archivo ya existe"
      //        ];
      //        $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false);
      //      //  echo "el archivo ya existe";
      //      }
      //    } 
      //    else 
      //    {
      //      $result = [
      //        "resultado" => "archivo no permitido o exece el tamano"
      //      ];
      //      $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false);
      //      //echo "archivo no permitido o exece el tamano";
      //    }
      //  }

  

     
  





    //almacenando comprovante de propiedad
    // if ($_FILES["archivo"]["error"] > 0) //carga el archivo con sus propiedades
    // {
    //   $result = [
    //              "resultado" => "error al carhar archivo"
    //             ];
    //   $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
    //  // echo "error al carhar archivo";
    // }
    // else
    // {
    //   $permtidos = array("image/jpg", "image/png", "image/jpeg");//son los formatos que se aceptan 
    //   $limite_kb = 200;//peso maximo permitido
    //   if (in_array($_FILES["archivo"]["type"], $permtidos) && $_FILES["archivo"]["size"] < $limite_kb * 1024)
    //    {        //verifica dentro del arreglo el tipo de archivo si cumple con los requerimientos y si el tamano es el permitido
    //     $ruta = './files/' . $id_persona . '/';//crea la ruta en la que se guardaran
    //     $archivo = $ruta . $_FILES["archivo"]["name"];//concatena al archivo la ruta en la que se tiene que guardar con el nombre con el que se subio la imagen
    //     if (!file_exists($ruta)) //verifica si existe la ruta y sino la crea
    //     {
    //       mkdir($ruta);
    //     }
    //     if (!file_exists($archivo)) //validando si el archivo existe
    //     {
    //       $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);//la funcion de  @move_uploaded_file mueve el archivo del formulario a la nueva ruta
    //       if ($resultado) 
    //       {
    //         $result = [
    //           "resultado" => "archivo guardado",
    //           "add" => " otras "
    //         ];
    //         $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
    //       } 
    //       else 
    //       {
    //         $result = [
    //           "resultado" => "no se guardado"
    //         ];
    //         $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
    //        // echo "no se guardo";
    //       }
    //     } 
    //     else 
    //     {
    //       $result = [
    //         "resultado" => "el archivo ya existe"
    //       ];
    //       $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false);
    //     //  echo "el archivo ya existe";
    //     }
    //   } 
    //   else 
    //   {
    //     $result = [
    //       "resultado" => "archivo no permitido o exece el tamano"
    //     ];
    //     $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false);
    //     //echo "archivo no permitido o exece el tamano";
    //   }
    // }

    // //foto de documento de identidad frontal
    // if ($_FILES["archivo"]["error"] > 0) //carga el archivo con sus propiedades
    // {
    //   $result = [
    //              "resultado" => "error al carhar archivo"
    //             ];
    //   $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
    //  // echo "error al carhar archivo";
    // }
    // else
    // {
    //   $permtidos = array("image/jpg", "image/png", "image/jpeg");//son los formatos que se aceptan 
    //   $limite_kb = 200;//peso maximo permitido
    //   if (in_array($_FILES["archivo"]["type"], $permtidos) && $_FILES["archivo"]["size"] < $limite_kb * 1024)
    //    {        //verifica dentro del arreglo el tipo de archivo si cumple con los requerimientos y si el tamano es el permitido
    //     $ruta = './files/' . $id_persona . '/';//crea la ruta en la que se guardaran
    //     $archivo = $ruta . $_FILES["archivo"]["name"];//concatena al archivo la ruta en la que se tiene que guardar con el nombre con el que se subio la imagen
    //     if (!file_exists($ruta)) //verifica si existe la ruta y sino la crea
    //     {
    //       mkdir($ruta);
    //     }
    //     if (!file_exists($archivo)) //validando si el archivo existe
    //     {
    //       $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);//la funcion de  @move_uploaded_file mueve el archivo del formulario a la nueva ruta
    //       if ($resultado) 
    //       {
    //         $result = [
    //           "resultado" => "archivo guardado",
    //           "add" => " otras "
    //         ];
    //         $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
    //       } 
    //       else 
    //       {
    //         $result = [
    //           "resultado" => "no se guardado"
    //         ];
    //         $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
    //        // echo "no se guardo";
    //       }
    //     } 
    //     else 
    //     {
    //       $result = [
    //         "resultado" => "el archivo ya existe"
    //       ];
    //       $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false);
    //     //  echo "el archivo ya existe";
    //     }
    //   } 
    //   else 
    //   {
    //     $result = [
    //       "resultado" => "archivo no permitido o exece el tamano"
    //     ];
    //     $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false);
    //     //echo "archivo no permitido o exece el tamano";
    //   }
    // }

    // //foto de identidad al reverso
    // if ($_FILES["archivo"]["error"] > 0) //carga el archivo con sus propiedades
    // {
    //   $result = [
    //              "resultado" => "error al carhar archivo"
    //             ];
    //   $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
    //  // echo "error al carhar archivo";
    // }
    // else
    // {
    //   $permtidos = array("image/jpg", "image/png", "image/jpeg");//son los formatos que se aceptan 
    //   $limite_kb = 200;//peso maximo permitido
    //   if (in_array($_FILES["archivo"]["type"], $permtidos) && $_FILES["archivo"]["size"] < $limite_kb * 1024)
    //    {        //verifica dentro del arreglo el tipo de archivo si cumple con los requerimientos y si el tamano es el permitido
    //     $ruta = './files/' . $id_persona . '/';//crea la ruta en la que se guardaran
    //     $archivo = $ruta . $_FILES["archivo"]["name"];//concatena al archivo la ruta en la que se tiene que guardar con el nombre con el que se subio la imagen
    //     if (!file_exists($ruta)) //verifica si existe la ruta y sino la crea
    //     {
    //       mkdir($ruta);
    //     }
    //     if (!file_exists($archivo)) //validando si el archivo existe
    //     {
    //       $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);//la funcion de  @move_uploaded_file mueve el archivo del formulario a la nueva ruta
    //       if ($resultado) 
    //       {
    //         $result = [
    //           "resultado" => "archivo guardado",
    //           "add" => " otras "
    //         ];
    //         $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
    //       } 
    //       else 
    //       {
    //         $result = [
    //           "resultado" => "no se guardado"
    //         ];
    //         $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false); 
    //        // echo "no se guardo";
    //       }
    //     } 
    //     else 
    //     {
    //       $result = [
    //         "resultado" => "el archivo ya existe"
    //       ];
    //       $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false);
    //     //  echo "el archivo ya existe";
    //     }
    //   } 
    //   else 
    //   {
    //     $result = [
    //       "resultado" => "archivo no permitido o exece el tamano"
    //     ];
    //     $this->load->view(template_frontpath('parcelas-template/agregarparcelas'), $result, false);
    //     //echo "archivo no permitido o exece el tamano";
    //   }
    // }

    //

  }

  
}
