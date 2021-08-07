<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_cotizacion extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		//$this->load->model("M_productos");
		//$this->load->model("M_cbox");
	}

	public function index()

	{

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('cotizacion/V_index');
		$this->load->view('plantilla/V_footer');
	}

	public function enlace_registrar()
	{

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('cotizacion/V_registrar');
		$this->load->view('plantilla/V_footer');
	}
}
