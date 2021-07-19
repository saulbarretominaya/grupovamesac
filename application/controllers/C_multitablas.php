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
		// $id_producto = $this->input->post("id_producto");
		// $precio = $this->input->post("precio");
		// $cantidad = $this->input->post("cantidad");
		// $importe = $this->input->post("importe");


		if ($this->M_multitablas->insertar($nombre_tabla)) {
			//$id_venta = $this->M_multitablas->lastID();
			//$id_tcomprobante = $this->Model_ventas->incrementar_comprobante($id_tcomprobante);
			//$this->detalle_ventas($id_venta, $id_producto, $precio, $cantidad, $importe);
			//$this->actualizar_stock($id_producto, $cantidad); //disminuir stock
			redirect(base_url() . "C_multitablas");
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
