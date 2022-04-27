<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_productos extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_productos");
		$this->load->model("M_cbox");
	}
	public function index()
	{
		$data = array(
			'index' => $this->M_productos->index(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('productos/V_index', $data);
	}

	public function enlace_registrar()
	{
		$data = array(
			'cbox_unidad_medida' => $this->M_cbox->cbox_unidad_medida(),
			'cbox_grupo' => $this->M_cbox->cbox_grupo(),
			'cbox_familia' => $this->M_cbox->cbox_familia(),
			'cbox_clase' => $this->M_cbox->cbox_clase(),
			'cbox_sub_clase' => $this->M_cbox->cbox_sub_clase(),
			'cbox_sub_clase_dos' => $this->M_cbox->cbox_sub_clase_dos(),
			'cbox_marca_productos' => $this->M_cbox->cbox_marca_productos(),
			'cbox_moneda' => $this->M_cbox->cbox_moneda(),
			'cbox_cta_vta' => $this->M_cbox->cbox_cta_vta(),
			'cbox_cta_ent' => $this->M_cbox->cbox_cta_ent(),
			'cbox_codigos_sunat' => $this->M_cbox->cbox_codigos_sunat(),
			'cbox_almacen' => $this->M_cbox->cbox_almacen(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('productos/V_registrar', $data);
	}


	public function registrar()
	{

		$codigo_producto = $this->input->post("codigo_producto");
		$descripcion_producto = $this->input->post("descripcion_producto");
		$id_almacen = $this->input->post("id_almacen");
		$id_unidad_medida = $this->input->post("id_unidad_medida");
		$precio_costo = $this->input->post("precio_costo");
		$porcentaje = $this->input->post("porcentaje");
		$precio_unitario = $this->input->post("precio_unitario");
		$ganancia_unidad = $this->input->post("ganancia_unidad");
		$rentabilidad = $this->input->post("rentabilidad");
		$id_moneda = $this->input->post("id_moneda");
		$id_grupo = $this->input->post("id_grupo");
		$id_familia = $this->input->post("id_familia");
		$id_clase = $this->input->post("id_clase");
		$id_sub_clase = $this->input->post("id_sub_clase");
		$id_sub_clase_dos = $this->input->post("id_sub_clase_dos");
		$id_marca_producto = $this->input->post("id_marca_producto");
		$id_cta_vta = $this->input->post("id_cta_vta");
		$id_cta_ent = $this->input->post("id_cta_ent");
		$id_sunat = $this->input->post("id_sunat");
		$resultado_campo = $this->input->post("resultado_campo");

		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");
		$id_producto_empresa = $this->input->post("id_producto_empresa");
		$id_empresa = $this->input->post("id_empresa");

		if ($id_producto_empresa == "100") {
			$this->M_productos->registrar_grupo_vame_productos();
			$id_producto_empresa = $this->M_productos->lastID();
			$this->M_productos->registrar(
				$codigo_producto,
				$descripcion_producto,
				$precio_costo,
				$precio_unitario,
				$porcentaje,
				$ganancia_unidad,
				$rentabilidad,
				$id_unidad_medida,
				$id_grupo,
				$id_familia,
				$id_clase,
				$id_sub_clase,
				$id_sub_clase_dos,
				$id_marca_producto,
				$id_moneda,
				$id_cta_vta,
				$id_cta_ent,
				$id_sunat,
				$id_almacen,
				$id_trabajador,
				$ds_nombre_trabajador,
				$id_producto_empresa,
				$id_empresa
			);
			if ($resultado_campo == "automatico") {
				$this->M_cbox->actualizar_correlativo_producto($codigo_producto);
			}
		} else if ($id_producto_empresa == "200") {
			$this->M_productos->registrar_inversiones_alpev_productos();
			$id_producto_empresa = $this->M_productos->lastID();
			$this->M_productos->registrar(
				$codigo_producto,
				$descripcion_producto,
				$precio_costo,
				$precio_unitario,
				$porcentaje,
				$ganancia_unidad,
				$rentabilidad,
				$id_unidad_medida,
				$id_grupo,
				$id_familia,
				$id_clase,
				$id_sub_clase,
				$id_sub_clase_dos,
				$id_marca_producto,
				$id_moneda,
				$id_cta_vta,
				$id_cta_ent,
				$id_sunat,
				$id_almacen,
				$id_trabajador,
				$ds_nombre_trabajador,
				$id_producto_empresa,
				$id_empresa
			);
			if ($resultado_campo == "automatico") {
				$this->M_cbox->actualizar_correlativo_producto($codigo_producto);
			}
		}

		echo json_encode($codigo_producto);
	}


	public function enlace_actualizar($id_producto)
	{

		$data = array(

			'enlace_actualizar' => $this->M_productos->enlace_actualizar($id_producto),
			'cbox_unidad_medida' => $this->M_cbox->cbox_unidad_medida(),
			'cbox_grupo' => $this->M_cbox->cbox_grupo(),
			'cbox_familia' => $this->M_cbox->cbox_familia(),
			'cbox_clase' => $this->M_cbox->cbox_clase(),
			'cbox_sub_clase' => $this->M_cbox->cbox_sub_clase(),
			'cbox_sub_clase_dos' => $this->M_cbox->cbox_sub_clase_dos(),
			'cbox_marca_productos' => $this->M_cbox->cbox_marca_productos(),
			'cbox_moneda' => $this->M_cbox->cbox_moneda(),
			'cbox_cta_vta' => $this->M_cbox->cbox_cta_vta(),
			'cbox_cta_ent' => $this->M_cbox->cbox_cta_ent(),
			'cbox_codigos_sunat' => $this->M_cbox->cbox_codigos_sunat(),
			'cbox_almacen' => $this->M_cbox->cbox_almacen(),

		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('productos/V_actualizar', $data);
	}


	public function correlativo_producto()
	{
		$data = $this->M_cbox->correlativo_producto();
		echo json_encode($data);
	}

	public function actualizar()
	{

		$id_producto = $this->input->post("id_producto");

		$codigo_producto = $this->input->post("codigo_producto");
		$descripcion_producto = $this->input->post("descripcion_producto");
		$id_almacen = $this->input->post("id_almacen");
		$id_unidad_medida = $this->input->post("id_unidad_medida");

		$precio_costo = $this->input->post("precio_costo");
		$porcentaje = $this->input->post("porcentaje");
		$precio_unitario = $this->input->post("precio_unitario");
		$ganancia_unidad = $this->input->post("ganancia_unidad");
		$rentabilidad = $this->input->post("rentabilidad");
		$id_moneda = $this->input->post("id_moneda");

		$id_grupo = $this->input->post("id_grupo");
		$id_familia = $this->input->post("id_familia");
		$id_clase = $this->input->post("id_clase");
		$id_sub_clase = $this->input->post("id_sub_clase");
		$id_sub_clase_dos = $this->input->post("id_sub_clase_dos");
		$id_marca_producto = $this->input->post("id_marca_producto");

		$id_cta_vta = $this->input->post("id_cta_vta");
		$id_cta_ent = $this->input->post("id_cta_ent");

		$id_sunat = $this->input->post("id_sunat");


		if ($this->M_productos->actualizar(
			$id_producto,
			$codigo_producto,
			$descripcion_producto,
			$precio_costo,
			$precio_unitario,
			$porcentaje,
			$ganancia_unidad,
			$rentabilidad,
			$id_unidad_medida,
			$id_grupo,
			$id_familia,
			$id_clase,
			$id_sub_clase,
			$id_sub_clase_dos,
			$id_marca_producto,
			$id_moneda,
			$id_cta_vta,
			$id_cta_ent,
			$id_sunat,
			$id_almacen
		));

		echo json_encode($codigo_producto);
	}
}
