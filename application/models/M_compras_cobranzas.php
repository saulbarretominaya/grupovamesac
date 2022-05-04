<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_compras_cobranzas extends CI_Model
{

    public function index()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query(
            "
            SELECT 
            a.id_compra_cobranza,
            a.id_compra_cobranza_empresa,
            DATE_FORMAT(a.fecha_compra_cobranza,'%d/%m/%Y') AS fecha_compra_cobranza,
            a.ds_tipo_compra_cobranza,
            DATE_FORMAT(a.fecha_emision,'%d/%m/%Y') AS fecha_emision,
            DATE_FORMAT(a.fecha_vencimiento,'%d/%m/%Y') AS fecha_vencimiento,
            a.ds_nombre_cliente_proveedor,
            a.ds_tipo_comprobante,
            a.num_comprobante,
            a.ds_almacen,
            a.ds_moneda,
            a.total,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_compra_cobranza) AS ds_estado_compra_cobranza
            FROM compras_cobranzas a
            WHERE a.id_empresa='$id_empresa'
            "
        );
        return $resultados->result();
    }

    public function index_clientes_proveedores()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query("
            SELECT
            a.id_cliente_proveedor,
            a.nombres,
            a.ape_paterno,
            a.ape_materno,
            a.num_documento,
            a.razon_social,
            a.id_departamento,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_departamento) AS ds_departamento_cliente_proveedor,
            id_provincia,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_provincia) AS ds_provincia_cliente_proveedor,
            id_distrito,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_distrito) AS ds_distrito_cliente_proveedor,
            id_tipo_persona,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_tipo_persona) AS ds_tipo_persona,
            (CASE
            WHEN a.razon_social='' THEN CONCAT(a.nombres,' ',a.ape_paterno,' ',a.ape_materno)
            WHEN a.nombres='' AND a.ape_paterno='' AND a.ape_materno='' THEN a.razon_social
            ELSE 'Existe un conflicto'
            END) ds_nombre_cliente_proveedor,
            a.id_tipo_documento,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_tipo_documento) AS ds_tipo_documento,
            a.num_documento,
            a.direccion_fiscal as direccion_fiscal_cliente_proveedor,
            a.email as email_cliente_proveedor,
            a.contacto_registro,
            a.telefono,
            a.celular,
            a.id_tipo_giro,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_tipo_giro) AS ds_tipo_giro
            FROM clientes_proveedores a
            where a.id_empresa='$id_empresa';
        ");
        return $resultados->result();
    }

    public function registrar_grupo_vame_compras_cobranzas()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_compras_cobranzas
            (
            id_grupo_vame
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_inversiones_alpev_compras_cobranzas()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_compras_cobranzas
            (
            id_inversion_alpev
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar(
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
        $id_estado_compra_cobranza,
        $id_compra_cobranza_empresa,
        $id_empresa
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
            id_estado_compra_cobranza,id_compra_cobranza_empresa,id_empresa
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
            '$id_estado_compra_cobranza','$id_compra_cobranza_empresa','$id_empresa'
            )
            "
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function registrar_detalle_programacion_pagos(
        $id_compra_cobranza,
        $fecha_cuota,
        $monto_cuota

    ) {
        return $this->db->query(
            "
        INSERT INTO detalle_condicion_pagos_compras_cobranzas
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

    public function registrar_detalle_compras_cobranzas(
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
            a.id_compra_cobranza,
            DATE_FORMAT(a.fecha_compra_cobranza,'%d/%m/%Y') AS fecha_compra_cobranza,
            a.ds_tipo_comprobante,a.num_comprobante,a.ds_almacen,
            DATE_FORMAT(a.fecha_emision,'%d/%m/%Y') AS fecha_emision,
            DATE_FORMAT(a.fecha_vencimiento,'%d/%m/%Y') AS fecha_vencimiento,
            a.ds_tipo_compra_cobranza,a.ds_nombre_cliente_proveedor,a.ds_condicion_pago,
            a.ds_moneda,a.sub_total,a.igv,a.total,a.pagado,a.observacion,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_compra_cobranza) AS ds_estado_compra_cobranza,
            a.ds_nombre_trabajador AS ds_nombre_trabajador_creacion_compra_cobranza,
            b.ds_nombre_trabajador AS ds_nombre_trabajador_creacion_cliente_proveedor,b.num_documento
            FROM compras_cobranzas a
            LEFT JOIN clientes_proveedores b ON b.id_cliente_proveedor=a.id_cliente_proveedor
            WHERE a.id_compra_cobranza='$id_compra_cobranza'
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
            detalle_condicion_pagos_compras_cobranzas a
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
