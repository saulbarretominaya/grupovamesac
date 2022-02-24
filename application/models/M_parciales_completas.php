<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_parciales_completas extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "
            SELECT
            c.id_orden_despacho,
            a.id_parcial_completa,
            DATE_FORMAT(a.fecha_parcial_completa,'%d/%m/%Y') AS fecha_parcial_completa,
            b.ds_nombre_cliente_proveedor,
            b.ds_condicion_pago,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_moneda) AS ds_moneda,
            a.precio_venta,
            a.id_estado_parcial_completa,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_valor_pc,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_pc,
            b.ds_nombre_trabajador
            FROM
            parciales_completas a 
            LEFT JOIN cotizacion b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN orden_despacho c ON c.id_cotizacion=b.id_cotizacion
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
            c.id_orden_despacho,
            a.id_parcial_completa,
            DATE_FORMAT(a.fecha_parcial_completa,'%d/%m/%Y') AS fecha_parcial_completa,
            b.ds_nombre_cliente_proveedor,
            b.ds_condicion_pago,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_moneda) AS ds_moneda,
            a.precio_venta,
            a.id_estado_parcial_completa,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_valor_pc,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_pc,
            b.ds_nombre_trabajador
            FROM
            parciales_completas a 
            LEFT JOIN cotizacion b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN orden_despacho c ON c.id_cotizacion=b.id_cotizacion
            WHERE b.categoria='TABLEROS'
            "
        );
        return $resultados->result();
    }


    public function index_modal_cabecera_productos($id_parcial_completa)
    {
        $resultados = $this->db->query(
            "
        SELECT
        DATE_FORMAT(d.fecha_parcial_completa,'%d/%m/%Y') AS fecha_parcial_completa,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
        a.ds_condicion_pago,a.ds_nombre_cliente_proveedor,
        b.num_documento,b.direccion_fiscal,lugar_entrega,a.ds_nombre_trabajador,
        c.celular,c.email,a.observacion,
        d.valor_venta_total_sin_d,d.valor_venta_total_con_d,d.descuento_total,d.igv,d.precio_venta,a.clausula,a.nombre_encargado
        FROM
        cotizacion a
        LEFT JOIN clientes_proveedores b ON b.id_cliente_proveedor=a.id_cliente_proveedor
        LEFT JOIN trabajadores c ON c.id_trabajador=a.id_trabajador
        LEFT JOIN parciales_completas d ON d.id_cotizacion=a.id_cotizacion
        WHERE d.id_parcial_completa='$id_parcial_completa'    
        "
        );
        return $resultados->row();
    }

    public function index_modal_detalle_productos($id_parcial_completa)
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
            WHERE a.id_parcial_completa='$id_parcial_completa' AND a.salida_prod > '0'
        "
        );
        return $resultados->result();
    }

    public function index_modal_cabecera_tableros($id_parcial_completa)
    {
        $resultados = $this->db->query(
            "
        SELECT
        DATE_FORMAT(d.fecha_parcial_completa,'%d/%m/%Y') AS fecha_parcial_completa,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
        a.ds_condicion_pago,a.ds_nombre_cliente_proveedor,
        b.num_documento,b.direccion_fiscal,lugar_entrega,a.ds_nombre_trabajador,
        c.celular,c.email,a.observacion,
        d.valor_venta_total_sin_d,d.valor_venta_total_con_d,d.descuento_total,d.igv,d.precio_venta,a.clausula,a.nombre_encargado
        FROM
        cotizacion a
        LEFT JOIN clientes_proveedores b ON b.id_cliente_proveedor=a.id_cliente_proveedor
        LEFT JOIN trabajadores c ON c.id_trabajador=a.id_trabajador
        LEFT JOIN parciales_completas d ON d.id_cotizacion=a.id_cotizacion
        WHERE d.id_parcial_completa='$id_parcial_completa'    
        "
        );
        return $resultados->row();
    }


    public function index_modal_detalle_tableros($id_parcial_completa)
    {
        $resultados = $this->db->query(
            "
            SELECT
            d.item AS item_tablero_cabecera,
            a.id_tablero,
            '-------',
            d.salida_prod AS cantidad_tablero_cabecera,
            b.codigo_tablero AS codigo_tablero_cabecera,
            b.descripcion_tablero AS descripcion_tablero_cabecera,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_marca_tablero) AS marca_tablero_cabecera,
            a.precio_ganancia AS precio_u_tablero_cabecera,
            a.d AS porcentaje_descuento_tablero_cabecera,
            a.precio_descuento AS precio_u_d_tablero_cabecera,
            d.valor_venta_con_d AS valor_venta_tablero_cabecera,
            '-------',
            c.cantidad_unitaria AS cantidad_unitaria_componente,
            (c.cantidad_unitaria*d.salida_prod) AS cantidad_total_componente,
            c.codigo_producto AS codigo_componente,
            c.descripcion_producto AS descripcion_componente,
            c.ds_marca_producto AS marca_componente,
            c.ds_unidad_medida AS unidad_medida_componente
            FROM 
            detalle_cotizacion a
            LEFT JOIN tableros b ON b.id_tablero=a.id_tablero
            LEFT JOIN detalle_tableros c ON c.id_tablero=b.id_tablero
            LEFT JOIN detalle_parciales_completas d ON d.id_dcotizacion=a.id_dcotizacion
            WHERE d.id_parcial_completa='$id_parcial_completa'
            "
        );
        return $resultados->result();
    }
}
