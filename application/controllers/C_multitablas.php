<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_multitablas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_multitablas");
	}
	public function index()
	{
		$data = array(
			'index' => $this->M_multitablas->index(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('multitablas/V_index', $data);
	}

	public function enlace_registrar()
	{

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('multitablas/V_registrar');
	}

	public function insertar()
	{
		//CABECERA
		$nombre_tabla = $this->input->post("nombre_tabla");

		//DETALLE
		$abreviatura = $this->input->post("abreviatura");
		$descripcion = $this->input->post("descripcion");

		if ($this->M_multitablas->insertar($nombre_tabla)) {
			$id_multitabla = $this->M_multitablas->lastID();
			$this->insertar_detalle($id_multitabla, $abreviatura, $descripcion);
			echo json_encode($nombre_tabla);
		}
	}

	protected function insertar_detalle($id_multitabla, $abreviatura, $descripcion)
	{

		for ($i = 0; $i < count($abreviatura); $i++) {

			$this->M_multitablas->insertar_detalle($id_multitabla, $abreviatura[$i], $descripcion[$i]);
		}
	}

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
	}
}
