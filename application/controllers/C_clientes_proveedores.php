<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_clientes_proveedores extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_clientes_proveedores");
        $this->load->model("M_cbox");
    }


    public function index()
    {
        $data = array(
            'index' => $this->M_clientes_proveedores->index(),
        );

        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('clientes_proveedores/V_index', $data);
        $this->load->view('plantilla/V_footer');
    }

    public function enlace_registrar()
    {

        $data = array(


            // COMBO BOX
            'cbox_origen' => $this->M_cbox->cbox_origen(),
            'cbox_tipo_documento' => $this->M_cbox->cbox_tipo_documento(),
            'cbox_condicion' => $this->M_cbox->cbox_condicion(),
            'cbox_tipo_persona' => $this->M_cbox->cbox_tipo_persona(),
            'cbox_tipo_persona_sunat' => $this->M_cbox->cbox_tipo_persona_sunat(),
            'cbox_condicion_pago' => $this->M_cbox->cbox_condicion_pago(),
            'cbox_tipo_cliente_pago' => $this->M_cbox->cbox_tipo_cliente_pago(),
            'cbox_departamento' => $this->M_cbox->cbox_departamento(),
            'cbox_provincia' => $this->M_cbox->cbox_provincia(),
            'cbox_distrito' => $this->M_cbox->cbox_distrito(),
            'cbox_tipo_giro' => $this->M_cbox->cbox_tipo_giro(),
            'cbox_linea_disponible' => $this->M_cbox->cbox_linea_disponible(),

        );

        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('clientes_proveedores/V_registrar', $data);
        // $this->load->view('plantilla/V_footer');
    }

    public function insertar()
    {

        $origen = $this->input->post("origen");
        $condicion = $this->input->post("condicion");
        $tipo_persona = $this->input->post("tipo_persona");
        $tipo_persona_sunat = $this->input->post("tipo_persona_sunat");
        $tipo_documento = $this->input->post("tipo_documento");
        $num_documento = $this->input->post("num_documento");
        $nombres = $this->input->post("nombres");
        $ape_paterno = $this->input->post("ape_paterno");
        $ape_materno = $this->input->post("ape_paterno");
        $razon_social = $this->input->post("razon_social");
        $direccion_fiscal = $this->input->post("direccion_fiscal");
        $direccion_alm1 = $this->input->post("direccion_alm1");
        $direccion_alm2 = $this->input->post("direccion_alm2");
        $departamento = $this->input->post("departamento");
        $provincia = $this->input->post("provincia");
        $distrito = $this->input->post("distrito");
        $telefono = $this->input->post("telefono");
        $celular = $this->input->post("celular");
        $tipo_giro = $this->input->post("tipo_giro");
        $condicion_pago = $this->input->post("condicion_pago");
        $linea_credito_soles = $this->input->post("linea_credito_soles");
        $credito_unitario_soles = $this->input->post("credito_unitario_soles");
        $disponible_soles = $this->input->post("disponible_soles");
        $linea_credito_dolares = $this->input->post("linea_credito_dolares");
        $credito_unitario_dolares = $this->input->post("credito_unitario_dolares");
        $disponible_dolares = $this->input->post("disponible_dolares");
        $linea_opcional = $this->input->post("linea_opcional");
        $linea_opcional_unitaria = $this->input->post("linea_opcional_unitaria");
        $linea_disponible = $this->input->post("linea_disponible");
        $email = $this->input->post("email");
        $contacto_registro = $this->input->post("contacto_registro");
        $estado_cliente = $this->input->post("estado_cliente");
        $email_cobranza = $this->input->post("email_cobranza");
        $contacto_cobranza = $this->input->post("contacto_cobranza");
        $tipo_cliente_pago = $this->input->post("tipo_cliente_pago");




        $this->M_clientes_proveedores->insertar($origen, $condicion, $tipo_persona, $tipo_persona_sunat, $tipo_documento,  $num_documento, $nombres, $ape_paterno, $ape_materno, $razon_social, $direccion_fiscal, $direccion_alm1, $direccion_alm2, $departamento, $provincia, $distrito, $telefono, $celular, $tipo_giro, $condicion_pago, $linea_credito_soles, $credito_unitario_soles, $disponible_soles, $linea_credito_dolares, $credito_unitario_dolares, $disponible_dolares, $linea_opcional, $linea_opcional_unitaria, $linea_disponible, $email, $contacto_registro, $estado_cliente, $email_cobranza, $contacto_cobranza, $tipo_cliente_pago);

        echo json_encode($num_documento);
    }



    public function enlace_actualizar($id_cliente_proveedor)
    {

        $data = array(

            'enlace_actualizar' => $this->M_clientes_proveedores->enlace_actualizar($id_cliente_proveedor),
            'cbox_origen' => $this->M_cbox->cbox_origen(),
            'cbox_tipo_documento' => $this->M_cbox->cbox_tipo_documento(),
            'cbox_condicion' => $this->M_cbox->cbox_condicion(),
            'cbox_tipo_persona' => $this->M_cbox->cbox_tipo_persona(),
            'cbox_tipo_persona_sunat' => $this->M_cbox->cbox_tipo_persona_sunat(),
            'cbox_condicion_pago' => $this->M_cbox->cbox_condicion_pago(),
            'cbox_tipo_cliente_pago' => $this->M_cbox->cbox_tipo_cliente_pago(),
            'cbox_departamento' => $this->M_cbox->cbox_departamento(),
            'cbox_provincia' => $this->M_cbox->cbox_provincia(),
            'cbox_distrito' => $this->M_cbox->cbox_distrito(),
            'cbox_tipo_giro' => $this->M_cbox->cbox_tipo_giro(),
            'cbox_linea_disponible' => $this->M_cbox->cbox_linea_disponible(),


        );



        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('clientes_proveedores/V_actualizar', $data);
        // $this->load->view('plantilla/V_footer');
    }

    public function actualizar()
    {

        $id_cliente_proveedor = $this->input->post("id_cliente_proveedor");
        $origen = $this->input->post("origen");
        $condicion = $this->input->post("condicion");
        $tipo_persona = $this->input->post("tipo_persona");
        $tipo_persona_sunat = $this->input->post("tipo_persona_sunat");
        $tipo_documento = $this->input->post("tipo_documento");
        $num_documento = $this->input->post("num_documento");
        $nombres = $this->input->post("nombres");
        $ape_paterno = $this->input->post("ape_paterno");
        $ape_materno = $this->input->post("ape_paterno");
        $razon_social = $this->input->post("razon_social");
        $direccion_fiscal = $this->input->post("direccion_fiscal");
        $direccion_alm1 = $this->input->post("direccion_alm1");
        $direccion_alm2 = $this->input->post("direccion_alm2");
        $departamento = $this->input->post("departamento");
        $provincia = $this->input->post("provincia");
        $distrito = $this->input->post("distrito");
        $telefono = $this->input->post("telefono");
        $celular = $this->input->post("celular");
        $tipo_giro = $this->input->post("tipo_giro");
        $condicion_pago = $this->input->post("condicion_pago");
        $linea_credito_soles = $this->input->post("linea_credito_soles");
        $credito_unitario_soles = $this->input->post("credito_unitario_soles");
        $disponible_soles = $this->input->post("disponible_soles");
        $linea_credito_dolares = $this->input->post("linea_credito_dolares");
        $credito_unitario_dolares = $this->input->post("credito_unitario_dolares");
        $disponible_dolares = $this->input->post("disponible_dolares");
        $linea_opcional = $this->input->post("linea_opcional");
        $linea_opcional_unitaria = $this->input->post("linea_opcional_unitaria");
        $linea_disponible = $this->input->post("linea_disponible");
        $email = $this->input->post("email");
        $contacto_registro = $this->input->post("contacto_registro");
        $estado_cliente = $this->input->post("estado_cliente");
        $email_cobranza = $this->input->post("email_cobranza");
        $contacto_cobranza = $this->input->post("contacto_cobranza");
        $tipo_cliente_pago = $this->input->post("tipo_cliente_pago");


        $this->M_clientes_proveedores->actualizar($id_cliente_proveedor, $origen, $condicion, $tipo_persona, $tipo_persona_sunat, $tipo_documento,  $num_documento, $nombres, $ape_paterno, $ape_materno, $razon_social, $direccion_fiscal, $direccion_alm1, $direccion_alm2, $departamento, $provincia, $distrito, $telefono, $celular, $tipo_giro, $condicion_pago, $linea_credito_soles, $credito_unitario_soles, $disponible_soles, $linea_credito_dolares, $credito_unitario_dolares, $disponible_dolares, $linea_opcional, $linea_opcional_unitaria, $linea_disponible, $email, $contacto_registro, $estado_cliente, $email_cobranza, $contacto_cobranza, $tipo_cliente_pago);

        echo json_encode($num_documento);
    }

    public function verificar_cliente_proveedor()
    {

        $origen = $this->input->post("origen");
        $condicion = $this->input->post("condicion");
        $tipo_persona = $this->input->post("tipo_persona");
        $tipo_persona_sunat = $this->input->post("tipo_persona_sunat");
        $tipo_documento = $this->input->post("tipo_documento");
        $num_documento = $this->input->post("num_documento");
        $nombres = $this->input->post("nombres");
        $ape_paterno = $this->input->post("ape_paterno");
        $ape_materno = $this->input->post("ape_paterno");
        $razon_social = $this->input->post("razon_social");
        $direccion_fiscal = $this->input->post("direccion_fiscal");
        $direccion_alm1 = $this->input->post("direccion_alm1");
        $direccion_alm2 = $this->input->post("direccion_alm2");
        $departamento = $this->input->post("departamento");
        $provincia = $this->input->post("provincia");
        $distrito = $this->input->post("distrito");
        $telefono = $this->input->post("telefono");
        $celular = $this->input->post("celular");
        $tipo_giro = $this->input->post("tipo_giro");
        $condicion_pago = $this->input->post("condicion_pago");
        $linea_credito_soles = $this->input->post("linea_credito_soles");
        $credito_unitario_soles = $this->input->post("credito_unitario_soles");
        $disponible_soles = $this->input->post("disponible_soles");
        $linea_credito_dolares = $this->input->post("linea_credito_dolares");
        $credito_unitario_dolares = $this->input->post("credit_unitario_dolares");
        $disponible_dolares = $this->input->post("disponible_dolares");
        $linea_opcional = $this->input->post("linea_opcional");
        $linea_opcional_unitaria = $this->input->post("linea_opcional_unitaria");
        $linea_disponible = $this->input->post("linea_disponible");
        $email = $this->input->post("email");
        $contacto_registro = $this->input->post("contacto_registro");
        $estado_cliente = $this->input->post("estado_cliente");
        $email_cobranza = $this->input->post("email_cobranza");
        $contacto_cobranza = $this->input->post("contacto_cobranza");
        $tipo_cliente_pago = $this->input->post("tipo_cliente_pago");


        $data = $this->M_clientes_proveedores->verificar_cliente_proveedor($origen, $condicion, $tipo_persona, $tipo_persona_sunat, $tipo_documento,  $num_documento, $nombres, $ape_paterno, $ape_materno, $razon_social, $direccion_fiscal, $direccion_alm1, $direccion_alm2, $departamento, $provincia, $distrito, $telefono, $celular, $tipo_giro, $condicion_pago, $linea_credito_soles, $credito_unitario_soles, $disponible_soles, $linea_credito_dolares, $credito_unitario_dolares, $disponible_dolares, $linea_opcional, $linea_opcional_unitaria, $linea_disponible, $email, $contacto_registro, $estado_cliente, $email_cobranza, $contacto_cobranza, $tipo_cliente_pago);

        echo json_encode($data);
    }

    public function eliminar($id_cliente_proveedor)
    {

        $this->M_trabajadores->actualizar_estado($id_cliente_proveedor);
        redirect(base_url() . "C_clientes_proveedores");
    }
}
