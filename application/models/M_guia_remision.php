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
            c.id_orden_despacho
            FROM
            parciales_completas a 
            LEFT JOIN cotizacion b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN orden_despacho c ON c.id_cotizacion=b.id_cotizacion
            "
        );
        return $resultados->result();
    }

    public function enlace_actualizar_cabecera($id_parcial_completa)
    {
        $resultados = $this->db->query("
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
            a.observacion
            FROM
            cotizacion a
            RIGHT JOIN parciales_completas b ON b.id_cotizacion=a.id_cotizacion 
            WHERE b.id_parcial_completa='$id_parcial_completa'
               ");
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
}
