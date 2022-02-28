<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_comprobantes extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_comprobantes");
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

	public function registrar()
	{

		//Cabecera
		$id_tipo_comprobante = $this->input->post("id_tipo_comprobante");
		$ds_tipo_comprobante = $this->input->post("ds_tipo_comprobante");
		$fecha_emision = $this->input->post("fecha_emision");
		$dias = $this->input->post("dias");
		$fecha_vencimiento = $this->input->post("fecha_vencimiento");
		$orden_compra = $this->input->post("orden_compra");
		$id_condicion_pago = $this->input->post("id_condicion_pago");
		$ds_condicion_pago = $this->input->post("ds_condicion_pago");
		$monto_total_condicion_pago = $this->input->post("monto_total_condicion_pago");
		$observacion = $this->input->post("observacion");


		//Detalle_condicion pago
		$fecha_cuota = $this->input->post("fecha_cuota");
		$monto_cuota = $this->input->post("monto_cuota");

		if ($id_tipo_comprobante == "69") {
			$this->M_comprobantes->registrar_facturas();
			$id_num_comprobante = $this->M_comprobantes->lastID();
			$this->M_comprobantes->registrar(
				$id_tipo_comprobante,
				$ds_tipo_comprobante,
				$fecha_emision,
				$dias,
				$fecha_vencimiento,
				$orden_compra,
				$id_condicion_pago,
				$ds_condicion_pago,
				$monto_total_condicion_pago,
				$observacion,
				$id_num_comprobante
			);
		} else if ($id_tipo_comprobante == "70") {
			$this->M_comprobantes->registrar_boletas();
			$id_num_comprobante = $this->M_comprobantes->lastID();
			$this->M_comprobantes->registrar(
				$id_tipo_comprobante,
				$ds_tipo_comprobante,
				$fecha_emision,
				$dias,
				$fecha_vencimiento,
				$orden_compra,
				$id_condicion_pago,
				$ds_condicion_pago,
				$monto_total_condicion_pago,
				$observacion,
				$id_num_comprobante
			);
		} else if ($id_tipo_comprobante == "77") {
			$this->M_comprobantes->registrar_nota_credito();
			$id_num_comprobante = $this->M_comprobantes->lastID();
			$this->M_comprobantes->registrar(
				$id_tipo_comprobante,
				$ds_tipo_comprobante,
				$fecha_emision,
				$dias,
				$fecha_vencimiento,
				$orden_compra,
				$id_condicion_pago,
				$ds_condicion_pago,
				$monto_total_condicion_pago,
				$observacion,
				$id_num_comprobante
			);
		} else if ($id_tipo_comprobante == "78") {
			$this->M_comprobantes->registrar_nota_debito();
			$id_num_comprobante = $this->M_comprobantes->lastID();
			$this->M_comprobantes->registrar(
				$id_tipo_comprobante,
				$ds_tipo_comprobante,
				$fecha_emision,
				$dias,
				$fecha_vencimiento,
				$orden_compra,
				$id_condicion_pago,
				$ds_condicion_pago,
				$monto_total_condicion_pago,
				$observacion,
				$id_num_comprobante
			);
		}

		$id_comprobante = $this->M_comprobantes->lastID();


		$this->registrar_detalle_condicion_pago(
			$id_comprobante,
			$fecha_cuota,
			$monto_cuota
		);

		echo json_encode($id_tipo_comprobante);
	}

	protected function registrar_detalle_condicion_pago(
		$id_comprobante,
		$fecha_cuota,
		$monto_cuota

	) {
		for ($i = 0; $i < count($fecha_cuota); $i++) {
			$this->M_comprobantes->registrar_detalle_condicion_pago(
				$id_comprobante,
				$fecha_cuota[$i],
				$monto_cuota[$i],

			);
		}
	}
}
