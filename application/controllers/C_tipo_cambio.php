<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_tipo_cambio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_tipo_cambio");
    }
    public function index()
    {
        $data = array(
            'index' => $this->M_tipo_cambio->index(),
        );

        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('tipo_cambio/V_index', $data);
    }
    public function enlace_registrar()
    {
        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('tipo_cambio/V_registrar');
    }

    public function insertar()
    {
        $compra = $this->input->post("compra");
        $venta = $this->input->post("venta");
        if ($this->M_tipo_cambio->insertar(
            $compra,
            $venta,
        ))

            echo json_encode($compra);
    }


    public function enlace_actualizar($id_tipo_cambio)
    {

        $data = array(
            'enlace_actualizar' => $this->M_tipo_cambio->enlace_actualizar($id_tipo_cambio),
        );
        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('tipo_cambio/V_actualizar', $data);
    }

    public function actualizar()
    {
        $id_tipo_cambio = $this->input->post("id_tipo_cambio");
        $compra = $this->input->post("compra");
        $venta = $this->input->post("venta");

        if ($this->M_tipo_cambio->actualizar(
            $id_tipo_cambio,
            $compra,
            $venta
        ));

        echo json_encode($id_tipo_cambio);
    }
}
