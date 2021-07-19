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
		$this->load->view('plantilla/V_footer');
	}

	public function enlace_registrar()
	{

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('multitablas/V_registrar');
		$this->load->view('plantilla/V_footer');
	}

	public function insertar()
	{
		//CABECERA
		$nombre_tabla = $this->input->post("nombre_tabla");

		//DETALLE
		$abreviatura = $this->input->post("abreviatura");
		$descripcion = $this->input->post("descripcion");

		echo '<script> console.log("' . $abreviatura . '")</script>';
		echo '<script> console.log("' . $descripcion . '")</script>';


		if ($this->M_multitablas->insertar($nombre_tabla)) {
			$id_multitabla = $this->M_multitablas->lastID();
			$this->insertar_detalle($id_multitabla, $abreviatura, $descripcion);
			echo json_encode($nombre_tabla);
		}
	}

	protected function insertar_detalle($id_multitabla, $abreviatura, $descripcion)
	{

		for ($i = 0; $i < count($id_multitabla); $i++) {

			$data = array(
				'id_multitabla' => $id_multitabla,
				'abreviatura' => $abreviatura[$i],
				'descripcion' => $descripcion[$i],
				
			);
			$this->M_multitablas->insertar_detalle($data);
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
		$this->load->view('plantilla/V_footer');
	}
}
