<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Administracion/Model_usuarios");
        $this->load->model("Multitablas/Model_multitablas");
    }

    #LISTAR

    public function index() {
        $data = array(
            'listar_usuarios' => $this->Model_usuarios->listar(),
        );
        
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Administracion/Usuarios/Listar",$data);
    }

    public function enlace_insertar() {

        $data = array(
            'multitablas_roles' => $this->Model_multitablas->multitablas_roles(),
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Administracion/Usuarios/Insertar", $data);
    }

    public function insertar() {

        $nombre = $this->input->post("nombre");
        $apellido = $this->input->post("apellido");
        $usuario = $this->input->post("usuario");
        $password = $this->input->post("password");
        $correo_electronico = $this->input->post("correo_electronico");
        $centro_costo = $this->input->post("centro_costo");
        $ubicacion = $this->input->post("ubicacion");
        $telefono = $this->input->post("telefono");
        $area = $this->input->post("area");
        $id_rol = $this->input->post("id_rol");

        $data = array(
            'nombre' => $nombre,
            'apellido' => $apellido,
            'usuario' => $usuario,
            'password' => $password,
            'correo_electronico' => $correo_electronico,
            'centro_costo' => $centro_costo,
            'ubicacion' => $ubicacion,
            'telefono' => $telefono,
            'area' => $area,
            'id_rol' => $id_rol,
            'id_estado' => '1',
        );

        if ($this->Model_usuarios->insertar($data)) {
            redirect(base_url() . "Administracion/Controller_usuarios");
        }
    }

    #ENLACE UPDATE

    public function enlace_actualizar($id_usuario) {
        $data = array(
            'enlace_actualizar_usuarios' => $this->Model_usuarios->enlace_actualizar($id_usuario),
            'multitablas_roles' => $this->Model_multitablas->multitablas_roles(),
        );

        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("Administracion/Usuarios/Actualizar", $data);
    }

    public function actualizar() {
        $id_usuario = $this->input->post("id_usuario");
        $nombre = $this->input->post("nombre");
        $apellido = $this->input->post("apellido");
        $usuario = $this->input->post("usuario");
        $password = $this->input->post("password");
        $correo_electronico = $this->input->post("correo_electronico");
        $centro_costo = $this->input->post("centro_costo");
        $ubicacion = $this->input->post("ubicacion");
        $telefono = $this->input->post("telefono");
        $area = $this->input->post("area");
        $id_rol = $this->input->post("id_rol");

        $data = array(
            'nombre' => $nombre,
            'apellido' => $apellido,
            'usuario' => $usuario,
            'password' => $password,
            'correo_electronico' => $correo_electronico,
            'centro_costo' => $centro_costo,
            'ubicacion' => $ubicacion,
            'telefono' => $telefono,
            'area' => $area,
            'id_rol' => $id_rol,
        );

        if ($this->Model_usuarios->actualizar($id_usuario, $data)) {
            redirect(base_url() . "Administracion/Controller_usuarios");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "Administracion/Controller_usuarios/enlace_actualizar/" . $id_usuario);
        }
    }

    #DELETE

    public function eliminar($id_usuario) {

        $this->Model_usuarios->eliminar($id_usuario);
        redirect(base_url() . "Administracion/Controller_usuarios");
    }

}
