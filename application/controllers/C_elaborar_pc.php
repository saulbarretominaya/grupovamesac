<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_elaborar_pc extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_elaborar_pc");
		$this->load->model("M_cotizacion");
		$this->load->model("M_cbox");
	}

	public function index()
	{
		$data = array(
			'index' => $this->M_elaborar_pc->index(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('elaborar_pc/V_index', $data);
	}

	public function enlace_registrar()

	{

		$id_cotizacion = $this->input->get("id_cotizacion");
		$id_parcial_completa = $this->input->get("id_parcial_completa");


		$data = array(
			'enlace_actualizar_cabecera' => $this->M_elaborar_pc->enlace_actualizar_cabecera($id_cotizacion),
			'enlace_actualizar_detalle' => $this->M_elaborar_pc->enlace_actualizar_detalle($id_cotizacion, $id_parcial_completa)
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('elaborar_pc/V_registrar', $data);
	}

	public function registrar()
	{

		//Cabecera
		$id_cotizacion = $this->input->post("id_cotizacion");
		$total = $this->input->post("total");
		$igv = $this->input->post("igv");
		$precio_venta = $this->input->post("precio_venta");
		$fecha_parcial_completa = $this->input->post("fecha_parcial_completa");
		//Detalle Update (estado_elaboracion_pc - Elaboracion PC)
		$id_dcotizacion = $this->input->post("id_dcotizacion");
		$salida_prod = $this->input->post("salida_prod");
		$pendiente_prod = $this->input->post("pendiente_prod");
		$valor_venta = $this->input->post("valor_venta");

		$estado_elaboracion_pc = $this->input->post("estado_elaboracion_pc");


		if ($this->M_elaborar_pc->registrar(
			//Cabecera
			$id_cotizacion,
			$total,
			$igv,
			$precio_venta,
			$fecha_parcial_completa
		));

		$id_parcial_completa = $this->M_elaborar_pc->lastID();


		$this->registrar_detalle_parciales_completas(
			$id_parcial_completa,
			$id_dcotizacion,
			$salida_prod,
			$pendiente_prod,
			$valor_venta,
		);

		$rows = $this->M_elaborar_pc->verifica_numero_filas($id_cotizacion, $id_parcial_completa);

		if ($rows->numero_filas == 0) {
			$this->M_elaborar_pc->finalizado_estado_elaborar_cotizacion($id_cotizacion);
			$this->M_elaborar_pc->completa_estado_parciales_completas($id_parcial_completa);
		} else {
			$this->M_elaborar_pc->pendiente_estado_elaborar_cotizacion($id_cotizacion);
			$this->M_elaborar_pc->parcial_estado_parciales_completas($id_parcial_completa);
		}

		$this->actualizar_detalle_cotizacion_estado_elaboracio_pc(
			$id_dcotizacion,
			$estado_elaboracion_pc
		);

		echo json_encode($id_cotizacion);
	}

	protected function registrar_detalle_parciales_completas(
		$id_parcial_completa,
		$id_dcotizacion,
		$salida_prod,
		$pendiente_prod,
		$valor_venta
	) {
		for ($i = 0; $i < count($salida_prod); $i++) {
			$this->M_elaborar_pc->registrar_detalle_parciales_completas(
				$id_parcial_completa,
				$id_dcotizacion[$i],
				$salida_prod[$i],
				$pendiente_prod[$i],
				$valor_venta[$i],
			);
		}
	}

	protected function actualizar_detalle_cotizacion_estado_elaboracio_pc(
		$id_dcotizacion,
		$estado_elaboracion_pc
	) {
		for ($i = 0; $i < count($id_dcotizacion); $i++) {
			$this->M_elaborar_pc->actualizar_detalle_cotizacion_estado_elaboracio_pc(
				$id_dcotizacion[$i],
				$estado_elaboracion_pc[$i]
			);
		}
	}

	public function index_modal()
	{
		$id_orden_despacho = $this->input->post("id_orden_despacho");

		$data = array(
			"index_modal_cabecera" => $this->M_elaborar_pc->index_modal_cabecera($id_orden_despacho),
			"index_modal_detalle" => $this->M_elaborar_pc->index_modal_detalle($id_orden_despacho),
		);

		$this->load->view("elaborar_pc/V_index_modal", $data);
	}
}
