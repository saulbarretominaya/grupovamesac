<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_comprobantes extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "
            SELECT
            f.id_comprobante,
            f.ds_tipo_comprobante,
            (SELECT serie FROM detalle_multitablas WHERE id_dmultitabla=f.id_tipo_comprobante) AS ds_serie_comprobante,
            f.id_num_comprobante AS num_comprobante,
            DATE_FORMAT(f.fecha_emision,'%d/%m/%Y') AS fecha_comprobante,
            d.id_guia_remision,
            a.id_parcial_completa,
            a.precio_venta,
            a.id_estado_parcial_completa,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_valor_pc,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_pc,
            b.ds_nombre_cliente_proveedor,
            b.ds_nombre_trabajador,
            b.ds_condicion_pago,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_moneda) AS ds_moneda,
            c.id_orden_despacho,
            d.id_sucursal,
            d.ds_serie_guia_remision,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=e.id_almacen) AS ds_sucursal_trabajador
            FROM
            parciales_completas a 
            LEFT JOIN cotizacion b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN orden_despacho c ON c.id_cotizacion=b.id_cotizacion
            LEFT JOIN guia_remision d ON d.id_parcial_completa=a.id_parcial_completa
            LEFT JOIN trabajadores e ON e.id_trabajador=b.id_trabajador
            LEFT JOIN comprobantes f ON f.id_guia_remision=d.id_guia_remision
            WHERE b.categoria='PRODUCTOS';

        "
        );
        return $resultados->result();
    }

    public function index_2()
    {
        $resultados = $this->db->query(
            "
            SELECT
            f.id_comprobante,
            f.ds_tipo_comprobante,
            (SELECT serie FROM detalle_multitablas WHERE id_dmultitabla=f.id_tipo_comprobante) AS ds_serie_comprobante,
            f.id_num_comprobante AS num_comprobante,
            DATE_FORMAT(f.fecha_emision,'%d/%m/%Y') AS fecha_comprobante,
            d.id_guia_remision,
            a.id_parcial_completa,
            a.precio_venta,
            a.id_estado_parcial_completa,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_valor_pc,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_pc,
            b.ds_nombre_cliente_proveedor,
            b.ds_nombre_trabajador,
            b.ds_condicion_pago,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_moneda) AS ds_moneda,
            c.id_orden_despacho,
            d.id_sucursal,
            d.ds_serie_guia_remision,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=e.id_almacen) AS ds_sucursal_trabajador
            FROM
            parciales_completas a 
            LEFT JOIN cotizacion b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN orden_despacho c ON c.id_cotizacion=b.id_cotizacion
            LEFT JOIN guia_remision d ON d.id_parcial_completa=a.id_parcial_completa
            LEFT JOIN trabajadores e ON e.id_trabajador=b.id_trabajador
            LEFT JOIN comprobantes f ON f.id_guia_remision=d.id_guia_remision
            WHERE b.categoria='TABLEROS';

        "
        );
        return $resultados->result();
    }

    public function enlace_actualizar_cabecera($id_guia_remision)
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.ds_nombre_trabajador,
            c.id_guia_remision,
            c.id_sucursal,
            a.ds_nombre_cliente_proveedor,
            a.direccion_fiscal_cliente_proveedor,
            b.valor_venta_total_sin_d,
            b.valor_venta_total_con_d,
            b.descuento_total,
            b.igv,
            b.precio_venta
            FROM 
            cotizacion a
            LEFT JOIN parciales_completas b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN guia_remision c ON c.id_parcial_completa=b.id_parcial_completa
            WHERE c.id_guia_remision='$id_guia_remision'
            "
        );
        return $resultados->row();
    }

    public function enlace_actualizar_detalle($id_guia_remision)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            a.item,
            a.salida_prod AS cantidad,
            b.codigo_producto,
            b.descripcion_producto,
            b.ds_marca_producto,
            b.ds_unidad_medida,
            b.precio_ganancia AS precio_u,
            b.d,
            b.precio_descuento AS precio_u_d,
            a.valor_venta_con_d AS valor_venta
            FROM 
            detalle_parciales_completas a
            LEFT JOIN detalle_cotizacion b ON b.id_dcotizacion=a.id_dcotizacion
            LEFT JOIN parciales_completas c ON c.id_parcial_completa=a.id_parcial_completa
            LEFT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            WHERE d.id_guia_remision='$id_guia_remision' AND a.salida_prod > '0'
            "
        );
        return $resultados->result();
    }


    public function registrar_facturas()
    {
        return $this->db->query(
            "
            INSERT INTO facturas
            (
            id_factura
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_boletas()
    {
        return $this->db->query(
            "
            INSERT INTO boletas
            (
            id_boleta
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_nota_credito()
    {
        return $this->db->query(
            "
            INSERT INTO nota_credito
            (
            id_nota_credito
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_nota_debito()
    {
        return $this->db->query(
            "
            INSERT INTO nota_debito
            (
            id_nota_debito
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar(
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
        $id_num_comprobante
    ) {
        return $this->db->query(
            "
            INSERT INTO comprobantes
            (
                id_comprobante,
                id_tipo_comprobante,ds_tipo_comprobante,fecha_emision,dias,fecha_vencimiento,
                orden_compra,id_condicion_pago,ds_condicion_pago,monto_total_condicion_pago,
                observacion,id_guia_remision,id_num_comprobante

            )
            VALUES
            (
                '',
                '$id_tipo_comprobante','$ds_tipo_comprobante','$fecha_emision','$dias',STR_TO_DATE('$fecha_vencimiento','%d/%m/%Y'),
                '$orden_compra','$id_condicion_pago','$ds_condicion_pago','$monto_total_condicion_pago',
                '$observacion','$id_guia_remision','$id_num_comprobante'
            )
            "
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function registrar_detalle_condicion_pago(
        $id_comprobante,
        $fecha_cuota,
        $monto_cuota

    ) {
        return $this->db->query(
            "
        INSERT INTO detalle_condicion_pagos_comprobantes
        (
        id_dcondicion_pago,
        id_comprobante,fecha_cuota,monto_cuota
        )
        VALUES
        (
        '', 
        '$id_comprobante',STR_TO_DATE('$fecha_cuota','%d/%m/%Y'),'$monto_cuota'
        )
        "
        );
    }
}
