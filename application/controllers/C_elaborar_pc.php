<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_elaborar_pc extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_elaborar_pc");
		$this->load->model("M_cotizacion");
		$this->load->model("M_cbox");
	}

	public function index()
	{
		$data = array(
			'index' => $this->M_elaborar_pc->index(),
			'index_2' => $this->M_elaborar_pc->index_2(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('elaborar_pc/V_index', $data);
	}

	public function enlace_registrar_productos()

	{

		$id_orden_despacho = $this->input->get("id_orden_despacho");
		$id_parcial_completa = $this->input->get("id_parcial_completa");


		$data = array(
			'enlace_actualizar_cabecera_productos' => $this->M_elaborar_pc->enlace_actualizar_cabecera_productos($id_orden_despacho),
			'enlace_actualizar_detalle_productos' => $this->M_elaborar_pc->enlace_actualizar_detalle_productos($id_orden_despacho, $id_parcial_completa)
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('elaborar_pc/V_registrar_productos', $data);
	}

	public function enlace_registrar_tableros()

	{

		$id_orden_despacho = $this->input->get("id_orden_despacho");
		$id_parcial_completa = $this->input->get("id_parcial_completa");


		$data = array(
			'enlace_actualizar_cabecera_tableros' => $this->M_elaborar_pc->enlace_actualizar_cabecera_tableros($id_orden_despacho),
			'enlace_actualizar_detalle_tableros' => $this->M_elaborar_pc->enlace_actualizar_detalle_tableros($id_orden_despacho, $id_parcial_completa)
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('elaborar_pc/V_registrar_tableros', $data);
	}

	public function registrar()
	{

		//Cabecera
		$id_orden_despacho = $this->input->post("id_orden_despacho");
		$valor_venta_total_sin_d = $this->input->post("valor_venta_total_sin_d");
		$valor_venta_total_con_d = $this->input->post("valor_venta_total_con_d");
		$descuento_total = $this->input->post("descuento_total");
		$igv = $this->input->post("igv");
		$precio_venta = $this->input->post("precio_venta");
		$fecha_parcial_completa = $this->input->post("fecha_parcial_completa");
		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");
		$id_parcial_completa_empresa = $this->input->post("id_parcial_completa_empresa");
		$id_empresa = $this->input->post("id_empresa");


		//Detalle Update (estado_elaboracion_pc - Elaboracion PC)
		$id_dcotizacion = $this->input->post("id_dcotizacion");
		$salida_prod = $this->input->post("salida_prod");
		$pendiente_prod = $this->input->post("pendiente_prod");
		$d_cant_total = $this->input->post("d_cant_total");
		$valor_venta_sin_d = $this->input->post("valor_venta_sin_d");
		$valor_venta_con_d = $this->input->post("valor_venta_con_d");
		$id_estado_elaborar_pc = $this->input->post("id_estado_elaborar_pc");
		$item = $this->input->post("item");


		if ($id_parcial_completa_empresa == "100") {
			$this->M_elaborar_pc->registrar_grupo_vame_parciales_completas();
			$id_parcial_completa_empresa = $this->M_elaborar_pc->lastID();
			$this->M_elaborar_pc->registrar(
				$id_orden_despacho,
				$valor_venta_total_sin_d,
				$valor_venta_total_con_d,
				$descuento_total,
				$igv,
				$precio_venta,
				$fecha_parcial_completa,
				$id_trabajador,
				$ds_nombre_trabajador,
				$id_parcial_completa_empresa,
				$id_empresa
			);
		} else if ($id_parcial_completa_empresa == "200") {
			$this->M_elaborar_pc->registrar_inversiones_alpev_parciales_completas();
			$id_parcial_completa_empresa = $this->M_elaborar_pc->lastID();
			$this->M_elaborar_pc->registrar(
				$id_orden_despacho,
				$valor_venta_total_sin_d,
				$valor_venta_total_con_d,
				$descuento_total,
				$igv,
				$precio_venta,
				$fecha_parcial_completa,
				$id_trabajador,
				$ds_nombre_trabajador,
				$id_parcial_completa_empresa,
				$id_empresa
			);
		}
		$id_parcial_completa = $this->M_elaborar_pc->lastID();

		$this->registrar_detalle_parciales_completas(
			$id_parcial_completa,
			$id_dcotizacion,
			$salida_prod,
			$pendiente_prod,
			$d_cant_total,
			$valor_venta_sin_d,
			$valor_venta_con_d,
			$item
		);

		//Actualiza Estado en orden despacho y parciales y completas
		$rows = $this->M_elaborar_pc->verifica_numero_filas($id_orden_despacho, $id_parcial_completa);
		if ($rows->numero_filas == 0) {
			$this->M_elaborar_pc->actualizar_id_estado_elaborar_pc_orden_despacho_finalizado($id_orden_despacho);
			$this->M_elaborar_pc->actualizar_id_tipo_orden_parcial_completa_completa($id_parcial_completa);
			$this->M_elaborar_pc->actualizar_id_estado_parcial_completa_pendiente($id_parcial_completa);
		} else {
			$this->M_elaborar_pc->actualizar_id_estado_elaborar_pc_orden_despacho_pendiente($id_orden_despacho);
			$this->M_elaborar_pc->actualizar_id_tipo_orden_parcial_completa_parcial($id_parcial_completa);
			$this->M_elaborar_pc->actualizar_id_estado_parcial_completa_pendiente($id_parcial_completa);
		}
		//Fin de actualizacion de estados en orden despacho y parciales y completas

		$this->actualizar_detalle_cotizacion_estado_elaboracio_pc($id_dcotizacion, $id_estado_elaborar_pc);

		echo json_encode($id_orden_despacho);
	}

	protected function registrar_detalle_parciales_completas(
		$id_parcial_completa,
		$id_dcotizacion,
		$salida_prod,
		$pendiente_prod,
		$d_cant_total,
		$valor_venta_sin_d,
		$valor_venta_con_d,
		$item
	) {
		for ($i = 0; $i < count($salida_prod); $i++) {
			$this->M_elaborar_pc->registrar_detalle_parciales_completas(
				$id_parcial_completa,
				$id_dcotizacion[$i],
				$salida_prod[$i],
				$pendiente_prod[$i],
				$d_cant_total[$i],
				$valor_venta_sin_d[$i],
				$valor_venta_con_d[$i],
				$item[$i]
			);
		}
	}

	protected function actualizar_detalle_cotizacion_estado_elaboracio_pc(
		$id_dcotizacion,
		$estado_elaboracion_pc
	) {
		for ($i = 0; $i < count($id_dcotizacion); $i++) {
			$this->M_elaborar_pc->actualizar_detalle_cotizacion_estado_elaboracio_pc(
				$id_dcotizacion[$i],
				$estado_elaboracion_pc[$i]
			);
		}
	}

	public function index_modal_productos()
	{
		$id_orden_despacho = $this->input->post("id_orden_despacho");

		$data = array(
			"index_modal_cabecera_productos" => $this->M_elaborar_pc->index_modal_cabecera_productos($id_orden_despacho),
			"index_modal_detalle_productos" => $this->M_elaborar_pc->index_modal_detalle_productos($id_orden_despacho),
		);

		$this->load->view("elaborar_pc/V_index_modal_productos", $data);
	}

	public function index_modal_tableros()
	{
		$id_orden_despacho = $this->input->post("id_orden_despacho");

		$data = array(
			"index_modal_cabecera_tableros" => $this->M_elaborar_pc->index_modal_cabecera_tableros($id_orden_despacho),
			"index_modal_detalle_tableros" => $this->M_elaborar_pc->index_modal_detalle_tableros($id_orden_despacho),
		);

		$this->load->view("elaborar_pc/V_index_modal_tableros", $data);
	}
}
