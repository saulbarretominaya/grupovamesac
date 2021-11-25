
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_inicio extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_inicio");
    }

    public function index()
    {
        if ($this->session->userdata("login")) {
            redirect(base_url() . "C_menu");
        } else {
            $this->load->view("inicio/V_index");
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
