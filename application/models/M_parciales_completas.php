<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_parciales_completas extends CI_Model
{

    public function index()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query(
            "
            SELECT
            b.id_orden_despacho,
            b.id_orden_despacho_empresa,
            a.id_parcial_completa,
            a.id_parcial_completa_empresa,
            DATE_FORMAT(a.fecha_parcial_completa,'%d/%m/%Y') AS fecha_parcial_completa,
            c.ds_nombre_cliente_proveedor,
            c.ds_condicion_pago,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_moneda) AS ds_moneda,
            a.precio_venta,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_tipo_orden_parcial_completa) AS ds_estado_tipo_orden_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_parcial_completa,
            c.ds_nombre_trabajador
            FROM
            parciales_completas a 
            LEFT JOIN orden_despacho b ON b.id_orden_despacho=a.id_orden_despacho
            LEFT JOIN cotizacion c ON c.id_cotizacion=b.id_cotizacion
            WHERE c.categoria='PRODUCTOS' AND a.id_empresa='$id_empresa'
            ORDER BY a.id_parcial_completa DESC;
            "
        );
        return $resultados->result();
    }

    public function index_2()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query(
            "
            SELECT
            b.id_orden_despacho,
            b.id_orden_despacho_empresa,
            a.id_parcial_completa,
            a.id_parcial_completa_empresa,
            DATE_FORMAT(a.fecha_parcial_completa,'%d/%m/%Y') AS fecha_parcial_completa,
            c.ds_nombre_cliente_proveedor,
            c.ds_condicion_pago,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_moneda) AS ds_moneda,
            a.precio_venta,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_tipo_orden_parcial_completa) AS ds_estado_tipo_orden_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_parcial_completa) AS ds_estado_parcial_completa,            c.ds_nombre_trabajador
            FROM
            parciales_completas a 
            LEFT JOIN orden_despacho b ON b.id_orden_despacho=a.id_orden_despacho
            LEFT JOIN cotizacion c ON c.id_cotizacion=b.id_cotizacion
            WHERE c.categoria='TABLEROS' AND a.id_empresa='$id_empresa'
            ORDER BY c.id_cotizacion desc;
            "
        );
        return $resultados->result();
    }

    public function aprobar_estado($id_parcial_completa)
    {
        return $this->db->query(
            "
            update parciales_completas set
            id_estado_parcial_completa='893'
            where id_parcial_completa='$id_parcial_completa'
            "
        );
    }

    public function anular_estado($id_parcial_completa)
    {
        return $this->db->query(
            "
            update parciales_completas set
            id_estado_parcial_completa='898'
            where id_parcial_completa='$id_parcial_completa'
            "
        );
    }

    public function index_modal_cabecera_productos($id_parcial_completa)
    {
        $resultados = $this->db->query(
            "
        SELECT
        DATE_FORMAT(c.fecha_parcial_completa,'%d/%m/%Y') AS fecha_parcial_completa,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
        a.ds_condicion_pago,
        a.ds_nombre_cliente_proveedor,
        a.lugar_entrega,
        a.ds_nombre_trabajador,
        a.clausula,
        a.nombre_encargado,
        a.observacion,
        c.valor_venta_total_sin_d,
        c.valor_venta_total_con_d,
        c.descuento_total,
        c.igv,
        c.precio_venta,
        d.num_documento,
        d.direccion_fiscal,
	    e.celular,
        e.email
        FROM
        cotizacion a
        LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion        
        LEFT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
        LEFT JOIN clientes_proveedores d ON d.id_cliente_proveedor=a.id_cliente_proveedor
        LEFT JOIN trabajadores e ON e.id_trabajador=a.id_trabajador
        WHERE c.id_parcial_completa='$id_parcial_completa'        
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
        DATE_FORMAT(c.fecha_parcial_completa,'%d/%m/%Y') AS fecha_parcial_completa,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
        a.ds_condicion_pago,
        a.ds_nombre_cliente_proveedor,
        a.lugar_entrega,
        a.ds_nombre_trabajador,
        a.clausula,
        a.nombre_encargado,
        a.observacion,
        c.valor_venta_total_sin_d,
        c.valor_venta_total_con_d,
        c.descuento_total,
        c.igv,
        c.precio_venta,
        d.num_documento,
        d.direccion_fiscal,
	    e.celular,
        e.email
        FROM
        cotizacion a
        LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion        
        LEFT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
        LEFT JOIN clientes_proveedores d ON d.id_cliente_proveedor=a.id_cliente_proveedor
        LEFT JOIN trabajadores e ON e.id_trabajador=a.id_trabajador
        WHERE c.id_parcial_completa='$id_parcial_completa'      
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
            WHERE d.id_parcial_completa='$id_parcial_completa' AND d.salida_prod > '0'
            "
        );
        return $resultados->result();
    }
}
