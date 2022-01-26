
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_inicio extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_inicio");
        $this->load->model("M_cbox");
    }

    public function index()
    {
        $data = array(
            'cbox_empresa' => $this->M_cbox->cbox_empresa(),
        );

        if ($this->session->userdata("login")) {
            redirect(base_url() . "C_menu");
        } else {
            $this->load->view("inicio/V_index", $data);
        }
    }

    public function ingresar()
    {
        $usuario = $this->input->post("usuario");
        $contraseña = $this->input->post("contraseña");
        $res = $this->M_inicio->ingresar($usuario, $contraseña);

        if (!$res) {
            redirect(base_url());
        } else {
            $data = array(
                'id_usuario' => $res->id_usuario,
                'ds_nombre_usuario' => $res->ds_nombre_usuario,
                'ds_cargo_trabajador' => $res->ds_cargo_trabajador,
                'ds_accesos_empresas' => $res->ds_accesos_empresas,
                'login' => TRUE
            );
            $this->session->set_userdata($data);
            redirect(base_url() . "C_menu");
        }
    }

    public function cerrar_login()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
