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

	public function enlace_registrar($id_guia_remision)
	{
		$data = array(
			'cbox_tipo_comprobante' => $this->M_cbox->cbox_tipo_comprobante(),
			'cbox_condicion_pago_cotizacion' => $this->M_cbox->cbox_condicion_pago_cotizacion(),
			'enlace_actualizar_cabecera' => $this->M_comprobantes->enlace_actualizar_cabecera($id_guia_remision),
			'enlace_actualizar_detalle' => $this->M_comprobantes->enlace_actualizar_detalle($id_guia_remision),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('comprobantes/V_registrar', $data);
	}
}
