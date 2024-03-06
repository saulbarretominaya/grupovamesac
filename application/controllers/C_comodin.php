<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_comodin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_comodin");
		$this->load->model("M_cbox");
	}
	public function index()
	{
		$data = array(
			'index' => $this->M_comodin->index(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('comodin/V_index', $data);
	}

	public function enlace_registrar()
	{
		$data = array(
			'cbox_unidad_medida' => $this->M_cbox->cbox_unidad_medida(),
			'cbox_marca_productos' => $this->M_cbox->cbox_marca_productos(),
			'cbox_moneda' => $this->M_cbox->cbox_moneda(),
			'cbox_categoria_comodin' => $this->M_cbox->cbox_categoria_comodin(),
		);
		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('comodin/V_registrar', $data);
	}


	public function registrar()
	{

		$id_categoria_comodin = $this->input->post("id_categoria_comodin");
		$codigo_producto = $this->input->post("codigo_producto");
		$descripcion_producto = $this->input->post("descripcion_producto");
		$id_unidad_medida = $this->input->post("id_unidad_medida");
		$id_marca_producto = $this->input->post("id_marca_producto");
		$precio_unitario = $this->input->post("precio_unitario");
		$id_moneda = $this->input->post("id_moneda");
		$nombre_proveedor = $this->input->post("nombre_proveedor");

		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");
		$id_comodin_empresa = $this->input->post("id_comodin_empresa");
		$id_empresa = $this->input->post("id_empresa");


		if ($id_comodin_empresa == "100") {
			$this->M_comodin->registrar_grupo_vame_comodin();
			$id_comodin_empresa = $this->M_comodin->lastID();
			$this->M_comodin->registrar(
				$id_categoria_comodin,
				$codigo_producto,
				$descripcion_producto,
				$id_unidad_medida,
				$id_marca_producto,
				$precio_unitario,
				$id_moneda,
				$nombre_proveedor,
				$id_trabajador,
				$ds_nombre_trabajador,
				$id_comodin_empresa,
				$id_empresa

			);
		} else if ($id_comodin_empresa == "200") {
			$this->M_comodin->registrar_inversiones_alpev_comodin();
			$id_comodin_empresa = $this->M_comodin->lastID();
			$this->M_comodin->registrar(
				$id_categoria_comodin,
				$codigo_producto,
				$descripcion_producto,
				$id_unidad_medida,
				$id_marca_producto,
				$precio_unitario,
				$id_moneda,
				$nombre_proveedor,
				$id_trabajador,
				$ds_nombre_trabajador,
				$id_comodin_empresa,
				$id_empresa

			);
		}

		echo json_encode($codigo_producto);
	}


	public function enlace_actualizar($id_comodin)
	{
		$data = array(
			'enlace_actualizar' => $this->M_comodin->enlace_actualizar($id_comodin),
			'cbox_marca_productos' => $this->M_cbox->cbox_marca_productos(),
			'cbox_moneda' => $this->M_cbox->cbox_moneda(),
			'cbox_unidad_medida' => $this->M_cbox->cbox_unidad_medida(),
			'cbox_categoria_comodin' => $this->M_cbox->cbox_categoria_comodin(),

		);

		// echo var_dump($data);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('comodin/V_actualizar', $data);
	}

	public function actualizar()
	{

		$id_comodin = $this->input->post("id_comodin");
		$id_categoria_comodin = $this->input->post("id_categoria_comodin");
		$codigo_producto = $this->input->post("codigo_producto");
		$descripcion_producto = $this->input->post("descripcion_producto");
		$id_unidad_medida = $this->input->post("id_unidad_medida");
		$id_marca_producto = $this->input->post("id_marca_producto");
		$precio_unitario = $this->input->post("precio_unitario");
		$id_moneda = $this->input->post("id_moneda");
		$nombre_proveedor = $this->input->post("nombre_proveedor");

		if ($this->M_comodin->actualizar(
			$id_comodin,
			$id_categoria_comodin,
			$codigo_producto,
			$descripcion_producto,
			$id_unidad_medida,
			$id_marca_producto,
			$precio_unitario,
			$id_moneda,
			$nombre_proveedor
		));

		echo json_encode($codigo_producto);
	}
}
