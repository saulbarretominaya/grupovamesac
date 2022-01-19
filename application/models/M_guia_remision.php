<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_guia_remision extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.id_parcial_completa,
            a.precio_venta,
            DATE_FORMAT(a.fecha_parcial_completa,'%d/%m/%Y') AS fecha_parcial_completa,
            a.id_estado_parcial_completa,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_valor_pc,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_pc,
            b.ds_nombre_cliente_proveedor,
            b.ds_nombre_vendedor,
            b.ds_condicion_pago,
            b.id_cotizacion,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_moneda) AS ds_moneda,
            c.id_orden_despacho,
            d.id_sucursal,
            CONCAT(d.ds_serie_guia_remision,'-',d.id_sucursal) ds_correlativo_guia
            FROM
            parciales_completas a 
            LEFT JOIN cotizacion b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN orden_despacho c ON c.id_cotizacion=b.id_cotizacion
            LEFT JOIN guia_remision d ON d.id_parcial_completa=a.id_parcial_completa
            "
        );
        return $resultados->result();
    }

    public function enlace_actualizar_cabecera($id_parcial_completa)
    {
        $resultados = $this->db->query(
            "
            SELECT
            b.id_parcial_completa,
            a.id_cotizacion,
            a.ds_nombre_vendedor,
            a.ds_nombre_cliente_proveedor,
            a.ds_departamento_cliente_proveedor,
            a.ds_provincia_cliente_proveedor,
            a.ds_distrito_cliente_proveedor,
            a.direccion_fiscal_cliente_proveedor,
            a.email_cliente_proveedor,
            a.clausula,
            a.lugar_entrega,
            a.nombre_encargado,
            a.observacion,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_almacen) AS ds_sucursal_trabajador,
            (SELECT serie FROM detalle_multitablas WHERE id_dmultitabla=c.id_almacen) AS ds_serie_guia_remision
            FROM
            cotizacion a
            RIGHT JOIN parciales_completas b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN trabajadores c ON c.id_trabajador=a.id_vendedor 
            WHERE b.id_parcial_completa='$id_parcial_completa'
            "
        );
        return $resultados->row();
    }

    public function enlace_actualizar_detalle($id_parcial_completa)
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.id_parcial_completa,
            a.salida_prod,
            b.ds_unidad_medida,
            b.codigo_producto,
            descripcion_producto,
            ds_marca_producto
            FROM
            detalle_parciales_completas a
            LEFT JOIN detalle_cotizacion b ON b.id_dcotizacion=a.id_dcotizacion
            WHERE
            a.id_parcial_completa='$id_parcial_completa'
            "
        );
        return $resultados->result();
    }

    public function registrar_proceres()
    {
        return $this->db->query(
            "
            INSERT INTO proceres
            (
            id_proceres
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_tienda_bellota()
    {
        return $this->db->query(
            "
            INSERT INTO tienda_bellota
            (
            id_tienda_bellota
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_tienda_nicolini()
    {
        return $this->db->query(
            "
            INSERT INTO tienda_nicolini
            (
            id_tienda_nicolini
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }


    public function registrar(
        $tipo_transporte,
        $ruc,
        $transportista,
        $domiciliado,
        $licencia,
        $marca_modelo,
        $placa,
        $observaciones,
        $id_tipo_envio_guia_remision,
        $ds_tipo_envio_guia_remision,
        $peso_bruto_total,
        $kilos,
        $punto_partida,
        $punto_llegada,
        $contenedor,
        $embarque,
        $ds_sucursal_trabajador,
        $ds_serie_guia_remision,
        $id_parcial_completa,
        $id_sucursal
    ) {
        return $this->db->query(
            "
            INSERT INTO guia_remision
            (
            id_guia_remision,
            tipo_transporte,
            ruc,
            transportista,
            domiciliado,
            licencia,
            marca_modelo,
            placa,
            observaciones,
            id_tipo_envio_guia_remision,
            ds_tipo_envio_guia_remision,
            peso_bruto_total,
            kilos,
            punto_partida,
            punto_llegada,
            contenedor,
            embarque,
            ds_sucursal_trabajador,
			ds_serie_guia_remision,
            id_parcial_completa,
            id_sucursal
            )
            VALUES
            (
            '',
            '$tipo_transporte',
            '$ruc',
            '$transportista',
            '$domiciliado',
            '$licencia',
            '$marca_modelo',
            '$placa',
            '$observaciones',
            '$id_tipo_envio_guia_remision',
            '$ds_tipo_envio_guia_remision',
            '$peso_bruto_total',
            '$kilos',
            '$punto_partida',
            '$punto_llegada',
            '$contenedor',
            '$embarque',
            '$ds_sucursal_trabajador',
			'$ds_serie_guia_remision',
            '$id_parcial_completa',
            '$id_sucursal'
            )
            "
        );
    }
}
