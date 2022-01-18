<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_guia_remision extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_guia_remision");
		$this->load->model("M_cbox");
	}

	public function index()
	{
		$data = array(
			'index' => $this->M_guia_remision->index(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('guia_remision/V_index', $data);
	}

	public function enlace_registrar($id_parcial_completa)

	{

		$data = array(
			'cbox_tipo_envio_guia_remision' => $this->M_cbox->cbox_tipo_envio_guia_remision(),
			'enlace_actualizar_cabecera' => $this->M_guia_remision->enlace_actualizar_cabecera($id_parcial_completa),
			'enlace_actualizar_detalle' => $this->M_guia_remision->enlace_actualizar_detalle($id_parcial_completa)
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('guia_remision/V_registrar', $data);
	}
}
