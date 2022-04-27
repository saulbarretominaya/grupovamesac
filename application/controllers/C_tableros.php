<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_tableros extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_cbox");
		$this->load->model("M_tableros");
	}
	public function index()
	{
		$data = array(
			'index' => $this->M_tableros->index(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('tableros/V_index', $data);
	}

	public function enlace_registrar()
	{

		$data = array(
			'cbox_codigos_sunat' => $this->M_cbox->cbox_codigos_sunat(),
			'cbox_marca_tableros' => $this->M_cbox->cbox_marca_tableros(),
			'cbox_modelo_tableros' => $this->M_cbox->cbox_modelo_tableros(),
			'cbox_moneda' => $this->M_cbox->cbox_moneda(),
			'cbox_almacen' => $this->M_cbox->cbox_almacen(),
			'index_productos' => $this->M_tableros->index_productos(),
			'index_comodin' => $this->M_tableros->index_comodin(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('tableros/V_registrar', $data);
	}

	public function registrar()
	{
		//CABECERA
		$codigo_tablero = $this->input->post("codigo_tablero");
		$descripcion_tablero = $this->input->post("descripcion_tablero");
		$cantidad_tablero = $this->input->post("cantidad_tablero");
		$id_sunat = $this->input->post("id_sunat");
		$id_marca_tablero = $this->input->post("id_marca_tablero");
		$id_modelo_tablero = $this->input->post("id_modelo_tablero");
		$id_moneda = $this->input->post("id_moneda");
		$id_almacen = $this->input->post("id_almacen");
		$precio_tablero = $this->input->post("precio_tablero");
		$porcentaje_margen = $this->input->post("porcentaje_margen");
		$precio_margen = $this->input->post("precio_margen");
		$precio_unitario_por_tablero = $this->input->post("precio_unitario_por_tablero");
		$total_tablero = $this->input->post("total_tablero");
		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");
		$id_tablero_empresa = $this->input->post("id_tablero_empresa");
		$id_empresa = $this->input->post("id_empresa");

		//DETALLE
		$id_almacen_det = $this->input->post("id_almacen_det");
		$ds_almacen = $this->input->post("ds_almacen");
		$id_producto = $this->input->post("id_producto");
		$codigo_producto = $this->input->post("codigo_producto");
		$descripcion_producto = $this->input->post("descripcion_producto");
		$id_unidad_medida = $this->input->post("id_unidad_medida");
		$ds_unidad_medida = $this->input->post("ds_unidad_medida");
		$id_marca_producto = $this->input->post("id_marca_producto");
		$ds_marca_producto = $this->input->post("ds_marca_producto");
		$precio_unitario = $this->input->post("precio_unitario");
		$cantidad_unitaria = $this->input->post("cantidad_unitaria");
		$cantidad_total_producto = $this->input->post("cantidad_total_producto");
		$monto_total_producto = $this->input->post("monto_total_producto");
		$item = $this->input->post("item");

		if ($id_tablero_empresa == "100") {
			$this->M_tableros->registrar_grupo_vame_tableros();
			$id_tablero_empresa = $this->M_tableros->lastID();
			$this->M_tableros->registrar(
				$codigo_tablero,
				$descripcion_tablero,
				$cantidad_tablero,
				$id_sunat,
				$id_marca_tablero,
				$id_modelo_tablero,
				$id_moneda,
				$id_almacen,
				$precio_tablero,
				$porcentaje_margen,
				$precio_margen,
				$precio_unitario_por_tablero,
				$total_tablero,
				$id_trabajador,
				$ds_nombre_trabajador,
				$id_tablero_empresa,
				$id_empresa

			);
		} else if ($id_tablero_empresa == "200") {
			$this->M_tableros->registrar_inversiones_alpev_tableros();
			$id_tablero_empresa = $this->M_tableros->lastID();
			$this->M_tableros->registrar(
				$codigo_tablero,
				$descripcion_tablero,
				$cantidad_tablero,
				$id_sunat,
				$id_marca_tablero,
				$id_modelo_tablero,
				$id_moneda,
				$id_almacen,
				$precio_tablero,
				$porcentaje_margen,
				$precio_margen,
				$precio_unitario_por_tablero,
				$total_tablero,
				$id_trabajador,
				$ds_nombre_trabajador,
				$id_tablero_empresa,
				$id_empresa
			);
		}

		$id_tablero = $this->M_tableros->lastID();

		$this->registrar_detalle(
			$id_tablero,
			$id_almacen_det,
			$ds_almacen,
			$id_producto,
			$codigo_producto,
			$descripcion_producto,
			$id_unidad_medida,
			$ds_unidad_medida,
			$id_marca_producto,
			$ds_marca_producto,
			$precio_unitario,
			$cantidad_unitaria,
			$cantidad_total_producto,
			$monto_total_producto,
			$item
		);

		echo json_encode($codigo_tablero);
	}

	protected function registrar_detalle(
		$id_tablero,
		$id_almacen_det,
		$ds_almacen,
		$id_producto,
		$codigo_producto,
		$descripcion_producto,
		$id_unidad_medida,
		$ds_unidad_medida,
		$id_marca_producto,
		$ds_marca_producto,
		$precio_unitario,
		$cantidad_unitaria,
		$cantidad_total_producto,
		$monto_total_producto,
		$item
	) {
		for ($i = 0; $i < count($id_producto); $i++) {
			$this->M_tableros->registrar_detalle(
				$id_tablero,
				$id_almacen_det[$i],
				$ds_almacen[$i],
				$id_producto[$i],
				$codigo_producto[$i],
				$descripcion_producto[$i],
				$id_unidad_medida[$i],
				$ds_unidad_medida[$i],
				$id_marca_producto[$i],
				$ds_marca_producto[$i],
				$precio_unitario[$i],
				$cantidad_unitaria[$i],
				$cantidad_total_producto[$i],
				$monto_total_producto[$i],
				$item[$i]
			);
		}
	}

	public function index_modal()
	{
		$id_tablero = $this->input->post("id_tablero");

		$data = array(
			"cabecera_modal" => $this->M_tableros->cabecera_modal($id_tablero),
			"detalle_modal" => $this->M_tableros->detalle_modal($id_tablero),
		);
		$this->load->view("tableros/V_index_modal", $data);
	}
}
