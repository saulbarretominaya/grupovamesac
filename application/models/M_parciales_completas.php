<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_parciales_completas extends CI_Model
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
            b.id_cotizacion,
            b.ds_nombre_cliente_proveedor,
            b.ds_nombre_trabajador,
            b.ds_condicion_pago,
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

    public function index_modal_cabecera($id_parcial_completa)
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
            WHERE d.id_parcial_completa='$id_parcial_completa'"
        );
        return $resultados->row();
    }

    public function index_modal_detalle($id_parcial_completa)
    {
        $resultados = $this->db->query(
            "
           SELECT
            e.id_parcial_completa,
            b.item,a.id_cotizacion,b.id_dcotizacion,b.id_producto,
            b.id_tablero,b.id_comodin,c.descripcion_tablero,
            f.salida_prod AS cantidad_tablero,d.id_dtablero,c.codigo_tablero,'VAME' AS ds_marca_tablero,
            b.precio_ganancia,b.d AS d_tablero,b.precio_descuento AS precio_descuento_tablero,
            b.valor_venta_con_d AS valor_venta_tablero,b.dias_entrega AS dias_entrega_tablero,
	    '-----------' AS '-----------',		
            (CASE 
            WHEN b.id_tablero  != '0' THEN d.cantidad_total_producto
            WHEN b.id_producto !='0' THEN f.salida_prod
            WHEN b.id_comodin !='0' THEN b.cantidad
            END) AS cantidad_producto,
            (CASE 
            WHEN b.id_tablero  != '0' THEN d.codigo_producto 
            WHEN b.id_producto !='0' THEN b.codigo_producto
            WHEN b.id_comodin !='0' THEN b.codigo_producto 
            END) AS codigo_producto,
            (CASE 
            WHEN b.id_tablero  != '0' THEN d.descripcion_producto
            WHEN b.id_producto !='0' THEN b.descripcion_producto
            WHEN b.id_comodin  !='0' THEN b.descripcion_producto
            END) AS descripcion_producto,
            (CASE 
            WHEN b.id_tablero  != '0' THEN d.ds_marca_producto
            WHEN b.id_producto !='0' THEN b.ds_marca_producto
            WHEN b.id_comodin !='0' THEN b.ds_marca_producto
            END) AS ds_marca_producto,
            (CASE 
            WHEN b.id_tablero  != '0' THEN d.ds_unidad_medida
            WHEN b.id_producto !='0' THEN b.ds_unidad_medida
            WHEN b.id_comodin !='0' THEN b.ds_unidad_medida
            END) AS ds_unidad_medida,
            (CASE 
            WHEN b.id_tablero  != '0' THEN ''
            WHEN b.id_producto !='0' THEN b.precio_ganancia
            WHEN b.id_comodin !='0' THEN b.precio_ganancia
            END) AS precio_unitario,
            (CASE 
            WHEN b.id_tablero  != '0' THEN ''
            WHEN b.id_producto !='0' THEN b.d
            WHEN b.id_comodin !='0' THEN b.d
            END) AS d_producto,
            (CASE 
            WHEN b.id_tablero  != '0' THEN ''
            WHEN b.id_producto !='0' THEN b.precio_descuento
            WHEN b.id_comodin !='0' THEN b.precio_descuento
            END) AS precio_descuento,
            (CASE 
            WHEN b.id_tablero  != '0' THEN ''
            WHEN b.id_producto !='0' THEN f.valor_venta_con_d
            WHEN b.id_comodin !='0' THEN b.valor_venta_con_d
            END) AS valor_venta_con_d
            FROM cotizacion a
            LEFT JOIN detalle_cotizacion b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN tableros c ON c.id_tablero=b.id_tablero
            LEFT JOIN detalle_tableros d ON d.id_tablero=b.id_tablero
            LEFT JOIN parciales_completas e ON e.id_cotizacion=a.id_cotizacion
            LEFT JOIN detalle_parciales_completas f ON f.id_dcotizacion=b.id_dcotizacion
            WHERE e.id_parcial_completa='$id_parcial_completa'
            GROUP BY d.id_dtablero,b.id_dcotizacion
            ORDER BY b.id_dcotizacion ASC, d.id_dtablero ASC
        "
        );
        return $resultados->result();
    }
}
