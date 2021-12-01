<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_orden_despacho extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_orden_despacho");
		$this->load->model("M_cbox");
	}

	public function index()
	{
		$data = array(
			'index' => $this->M_orden_despacho->index(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('orden_despacho/V_index', $data);
	}
}
