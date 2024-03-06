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
			'index_2' => $this->M_orden_despacho->index_2()
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
		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");

		$this->M_orden_despacho->aprobar_estado($id_orden_despacho, $linea_credito_dolares, $id_trabajador, $ds_nombre_trabajador);
		$this->M_orden_despacho->actualizar_linea_credito($id_cliente_proveedor, $nueva_linea_credito, $monto_cotizacion);
		echo json_encode($id_orden_despacho);
	}


	public function aprobar_estado_directo()
	{

		$id_orden_despacho = $this->input->post("id_orden_despacho");
		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");

		$this->M_orden_despacho->aprobar_estado_directo($id_orden_despacho, $id_trabajador, $ds_nombre_trabajador);
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

	public function index_modal_productos()
	{
		$id_orden_despacho = $this->input->post("id_orden_despacho");

		$data = array(
			"index_modal_cabecera_productos" => $this->M_orden_despacho->index_modal_cabecera_productos($id_orden_despacho),
			"index_modal_detalle_productos" => $this->M_orden_despacho->index_modal_detalle_productos($id_orden_despacho),
		);

		$this->load->view("orden_despacho/V_index_modal_productos", $data);
	}

	public function index_modal_tableros()
	{
		$id_orden_despacho = $this->input->post("id_orden_despacho");

		$data = array(
			"index_modal_cabecera_tableros" => $this->M_orden_despacho->index_modal_cabecera_tableros($id_orden_despacho),
			"index_modal_detalle_tableros" => $this->M_orden_despacho->index_modal_detalle_tableros($id_orden_despacho),
		);

		$this->load->view("orden_despacho/V_index_modal_tableros", $data);
	}
}
