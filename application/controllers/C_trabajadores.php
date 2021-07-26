<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_trabajadores extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_trabajadores");
    }


    public function index()
    {
        $data = array(
            'index' => $this->M_trabajadores->index(),
        );

        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('trabajadores/V_index', $data);
        $this->load->view('plantilla/V_footer');
    }

    public function enlace_registrar()
    {
        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('trabajadores/V_registrar');
        $this->load->view('plantilla/V_footer');
    }
}
