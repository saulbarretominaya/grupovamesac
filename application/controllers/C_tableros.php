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

		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('tableros/V_registrar', $data);
	}

	public function insertar()
	{
		//CABECERA
		$codigo_tablero = $this->input->post("codigo_tablero");
		$id_sunat = $this->input->post("id_sunat");
		$descripcion_tablero = $this->input->post("descripcion_tablero");
		$id_marca_tablero = $this->input->post("id_marca_tablero");
		$id_modelo_tablero = $this->input->post("id_modelo_tablero");
		$id_moneda = $this->input->post("id_moneda");
		$id_almacen = $this->input->post("id_almacen");

		//DETALLE
		$id_producto = $this->input->post("id_producto");

		if ($this->M_tableros->insertar(
			$codigo_tablero,
			$id_sunat,
			$descripcion_tablero,
			$id_marca_tablero,
			$id_modelo_tablero,
			$id_moneda,
			$id_almacen
		)) {
			$id_tablero = $this->M_tableros->lastID();
			$this->insertar_detalle($id_tablero, $id_producto);
			echo json_encode($codigo_tablero);
		}
	}

	protected function insertar_detalle($id_tablero, $id_producto)
	{

		for ($i = 0; $i < count($id_producto); $i++) {

			$this->M_tableros->insertar_detalle($id_tablero, $id_producto[$i]);
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



	/*
	public function enlace_actualizar($id_multitabla)
	{

		$data = array(
			'cabecera' => $this->M_multitablas->cabecera($id_multitabla),
			'detalle' => $this->M_multitablas->detalle($id_multitabla),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('multitablas/V_actualizar', $data);
	}

	public function actualizar()
	{
		//CABECERA
		$id_multitabla = $this->input->post("id_multitabla");
		$nombre_tabla = $this->input->post("nombre_tabla");

		//ELIMINAR POR ID LAS FILAS DE TABLA DE DETALLE
		$id_dmultitabla = $this->input->post("id_dmultitabla");

		//DETALLE
		$abreviatura = $this->input->post("abreviatura");
		$descripcion = $this->input->post("descripcion");


		if ($this->M_multitablas->actualizar($id_multitabla, $nombre_tabla)) {
			if ($id_dmultitabla != null) {
				$this->eliminar_detalle($id_dmultitabla);
			}

			if ($abreviatura != null) {
				$this->insertar_detalle($id_multitabla, $abreviatura, $descripcion);
			}
			echo json_encode($nombre_tabla);
		}
	}

	protected function eliminar_detalle($id_dmultitabla)
	{
		for ($i = 0; $i < count($id_dmultitabla); $i++) {
			$this->M_multitablas->eliminar_detalle($id_dmultitabla[$i]);
		}
	} */
}
