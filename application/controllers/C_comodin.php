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
		);
		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('comodin/V_registrar', $data);
	}


	public function insertar()
	{

		$codigo_producto = $this->input->post("codigo_producto");
		$nombre_producto = $this->input->post("nombre_producto");
		$id_unidad_medida = $this->input->post("id_unidad_medida");
		$id_marca_producto = $this->input->post("id_marca_producto");
		$precio_unitario = $this->input->post("precio_unitario");
		$id_moneda = $this->input->post("id_moneda");
		$nombre_proveedor = $this->input->post("nombre_proveedor");


		if ($this->M_comodin->insertar(
			$codigo_producto,
			$nombre_producto,
			$id_unidad_medida,
			$id_marca_producto,
			$precio_unitario,
			$id_moneda,
			$nombre_proveedor
		));
		echo json_encode($codigo_producto);
	}


	public function enlace_actualizar($codigo_producto)
	{

		//	$data = array(

		//		'enlace_actualizar' => $this->M_comodin->enlace_actualizar($codigo_producto),
		//		'cbox_unidad_medida' => $this->M_cbox->cbox_unidad_medida(),
		//		'cbox_marca_productos' => $this->M_cbox->cbox_marca_productos(),
		//		'cbox_moneda' => $this->M_cbox->cbox_moneda(), , $data

		//	);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('comodin/V_actualizar');
	}

	public function actualizar()
	{

		$codigo_producto = $this->input->post("codigo_producto");
		$nombre_producto = $this->input->post("nombre_producto");
		$id_unidad_medida = $this->input->post("id_unidad_medida");
		$id_marca_producto = $this->input->post("id_marca_producto");
		$precio_unitario = $this->input->post("precio_unitario");
		$id_moneda = $this->input->post("id_moneda");
		$nombre_proveedor = $this->input->post("nombre_proveedor");

		if ($this->M_comodin->actualizar(
			$codigo_producto,
			$nombre_producto,
			$id_unidad_medida,
			$id_marca_producto,
			$precio_unitario,
			$id_moneda,
			$nombre_proveedor
		));

		echo json_encode($codigo_producto);
	}
}
