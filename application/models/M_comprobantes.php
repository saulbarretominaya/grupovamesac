<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_comprobantes extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "
            SELECT
            d.id_guia_remision,
            a.id_parcial_completa,
            a.precio_venta,
            DATE_FORMAT(a.fecha_parcial_completa,'%d/%m/%Y') AS fecha_parcial_completa,
            a.id_estado_parcial_completa,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_valor_pc,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_pc,
            b.ds_nombre_cliente_proveedor,
            b.ds_nombre_trabajador,
            b.ds_condicion_pago,
            b.id_cotizacion,
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
            LEFT JOIN trabajadores e ON e.id_trabajador=b.id_trabajador ;
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
}
