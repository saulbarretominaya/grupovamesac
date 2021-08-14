<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_cotizacion extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_cotizacion");
	}

	public function index()

	{

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('cotizacion/V_index');
	}

	public function enlace_registrar()
	{

		$data = array(
			'index_productos' => $this->M_cotizacion->index_productos(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('cotizacion/V_registrar', $data);
	}

	public function insertar()
	{

		$validez_oferta = $this->input->post("validez_oferta");
		$direccion = $this->input->post("direccion");
		$lugar_entrega = $this->input->post("lugar_entrega");
		$clausula = $this->input->post("clausula");
		$correo_electronico = $this->input->post("correo_electronico");


		if ($this->M_cotizacion->insertar(
			$validez_oferta,
			$direccion,
			$lugar_entrega,
			$clausula,
			$correo_electronico,
		))
			echo json_encode($validez_oferta);
	}
}
