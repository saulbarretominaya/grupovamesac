
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_clientes_proveedores extends CI_Model
{

    public function index()

    {
        $id_usuario = $this->session->userdata('id_usuario');

        $resultados = $this->db->query(
            "
            SELECT
            (CASE
            WHEN razon_social='' THEN CONCAT_WS(' ',nombres,ape_paterno,ape_materno)
            WHEN nombres='' AND ape_paterno='' AND ape_materno='' THEN razon_social
            END) ds_nombre_cliente_proveedor,
            num_documento,
            id_cliente_proveedor,
            id_usuario,
            ds_nombre_usuario,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_persona) AS ds_tipo_persona
            FROM clientes_proveedores
            WHERE id_usuario='$id_usuario'
            "
        );
        return $resultados->result();
    }


    public function index_modal_cabecera($id_cliente_proveedor)
    {
        $resultados = $this->db->query(
            "
            SELECT
            nombres,ape_materno,ape_paterno,num_documento,razon_social,direccion_fiscal,direccion_alm1,
            direccion_alm2,telefono,celular,linea_credito_soles,linea_credito_dolares,credito_unitario_soles,
            credito_unitario_dolares,disponible_soles,disponible_dolares,linea_opcional,linea_opcional_unitaria,
            email,contacto_registro,email_cobranza,contacto_cobranza,ds_nombre_usuario,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_origen) AS ds_origen,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_condicion) AS ds_condicion,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_persona) AS ds_tipo_persona,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_persona_sunat) AS ds_tipo_persona_sunat,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_documento) AS ds_tipo_documento,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_departamento) AS ds_departamento,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_provincia) AS ds_tipo_provincia,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_distrito) AS ds_distrito,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_giro) AS ds_tipo_giro,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_linea_disponible) AS ds_linea_disponible,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_cliente_pago) AS ds_tipo_cliente_pago
            FROM clientes_proveedores
            where id_cliente_proveedor='$id_cliente_proveedor'
        "
        );
        return $resultados->row();
    }

    public function insertar(
        $origen,
        $condicion,
        $tipo_persona,
        $tipo_persona_sunat,
        $tipo_documento,
        $num_documento,
        $nombres,
        $ape_paterno,
        $ape_materno,
        $razon_social,
        $direccion_fiscal,
        $direccion_alm1,
        $direccion_alm2,
        $departamento,
        $provincia,
        $distrito,
        $telefono,
        $celular,
        $tipo_giro,
        $condicion_pago,
        $linea_credito_soles,
        $credito_unitario_soles,
        $disponible_soles,
        $linea_credito_dolares,
        $credito_unitario_dolares,
        $disponible_dolares,
        $linea_opcional,
        $linea_opcional_unitaria,
        $linea_disponible,
        $email,
        $contacto_registro,
        $email_cobranza,
        $contacto_cobranza,
        $tipo_cliente_pago,
        $id_usuario,
        $ds_nombre_usuario

    ) {
        return $this->db->query("INSERT INTO clientes_proveedores
        (id_cliente_proveedor, id_origen,id_condicion, id_tipo_persona, id_tipo_persona_sunat, id_tipo_documento,num_documento,nombres,ape_paterno, ape_materno, razon_social, direccion_fiscal, direccion_alm1, direccion_alm2, id_departamento, id_provincia, id_distrito, telefono, celular, id_tipo_giro, id_condicion_pago,linea_credito_soles,credito_unitario_soles,disponible_soles,linea_credito_dolares, credito_unitario_dolares,disponible_dolares,linea_opcional, linea_opcional_unitaria, id_linea_disponible,email,contacto_registro,email_cobranza,contacto_cobranza,id_tipo_cliente_pago,
        id_usuario,ds_nombre_usuario)
        VALUES ('','$origen', '$condicion', '$tipo_persona', '$tipo_persona_sunat', '$tipo_documento',  '$num_documento', '$nombres', '$ape_paterno', '$ape_materno', '$razon_social', '$direccion_fiscal', '$direccion_alm1', '$direccion_alm2', '$departamento', '$provincia', '$distrito', '$telefono', '$celular', '$tipo_giro', '$condicion_pago','$linea_credito_soles', '$credito_unitario_soles', '$disponible_soles', '$linea_credito_dolares', '$credito_unitario_dolares', '$disponible_dolares','$linea_opcional', '$linea_opcional_unitaria', '$linea_disponible', '$email', '$contacto_registro', '$email_cobranza', '$contacto_cobranza', '$tipo_cliente_pago',
        '$id_usuario','$ds_nombre_usuario')");
    }


    public function enlace_actualizar($id_cliente_proveedor)
    {
        $this->db->where("id_cliente_proveedor", $id_cliente_proveedor);
        $resultados = $this->db->get("clientes_proveedores");
        return $resultados->row();
    }


    public function actualizar($id_cliente_proveedor, $origen, $condicion, $tipo_persona, $tipo_persona_sunat, $tipo_documento,  $num_documento, $nombres, $ape_paterno, $ape_materno, $razon_social, $direccion_fiscal, $direccion_alm1, $direccion_alm2, $departamento, $provincia, $distrito, $telefono, $celular, $tipo_giro, $condicion_pago, $linea_credito_soles, $credito_unitario_soles, $disponible_soles, $linea_credito_dolares, $credito_unitario_dolares, $disponible_dolares, $linea_opcional, $linea_opcional_unitaria, $linea_disponible, $email, $contacto_registro, $email_cobranza, $contacto_cobranza, $tipo_cliente_pago)
    {
        return $this->db->query("UPDATE clientes_proveedores SET id_origen='$origen', id_condicion='$condicion', id_tipo_persona='$tipo_persona', id_tipo_persona_sunat='$tipo_persona_sunat', id_tipo_documento='$tipo_documento',num_documento='$num_documento',nombres='$nombres',ape_paterno='$ape_paterno', ape_materno='$ape_materno', razon_social='$razon_social', direccion_fiscal='$direccion_fiscal', direccion_alm1=' $direccion_alm1', direccion_alm2='$direccion_alm2', id_departamento='$departamento', id_provincia='$provincia', id_distrito='$distrito', telefono='$telefono', celular='$celular', id_tipo_giro='$tipo_giro', id_condicion_pago='$condicion_pago',linea_credito_soles='$linea_credito_soles',credito_unitario_soles='$credito_unitario_soles',disponible_soles='$disponible_soles',linea_credito_dolares='$linea_credito_dolares', credito_unitario_dolares='$credito_unitario_dolares',disponible_dolares='$disponible_dolares',linea_opcional='$linea_opcional',linea_opcional_unitaria='$linea_opcional_unitaria',id_linea_disponible='$linea_disponible',email='$email',contacto_registro='$contacto_registro',email_cobranza='$email_cobranza',contacto_cobranza='$contacto_cobranza',id_tipo_cliente_pago='$tipo_cliente_pago'   WHERE  id_cliente_proveedor='$id_cliente_proveedor'");
    }

    public function validar_num_documento_repetido_registrar($num_documento)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            COUNT(*) AS cantidad_num_documento,
            ds_nombre_usuario
            FROM clientes_proveedores
            WHERE num_documento='$num_documento';
            "
        );
        return $resultados->row();
    }

    public function validar_num_documento_repetido_actualizar($id_cliente_proveedor, $num_documento)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            COUNT(*) AS cantidad_num_documento,
            ds_nombre_usuario
            FROM clientes_proveedores
            WHERE id_cliente_proveedor='$id_cliente_proveedor' and num_documento='$num_documento';
            "
        );
        return $resultados->row();
    }

    public function actualizar_estado($id_cliente_proveedor)
    {
        return $this->db->query(
            "
            UPDATE clientes_proveedores 
            SET  id_estado='0'
            WHERE id_cliente_proveedor='$id_cliente_proveedor'
            "
        );
    }
}
