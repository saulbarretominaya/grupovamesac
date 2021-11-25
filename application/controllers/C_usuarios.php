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
        );
        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('usuarios/V_registrar', $data);
    }

    public function registrar()
    {
        $id_trabajador = $this->input->post("id_trabajador");
        $usuario = $this->input->post("usuario");
        $password = $this->input->post("password");
        $id_rol = $this->input->post("id_rol");

        if ($this->M_usuarios->registrar(
            $id_trabajador,
            $usuario,
            $password,
            $id_rol
        ));
        echo json_encode($id_trabajador);
    }

    public function enlace_actualizar($id_trabajador)
    {

        $data = array(
            'enlace_actualizar' => $this->M_usuarios->enlace_actualizar($id_trabajador),
            'index_trabajadores' => $this->M_usuarios->index_trabajadores(),
            'cbox_roles_usuarios' => $this->M_cbox->cbox_roles_usuarios(),
        );
        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('usuarios/V_actualizar', $data);
    }

    public function actualizar()
    {
        $id_trabajador = $this->input->post("id_trabajador");
        $usuario = $this->input->post("usuario");
        $password = $this->input->post("password");
        $id_rol = $this->input->post("id_rol");

        if ($this->M_usuarios->actualizar(
            $id_trabajador,
            $usuario,
            $password,
            $id_rol
        ));
        echo json_encode($id_trabajador);
    }
}
