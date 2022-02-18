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
		//$data = array(
		//	'index' => $this->M_orden_compra->index(), , $data
		//);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('compras_cobranzas/V_index');
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
			'cbox_medio_pago' => $this->M_cbox->cbox_medio_pago()
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('compras_cobranzas/V_registrar', $data);
	}

	public function insertar()
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


		// //Detalle Compras / cobranzas
		// $item = $this->input->post("item");
		// $id_detalle_compra_cobranza = $this->input->post("id_detalle_compra_cobranza");
		// $id_compra_cobranza = $this->input->post("id_compra_cobranza");
		// $fecha_deposito = $this->input->post("fecha_deposito");
		// $num_deposito = $this->input->post("num_deposito");
		// $num_letra_cheque = $this->input->post("num_letra_cheque");
		// $id_medio_pago = $this->input->post("id_medio_pago");
		// $id_banco = $this->input->post("id_banco");
		// $monto = $this->input->post("monto");
		// $id_moneda = $this->input->post("id_moneda");
		// $tipo_cambio = $this->input->post("tipo_cambio");

		// //Detalle_condicion pago
		// $id_dprogramacion_pagos = $this->input->post("id_dprogramacion_pagos");
		// $id_compra_cobranza = $this->input->post("id_compra_cobranza");
		// $fecha_cuota = $this->input->post("fecha_cuota");
		// $id_condicion_pago = $this->input->post("id_condicion_pago");


		if ($this->M_compras_cobranzas->insertar(
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
			$id_estado_compra_cobranza

		));

		// $id_compra_cobranza = $this->M_compras_cobranzas->lastID();
		// $this->insertar_detalle_compras_cobranzas(
		// 	$item,
		// 	$id_detalle_compra_cobranza,
		// 	$id_compra_cobranza,
		// 	$fecha_deposito,
		// 	$num_deposito,
		// 	$num_letra_cheque,
		// 	$id_medio_pago,
		// 	$id_banco,
		// 	$monto,
		// 	$id_moneda,
		// 	$tipo_cambio,


		// );

		// $this->insertar_detalle_programacion_pago(
		// 	$id_dprogramacion_pagos,
		// 	$id_compra_cobranza,
		// 	$fecha_cuota,
		// 	$id_condicion_pago
		// );
		// echo json_encode($id_trabajador);
	}

	public function index_modal()
	{
		$id_cotizacion = $this->input->post("id_cotizacion");

		$data = array(
			"index_modal_cabecera" => $this->M_cotizacion->index_modal_cabecera($id_cotizacion),
			"index_modal_detalle" => $this->M_cotizacion->index_modal_detalle($id_cotizacion),
		);

		$this->load->view("cotizacion/V_index_modal", $data);
	}

	// protected function insertar_detalle_cotizacion(
	// 	$id_cotizacion,
	// 	$id_producto,
	// 	$id_tablero,
	// 	$id_comodin,
	// 	$codigo_producto,
	// 	$descripcion_producto,
	// 	$id_unidad_medida,
	// 	$ds_unidad_medida,
	// 	$id_marca_producto,
	// 	$ds_marca_producto,
	// 	$cantidad,

	// 	$precio_inicial,
	// 	$precio_ganancia,
	// 	$g,
	// 	$g_unidad,
	// 	$g_cant_total,

	// 	$precio_descuento,
	// 	$d,
	// 	$d_unidad,
	// 	$d_cant_total,

	// 	$valor_venta_sin_d,
	// 	$valor_venta_con_d,
	// 	$dias_entrega,
	// 	$item

	// ) {
	// 	for ($i = 0; $i < count($id_producto); $i++) {
	// 		$this->M_cotizacion->insertar_detalle_cotizacion(
	// 			$id_cotizacion,
	// 			$id_producto[$i],
	// 			$id_tablero[$i],
	// 			$id_comodin[$i],
	// 			$codigo_producto[$i],
	// 			$descripcion_producto[$i],
	// 			$id_unidad_medida[$i],
	// 			$ds_unidad_medida[$i],
	// 			$id_marca_producto[$i],
	// 			$ds_marca_producto[$i],
	// 			$cantidad[$i],

	// 			$precio_inicial[$i],
	// 			$precio_ganancia[$i],
	// 			$g[$i],
	// 			$g_unidad[$i],
	// 			$g_cant_total[$i],

	// 			$precio_descuento[$i],
	// 			$d[$i],
	// 			$d_unidad[$i],
	// 			$d_cant_total[$i],

	// 			$valor_venta_sin_d[$i],
	// 			$valor_venta_con_d[$i],
	// 			$dias_entrega[$i],
	// 			$item[$i]

	// 		);
	// 	}
	// }

	// protected function insertar_detalle_condicion_pago(
	// 	$id_cotizacion,
	// 	$fecha_cuota,
	// 	$monto_cuota

	// ) {
	// 	for ($i = 0; $i < count($fecha_cuota); $i++) {
	// 		$this->M_cotizacion->insertar_detalle_condicion_pago(
	// 			$id_cotizacion,
	// 			$fecha_cuota[$i],
	// 			$monto_cuota[$i],

	// 		);
	// 	}
	// }

}
