<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_carga_inicial extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_carga_inicial");
		$this->load->model("M_cbox");
	}

	public function index()
	{
		$data = array(
			'index' => $this->M_carga_inicial->index(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('carga_inicial/V_index', $data);
	}



	public function enlace_registrar()
	{

		$data = array(

			'index_clientes_proveedores' => $this->M_carga_inicial->index_clientes_proveedores(),
			'index_productos' => $this->M_carga_inicial->index_productos(),
			'cbox_moneda' => $this->M_cbox->cbox_moneda(),
			'cbox_tipo_ingresos' => $this->M_cbox->cbox_tipo_ingresos(),
			'cbox_tipo_comprobante' => $this->M_cbox->cbox_tipo_comprobante()
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('carga_inicial/V_registrar', $data);
	}

	public function registrar()
	{

		//Cabecera
		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");
		$fecha_carga_inicial = $this->input->post("fecha_carga_inicial");
		$id_tipo_ingreso = $this->input->post("id_tipo_ingreso");
		$id_moneda = $this->input->post("id_moneda");
		$tipo_cambio = $this->input->post("tipo_cambio");
		$id_cliente_proveedor = $this->input->post("id_cliente_proveedor");
		$ds_nombre_cliente_proveedor = $this->input->post("ds_nombre_cliente_proveedor");
		$num_guia = $this->input->post("num_guia");
		$num_orden_compra = $this->input->post("num_orden_compra");
		$id_tipo_comprobante = $this->input->post("id_tipo_comprobante");
		$fecha_comprobante = $this->input->post("fecha_comprobante");
		$num_comprobante = $this->input->post("num_comprobante");
		$observacion = $this->input->post("observacion");
		$monto_total = $this->input->post("monto_total");
		$id_carga_inicial_empresa = $this->input->post("id_carga_inicial_empresa");
		$id_empresa = $this->input->post("id_empresa");

		//Detalle Orden Compras
		$item = $this->input->post("item");
		$id_almacen = $this->input->post("id_almacen");
		$ds_almacen = $this->input->post("ds_almacen");
		$id_producto = $this->input->post("id_producto");
		$codigo_producto = $this->input->post("codigo_producto");
		$descripcion_producto = $this->input->post("descripcion_producto");
		$id_unidad_medida = $this->input->post("id_unidad_medida");
		$ds_unidad_medida = $this->input->post("ds_unidad_medida");
		$id_marca_producto = $this->input->post("id_marca_producto");
		$ds_marca_producto = $this->input->post("ds_marca_producto");
		$stock_actual = $this->input->post("stock_actual");
		$nueva_cantidad = $this->input->post("nueva_cantidad");
		$total_stock = $this->input->post("total_stock");
		$precio_unitario = $this->input->post("precio_unitario");
		$valor_total = $this->input->post("valor_total");


		if ($id_carga_inicial_empresa == "100") {
			$this->M_carga_inicial->registrar_grupo_vame_carga_inicial();
			$id_carga_inicial_empresa = $this->M_carga_inicial->lastID();
			$this->M_carga_inicial->registrar(
				//Cabecera
				$id_trabajador,
				$ds_nombre_trabajador,
				$fecha_carga_inicial,
				$id_tipo_ingreso,
				$id_moneda,
				$tipo_cambio,
				$id_cliente_proveedor,
				$ds_nombre_cliente_proveedor,
				$num_guia,
				$num_orden_compra,
				$id_tipo_comprobante,
				$fecha_comprobante,
				$num_comprobante,
				$observacion,
				$monto_total,
				$id_carga_inicial_empresa,
				$id_empresa

			);
		} else if ($id_carga_inicial_empresa == "200") {
			$this->M_carga_inicial->registrar_inversiones_alpev_carga_inicial();
			$id_carga_inicial_empresa = $this->M_carga_inicial->lastID();
			$this->M_carga_inicial->registrar(
				//Cabecera
				$id_trabajador,
				$ds_nombre_trabajador,
				$fecha_carga_inicial,
				$id_tipo_ingreso,
				$id_moneda,
				$tipo_cambio,
				$id_cliente_proveedor,
				$ds_nombre_cliente_proveedor,
				$num_guia,
				$num_orden_compra,
				$id_tipo_comprobante,
				$fecha_comprobante,
				$num_comprobante,
				$observacion,
				$monto_total,
				$id_carga_inicial_empresa,
				$id_empresa

			);
		}

		$id_carga_inicial = $this->M_carga_inicial->lastID();

		$this->registrar_detalle_carga_inicial(
			$id_carga_inicial,
			$item,
			$id_almacen,
			$ds_almacen,
			$id_producto,
			$codigo_producto,
			$descripcion_producto,
			$id_unidad_medida,
			$ds_unidad_medida,
			$id_marca_producto,
			$ds_marca_producto,
			$stock_actual,
			$nueva_cantidad,
			$total_stock,
			$precio_unitario,
			$valor_total,
		);

		$this->actualizar_stock_productos(
			$id_producto,
			$total_stock
		);

		echo json_encode($item);
	}

	protected function registrar_detalle_carga_inicial(
		$id_carga_inicial,
		$item,
		$id_almacen,
		$ds_almacen,
		$id_producto,
		$codigo_producto,
		$descripcion_producto,
		$id_unidad_medida,
		$ds_unidad_medida,
		$id_marca_producto,
		$ds_marca_producto,
		$stock_actual,
		$nueva_cantidad,
		$total_stock,
		$precio_unitario,
		$valor_total
	) {
		for ($i = 0; $i < count($item); $i++) {
			$this->M_carga_inicial->registrar_detalle_carga_inicial(
				$id_carga_inicial,
				$item[$i],
				$id_almacen[$i],
				$ds_almacen[$i],
				$id_producto[$i],
				$codigo_producto[$i],
				$descripcion_producto[$i],
				$id_unidad_medida[$i],
				$ds_unidad_medida[$i],
				$id_marca_producto[$i],
				$ds_marca_producto[$i],
				$stock_actual[$i],
				$nueva_cantidad[$i],
				$total_stock[$i],
				$precio_unitario[$i],
				$valor_total[$i]
			);
		}
	}

	protected function actualizar_stock_productos(
		$id_producto,
		$total_stock
	) {
		for ($i = 0; $i < count($id_producto); $i++) {
			$this->M_carga_inicial->actualizar_stock_productos(
				$id_producto[$i],
				$total_stock[$i]
			);
		}
	}


	public function index_modal()
	{
		$id_carga_inicial = $this->input->post("id_carga_inicial");

		$data = array(
			"index_modal_cabecera" => $this->M_carga_inicial->index_modal_cabecera($id_carga_inicial),
			"index_modal_detalle" => $this->M_carga_inicial->index_modal_detalle($id_carga_inicial),
		);

		$this->load->view("carga_inicial/V_index_modal", $data);
	}
}
