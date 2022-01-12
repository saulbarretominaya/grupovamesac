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

	public function enlace_registrar($id_cotizacion)

	{

		$data = array(
			'index_clientes_proveedores' => $this->M_cotizacion->index_clientes_proveedores(),
			'index_productos' => $this->M_cotizacion->index_productos(),
			'index_tableros' => $this->M_cotizacion->index_tableros(),
			'index_comodin' => $this->M_cotizacion->index_comodin(),
			'cbox_condicion_pago' => $this->M_cbox->cbox_condicion_pago(),
			'tipo_cambio' => $this->M_cotizacion->tipo_cambio(),
			'cbox_moneda' => $this->M_cbox->cbox_moneda(),
			'cbox_estado_cotizacion' => $this->M_cbox->cbox_estado_cotizacion(),
			'cbox_tipo_orden_parcial_completa' => $this->M_cbox->cbox_tipo_orden_parcial_completa(),
			'enlace_actualizar_cabecera' => $this->M_cotizacion->enlace_actualizar_cabecera($id_cotizacion),
			'enlace_actualizar_detalle' => $this->M_cotizacion->enlace_actualizar_detalle($id_cotizacion)
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('parciales_completas/V_registrar', $data);
	}

	public function registrar()
	{

		//Cabecera
		$id_cotizacion = $this->input->post("id_cotizacion");
		$total = $this->input->post("total");
		$igv = $this->input->post("igv");
		$precio_venta = $this->input->post("precio_venta");
		$fecha_parcial_completa = $this->input->post("fecha_parcial_completa");
		$id_tipo_orden = $this->input->post("id_tipo_orden");


		//Detalle Cotizacion
		$salida_prod = $this->input->post("salida_prod");
		$pendiente_prod = $this->input->post("pendiente_prod");
		$valor_venta = $this->input->post("valor_venta");



		if ($this->M_parciales_completas->registrar(
			//Cabecera
			$id_cotizacion,
			$total,
			$igv,
			$precio_venta,
			$fecha_parcial_completa,
			$id_tipo_orden
		));

		$id_parcial_completa = $this->M_parciales_completas->lastID();


		$this->registrar_detalle_cotizacion(
			$id_parcial_completa,
			$salida_prod,
			$pendiente_prod,
			$valor_venta,
		);

		echo json_encode($id_cotizacion);
	}

	protected function registrar_detalle_cotizacion(
		$id_parcial_completa,
		$salida_prod,
		$pendiente_prod,
		$valor_venta
	) {
		for ($i = 0; $i < count($salida_prod); $i++) {
			$this->M_parciales_completas->registrar_detalle_cotizacion(
				$id_parcial_completa,
				$salida_prod[$i],
				$pendiente_prod[$i],
				$valor_venta[$i],
			);
		}
	}
}
