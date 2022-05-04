<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_compras_cobranzas extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_compras_cobranzas");
		$this->load->model("M_cbox");
	}

	public function index()
	{
		$data = array(
			'index' => $this->M_compras_cobranzas->index()
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('compras_cobranzas/V_index', $data);
	}



	public function enlace_registrar()
	{

		$data = array(
			'index_clientes_proveedores' => $this->M_compras_cobranzas->index_clientes_proveedores(),
			'cbox_condicion_pago_cotizacion' => $this->M_cbox->cbox_condicion_pago_cotizacion(),
			'cbox_moneda' => $this->M_cbox->cbox_moneda(),
			'cbox_tipo_comprobante' => $this->M_cbox->cbox_tipo_comprobante(),
			'cbox_almacen' => $this->M_cbox->cbox_almacen(),
			'cbox_banco' => $this->M_cbox->cbox_banco(),
			'cbox_medio_pago' => $this->M_cbox->cbox_medio_pago(),
			'cbox_tipo_compra_cobranza' => $this->M_cbox->cbox_tipo_compra_cobranza(),
			'cbox_estado_compra_cobranza' => $this->M_cbox->cbox_estado_compra_cobranza()
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('compras_cobranzas/V_registrar', $data);
	}

	public function registrar()
	{

		//Cabecera
		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");
		$fecha_compra_cobranza = $this->input->post("fecha_compra_cobranza");
		$id_tipo_comprobante = $this->input->post("id_tipo_comprobante");
		$ds_tipo_comprobante = $this->input->post("ds_tipo_comprobante");
		$num_comprobante = $this->input->post("num_comprobante");
		$id_almacen = $this->input->post("id_almacen");
		$ds_almacen = $this->input->post("ds_almacen");
		$fecha_emision = $this->input->post("fecha_emision");
		$fecha_vencimiento = $this->input->post("fecha_vencimiento");
		$id_tipo_compra_cobranza = $this->input->post("id_tipo_compra_cobranza");
		$ds_tipo_compra_cobranza = $this->input->post("ds_tipo_compra_cobranza");
		$id_cliente_proveedor = $this->input->post("id_cliente_proveedor");
		$ds_nombre_cliente_proveedor = $this->input->post("ds_nombre_cliente_proveedor");
		$observacion = $this->input->post("observacion");
		$id_moneda = $this->input->post("id_moneda");
		$ds_moneda = $this->input->post("ds_moneda");
		$sub_total = $this->input->post("sub_total");
		$igv = $this->input->post("igv");
		$total = $this->input->post("total");
		$id_condicion_pago = $this->input->post("id_condicion_pago");
		$ds_condicion_pago = $this->input->post("ds_condicion_pago");
		$pendiente = $this->input->post("pendiente");
		$pagado = $this->input->post("pagado");
		$id_estado_compra_cobranza = $this->input->post("id_estado_compra_cobranza");
		$id_compra_cobranza_empresa = $this->input->post("id_compra_cobranza_empresa");
		$id_empresa = $this->input->post("id_empresa");


		//Detalle_condicion pago
		$fecha_cuota = $this->input->post("fecha_cuota");
		$monto_cuota = $this->input->post("monto_cuota");

		//Detalle Compras / cobranzas
		$item = $this->input->post("item");
		$fecha_deposito = $this->input->post("fecha_deposito");
		$num_deposito = $this->input->post("num_deposito");
		$num_letra_cheque = $this->input->post("num_letra_cheque");
		$id_medio_pago = $this->input->post("id_medio_pago");
		$ds_medio_pago = $this->input->post("ds_medio_pago");
		$id_banco = $this->input->post("id_banco");
		$ds_banco = $this->input->post("ds_banco");
		$monto = $this->input->post("monto");
		$tipo_cambio = $this->input->post("tipo_cambio");

		if ($id_compra_cobranza_empresa == "100") {
			$this->M_compras_cobranzas->registrar_grupo_vame_compras_cobranzas();
			$id_compra_cobranza_empresa = $this->M_compras_cobranzas->lastID();
			$this->M_compras_cobranzas->registrar(
				//Cabecera
				$id_trabajador,
				$ds_nombre_trabajador,
				$fecha_compra_cobranza,
				$id_tipo_comprobante,
				$ds_tipo_comprobante,
				$num_comprobante,
				$id_almacen,
				$ds_almacen,
				$fecha_emision,
				$fecha_vencimiento,
				$id_tipo_compra_cobranza,
				$ds_tipo_compra_cobranza,
				$id_cliente_proveedor,
				$ds_nombre_cliente_proveedor,
				$observacion,
				$id_moneda,
				$ds_moneda,
				$sub_total,
				$igv,
				$total,
				$id_condicion_pago,
				$ds_condicion_pago,
				$pendiente,
				$pagado,
				$id_estado_compra_cobranza,
				$id_compra_cobranza_empresa,
				$id_empresa

			);
		} else if ($id_compra_cobranza_empresa == "200") {
			$this->M_compras_cobranzas->registrar_inversiones_alpev_compras_cobranzas();
			$id_compra_cobranza_empresa = $this->M_compras_cobranzas->lastID();
			$this->M_compras_cobranzas->registrar(
				//Cabecera
				$id_trabajador,
				$ds_nombre_trabajador,
				$fecha_compra_cobranza,
				$id_tipo_comprobante,
				$ds_tipo_comprobante,
				$num_comprobante,
				$id_almacen,
				$ds_almacen,
				$fecha_emision,
				$fecha_vencimiento,
				$id_tipo_compra_cobranza,
				$ds_tipo_compra_cobranza,
				$id_cliente_proveedor,
				$ds_nombre_cliente_proveedor,
				$observacion,
				$id_moneda,
				$ds_moneda,
				$sub_total,
				$igv,
				$total,
				$id_condicion_pago,
				$ds_condicion_pago,
				$pendiente,
				$pagado,
				$id_estado_compra_cobranza,
				$id_compra_cobranza_empresa,
				$id_empresa

			);
		}

		$id_compra_cobranza = $this->M_compras_cobranzas->lastID();

		if ($fecha_cuota != NULL) {
			$this->registrar_detalle_programacion_pagos(
				$id_compra_cobranza,
				$fecha_cuota,
				$monto_cuota
			);
		}

		if ($item != NULL) {
			$this->registrar_detalle_compras_cobranzas(
				$id_compra_cobranza,
				$item,
				$fecha_deposito,
				$num_deposito,
				$num_letra_cheque,
				$id_medio_pago,
				$ds_medio_pago,
				$id_banco,
				$ds_banco,
				$monto,
				$tipo_cambio
			);
		}

		echo json_encode($id_trabajador);
	}

	protected function registrar_detalle_programacion_pagos(
		$id_compra_cobranza,
		$fecha_cuota,
		$monto_cuota
	) {
		for ($i = 0; $i < count($fecha_cuota); $i++) {
			$this->M_compras_cobranzas->registrar_detalle_programacion_pagos(
				$id_compra_cobranza,
				$fecha_cuota[$i],
				$monto_cuota[$i]
			);
		}
	}

	protected function registrar_detalle_compras_cobranzas(
		$id_compra_cobranza,
		$item,
		$fecha_deposito,
		$num_deposito,
		$num_letra_cheque,
		$id_medio_pago,
		$ds_medio_pago,
		$id_banco,
		$ds_banco,
		$monto,
		$tipo_cambio
	) {
		for ($i = 0; $i < count($item); $i++) {
			$this->M_compras_cobranzas->registrar_detalle_compras_cobranzas(
				$id_compra_cobranza,
				$item[$i],
				$fecha_deposito[$i],
				$num_deposito[$i],
				$num_letra_cheque[$i],
				$id_medio_pago[$i],
				$ds_medio_pago[$i],
				$id_banco[$i],
				$ds_banco[$i],
				$monto[$i],
				$tipo_cambio[$i]
			);
		}
	}

	public function index_modal()
	{
		$id_compra_cobranza = $this->input->post("id_compra_cobranza");

		$data = array(
			"index_modal_cabecera" => $this->M_compras_cobranzas->index_modal_cabecera($id_compra_cobranza),
			"index_modal_detalle_programacion_pagos" => $this->M_compras_cobranzas->index_modal_detalle_programacion_pagos($id_compra_cobranza),
			"index_modal_detalle" => $this->M_compras_cobranzas->index_modal_detalle($id_compra_cobranza)
		);

		$this->load->view("compras_cobranzas/V_index_modal", $data);
	}
}
