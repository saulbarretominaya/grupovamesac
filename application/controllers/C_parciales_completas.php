<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_parciales_completas extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_parciales_completas");
		$this->load->model("M_cotizacion");
		$this->load->model("M_cbox");
	}

	public function index()
	{
		$data = array(
			'index' => $this->M_parciales_completas->index(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('parciales_completas/V_index', $data);
	}


	public function index_modal()
	{
		$id_parcial_completa = $this->input->post("id_parcial_completa");

		$data = array(
			"index_modal_cabecera" => $this->M_parciales_completas->index_modal_cabecera($id_parcial_completa),
			"index_modal_detalle" => $this->M_parciales_completas->index_modal_detalle($id_parcial_completa),
		);

		$this->load->view("parciales_completas/V_index_modal", $data);
	}
}
