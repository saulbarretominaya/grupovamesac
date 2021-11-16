<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_usuarios");
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
}
