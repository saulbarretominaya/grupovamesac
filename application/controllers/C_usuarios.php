<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_usuarios");
        $this->load->model("M_cbox");
    }


    public function index()
    {

        $data = array(
            'index' => $this->M_usuarios->index(),
        );

        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('usuarios/V_index', $data);
    }

    public function enlace_registrar()
    {
        $data = array(
            'index_trabajadores' => $this->M_usuarios->index_trabajadores(),
            'cbox_roles_usuarios' => $this->M_cbox->cbox_roles_usuarios(),
            'cbox_empresa' => $this->M_cbox->cbox_empresa(),
        );
        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('usuarios/V_registrar', $data);
    }


    public function validar_usuario_repetido_registrar()
    {
        $usuario = $this->input->post("usuario");
        $cantidad_usuario = $this->M_usuarios->validar_usuario_repetido_registrar($usuario);
        echo json_encode($cantidad_usuario);
    }

    public function validar_usuario_repetido_actualizar()
    {
        $id_usuario = $this->input->post("id_usuario");
        $usuario = $this->input->post("usuario");
        $cantidad_usuario = $this->M_usuarios->validar_usuario_repetido_actualizar($id_usuario, $usuario);
        echo json_encode($cantidad_usuario);
    }

    public function registrar()
    {
        $usuario = $this->input->post("usuario");
        $password = $this->input->post("password");
        $id_empresa = $this->input->post("id_empresa");
        $id_rol = $this->input->post("id_rol");
        $id_trabajador = $this->input->post("id_trabajador");


        if ($this->M_usuarios->registrar(
            $usuario,
            $password,
            $id_empresa,
            $id_rol,
            $id_trabajador
        ));
        echo json_encode($usuario);
    }

    public function enlace_actualizar($id_usuario)
    {

        $data = array(
            'enlace_actualizar' => $this->M_usuarios->enlace_actualizar($id_usuario),
            'index_trabajadores' => $this->M_usuarios->index_trabajadores(),
            'cbox_roles_usuarios' => $this->M_cbox->cbox_roles_usuarios(),
            'cbox_empresa' => $this->M_cbox->cbox_empresa(),
        );
        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('usuarios/V_actualizar', $data);
    }

    public function actualizar()
    {
        $id_usuario = $this->input->post("id_usuario");
        $usuario = $this->input->post("usuario");
        $password = $this->input->post("password");
        $id_empresa = $this->input->post("id_empresa");
        $id_rol = $this->input->post("id_rol");
        $id_trabajador = $this->input->post("id_trabajador");


        if ($this->M_usuarios->actualizar(
            $id_usuario,
            $usuario,
            $password,
            $id_empresa,
            $id_rol,
            $id_trabajador
        ));
        echo json_encode($id_usuario);
    }
}
