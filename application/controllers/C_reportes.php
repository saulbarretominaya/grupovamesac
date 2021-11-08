<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_reportes extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}


	public function cotizacion_id()
	{
		$this->load->view("Reportes/cotizacion/cotizacion_id");
	}
}
