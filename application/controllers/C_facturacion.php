<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_facturacion extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_cotizacion");
		$this->load->model("M_cbox");
	}

	public function index()

	{

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('facturacion/V_index');
	}

	public function enlace_registrar()
	{

		/*	$data = array(
			'index_productos' => $this->M_cotizacion->index_productos(),
			'index_tableros' => $this->M_cotizacion->index_tableros(),
			'cbox_condicion_pago' => $this->M_cbox->cbox_condicion_pago(),

		); , $data  */

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('facturacion/V_registrar');
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
