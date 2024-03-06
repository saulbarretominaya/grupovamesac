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
			'index_2' => $this->M_guia_remision->index_2()
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('guia_remision/V_index', $data);
	}

	public function enlace_registrar($id_parcial_completa)

	{

		$data = array(
			'cbox_tipo_envio_guia_remision' => $this->M_cbox->cbox_tipo_envio_guia_remision(),
			'enlace_registrar_cabecera' => $this->M_guia_remision->enlace_registrar_cabecera($id_parcial_completa),
			'enlace_registrar_detalle' => $this->M_guia_remision->enlace_registrar_detalle($id_parcial_completa)
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
		$num_bulto = $this->input->post("num_bulto");
		$punto_partida = $this->input->post("punto_partida");
		$punto_llegada = $this->input->post("punto_llegada");
		$contenedor = $this->input->post("contenedor");
		$embarque = $this->input->post("embarque");
		$ds_sucursal_trabajador = $this->input->post("ds_sucursal_trabajador");
		$ds_serie_guia_remision = $this->input->post("ds_serie_guia_remision");
		$id_parcial_completa = $this->input->post("id_parcial_completa");
		$id_guia_remision_empresa = $this->input->post("id_guia_remision_empresa");
		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");
		$id_empresa = $this->input->post("id_empresa");


		if ($id_guia_remision_empresa == "100") {
			$this->M_guia_remision->registrar_grupo_vame_guia_remision();
			$id_guia_remision_empresa = $this->M_guia_remision->lastID();
			if ($ds_serie_guia_remision == "T001") {
				$this->M_guia_remision->registrar_grupo_vame_tienda_proceres();
				$id_tienda = $this->M_guia_remision->lastID();
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
					$num_bulto,
					$punto_partida,
					$punto_llegada,
					$contenedor,
					$embarque,
					$ds_sucursal_trabajador,
					$ds_serie_guia_remision,
					$id_parcial_completa,
					$id_tienda,
					$id_guia_remision_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa
				);
			} else if ($ds_serie_guia_remision == "T002") {
				$this->M_guia_remision->registrar_grupo_vame_tienda_bellota();
				$id_tienda = $this->M_guia_remision->lastID();
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
					$num_bulto,
					$punto_partida,
					$punto_llegada,
					$contenedor,
					$embarque,
					$ds_sucursal_trabajador,
					$ds_serie_guia_remision,
					$id_parcial_completa,
					$id_tienda,
					$id_guia_remision_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa
				);
			} else if ($ds_serie_guia_remision == "T003") {
				$this->M_guia_remision->registrar_grupo_vame_tienda_nicolini();
				$id_tienda = $this->M_guia_remision->lastID();
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
					$num_bulto,
					$punto_partida,
					$punto_llegada,
					$contenedor,
					$embarque,
					$ds_sucursal_trabajador,
					$ds_serie_guia_remision,
					$id_parcial_completa,
					$id_tienda,
					$id_guia_remision_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa
				);
			}
		} else if ($id_guia_remision_empresa == "200") {
			$this->M_guia_remision->registrar_inversiones_alpev_guia_remision();
			$id_guia_remision_empresa = $this->M_guia_remision->lastID();
			if ($ds_serie_guia_remision == "T001") {
				$this->M_guia_remision->registrar_inversiones_alpev_tienda_proceres();
				$id_tienda = $this->M_guia_remision->lastID();
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
					$num_bulto,
					$punto_partida,
					$punto_llegada,
					$contenedor,
					$embarque,
					$ds_sucursal_trabajador,
					$ds_serie_guia_remision,
					$id_parcial_completa,
					$id_tienda,
					$id_guia_remision_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa
				);
			} else if ($ds_serie_guia_remision == "T002") {
				$this->M_guia_remision->registrar_inversiones_alpev_tienda_bellota();
				$id_tienda = $this->M_guia_remision->lastID();
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
					$num_bulto,
					$punto_partida,
					$punto_llegada,
					$contenedor,
					$embarque,
					$ds_sucursal_trabajador,
					$ds_serie_guia_remision,
					$id_parcial_completa,
					$id_tienda,
					$id_guia_remision_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa
				);
			} else if ($ds_serie_guia_remision == "T003") {
				$this->M_guia_remision->registrar_inversiones_alpev_tienda_nicolini();
				$id_tienda = $this->M_guia_remision->lastID();
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
					$num_bulto,
					$punto_partida,
					$punto_llegada,
					$contenedor,
					$embarque,
					$ds_sucursal_trabajador,
					$ds_serie_guia_remision,
					$id_parcial_completa,
					$id_tienda,
					$id_guia_remision_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa
				);
			}
		}
		echo json_encode($tipo_transporte);
	}


	public function enlace_actualizar($id_guia_remision)

	{

		$data = array(
			'cbox_tipo_envio_guia_remision' => $this->M_cbox->cbox_tipo_envio_guia_remision(),
			'enlace_actualizar_cabecera' => $this->M_guia_remision->enlace_actualizar_cabecera($id_guia_remision),
			'enlace_actualizar_detalle' => $this->M_guia_remision->enlace_actualizar_detalle($id_guia_remision)
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('guia_remision/V_actualizar', $data);
	}

	public function actualizar()
	{
		$id_guia_remision = $this->input->post("id_guia_remision");
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
		$num_bulto = $this->input->post("num_bulto");
		$punto_partida = $this->input->post("punto_partida");
		$punto_llegada = $this->input->post("punto_llegada");
		$contenedor = $this->input->post("contenedor");
		$embarque = $this->input->post("embarque");


		$this->M_guia_remision->actualizar(
			$id_guia_remision,
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
			$num_bulto,
			$punto_partida,
			$punto_llegada,
			$contenedor,
			$embarque
		);

		echo json_encode($tipo_transporte);
	}

	public function aprobar_estado()
	{
		$id_guia_remision = $this->input->post("id_guia_remision");
		$this->M_guia_remision->aprobar_estado($id_guia_remision);
		echo json_encode($id_guia_remision);
	}

	public function index_modal_productos()
	{
		$id_guia_remision = $this->input->post("id_guia_remision");

		$data = array(
			"index_modal_cabecera_productos" => $this->M_guia_remision->index_modal_cabecera_productos($id_guia_remision),
			"index_modal_detalle_productos" => $this->M_guia_remision->index_modal_detalle_productos($id_guia_remision),
		);

		$this->load->view("guia_remision/V_index_modal_productos", $data);
	}


	public function index_modal_tableros()
	{
		$id_guia_remision = $this->input->post("id_guia_remision");

		$data = array(
			"index_modal_cabecera_tableros" => $this->M_guia_remision->index_modal_cabecera_tableros($id_guia_remision),
			"index_modal_detalle_tableros" => $this->M_guia_remision->index_modal_detalle_tableros($id_guia_remision),
		);

		$this->load->view("guia_remision/V_index_modal_tableros", $data);
	}
}
