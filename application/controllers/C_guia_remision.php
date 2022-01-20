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

	public function registrar()
	{

		$tipo_transporte = $this->input->post("tipo_transporte");
		$ruc = $this->input->post("ruc");
		$transportista = $this->input->post("transportista");
		$domiciliado = $this->input->post("domiciliado");
		$licencia = $this->input->post("licencia");
		$marca_modelo = $this->input->post("marca_modelo");
		$placa = $this->input->post("placa");
		$observaciones = $this->input->post("observaciones");
		$id_tipo_envio_guia_remision = $this->input->post("id_tipo_envio_guia_remision");
		$ds_tipo_envio_guia_remision = $this->input->post("ds_tipo_envio_guia_remision");
		$peso_bruto_total = $this->input->post("peso_bruto_total");
		$kilos = $this->input->post("kilos");
		$punto_partida = $this->input->post("punto_partida");
		$punto_llegada = $this->input->post("punto_llegada");
		$contenedor = $this->input->post("contenedor");
		$embarque = $this->input->post("embarque");
		$ds_sucursal_trabajador = $this->input->post("ds_sucursal_trabajador");
		$ds_serie_guia_remision = $this->input->post("ds_serie_guia_remision");
		$id_parcial_completa = $this->input->post("id_parcial_completa");

		if ($ds_serie_guia_remision == "T001") {
			$this->M_guia_remision->registrar_proceres();
			$id_sucursal = $this->M_guia_remision->lastID();
			$this->M_guia_remision->registrar(
				$tipo_transporte,
				$ruc,
				$transportista,
				$domiciliado,
				$licencia,
				$marca_modelo,
				$placa,
				$observaciones,
				$id_tipo_envio_guia_remision,
				$ds_tipo_envio_guia_remision,
				$peso_bruto_total,
				$kilos,
				$punto_partida,
				$punto_llegada,
				$contenedor,
				$embarque,
				$ds_sucursal_trabajador,
				$ds_serie_guia_remision,
				$id_parcial_completa,
				$id_sucursal
			);
		} else if ($ds_serie_guia_remision == "T002") {
			$this->M_guia_remision->registrar_tienda_bellota();
			$id_sucursal = $this->M_guia_remision->lastID();
			$this->M_guia_remision->registrar(
				$tipo_transporte,
				$ruc,
				$transportista,
				$domiciliado,
				$licencia,
				$marca_modelo,
				$placa,
				$observaciones,
				$id_tipo_envio_guia_remision,
				$ds_tipo_envio_guia_remision,
				$peso_bruto_total,
				$kilos,
				$punto_partida,
				$punto_llegada,
				$contenedor,
				$embarque,
				$ds_sucursal_trabajador,
				$ds_serie_guia_remision,
				$id_parcial_completa,
				$id_sucursal
			);
		} else if ($ds_serie_guia_remision == "T003") {
			$this->M_guia_remision->registrar_tienda_nicolini();
			$id_sucursal = $this->M_guia_remision->lastID();
			$this->M_guia_remision->registrar(
				$tipo_transporte,
				$ruc,
				$transportista,
				$domiciliado,
				$licencia,
				$marca_modelo,
				$placa,
				$observaciones,
				$id_tipo_envio_guia_remision,
				$ds_tipo_envio_guia_remision,
				$peso_bruto_total,
				$kilos,
				$punto_partida,
				$punto_llegada,
				$contenedor,
				$embarque,
				$ds_sucursal_trabajador,
				$ds_serie_guia_remision,
				$id_parcial_completa,
				$id_sucursal
			);
		}
		echo json_encode($tipo_transporte);
	}
}