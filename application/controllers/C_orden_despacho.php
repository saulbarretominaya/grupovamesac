<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_orden_despacho extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_orden_despacho");
		$this->load->model("M_cbox");
	}

	public function index()
	{
		$data = array(
			'index' => $this->M_orden_despacho->index(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('orden_despacho/V_index', $data);
	}

	public function aprobar_estado()
	{

		$id_orden_despacho = $this->input->post("id_orden_despacho");
		$linea_credito_dolares = $this->input->post("linea_credito_dolares");
		$id_cliente_proveedor = $this->input->post("id_cliente_proveedor");
		$nueva_linea_credito = $this->input->post("nueva_linea_credito");
		$monto_cotizacion = $this->input->post("monto_cotizacion");


		$this->M_orden_despacho->aprobar_estado($id_orden_despacho, $linea_credito_dolares);
		$this->M_orden_despacho->actualizar_linea_credito($id_cliente_proveedor, $nueva_linea_credito, $monto_cotizacion);
		echo json_encode($id_orden_despacho);
	}


	public function aprobar_estado_directo()
	{

		$id_orden_despacho = $this->input->post("id_orden_despacho");

		$this->M_orden_despacho->aprobar_estado_directo($id_orden_despacho);
		echo json_encode($id_orden_despacho);
	}

	public function desaprobar_estado()
	{
		$id_orden_despacho = $this->input->post("id_orden_despacho");
		$id_cotizacion = $this->input->post("id_cotizacion");

		$this->M_orden_despacho->desaprobar_estado($id_orden_despacho);
		$this->M_orden_despacho->cambiar_estado_pendiente_cotizacion($id_cotizacion);
		echo json_encode($id_orden_despacho);
	}

	public function aplicar_tipo_cambio()
	{
		$id_orden_despacho = $this->input->post("id_orden_despacho");
		$resultado_valor_cambio = $this->input->post("resultado_valor_cambio");
		$this->M_orden_despacho->aplicar_tipo_cambio($id_orden_despacho, $resultado_valor_cambio);
		echo json_encode($id_orden_despacho);
	}

	public function index_modal()
	{
		$id_orden_despacho = $this->input->post("id_orden_despacho");

		$data = array(
			"index_modal_cabecera" => $this->M_orden_despacho->index_modal_cabecera($id_orden_despacho),
			"index_modal_detalle" => $this->M_orden_despacho->index_modal_detalle($id_orden_despacho),
		);

		$this->load->view("orden_despacho/V_index_modal", $data);
	}
}
