<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_cotizacion extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_cotizacion");
		$this->load->model("M_cbox");
	}

	public function index()
	{
		$data = array(
			'index' => $this->M_cotizacion->index(),
			'index_2' => $this->M_cotizacion->index_2()
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('cotizacion/V_index', $data);
	}

	public function enlace_registrar()
	{

		$data = array(
			'index_clientes_proveedores' => $this->M_cotizacion->index_clientes_proveedores(),
			'index_productos' => $this->M_cotizacion->index_productos(),
			'index_tableros' => $this->M_cotizacion->index_tableros(),
			'index_comodin' => $this->M_cotizacion->index_comodin(),
			'cbox_condicion_pago' => $this->M_cbox->cbox_condicion_pago(),
			'cbox_condicion_pago_cotizacion' => $this->M_cbox->cbox_condicion_pago_cotizacion(),
			'tipo_cambio' => $this->M_cotizacion->tipo_cambio(),
			'cbox_moneda' => $this->M_cbox->cbox_moneda(),
			'cbox_estado_cotizacion' => $this->M_cbox->cbox_estado_cotizacion()
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('cotizacion/V_registrar', $data);
	}

	public function registrar()
	{

		//Cabecera
		$serie_cotizacion = $this->input->post("serie_cotizacion");
		$categoria = $this->input->post("categoria");
		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");
		$fecha_cotizacion = $this->input->post("fecha_cotizacion");
		$validez_oferta_cotizacion = $this->input->post("validez_oferta_cotizacion");
		$fecha_vencimiento_validez_oferta = $this->input->post("fecha_vencimiento_validez_oferta");
		$id_cliente_proveedor = $this->input->post("id_cliente_proveedor");
		$ds_nombre_cliente_proveedor = $this->input->post("ds_nombre_cliente_proveedor");
		$ds_departamento_cliente_proveedor = $this->input->post("ds_departamento_cliente_proveedor");
		$ds_provincia_cliente_proveedor = $this->input->post("ds_provincia_cliente_proveedor");
		$ds_distrito_cliente_proveedor = $this->input->post("ds_distrito_cliente_proveedor");
		$direccion_fiscal_cliente_proveedor = $this->input->post("direccion_fiscal_cliente_proveedor");
		$email_cliente_proveedor = $this->input->post("email_cliente_proveedor");
		$clausula = $this->input->post("clausula");
		$lugar_entrega = $this->input->post("lugar_entrega");
		$nombre_encargado = $this->input->post("nombre_encargado");
		$observacion = $this->input->post("observacion");
		$id_condicion_pago = $this->input->post("id_condicion_pago");
		$ds_condicion_pago = $this->input->post("ds_condicion_pago");
		$numero_dias_condicion_pago = $this->input->post("numero_dias_condicion_pago");
		$fecha_condicion_pago = $this->input->post("fecha_condicion_pago");
		$valor_venta_total_sin_d = $this->input->post("valor_venta_total_sin_d");
		$valor_venta_total_con_d = $this->input->post("valor_venta_total_con_d");
		$descuento_total = $this->input->post("descuento_total");
		$igv = $this->input->post("igv");
		$precio_venta = $this->input->post("precio_venta");
		$valor_cambio = $this->input->post("valor_cambio");
		$id_moneda = $this->input->post("id_moneda");
		$id_cotizacion_empresa = $this->input->post("id_cotizacion_empresa");
		$id_empresa = $this->input->post("id_empresa");


		//Detalle Cotizacion
		$id_producto = $this->input->post("id_producto");
		$id_tablero = $this->input->post("id_tablero");
		$id_comodin = $this->input->post("id_comodin");
		$codigo_producto = $this->input->post("codigo_producto");
		$descripcion_producto = $this->input->post("descripcion_producto");
		$id_unidad_medida = $this->input->post("id_unidad_medida");
		$ds_unidad_medida = $this->input->post("ds_unidad_medida");
		$id_marca_producto = $this->input->post("id_marca_producto");
		$ds_marca_producto = $this->input->post("ds_marca_producto");
		$cantidad = $this->input->post("cantidad");
		$precio_inicial = $this->input->post("precio_inicial");
		$precio_ganancia = $this->input->post("precio_ganancia");
		$g = $this->input->post("g");
		$g_unidad = $this->input->post("g_unidad");
		$g_cant_total = $this->input->post("g_cant_total");
		$precio_descuento = $this->input->post("precio_descuento");
		$d = $this->input->post("d");
		$d_unidad = $this->input->post("d_unidad");
		$d_cant_total = $this->input->post("d_cant_total");

		$valor_venta_sin_d = $this->input->post("valor_venta_sin_d");
		$valor_venta_con_d = $this->input->post("valor_venta_con_d");

		$dias_entrega = $this->input->post("dias_entrega");
		$item = $this->input->post("item");

		//Detalle_condicion pago
		$fecha_cuota = $this->input->post("fecha_cuota");
		$monto_cuota = $this->input->post("monto_cuota");

		if ($id_cotizacion_empresa == "100") {
			$this->M_cotizacion->registrar_grupo_vame_cotizacion();
			$id_cotizacion_empresa = $this->M_cotizacion->lastID();
			$this->M_cotizacion->registrar(
				//Cabecera
				$serie_cotizacion,
				$categoria,
				$id_trabajador,
				$ds_nombre_trabajador,
				$fecha_cotizacion,
				$validez_oferta_cotizacion,
				$fecha_vencimiento_validez_oferta,
				$id_cliente_proveedor,
				$ds_nombre_cliente_proveedor,
				$ds_departamento_cliente_proveedor,
				$ds_provincia_cliente_proveedor,
				$ds_distrito_cliente_proveedor,
				$direccion_fiscal_cliente_proveedor,
				$email_cliente_proveedor,
				$clausula,
				$lugar_entrega,
				$nombre_encargado,
				$observacion,
				$id_condicion_pago,
				$ds_condicion_pago,
				$numero_dias_condicion_pago,
				$fecha_condicion_pago,
				$valor_venta_total_sin_d,
				$valor_venta_total_con_d,
				$descuento_total,
				$igv,
				$precio_venta,
				$valor_cambio,
				$id_moneda,
				$id_cotizacion_empresa,
				$id_empresa

			);
		} else if ($id_cotizacion_empresa == "200") {
			$this->M_cotizacion->registrar_inversiones_alpev_cotizacion();
			$id_cotizacion_empresa = $this->M_cotizacion->lastID();
			$this->M_cotizacion->registrar(
				//Cabecera
				$serie_cotizacion,
				$categoria,
				$id_trabajador,
				$ds_nombre_trabajador,
				$fecha_cotizacion,
				$validez_oferta_cotizacion,
				$fecha_vencimiento_validez_oferta,
				$id_cliente_proveedor,
				$ds_nombre_cliente_proveedor,
				$ds_departamento_cliente_proveedor,
				$ds_provincia_cliente_proveedor,
				$ds_distrito_cliente_proveedor,
				$direccion_fiscal_cliente_proveedor,
				$email_cliente_proveedor,
				$clausula,
				$lugar_entrega,
				$nombre_encargado,
				$observacion,
				$id_condicion_pago,
				$ds_condicion_pago,
				$numero_dias_condicion_pago,
				$fecha_condicion_pago,
				$valor_venta_total_sin_d,
				$valor_venta_total_con_d,
				$descuento_total,
				$igv,
				$precio_venta,
				$valor_cambio,
				$id_moneda,
				$id_cotizacion_empresa,
				$id_empresa
			);
		}
		$id_cotizacion = $this->M_cotizacion->lastID();

		$this->registrar_detalle_cotizacion(
			$id_cotizacion,
			$id_producto,
			$id_tablero,
			$id_comodin,
			$codigo_producto,
			$descripcion_producto,
			$id_unidad_medida,
			$ds_unidad_medida,
			$id_marca_producto,
			$ds_marca_producto,
			$cantidad,

			$precio_inicial,
			$precio_ganancia,
			$g,
			$g_unidad,
			$g_cant_total,

			$precio_descuento,
			$d,
			$d_unidad,
			$d_cant_total,

			$valor_venta_sin_d,
			$valor_venta_con_d,
			$dias_entrega,
			$item

		);

		if ($fecha_cuota != "") {
			$this->registrar_detalle_condicion_pago($id_cotizacion, $fecha_cuota, $monto_cuota);
		}

		echo json_encode($serie_cotizacion);
	}

	protected function registrar_detalle_cotizacion(
		$id_cotizacion,
		$id_producto,
		$id_tablero,
		$id_comodin,
		$codigo_producto,
		$descripcion_producto,
		$id_unidad_medida,
		$ds_unidad_medida,
		$id_marca_producto,
		$ds_marca_producto,
		$cantidad,

		$precio_inicial,
		$precio_ganancia,
		$g,
		$g_unidad,
		$g_cant_total,

		$precio_descuento,
		$d,
		$d_unidad,
		$d_cant_total,

		$valor_venta_sin_d,
		$valor_venta_con_d,
		$dias_entrega,
		$item

	) {
		for ($i = 0; $i < count($id_producto); $i++) {
			$this->M_cotizacion->registrar_detalle_cotizacion(
				$id_cotizacion,
				$id_producto[$i],
				$id_tablero[$i],
				$id_comodin[$i],
				$codigo_producto[$i],
				$descripcion_producto[$i],
				$id_unidad_medida[$i],
				$ds_unidad_medida[$i],
				$id_marca_producto[$i],
				$ds_marca_producto[$i],
				$cantidad[$i],

				$precio_inicial[$i],
				$precio_ganancia[$i],
				$g[$i],
				$g_unidad[$i],
				$g_cant_total[$i],

				$precio_descuento[$i],
				$d[$i],
				$d_unidad[$i],
				$d_cant_total[$i],

				$valor_venta_sin_d[$i],
				$valor_venta_con_d[$i],
				$dias_entrega[$i],
				$item[$i]

			);
		}
	}

	protected function registrar_detalle_condicion_pago(
		$id_cotizacion,
		$fecha_cuota,
		$monto_cuota

	) {
		for ($i = 0; $i < count($fecha_cuota); $i++) {
			$this->M_cotizacion->registrar_detalle_condicion_pago(
				$id_cotizacion,
				$fecha_cuota[$i],
				$monto_cuota[$i],

			);
		}
	}

	public function validar_existencia_comodin_registrar()
	{
		$id_cotizacion = $this->input->post("id_cotizacion");
		$cantidad_num_comodin = $this->M_cotizacion->validar_existencia_comodin_registrar($id_cotizacion);
		echo json_encode($cantidad_num_comodin);
	}
	public function aprobar_estado()
	{
		$id_cotizacion = $this->input->post("id_cotizacion");
		$id_orden_despacho_empresa = $this->input->post("id_orden_despacho_empresa");
		$id_empresa = $this->input->post("id_empresa");


		$this->M_cotizacion->aprobar_estado($id_cotizacion);
		if ($id_orden_despacho_empresa == "100") {
			$this->M_cotizacion->registrar_grupo_vame_orden_despacho();
			$id_orden_despacho_empresa = $this->M_cotizacion->lastID();
			$this->M_cotizacion->registrar_orden_despacho(
				$id_cotizacion,
				$id_orden_despacho_empresa,
				$id_empresa
			);
		} else if ($id_orden_despacho_empresa == "200") {
			$this->M_cotizacion->registrar_inversiones_alpev_orden_despacho();
			$id_orden_despacho_empresa = $this->M_cotizacion->lastID();
			$this->M_cotizacion->registrar_orden_despacho(
				$id_cotizacion,
				$id_orden_despacho_empresa,
				$id_empresa
			);
		}
		echo json_encode($id_cotizacion);
	}

	public function cambiar_estado_pendiente_cotizacion()
	{
		$id_orden_despacho = $this->input->post("id_orden_despacho");
		$id_cotizacion = $this->input->post("id_cotizacion");
		$this->M_cotizacion->aprobar_estado($id_cotizacion);
		$this->M_cotizacion->cambiar_estado_pendiente_orden_despacho($id_orden_despacho);
		echo json_encode($id_cotizacion);
	}

	public function enlace_actualizar($id_cotizacion)

	{

		$data = array(
			'index_clientes_proveedores' => $this->M_cotizacion->index_clientes_proveedores(),
			'index_productos' => $this->M_cotizacion->index_productos(),
			'index_tableros' => $this->M_cotizacion->index_tableros(),
			'index_comodin' => $this->M_cotizacion->index_comodin(),
			'cbox_condicion_pago' => $this->M_cbox->cbox_condicion_pago(),
			'tipo_cambio' => $this->M_cotizacion->tipo_cambio(),
			'cbox_moneda' => $this->M_cbox->cbox_moneda(),
			'cbox_estado_cotizacion' => $this->M_cbox->cbox_estado_cotizacion()
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('cotizacion/V_actualizar', $data);
	}

	public function index_modal_productos()
	{
		$id_cotizacion = $this->input->post("id_cotizacion");

		$data = array(
			"index_modal_cabecera_productos" => $this->M_cotizacion->index_modal_cabecera_productos($id_cotizacion),
			"index_modal_detalle_productos" => $this->M_cotizacion->index_modal_detalle_productos($id_cotizacion),
		);

		$this->load->view("cotizacion/V_index_modal_productos", $data);
	}

	public function index_modal_tableros()
	{
		$id_cotizacion = $this->input->post("id_cotizacion");

		$data = array(
			"index_modal_cabecera_tableros" => $this->M_cotizacion->index_modal_cabecera_tableros($id_cotizacion),
			"index_modal_detalle_tableros" => $this->M_cotizacion->index_modal_detalle_tableros($id_cotizacion),
		);

		$this->load->view("cotizacion/V_index_modal_tableros", $data);
	}
}
