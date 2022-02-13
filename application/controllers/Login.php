<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('LoginModel', 'loginModel');
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
    $id_cuenta = $this->input->post('id_cuenta');
    $name = $this->input->post('name');
    $lastname = $this->input->post('lastname');
    $age = $this->input->post('age');
    $address = $this->input->post('address');
    $phone = $this->input->post('phone');
    $role = $this->input->post('accountType');
    $departament = 21;
    $town = 21;

    $data['id_cuenta'] = $id_cuenta;
    $data['nombres'] = $name;
    $data['apellidos'] = $lastname;
    $data['edad'] = $age;
    $data['id_direcciones'] = 0;
    $data['telefono'] = $phone;
    $data['id_rol'] = $role;
    $data['departamento'] = $departament;
    $data['municipio'] = $town;
    $data['direccion'] = $address;
    $sql = $this->loginModel->registerUser($data);

    if ($sql > 0) {
      $cuenta['id_persona'] = $sql;
      $this->loginModel->updateCuenta($cuenta, $id_cuenta);

      $encript['id'] = $id_cuenta;
      $email = $this->loginModel->getEmail($id_cuenta);
      $code = createToken($encript);
      $url = base_url() . 'login/confirmaCuenta/' . $code;

      if (send_mail($url, $email) == 201) {
        $message['message'] =
          'se ha enviado un correo de confirmacion a ' . $email;
        $this->load->view(template_frontpath('ui/message'), $message, false);
      } else {
        $message['message'] =
          'Error al enviar correo electronico';
        $this->load->view(template_frontpath('ui/message'), $message, false);
      }
    } else {
      $message['message'] =
        'Error al enviar correo electronico';
      $this->load->view(template_frontpath('ui/message'), $message, false);
    }
  }

  public function createUser()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $data['correo'] = trim($email);
    $data['contrasena'] = md5($password);
    $data['estado'] = 0;

    $validar_correo = $this->loginModel->validarCorreo($email);
    if ($validar_correo !== 0) {
      echo 'Correo en uso';
      return;
    }
    $sql = $this->loginModel->createUser($data);
    $encript['id'] = $sql;
    $code = createToken($encript);

    if ($sql != 0) {
      $url = base_url() . 'login/crearUsuario/' . $code;
      redirect($url, 'refresh');
    } else {
      $message['message'] =
        'Error intente mas tarde';
      $this->load->view(template_frontpath('ui/message'), $message, false);
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
          $message['message'] = 'cuenta confirmada';
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
      redirect('login', 'refresh');
    }
  }

  public function logout() //funcion para cerrar sesion
  {
    $this->session->sess_destroy();
    return redirect(base_url());
  }
}
