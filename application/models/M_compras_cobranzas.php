<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_compras_cobranzas extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "
            SELECT 
            id_compra_cobranza,
            DATE_FORMAT(fecha_compra_cobranza,'%d/%m/%Y') AS fecha_compra_cobranza,
            ds_tipo_compra_cobranza,
            DATE_FORMAT(fecha_emision,'%d/%m/%Y') AS fecha_emision,
            DATE_FORMAT(fecha_vencimiento,'%d/%m/%Y') AS fecha_vencimiento,
            ds_nombre_cliente_proveedor,
            ds_tipo_comprobante,
            num_comprobante,
            ds_almacen,
            ds_moneda,
            total,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_estado_compra_cobranza) AS ds_estado_compra_cobranza

            FROM compras_cobranzas;
            "
        );
        return $resultados->result();
    }

    public function index_clientes_proveedores()
    {
        $resultados = $this->db->query("
            SELECT
            id_cliente_proveedor,
            nombres,
            ape_paterno,
            ape_materno,
            num_documento,
            razon_social,
            id_departamento,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_departamento) AS ds_departamento_cliente_proveedor,
            id_provincia,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_provincia) AS ds_provincia_cliente_proveedor,
            id_distrito,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_distrito) AS ds_distrito_cliente_proveedor,
            id_tipo_persona,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_persona) AS ds_tipo_persona,
            (CASE
            WHEN razon_social='' THEN CONCAT(nombres,' ',ape_paterno,' ',ape_materno)
            WHEN nombres='' AND ape_paterno='' AND ape_materno='' THEN razon_social
            ELSE 'Existe un conflicto'
            END) ds_nombre_cliente_proveedor,
            id_tipo_documento,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_documento) AS ds_tipo_documento,
            num_documento,
            direccion_fiscal as direccion_fiscal_cliente_proveedor,
            email as email_cliente_proveedor,
            contacto_registro,
            telefono,
            celular,
            id_tipo_giro,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_giro) AS ds_tipo_giro
            FROM clientes_proveedores;
        ");
        return $resultados->result();
    }

    public function insertar(
        $id_trabajador,
        $ds_nombre_trabajador,
        $fecha_compra_cobranza,
        $id_tipo_comprobante,
        $ds_tipo_comprobante,
        $num_comprobante,
        $id_almacen,
        $ds_almacen,
        $fecha_emision,
        $fecha_vencimiento,
        $id_tipo_compra_cobranza,
        $ds_tipo_compra_cobranza,
        $id_cliente_proveedor,
        $ds_nombre_cliente_proveedor,
        $observacion,
        $id_moneda,
        $ds_moneda,
        $sub_total,
        $igv,
        $total,
        $id_condicion_pago,
        $ds_condicion_pago,
        $pendiente,
        $pagado,
        $id_estado_compra_cobranza
    ) {
        return $this->db->query(
            "
            INSERT INTO compras_cobranzas
            (
            id_compra_cobranza,
            id_trabajador,ds_nombre_trabajador,fecha_compra_cobranza,id_tipo_comprobante,
            ds_tipo_comprobante,num_comprobante,id_almacen,ds_almacen,
            fecha_emision,fecha_vencimiento,id_tipo_compra_cobranza,ds_tipo_compra_cobranza,
            id_cliente_proveedor,ds_nombre_cliente_proveedor,observacion,id_moneda,
            ds_moneda,sub_total,igv,total,
            id_condicion_pago,ds_condicion_pago,pendiente,pagado,
            id_estado_compra_cobranza
            )
            VALUES
            (
            '',
            '$id_trabajador','$ds_nombre_trabajador','$fecha_compra_cobranza','$id_tipo_comprobante',
            '$ds_tipo_comprobante','$num_comprobante','$id_almacen','$ds_almacen',
            '$fecha_emision','$fecha_vencimiento','$id_tipo_compra_cobranza','$ds_tipo_compra_cobranza',
            '$id_cliente_proveedor','$ds_nombre_cliente_proveedor','$observacion','$id_moneda',
            '$ds_moneda','$sub_total','$igv','$total',
            '$id_condicion_pago','$ds_condicion_pago','$pendiente','$pagado',
            '$id_estado_compra_cobranza'
            )
            "
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function insertar_detalle_programacion_pagos(
        $id_compra_cobranza,
        $fecha_cuota,
        $monto_cuota

    ) {
        return $this->db->query(
            "
        INSERT INTO detalle_programacion_pagos
        (
        id_dprogramacion_pago,
        id_compra_cobranza,fecha_cuota,monto_cuota
        )
        VALUES
        (
        '', 
        '$id_compra_cobranza',STR_TO_DATE('$fecha_cuota','%d/%m/%Y'),'$monto_cuota'
        )
        "
        );
    }

    public function insertar_detalle_compras_cobranzas(
        $id_compra_cobranza,
        $item,
        $fecha_deposito,
        $num_deposito,
        $num_letra_cheque,
        $id_medio_pago,
        $ds_medio_pago,
        $id_banco,
        $ds_banco,
        $monto,
        $tipo_cambio
    ) {
        return $this->db->query(
            "
            INSERT INTO detalle_compras_cobranzas
            (
            id_dcompra_cobranza,
            id_compra_cobranza,
            item,
            fecha_deposito,
            num_deposito,
            num_letra_cheque,
            id_medio_pago,
            ds_medio_pago,
            id_banco,
            ds_banco,
            monto,
            tipo_cambio
            )
            VALUES
            (
            '', 
            '$id_compra_cobranza',
            '$item',
            '$fecha_deposito',
            '$num_deposito',
            '$num_letra_cheque',
            '$id_medio_pago',
            '$ds_medio_pago',
            '$id_banco',
            '$ds_banco',
            '$monto',
            '$tipo_cambio'
            )
        "
        );
    }

    public function index_modal_cabecera($id_compra_cobranza)
    {
        $resultados = $this->db->query(
            "
            SELECT
            id_compra_cobranza,
            DATE_FORMAT(fecha_compra_cobranza,'%d/%m/%Y') AS fecha_compra_cobranza,
            ds_tipo_comprobante,
            num_comprobante,
            ds_almacen,
            DATE_FORMAT(fecha_emision,'%d/%m/%Y') AS fecha_emision,
            DATE_FORMAT(fecha_vencimiento,'%d/%m/%Y') AS fecha_vencimiento,
            ds_tipo_compra_cobranza,
            ds_nombre_cliente_proveedor,
            ds_condicion_pago,
            ds_moneda,
            sub_total,
            igv,
            total,
            pagado,
            observacion,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_estado_compra_cobranza) AS ds_estado_compra_cobranza
            FROM compras_cobranzas
            where id_compra_cobranza='$id_compra_cobranza'
        "
        );
        return $resultados->row();
    }

    public function index_modal_detalle_programacion_pagos($id_compra_cobranza)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            DATE_FORMAT(a.fecha_cuota,'%d/%m/%Y') AS fecha_cuota,
            a.monto_cuota
            FROM 
            detalle_programacion_pagos a
            WHERE a.id_compra_cobranza ='$id_compra_cobranza'
        "
        );
        return $resultados->result();
    }

    public function index_modal_detalle($id_compra_cobranza)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            a.item,
            DATE_FORMAT(a.fecha_deposito,'%d/%m/%Y') AS fecha_deposito,
            a.num_deposito,
            a.num_letra_cheque,
            a.ds_medio_pago,
            a.ds_banco,
            a.monto,
            a.tipo_cambio
            FROM 
            detalle_compras_cobranzas a
            WHERE a.id_compra_cobranza ='$id_compra_cobranza'
        "
        );
        return $resultados->result();
    }
}
