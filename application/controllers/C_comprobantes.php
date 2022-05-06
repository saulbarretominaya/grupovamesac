<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_comprobantes extends CI_Controller
{

	public function __construct()

	{
		parent::__construct();
		$this->load->model("M_comprobantes");
		$this->load->model("M_cbox");
	}

	public function index()
	{
		$data = array(
			'index' => $this->M_comprobantes->index(),
			'index_2' => $this->M_comprobantes->index_2(),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('comprobantes/V_index', $data);
	}

	public function enlace_registrar($id_guia_remision)
	{
		$data = array(
			'cbox_tipo_comprobante_facturas_boletas' => $this->M_cbox->cbox_tipo_comprobante_facturas_boletas(),
			'cbox_condicion_pago_cotizacion' => $this->M_cbox->cbox_condicion_pago_cotizacion(),
			'enlace_registrar_cabecera' => $this->M_comprobantes->enlace_registrar_cabecera($id_guia_remision),
			'enlace_registrar_detalle' => $this->M_comprobantes->enlace_registrar_detalle($id_guia_remision),
		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('comprobantes/V_registrar', $data);
	}

	public function enlace_actualizar($id_comprobante)
	{
		$data = array(
			'cbox_tipo_comprobante_facturas_boletas' => $this->M_cbox->cbox_tipo_comprobante_facturas_boletas(),
			'cbox_condicion_pago_cotizacion' => $this->M_cbox->cbox_condicion_pago_cotizacion(),
			'enlace_actualizar_cabecera' => $this->M_comprobantes->enlace_actualizar_cabecera($id_comprobante),
			'enlace_actualizar_detalle' => $this->M_comprobantes->enlace_actualizar_detalle($id_comprobante),
			'enlace_actualizar_detalle_condicion_pago' => $this->M_comprobantes->enlace_actualizar_detalle_condicion_pago($id_comprobante)

		);

		$this->load->view('plantilla/V_header');
		$this->load->view('plantilla/V_aside');
		$this->load->view('comprobantes/V_actualizar', $data);
	}

	public function registrar()
	{

		//Cabecera
		$id_tipo_comprobante = $this->input->post("id_tipo_comprobante");
		$ds_tipo_comprobante = $this->input->post("ds_tipo_comprobante");
		$fecha_emision = $this->input->post("fecha_emision");
		$dias = $this->input->post("dias");
		$fecha_vencimiento = $this->input->post("fecha_vencimiento");
		$orden_compra = $this->input->post("orden_compra");
		$id_condicion_pago = $this->input->post("id_condicion_pago");
		$ds_condicion_pago = $this->input->post("ds_condicion_pago");
		$monto_total_condicion_pago = $this->input->post("monto_total_condicion_pago");
		$observacion = $this->input->post("observacion");
		$id_guia_remision = $this->input->post("id_guia_remision");
		$id_comprobante_empresa = $this->input->post("id_comprobante_empresa");

		$id_trabajador = $this->input->post("id_trabajador");
		$ds_nombre_trabajador = $this->input->post("ds_nombre_trabajador");
		$id_empresa = $this->input->post("id_empresa");


		//Detalle_condicion pago
		$fecha_cuota = $this->input->post("fecha_cuota");
		$monto_cuota = $this->input->post("monto_cuota");

		if ($id_comprobante_empresa == "100") {
			$this->M_comprobantes->registrar_grupo_vame_comprobantes();
			$id_comprobante_empresa = $this->M_comprobantes->lastID();

			if ($id_tipo_comprobante == "69") {
				$this->M_comprobantes->registrar_grupo_vame_facturas();
				$id_num_comprobante = $this->M_comprobantes->lastID();
				$this->M_comprobantes->registrar(
					$id_tipo_comprobante,
					$ds_tipo_comprobante,
					$fecha_emision,
					$dias,
					$fecha_vencimiento,
					$orden_compra,
					$id_condicion_pago,
					$ds_condicion_pago,
					$monto_total_condicion_pago,
					$observacion,
					$id_guia_remision,
					$id_num_comprobante,
					$id_comprobante_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa

				);
			} else if ($id_tipo_comprobante == "70") {
				$this->M_comprobantes->registrar_grupo_vame_boletas();
				$id_num_comprobante = $this->M_comprobantes->lastID();
				$this->M_comprobantes->registrar(
					$id_tipo_comprobante,
					$ds_tipo_comprobante,
					$fecha_emision,
					$dias,
					$fecha_vencimiento,
					$orden_compra,
					$id_condicion_pago,
					$ds_condicion_pago,
					$monto_total_condicion_pago,
					$observacion,
					$id_guia_remision,
					$id_num_comprobante,
					$id_comprobante_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa

				);
			} else if ($id_tipo_comprobante == "77") {
				$this->M_comprobantes->registrar_grupo_vame_nota_credito();
				$id_num_comprobante = $this->M_comprobantes->lastID();
				$this->M_comprobantes->registrar(
					$id_tipo_comprobante,
					$ds_tipo_comprobante,
					$fecha_emision,
					$dias,
					$fecha_vencimiento,
					$orden_compra,
					$id_condicion_pago,
					$ds_condicion_pago,
					$monto_total_condicion_pago,
					$observacion,
					$id_guia_remision,
					$id_num_comprobante,
					$id_comprobante_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa
				);
			} else if ($id_tipo_comprobante == "78") {
				$this->M_comprobantes->registrar_grupo_vame_nota_debito();
				$id_num_comprobante = $this->M_comprobantes->lastID();
				$this->M_comprobantes->registrar(
					$id_tipo_comprobante,
					$ds_tipo_comprobante,
					$fecha_emision,
					$dias,
					$fecha_vencimiento,
					$orden_compra,
					$id_condicion_pago,
					$ds_condicion_pago,
					$monto_total_condicion_pago,
					$observacion,
					$id_guia_remision,
					$id_num_comprobante,
					$id_comprobante_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa
				);
			}
		} else if ($id_comprobante_empresa == "200") {
			$this->M_comprobantes->registrar_inversiones_alpev_comprobantes();
			$id_comprobante_empresa = $this->M_comprobantes->lastID();

			if ($id_tipo_comprobante == "69") {
				$this->M_comprobantes->registrar_inversiones_alpev_facturas();
				$id_num_comprobante = $this->M_comprobantes->lastID();
				$this->M_comprobantes->registrar(
					$id_tipo_comprobante,
					$ds_tipo_comprobante,
					$fecha_emision,
					$dias,
					$fecha_vencimiento,
					$orden_compra,
					$id_condicion_pago,
					$ds_condicion_pago,
					$monto_total_condicion_pago,
					$observacion,
					$id_guia_remision,
					$id_num_comprobante,
					$id_comprobante_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa
				);
			} else if ($id_tipo_comprobante == "70") {
				$this->M_comprobantes->registrar_inversiones_alpev_boletas();
				$id_num_comprobante = $this->M_comprobantes->lastID();
				$this->M_comprobantes->registrar(
					$id_tipo_comprobante,
					$ds_tipo_comprobante,
					$fecha_emision,
					$dias,
					$fecha_vencimiento,
					$orden_compra,
					$id_condicion_pago,
					$ds_condicion_pago,
					$monto_total_condicion_pago,
					$observacion,
					$id_guia_remision,
					$id_num_comprobante,
					$id_comprobante_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa
				);
			} else if ($id_tipo_comprobante == "77") {
				$this->M_comprobantes->registrar_inversiones_alpev_nota_credito();
				$id_num_comprobante = $this->M_comprobantes->lastID();
				$this->M_comprobantes->registrar(
					$id_tipo_comprobante,
					$ds_tipo_comprobante,
					$fecha_emision,
					$dias,
					$fecha_vencimiento,
					$orden_compra,
					$id_condicion_pago,
					$ds_condicion_pago,
					$monto_total_condicion_pago,
					$observacion,
					$id_guia_remision,
					$id_num_comprobante,
					$id_comprobante_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa
				);
			} else if ($id_tipo_comprobante == "78") {
				$this->M_comprobantes->registrar_inversiones_alpev_nota_debito();
				$id_num_comprobante = $this->M_comprobantes->lastID();
				$this->M_comprobantes->registrar(
					$id_tipo_comprobante,
					$ds_tipo_comprobante,
					$fecha_emision,
					$dias,
					$fecha_vencimiento,
					$orden_compra,
					$id_condicion_pago,
					$ds_condicion_pago,
					$monto_total_condicion_pago,
					$observacion,
					$id_guia_remision,
					$id_num_comprobante,
					$id_comprobante_empresa,
					$id_trabajador,
					$ds_nombre_trabajador,
					$id_empresa
				);
			}
		}

		$id_comprobante = $this->M_comprobantes->lastID();

		if ($fecha_cuota != "") {
			$this->registrar_detalle_condicion_pago($id_comprobante, $fecha_cuota, $monto_cuota);
		}

		$this->M_comprobantes->actualizar_estado_pendiente_por_facturar($id_comprobante);

		echo json_encode($id_tipo_comprobante);
	}

	protected function registrar_detalle_condicion_pago(
		$id_comprobante,
		$fecha_cuota,
		$monto_cuota

	) {
		for ($i = 0; $i < count($fecha_cuota); $i++) {
			$this->M_comprobantes->registrar_detalle_condicion_pago(
				$id_comprobante,
				$fecha_cuota[$i],
				$monto_cuota[$i],

			);
		}
	}

	public function actualizar()
	{

		//Cabecera
		$id_comprobante = $this->input->post("id_comprobante");
		$fecha_emision = $this->input->post("fecha_emision");
		$dias = $this->input->post("dias");
		$fecha_vencimiento = $this->input->post("fecha_vencimiento");
		$orden_compra = $this->input->post("orden_compra");
		$id_condicion_pago = $this->input->post("id_condicion_pago");
		$ds_condicion_pago = $this->input->post("ds_condicion_pago");
		$monto_total_condicion_pago = $this->input->post("monto_total_condicion_pago");
		$observacion = $this->input->post("observacion");

		//Detalle_condicion pago
		$fecha_cuota = $this->input->post("fecha_cuota");
		$monto_cuota = $this->input->post("monto_cuota");
		$id_dcondicion_pago_eliminar = $this->input->post("id_dcondicion_pago_eliminar");


		$this->M_comprobantes->actualizar(
			$id_comprobante,
			$fecha_emision,
			$dias,
			$fecha_vencimiento,
			$orden_compra,
			$id_condicion_pago,
			$ds_condicion_pago,
			$monto_total_condicion_pago,
			$observacion
		);

		//Le pregunta antes que elimine
		if ($id_dcondicion_pago_eliminar != "") {
			$this->eliminar_detalle_condicion_pago($id_dcondicion_pago_eliminar);
		}

		//Le pregunta antes que registre
		if ($fecha_cuota != "") {
			$this->registrar_detalle_condicion_pago($id_comprobante, $fecha_cuota, $monto_cuota);
		}

		$this->M_comprobantes->actualizar_estado_pendiente_por_facturar($id_comprobante);

		echo json_encode($id_comprobante);
	}

	protected function eliminar_detalle_condicion_pago(
		$id_dcondicion_pago_eliminar

	) {
		for ($i = 0; $i < count($id_dcondicion_pago_eliminar); $i++) {
			$this->M_comprobantes->eliminar_detalle_condicion_pago(
				$id_dcondicion_pago_eliminar[$i],
			);
		}
	}

	public function index_modal_productos()
	{
		$id_comprobante = $this->input->post("id_comprobante");

		$data = array(
			"index_modal_cabecera_productos" => $this->M_comprobantes->index_modal_cabecera_productos($id_comprobante),
			//"index_modal_detalle_productos" => $this->M_comprobantes->index_modal_detalle_productos($id_comprobante),
		);

		$this->load->view("comprobantes/V_index_modal_productos", $data);
	}

	public function index_modal_tableros()
	{
		$id_comprobante = $this->input->post("id_comprobante");

		$data = array(
			"index_modal_cabecera_tableros" => $this->M_comprobantes->index_modal_cabecera_tableros($id_comprobante),
			//index_modal_detalle_tableros" => $this->M_parciales_completas->index_modal_detalle_tableros($id_parcial_completa),
		);

		$this->load->view("comprobantes/V_index_modal_tableros", $data);
	}

	public function emitir_comprobantes_electronicos()
	{
		$id_comprobante = $this->input->post("id_comprobante");

		/*$data = array(
			//"param1" => $this->M_comprobantes->parametros_cabecera_factura_electronica($id_comprobante)
			//"param2" => $this->M_comprobantes->parametros_detalle_factura_electronica($id_comprobante)
		); */

		$ruta = "https://api.nubefact.com/api/v1/c23ea8b3-8cf7-4eac-8c2a-d92b1f92498c";
		$token = "0ca0e5f49e4e4a958a95019ddecf33d70405289f2b8344ea93de3f4bb086cd7f";

		$data = array(
			"operacion"                         => "generar_comprobante",
			"tipo_de_comprobante"               => "1",
			"serie"                             => "FFF1",
			"numero"                            => "60",
			"sunat_transaction"                 => "1",
			"cliente_tipo_de_documento"         => "6",
			"cliente_numero_de_documento"       => "20600695771",
			"cliente_denominacion"              => "NUBEFACT SA",
			"cliente_direccion"                 => "CALLE LIBERTAD 116 MIRAFLORES - LIMA - PERU",
			"cliente_email"                     => "",
			"cliente_email_1"                   => "",
			"cliente_email_2"                   => "",
			"fecha_de_emision"                  => "27/04/2022",
			"fecha_de_vencimiento"              => "",
			"moneda"                            => "1",
			"tipo_de_cambio"                    => "",
			"porcentaje_de_igv"                 => "18.00",
			"descuento_global"                  => "",
			"descuento_global"                  => "",
			"total_descuento"                   => "",
			"total_anticipo"                    => "",
			"total_gravada"                     => "600",
			"total_inafecta"                    => "",
			"total_exonerada"                   => "",
			"total_igv"                         => "108",
			"total_gratuita"                    => "",
			"total_otros_cargos"                => "",
			"total"                             => "708",
			"percepcion_tipo"                   => "",
			"percepcion_base_imponible"         => "",
			"total_percepcion"                  => "",
			"total_incluido_percepcion"         => "",
			"detraccion"                        => "false",
			"observaciones"                     => "",
			"documento_que_se_modifica_tipo"    => "",
			"documento_que_se_modifica_serie"   => "",
			"documento_que_se_modifica_numero"  => "",
			"tipo_de_nota_de_credito"           => "",
			"tipo_de_nota_de_debito"            => "",
			"enviar_automaticamente_a_la_sunat" => "true",
			"enviar_automaticamente_al_cliente" => "false",
			"codigo_unico"                      => "",
			"condiciones_de_pago"               => "",
			"medio_de_pago"                     => "",
			"placa_vehiculo"                    => "",
			"orden_compra_servicio"             => "",
			"tabla_personalizada_codigo"        => "",
			"formato_de_pdf"                    => "",
			"items" => array(
				array(
					"unidad_de_medida"          => "NIU",
					"codigo"                    => "001",
					"descripcion"               => "DETALLE DEL PRODUCTO",
					"cantidad"                  => "1",
					"valor_unitario"            => "500",
					"precio_unitario"           => "590",
					"descuento"                 => "",
					"subtotal"                  => "500",
					"tipo_de_igv"               => "1",
					"igv"                       => "90",
					"total"                     => "590",
					"anticipo_regularizacion"   => "false",
					"anticipo_documento_serie"  => "",
					"anticipo_documento_numero" => ""
				),
				array(
					"unidad_de_medida"          => "ZZ",
					"codigo"                    => "001",
					"descripcion"               => "DETALLE DEL SERVICIO",
					"cantidad"                  => "5",
					"valor_unitario"            => "20",
					"precio_unitario"           => "23.60",
					"descuento"                 => "",
					"subtotal"                  => "100",
					"tipo_de_igv"               => "1",
					"igv"                       => "18",
					"total"                     => "118",
					"anticipo_regularizacion"   => "false",
					"anticipo_documento_serie"  => "",
					"anticipo_documento_numero" => ""

				)
			)
		);

		$data_json = json_encode($data);

		//Invocamos el servicio de NUBEFACT
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $ruta);
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array(
				'Authorization: Token token="' . $token . '"',
				'Content-Type: application/json',
			)
		);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$respuesta  = curl_exec($ch);
		curl_close($ch);

		$leer_respuesta = json_decode($respuesta, true);

		if (isset($leer_respuesta['errors'])) {

			// echo json_encode(array($leer_respuesta['errors']));
		} else {
			$json_request = $data_json;
			$json_response = json_encode($leer_respuesta);
			$tipo_de_comprobante = $leer_respuesta['tipo_de_comprobante'];
			$serie = $leer_respuesta['serie'];
			$numero = $leer_respuesta['numero'];
			$enlace = $leer_respuesta['enlace'];
			$aceptada_por_sunat = $leer_respuesta['aceptada_por_sunat'];

			if ($serie == "FFF1") {
				if ($aceptada_por_sunat != 1) {
					$aceptada_por_sunat = 0; //Es estado 0 significa que fue Rechazado, le asignamos un valor porque devuelve vacio
				}
			} else if ($serie == "BBB1") {
				$aceptada_por_sunat = 2; //El estado 2 significa que esta en Pendiente, le asignamos un valor porque devuelve vacio
			}


			$sunat_description = $leer_respuesta['sunat_description'];
			$sunat_note = $leer_respuesta['sunat_note'];
			$sunat_responsecode = $leer_respuesta['sunat_responsecode'];
			$sunat_soap_error = $leer_respuesta['sunat_soap_error'];
			$anulado = $leer_respuesta['anulado'];
			$pdf_zip_base64 = $leer_respuesta['pdf_zip_base64'];
			$xml_zip_base64 = $leer_respuesta['xml_zip_base64'];
			$cdr_zip_base64 = $leer_respuesta['cdr_zip_base64'];
			$cadena_para_codigo_qr = $leer_respuesta['cadena_para_codigo_qr'];
			$codigo_hash = $leer_respuesta['codigo_hash'];
			$codigo_de_barras = $leer_respuesta['codigo_de_barras'];
			$key = $leer_respuesta['key'];
			$digest_value = $leer_respuesta['digest_value'];
			$enlace_del_pdf = $leer_respuesta['enlace_del_pdf'];
			$enlace_del_xml = $leer_respuesta['enlace_del_xml'];
			$enlace_del_cdr = $leer_respuesta['enlace_del_cdr'];

			if ($serie == "FFF1") {
				if ($enlace_del_cdr == "") {
					$enlace_del_cdr = 2; //El estado 0 significa que fue Rechazado, le asignamos un valor porque devuelve vacio
				}
			} else if ($serie == "BBB1") {
				$enlace_del_cdr = 2; //El estado 2 significa que esta en Pendiente, le asignamos un valor porque devuelve vacio
			}

			$this->M_comprobantes->emitir_comprobantes_electronicos(
				$id_comprobante,
				$json_request,
				$json_response,
				$tipo_de_comprobante,
				$serie,
				$numero,
				$enlace,
				$aceptada_por_sunat,
				$sunat_description,
				$sunat_note,
				$sunat_responsecode,
				$sunat_soap_error,
				$anulado,
				$pdf_zip_base64,
				$xml_zip_base64,
				$cdr_zip_base64,
				$cadena_para_codigo_qr,
				$codigo_hash,
				$codigo_de_barras,
				$key,
				$digest_value,
				$enlace_del_pdf,
				$enlace_del_xml,
				$enlace_del_cdr
			);

			$this->M_comprobantes->actualizar_estado_comprobante_y_estado_sunat($id_comprobante, $aceptada_por_sunat);

			// echo json_encode(array($leer_respuesta['sunat_description']));
		}
		echo json_encode($id_comprobante);
	}

	public function actualizar_estado_sunat_aceptado()
	{
		$id_comprobante = $this->input->post("id_comprobante");
		$this->M_comprobantes->actualizar_estado_sunat($id_comprobante);
		echo json_encode($id_comprobante);
	}

	public function anular_comprobantes_electronicos()
	{
		$id_comprobante = $this->input->post("id_comprobante");
		$motivo =  $this->input->post("motivo");

		/*$data = array(
			//"param1" => $this->M_comprobantes->parametros_cabecera_factura_electronica($id_comprobante)
			//"param2" => $this->M_comprobantes->parametros_detalle_factura_electronica($id_comprobante)
		); */

		$ruta = "https://api.nubefact.com/api/v1/c23ea8b3-8cf7-4eac-8c2a-d92b1f92498c";
		$token = "0ca0e5f49e4e4a958a95019ddecf33d70405289f2b8344ea93de3f4bb086cd7f";

		$data = array(
			"operacion"                         => "generar_anulacion",
			"tipo_de_comprobante"               => "1",
			"serie"                             => "FFF1",
			"numero"                            => "60",
			"motivo"							=> $motivo,
			"codigo_unico"                      => ""
		);

		$data_json = json_encode($data);

		//Invocamos el servicio de NUBEFACT
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $ruta);
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array(
				'Authorization: Token token="' . $token . '"',
				'Content-Type: application/json',
			)
		);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$respuesta  = curl_exec($ch);
		curl_close($ch);

		$leer_respuesta = json_decode($respuesta, true);

		if (isset($leer_respuesta['errors'])) {
		} else {
			$json_request = $data_json;
			$json_response = json_encode($leer_respuesta);
			$numero = $leer_respuesta['numero'];
			$enlace = $leer_respuesta['enlace'];
			$sunat_ticket_numero = $leer_respuesta['sunat_ticket_numero'];
			$aceptada_por_sunat = $leer_respuesta['aceptada_por_sunat'];
			$sunat_description = $leer_respuesta['sunat_description'];
			$sunat_note = $leer_respuesta['sunat_note'];
			$sunat_responsecode = $leer_respuesta['sunat_responsecode'];
			$sunat_soap_error = $leer_respuesta['sunat_soap_error'];
			$pdf_zip_base64 = $leer_respuesta['pdf_zip_base64'];
			$xml_zip_base64 = $leer_respuesta['xml_zip_base64'];
			$cdr_zip_base64 = $leer_respuesta['cdr_zip_base64'];
			$enlace_del_pdf = $leer_respuesta['enlace_del_pdf'];
			$enlace_del_xml = $leer_respuesta['enlace_del_xml'];
			$enlace_del_cdr = $leer_respuesta['enlace_del_cdr'];
			$key = $leer_respuesta['key'];

			$this->M_comprobantes->anular_comprobantes_electronicos(
				$id_comprobante,
				$motivo,
				$json_request,
				$json_response,
				$numero,
				$enlace,
				$sunat_ticket_numero,
				$aceptada_por_sunat,
				$sunat_description,
				$sunat_note,
				$sunat_responsecode,
				$sunat_soap_error,
				$pdf_zip_base64,
				$xml_zip_base64,
				$cdr_zip_base64,
				$enlace_del_pdf,
				$enlace_del_xml,
				$enlace_del_cdr,
				$key
			);

			$this->M_comprobantes->actualizar_estado_sunat_anulado($id_comprobante);
		}

		echo json_encode($id_comprobante);
	}

	public function consultar_comprobantes_electronicos()
	{
		$id_comprobante = $this->input->post("id_comprobante");


		$ruta = "https://api.nubefact.com/api/v1/c23ea8b3-8cf7-4eac-8c2a-d92b1f92498c";
		$token = "0ca0e5f49e4e4a958a95019ddecf33d70405289f2b8344ea93de3f4bb086cd7f";

		$data = array(
			"operacion"                         => "consultar_comprobante",
			"tipo_de_comprobante"               => "1",
			"serie"                             => "FFF1",
			"numero"                            => "55"
		);

		$data_json = json_encode($data);

		//Invocamos el servicio de NUBEFACT
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $ruta);
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array(
				'Authorization: Token token="' . $token . '"',
				'Content-Type: application/json',
			)
		);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$respuesta  = curl_exec($ch);
		curl_close($ch);

		$data = array(
			'leer_respuesta' =>	json_decode($respuesta, true)
		);

		$this->load->view("comprobantes/V_index_modal_consultar_compr_elect", $data);
	}
}
