<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_comprobantes extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_comprobantes");
		$this->load->model("M_cotizacion");
		$this->load->model("M_cbox");
	}

	public function index()
	{
		$data = array(
			'index' => $this->M_comprobantes->index(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('comprobantes/V_index', $data);
	}

	public function enlace_registrar()
	{

		// {

		// 	$data = array(
		// 		'index_clientes_proveedores' => $this->M_cotizacion->index_clientes_proveedores(),
		// 		'index_productos' => $this->M_cotizacion->index_productos(),
		// 		'index_tableros' => $this->M_cotizacion->index_tableros(),
		// 		'index_comodin' => $this->M_cotizacion->index_comodin(),
		// 		'cbox_condicion_pago' => $this->M_cbox->cbox_condicion_pago(),
		// 		'tipo_cambio' => $this->M_cotizacion->tipo_cambio(),
		// 		'cbox_moneda' => $this->M_cbox->cbox_moneda(),
		// 		'cbox_estado_cotizacion' => $this->M_cbox->cbox_estado_cotizacion(),
		// 		'cbox_tipo_orden_parcial_completa' => $this->M_cbox->cbox_tipo_orden_parcial_completa(),
		// 		'enlace_actualizar_cabecera' => $this->M_cotizacion->enlace_actualizar_cabecera($id_cotizacion),
		// 		'enlace_actualizar_detalle' => $this->M_cotizacion->enlace_actualizar_detalle($id_cotizacion)
		// 	);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('comprobantes/V_registrar');
	}
}
