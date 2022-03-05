<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('LoginModel', 'loginModel');
    $this->load->model('UploadModel', 'uploadModel');
    $this->load->library('session');
  }
  public function index()
  {
    $this->load->view(template_frontpath('sign-templates/sign-up'), false);
  }

  public function signin()
  {
    $this->load->view(template_frontpath('sign-templates/sign-in'), false);
  }

  public function loginUser()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $sql = $this->loginModel->login($email, md5($password));

    if (isset($sql->id_persona)) {
      $router = $this->loginModel->getTypeUser($sql->id_persona);
      if ($router->id_rol == 1) {
        $this->session->set_userdata('user_data', $router);
        redirect('Farmer', 'refresh');
      } else {

        $this->session->set_userdata('user_data', $router);
        redirect('Landlord', 'refresh');
      }
    } else {
      message('error', 'Usuario/contraseña incorrectos');
      redirect('Login', 'refresh');
    }
  }

  public function crearUsuario($token = '')
  {
    if ($token != '') {
      $code_decode = decryptToken($token);
      $cuentaConfirmada = $this->loginModel->cuentaConfirmada(
        $code_decode['data']->id
      );
      if ($code_decode['status'] == 200 && $cuentaConfirmada == false) {
        $data['id'] = $code_decode['data']->id;
        $this->load->view(template_frontpath('sign-templates/createUser'), $data, false);
      } else {
        echo 'token vencido';
      }
    } else {
      redirect('login', 'refresh');
    }
  }

  public function createPerson()
  {
  }

  public function createUser()
  {
    $email = $this->input->post('email');
    $user['correo'] = $email;
    $user['contrasena'] = md5($this->input->post('password'));
    $user['estado'] = 0;
    $data['nombres'] = $this->input->post('name');
    $data['apellidos'] = $this->input->post('lastname');
    $data['edad'] = $this->input->post('age');
    $data['id_direcciones'] = 0;
    $data['telefono'] = $this->input->post('phone');
    $data['id_rol'] = $this->input->post('accountType');
    $data['departamento'] = $this->input->post('departamento');
    $data['municipio'] = $this->input->post('municipio');
    $data['direccion'] = $this->input->post('direccion');
    $data['nit'] = $this->input->post('nitn');
    $data['dui'] = $this->input->post('duin');


    $sql = $this->loginModel->createUser($user);
    $validacion = $this->loginModel->validarCorreo($email);
    // $sql = 1;
    if ($validacion == 0) {
      if ($sql > 0) {
        $id_cuenta = $sql;
        $data['id_cuenta'] = $id_cuenta;
        $cuenta['id_persona'] = $this->loginModel->registerUser($data);

        //sube las fots de dui y nit
        $duif['id_usuario'] = $id_cuenta;
        $duif['direccion'] = subirArchivos('./uploads/comprobantes/' . $id_cuenta . '/dui', 'jinx', $_FILES['duif']);
        $duit['id_usuario'] = $id_cuenta;
        $duit['direccion'] = subirArchivos('./uploads/comprobantes/' . $id_cuenta . '/dui', 'jinx', $_FILES['duit']);

        $nitf['id_usuario'] = $id_cuenta;
        $nitf['direccion'] = subirArchivos('./uploads/comprobantes/' . $id_cuenta . '/nit', 'jinx', $_FILES['nitf']);
        $nitt['id_usuario'] = $id_cuenta;
        $nitt['direccion'] = subirArchivos('./uploads/comprobantes/' . $id_cuenta . '/nit', 'jinx', $_FILES['nitt']);

        $this->uploadModel->uploadPicturePerson($duif);
        $this->uploadModel->uploadPicturePerson($duit);
        $this->uploadModel->uploadPicturePerson($nitf);
        $this->uploadModel->uploadPicturePerson($nitt);

        $this->loginModel->updateCuenta($cuenta, $id_cuenta);

        //genera codigo de activacion de cuenta y lo envia por correo
        $encript['id'] = $id_cuenta;
        $code = createToken($encript);
        $url = base_url() . 'login/confirmaCuenta/' . $code;
        send_mail($url, $email);
        echo json_encode(201);
      } else {
        echo json_encode(400);
      }
    }else{
      echo json_encode(401);
    }
  }

  public function confirmaCuenta($token)
  {
    if ($token != '') {
      $code_decode = decryptToken($token);
      $cuentaConfirmada = $this->loginModel->cuentaConfirmada(
        $code_decode['data']->id
      );
      if ($code_decode['status'] == 200) {
        if ($cuentaConfirmada == false) {
          $id = $code_decode['data']->id;
          $update['estado'] = 1;
          $this->loginModel->updateCuenta($update, $id);
          $message['message'] = 'cuenta confirmada, puede iniciar sesion';
          $this->load->view(template_frontpath('ui/message'), $message, false);
        } else {
          $message['message'] = 'tu cuenta ya fue confirmada';
          $this->load->view(template_frontpath('ui/message'), $message, false);
        }
      } else {
        $message['message'] = 'token vencido';
        $this->load->view(template_frontpath('ui/message'), $message, false);
      }
    } else {
      redirect(('login'), 'refresh');
    }
  }

  public function logout() //funcion para cerrar sesion
  {
    $this->session->sess_destroy();
    return redirect(base_url());
  }
}
