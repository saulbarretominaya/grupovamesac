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
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('cotizacion/V_index', $data);
	}

	public function index_modal()
	{
		$id_cotizacion = $this->input->post("id_cotizacion");

		$data = array(
			"detalle_modal" => $this->M_cotizacion->detalle_modal($id_cotizacion),

		);


		$this->load->view("cotizacion/V_index_modal", $data);
	}

	public function enlace_registrar()
	{

		$data = array(
			'index_clientes_proveedores' => $this->M_cotizacion->index_clientes_proveedores(),
			'index_productos' => $this->M_cotizacion->index_productos(),
			'index_tableros' => $this->M_cotizacion->index_tableros(),
			'index_comodin' => $this->M_cotizacion->index_comodin(),
			'cbox_condicion_pago' => $this->M_cbox->cbox_condicion_pago(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('cotizacion/V_registrar', $data);
	}

	public function insertar()
	{

		//Cabecera
		$serie_cotizacion = $this->input->post("serie_cotizacion");
		$id_vendedor = $this->input->post("id_vendedor");
		$ds_nombre_vendedor = $this->input->post("ds_nombre_vendedor");
		$fecha_cotizacion = $this->input->post("fecha_cotizacion");
		$validez_oferta_cotizacion = $this->input->post("validez_oferta_cotizacion");
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
		$total = $this->input->post("total");
		$descuento_total = $this->input->post("descuento_total");
		$igv = $this->input->post("igv");
		$precio_venta = $this->input->post("precio_venta");

		//Detalle
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

		$valor_venta = $this->input->post("valor_venta");
		$dias_entrega = $this->input->post("dias_entrega");

		if ($this->M_cotizacion->insertar(
			//Cabecera
			$serie_cotizacion,
			$id_vendedor,
			$ds_nombre_vendedor,
			$fecha_cotizacion,
			$validez_oferta_cotizacion,
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
			$total,
			$descuento_total,
			$igv,
			$precio_venta
		));

		$id_cotizacion = $this->M_cotizacion->lastID();
		$this->insertar_detalle(
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

			$valor_venta,
			$dias_entrega

		);
		echo json_encode($serie_cotizacion);
	}

	protected function insertar_detalle(
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

		$valor_venta,
		$dias_entrega

	) {
		for ($i = 0; $i < count($id_producto); $i++) {
			$this->M_cotizacion->insertar_detalle(
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

				$valor_venta[$i],
				$dias_entrega[$i]

			);
		}
	}
}
