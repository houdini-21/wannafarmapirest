<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CRUD_controller extends CI_Controller
{
    public $user = false;
    public function __construct()
    {
        parent::__construct();

        $this->user = userget();
        $current_controller = $this->router->fetch_class();
        $current_controller = strtolower($current_controller);
        $exceptions = array("login");

        if ($this->user == FALSE && !in_array($current_controller, $exceptions)) {
            redirect(base_url('login'));
        }

        ///debes de agregar el nombre del contraldor conforme los usuarios con persmisos 
        //si el controlador creado es para farmer entonces deber de agregar el nombre del controlador en el array del usuario farmer

        //farmer
        $acceso_rol[1] = array("farmer");
        //landlord
        $acceso_rol[2] = array("landlord", "parcelascontroller");

        $accesos = array();
        $accesos = array_merge($accesos, $acceso_rol[$this->user->id_rol]);


        if (!in_array($current_controller, $accesos)) {
            if (count($accesos) > 0) {
                redirect(base_url($accesos[0] . "/"), 'refresh');
            } else {
                redirect(base_url('error/noasignado'), 'refresh');
            }
        }
    }
}
