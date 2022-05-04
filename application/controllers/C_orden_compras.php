<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_orden_compras extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_orden_compras");
		$this->load->model("M_cbox");
	}

	public function index()
	{
		$data = array(
			'index' => $this->M_orden_compras->index(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('orden_compras/V_index', $data);
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

	public function enlace_registrar()
	{

		$data = array(
			'index_clientes_proveedores' => $this->M_orden_compras->index_clientes_proveedores(),
			'index_productos' => $this->M_orden_compras->index_productos(),
			'cbox_condicion_pago' => $this->M_cbox->cbox_condicion_pago(),
			'cbox_moneda' => $this->M_cbox->cbox_moneda(),
			'cbox_moneda' => $this->M_cbox->cbox_moneda(),
			'cbox_tipo_orden_compra' => $this->M_cbox->cbox_tipo_orden_compra()
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('orden_compras/V_registrar', $data);
	}

	public function registrar()
	{

		//Cabecera
		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");
		$fecha_orden_compra = $this->input->post("fecha_orden_compra");
		$id_cliente_proveedor = $this->input->post("id_cliente_proveedor");
		$ds_nombre_cliente_proveedor = $this->input->post("ds_nombre_cliente_proveedor");
		$ds_departamento_cliente_proveedor = $this->input->post("ds_departamento_cliente_proveedor");
		$ds_provincia_cliente_proveedor = $this->input->post("ds_provincia_cliente_proveedor");
		$ds_distrito_cliente_proveedor = $this->input->post("ds_distrito_cliente_proveedor");
		$direccion_fiscal_cliente_proveedor = $this->input->post("direccion_fiscal_cliente_proveedor");
		$clausula = $this->input->post("clausula");
		$lugar_entrega = $this->input->post("lugar_entrega");
		$nombre_encargado = $this->input->post("nombre_encargado");
		$observacion = $this->input->post("observacion");
		$id_condicion_pago = $this->input->post("id_condicion_pago");
		$ds_condicion_pago = $this->input->post("ds_condicion_pago");
		$id_moneda = $this->input->post("id_moneda");
		$ds_moneda = $this->input->post("ds_moneda");
		$valor_venta = $this->input->post("valor_venta");
		$igv = $this->input->post("igv");
		$precio_venta = $this->input->post("precio_venta");
		$id_orden_compra_empresa = $this->input->post("id_orden_compra_empresa");
		$id_empresa = $this->input->post("id_empresa");


		//Detalle Orden Compras
		$id_producto = $this->input->post("id_producto");
		$codigo_producto = $this->input->post("codigo_producto");
		$descripcion_producto = $this->input->post("descripcion_producto");
		$id_unidad_medida = $this->input->post("id_unidad_medida");
		$ds_unidad_medida = $this->input->post("ds_unidad_medida");
		$id_marca_producto = $this->input->post("id_marca_producto");
		$ds_marca_producto = $this->input->post("ds_marca_producto");
		$cantidad = $this->input->post("cantidad");
		$precio_unitario_venta = $this->input->post("precio_unitario_venta");
		$precio_unitario_costo = $this->input->post("precio_unitario_costo");
		$rentabilidad = $this->input->post("rentabilidad");
		$total_compra = $this->input->post("total_compra");
		$item = $this->input->post("item");


		if ($id_orden_compra_empresa == "100") {
			$this->M_orden_compras->registrar_grupo_vame_orden_compras();
			$id_orden_compra_empresa = $this->M_orden_compras->lastID();
			$this->M_orden_compras->registrar(
				//Cabecera
				$id_trabajador,
				$ds_nombre_trabajador,
				$fecha_orden_compra,
				$id_cliente_proveedor,
				$ds_nombre_cliente_proveedor,
				$ds_departamento_cliente_proveedor,
				$ds_provincia_cliente_proveedor,
				$ds_distrito_cliente_proveedor,
				$direccion_fiscal_cliente_proveedor,
				$clausula,
				$lugar_entrega,
				$nombre_encargado,
				$observacion,
				$id_condicion_pago,
				$ds_condicion_pago,
				$id_moneda,
				$ds_moneda,
				$valor_venta,
				$igv,
				$precio_venta,
				$id_orden_compra_empresa,
				$id_empresa
			);
		} else if ($id_orden_compra_empresa == "200") {
			$this->M_orden_compras->registrar_inversiones_alpev_orden_compras();
			$id_orden_compra_empresa = $this->M_orden_compras->lastID();
			$this->M_orden_compras->registrar(
				//Cabecera
				$id_trabajador,
				$ds_nombre_trabajador,
				$fecha_orden_compra,
				$id_cliente_proveedor,
				$ds_nombre_cliente_proveedor,
				$ds_departamento_cliente_proveedor,
				$ds_provincia_cliente_proveedor,
				$ds_distrito_cliente_proveedor,
				$direccion_fiscal_cliente_proveedor,
				$clausula,
				$lugar_entrega,
				$nombre_encargado,
				$observacion,
				$id_condicion_pago,
				$ds_condicion_pago,
				$id_moneda,
				$ds_moneda,
				$valor_venta,
				$igv,
				$precio_venta,
				$id_orden_compra_empresa,
				$id_empresa
			);
		}

		$id_orden_compra = $this->M_orden_compras->lastID();

		$this->registrar_detalle_orden_compras(
			$id_orden_compra,
			$id_producto,
			$codigo_producto,
			$descripcion_producto,
			$id_unidad_medida,
			$ds_unidad_medida,
			$id_marca_producto,
			$ds_marca_producto,
			$cantidad,
			$precio_unitario_venta,
			$precio_unitario_costo,
			$rentabilidad,
			$total_compra,
			$item
		);

		echo json_encode($id_trabajador);
	}

	protected function registrar_detalle_orden_compras(
		$id_orden_compra,
		$id_producto,
		$codigo_producto,
		$descripcion_producto,
		$id_unidad_medida,
		$ds_unidad_medida,
		$id_marca_producto,
		$ds_marca_producto,
		$cantidad,
		$precio_unitario_venta,
		$precio_unitario_costo,
		$rentabilidad,
		$total_compra,
		$item

	) {
		for ($i = 0; $i < count($id_producto); $i++) {
			$this->M_orden_compras->registrar_detalle_orden_compras(
				$id_orden_compra,
				$id_producto[$i],
				$codigo_producto[$i],
				$descripcion_producto[$i],
				$id_unidad_medida[$i],
				$ds_unidad_medida[$i],
				$id_marca_producto[$i],
				$ds_marca_producto[$i],
				$cantidad[$i],
				$precio_unitario_venta[$i],
				$precio_unitario_costo[$i],
				$rentabilidad[$i],
				$total_compra[$i],
				$item[$i]
			);
		}
	}
}
