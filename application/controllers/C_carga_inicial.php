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

	public function insertar()
	{

		//Cabecera
		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");
		$fecha_carga_inicial = $this->input->post("fecha_carga_inicial");
		$id_tipo_ingreso = $this->input->post("id_tipo_ingreso");
		$id_moneda = $this->input->post("id_moneda");
		$ds_nombre_cliente_proveedor = $this->input->post("ds_nombre_cliente_proveedor");
		$num_guia = $this->input->post("num_guia");
		$num_orden_compra = $this->input->post("num_orden_compra");
		$id_tipo_comprobante = $this->input->post("id_tipo_comprobante");
		$fecha_comprobante = $this->input->post("fecha_comprobante");
		$num_comprobante = $this->input->post("num_comprobante");
		$observacion = $this->input->post("observacion");
		$monto_total = $this->input->post("monto_total");


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


		if ($this->M_carga_inicial->insertar(
			//Cabecera
			$id_trabajador,
			$ds_nombre_trabajador,
			$fecha_carga_inicial,
			$id_tipo_ingreso,
			$id_moneda,
			$ds_nombre_cliente_proveedor,
			$num_guia,
			$num_orden_compra,
			$id_tipo_comprobante,
			$fecha_comprobante,
			$num_comprobante,
			$observacion,
			$monto_total
		));

		$id_carga_inicial = $this->M_carga_inicial->lastID();

		$this->insertar_detalle_carga_inicial(
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

		echo json_encode($item);
	}

	protected function insertar_detalle_carga_inicial(
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
			$this->M_carga_inicial->insertar_detalle_carga_inicial(
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

	public function index_modal()
	{
		$id_orden_compra = $this->input->post("id_orden_compra");

		$data = array(
			"index_modal_cabecera" => $this->M_orden_compras->index_modal_cabecera($id_orden_compra),
			"index_modal_detalle" => $this->M_orden_compras->index_modal_detalle($id_orden_compra),
		);

		$this->load->view("orden_compras/V_index_modal", $data);
	}
}
