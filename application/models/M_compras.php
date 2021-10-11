
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_compras extends CI_Model
{
    public function index()
    {
        $resultados = $this->db->query(
            "select * from clientes_proveedores where id_estado=1"
        );
        return $resultados->result();
    }

    public function index_modal($id_cliente_proveedor)
    {
        $this->db->where("id_cliente_proveedor", $id_cliente_proveedor);
        $resultados = $this->db->get("clientes_proveedores");
        return $resultados->row();
    }

    public function encargado()
    {
        $resultados = $this->db->query("
           SELECT CONCAT (nombres,' ',ape_paterno,' ',ape_materno) AS ds_omar FROM trabajadores WHERE id_estado = '1';");
        return $resultados->result();
    }

    public function proveedor()
    {
        $resultados = $this->db->query("
           SELECT * FROM clientes_proveedores WHERE id_tipo_persona = '616';");
        return $resultados->result();
    }

    public function insertar($id_compras, $id_trabajador, $fecha_emision_voucher, $fecha_vencimiento_voucher, $numero_serie,  $id_cliente_proveedor, $subtotal_factura, $igv_factura, $total_factura, $estado_compra, $observacion_pago, $tipo_comprobante, $mercaderia, $condicion_pago, $medio_pago, $moneda, $cta_ent)
    {
        return $this->db->query("INSERT INTO compras
        (id_compras, id_trabajador, fecha_emision_voucher, fecha_vencimiento_voucher, numero_serie, id_cliente_proveedor, subtotal_factura, igv_factura, total_factura, estado_compra, observacion_pago,tipo_comprobante, mercaderia, condicion_pago, medio_pago, moneda, cta_ent,id_estado)
        VALUES ('','$id_compras', '$id_trabajador', '$fecha_emision_voucher', '$fecha_vencimiento_voucher', '$numero_serie',  '$id_cliente_proveedor', '$subtotal_factura', '$igv_factura', '$total_factura', '$estado_compra', '$observacion_pago', '$tipo_comprobante', '$mercaderia', '$condicion_pago', '$medio_pago', '$moneda', '$cta_ent', '1')");
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function insertar_detalle(
        $id_voucher_pago,
        $fecha_pago_voucher,
        $tipo_cambio,
        $numero_deposito,
        $numero_letra_cheque,
        $importe_pago,
        $observacion_voucher,
        $estado_voucher,
        $total_deuda_voucher,
        $monto_pagado_voucher,
        $monto_pendiente_voucher,
        $transaccion,
        $banco,
        $medio_pago_voucher,
        $leyenda
    ) {
        return $this->db->query("INSERT INTO detalle_compras
        (id_voucher_pago, fecha_pago_voucher, tipo_cambio, numero_deposito, numero_letra_cheque, importe_pago, observacion_voucher, estado_voucher, total_deuda_voucher, monto_pagado_voucher, monto_pendiente_voucher)
        VALUES ('','$id_voucher_pago', '$fecha_pago_voucher', '$tipo_cambio', '$numero_deposito', '$numero_letra_cheque',  '$importe_pago', '$observacion_voucher', '$estado_voucher', '$total_deuda_voucher', '$monto_pagado_voucher', '$monto_pendiente_voucher', '$transaccion', '$banco', '$medio_pago_voucher', '$leyenda', '1')");
    }

    public function enlace_actualizar($id_cliente_proveedor)
    {
        $this->db->where("id_cliente_proveedor", $id_cliente_proveedor);
        $resultados = $this->db->get("clientes_proveedores");
        return $resultados->row();
    }


    public function actualizar($id_cliente_proveedor, $origen, $condicion, $tipo_persona, $tipo_persona_sunat, $tipo_documento,  $num_documento, $nombres, $ape_paterno, $ape_materno, $razon_social, $direccion_fiscal, $direccion_alm1, $direccion_alm2, $departamento, $provincia, $distrito, $telefono, $celular, $tipo_giro, $condicion_pago, $linea_credito_soles, $credito_unitario_soles, $disponible_soles, $linea_credito_dolares, $credito_unitario_dolares, $disponible_dolares, $linea_opcional, $linea_opcional_unitaria, $linea_disponible, $email, $contacto_registro, $estado_cliente, $email_cobranza, $contacto_cobranza, $tipo_cliente_pago)
    {
        return $this->db->query("UPDATE clientes_proveedores SET id_origen='$origen', id_condicion='$condicion', id_tipo_persona='$tipo_persona', id_tipo_persona_sunat='$tipo_persona_sunat', id_tipo_documento='$tipo_documento',num_documento=' $num_documento',nombres='$nombres',ape_paterno='$ape_paterno', ape_materno='$ape_materno', razon_social='$razon_social', direccion_fiscal='$direccion_fiscal', direccion_alm1=' $direccion_alm1', direccion_alm2='$direccion_alm2', id_departamento='$departamento', id_provincia='$provincia', id_distrito='$distrito', telefono='$telefono', celular='$celular', id_tipo_giro='$tipo_giro', id_condicion_pago='$condicion_pago',linea_credito_soles='$linea_credito_soles',credito_unitario_soles='$credito_unitario_soles',disponible_soles='$disponible_soles',linea_credito_dolares='$linea_credito_dolares', credito_unitario_dolares='$credito_unitario_dolares',disponible_dolares='$disponible_dolares',linea_opcional='$linea_opcional',linea_opcional_unitaria='$linea_opcional_unitaria',id_linea_disponible='$linea_disponible',email='$email',contacto_registro='$contacto_registro',id_estado_cliente='$estado_cliente',email_cobranza='$email_cobranza',contacto_cobranza='$contacto_cobranza',id_tipo_cliente_pago='$tipo_cliente_pago'   WHERE  id_cliente_proveedor='$id_cliente_proveedor'");
    }


    public function verificar_cliente_proveedor($origen, $condicion, $tipo_persona, $tipo_persona_sunat, $tipo_documento,  $num_documento, $nombres, $ape_paterno, $ape_materno, $razon_social, $direccion_fiscal, $direccion_alm1, $direccion_alm2, $departamento, $provincia, $distrito, $telefono, $celular, $tipo_giro, $condicion_pago, $linea_credito_soles, $credito_unitario_soles, $disponible_soles, $linea_credito_dolares, $credito_unitario_dolares, $disponible_dolares, $linea_opcional, $linea_opcional_unitaria, $linea_disponible, $email, $contacto_registro, $estado_cliente, $email_cobranza, $contacto_cobranza, $tipo_cliente_pago)
    {
        $resultados = $this->db->query("SELECT * from clientes_proveedores WHERE id_origen='$origen' && id_condicion='$condicion' &&  id_tipo_persona='$tipo_persona' &&  id_tipo_persona_sunat='$tipo_persona_sunat' &&  id_tipo_documento='$tipo_documento' && num_documento=' $num_documento' && nombres='$nombres' && ape_paterno='$ape_paterno' &&  ape_materno='$ape_materno' &&  razon_social='$razon_social' && direccion_fiscal='$direccion_fiscal' && direccion_alm1=' $direccion_alm1' && direccion_alm2='$direccion_alm2' && id_departamento='$departamento' && id_provincia='$provincia' && id_distrito='$distrito' && telefono='$telefono' && celular='$celular' && id_tipo_giro='$tipo_giro' && id_condicion_pago='$condicion_pago' &&linea_credito_soles='$linea_credito_soles' && credito_unitario_soles='$credito_unitario_soles'&& disponible_soles='$disponible_soles'&& linea_credito_dolares='$linea_credito_dolares' && credito_unitario_dolares='$credito_unitario_dolares'&& disponible_dolares='$disponible_dolares'&& linea_opcional='$linea_opcional' && linea_opcional_unitaria='$linea_opcional_unitaria'&& id_linea_disponible='$linea_disponible'&& email='$email' && contacto_registro='$contacto_registro'&& id_estado_cliente='$estado_cliente' && email_cobranza='$email_cobranza' && contacto_cobranza='$contacto_cobranza' && id_tipo_cliente_pago='$tipo_cliente_pago' ");

        return $resultados->row();
    }


    public function actualizar_estado($id_cliente_proveedor)
    {
        return $this->db->query(" UPDATE clientes_proveedores SET  id_estado='0'
                                    WHERE id_cliente_proveedor='$id_cliente_proveedor'");
    }
}
