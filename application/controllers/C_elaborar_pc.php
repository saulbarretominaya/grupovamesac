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
			'cbox_tipo_orden_parcial_completa' => $this->M_cbox->cbox_tipo_orden_parcial_completa(),
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
		//Detalle Cotizacion
		$id_dcotizacion = $this->input->post("id_dcotizacion");
		$salida_prod = $this->input->post("salida_prod");
		$pendiente_prod = $this->input->post("pendiente_prod");
		$valor_venta = $this->input->post("valor_venta");



		if ($this->M_elaborar_pc->registrar(
			//Cabecera
			$id_cotizacion,
			$total,
			$igv,
			$precio_venta,
			$fecha_parcial_completa
		));

		$id_parcial_completa = $this->M_elaborar_pc->lastID();


		$this->registrar_detalle_cotizacion(
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

		echo json_encode($id_cotizacion);
	}

	protected function registrar_detalle_cotizacion(
		$id_parcial_completa,
		$id_dcotizacion,
		$salida_prod,
		$pendiente_prod,
		$valor_venta
	) {
		for ($i = 0; $i < count($salida_prod); $i++) {
			$this->M_elaborar_pc->registrar_detalle_cotizacion(
				$id_parcial_completa,
				$id_dcotizacion[$i],
				$salida_prod[$i],
				$pendiente_prod[$i],
				$valor_venta[$i],
			);
		}
	}
}
