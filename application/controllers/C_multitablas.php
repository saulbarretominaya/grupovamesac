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

	public function index_modal()

	{
		$id_multitabla = $this->input->post("id_multitabla");

		$data = array(
			'index_modal_cabecera' => $this->M_multitablas->index_modal_cabecera($id_multitabla),
			'index_modal_detalle' => $this->M_multitablas->index_modal_detalle($id_multitabla)
		);

		$this->load->view('multitablas/V_index_modal', $data);
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
		//REGISTRAR NUEVOS ID DETALLE
		$id_multitabla = $this->input->post("id_multitabla");
		$abreviatura = $this->input->post("abreviatura");
		$descripcion = $this->input->post("descripcion");

		//ACTUALIZAR POR ID DETALLE
		$id_dmultitabla_actualizar = $this->input->post("id_dmultitabla_actualizar");
		$abreviatura_actualizar = $this->input->post("abreviatura_actualizar");
		$descripcion_actualizar = $this->input->post("descripcion_actualizar");

		//ELIMINAR POR ID DETALLE
		$id_dmultitabla_eliminar = $this->input->post("id_dmultitabla_eliminar");

		if ($abreviatura != null) {
			$this->insertar_detalle($id_multitabla, $abreviatura, $descripcion);
		}

		if ($id_dmultitabla_actualizar != null) {
			$this->actualizar_detalle($id_dmultitabla_actualizar, $abreviatura_actualizar, $descripcion_actualizar);
		}

		if ($id_dmultitabla_eliminar != null) {
			$this->eliminar_detalle($id_dmultitabla_eliminar);
		}
		echo json_encode($id_multitabla);
	}

	protected function insertar_detalle($id_multitabla, $abreviatura, $descripcion)
	{

		for ($i = 0; $i < count($abreviatura); $i++) {

			$this->M_multitablas->insertar_detalle($id_multitabla, $abreviatura[$i], $descripcion[$i]);
		}
	}

	protected function actualizar_detalle($id_dmultitabla_actualizar, $abreviatura_actualizar, $descripcion_actualizar)
	{
		for ($i = 0; $i < count($id_dmultitabla_actualizar); $i++) {
			$this->M_multitablas->actualizar_detalle($id_dmultitabla_actualizar[$i], $abreviatura_actualizar[$i], $descripcion_actualizar[$i]);
		}
	}

	protected function eliminar_detalle($id_dmultitabla)
	{
		for ($i = 0; $i < count($id_dmultitabla); $i++) {
			$this->M_multitablas->eliminar_detalle($id_dmultitabla[$i]);
		}
	}
}
