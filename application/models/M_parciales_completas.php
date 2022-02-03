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

    public function enlace_actualizar_cabecera($id_cotizacion)
    {
        $resultados = $this->db->query("
            SELECT 
            a.id_cotizacion,
            a.valor_cambio,
            DATE_FORMAT(a.fecha_cotizacion,'%d/%m/%Y') AS fecha_cotizacion,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
            a.ds_nombre_vendedor,
            a.fecha_cotizacion,
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
            a.ds_condicion_pago,
            a.precio_venta,
            id_estado_cotizacion,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_estado_cotizacion) AS ds_estado_valor_cot,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_cotizacion) AS ds_estado_cotizacion,
            b.id_orden_despacho,
            b.resultado_valor_cambio,
            DATE_FORMAT(b.fecha_orden_despacho,'%d/%m/%Y') AS fecha_orden_despacho,
            id_estado_orden_despacho,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_estado_orden_despacho) AS ds_estado_valor_od,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_estado_orden_despacho) AS ds_estado_orden_despacho,
            c.id_cliente_proveedor,
            c.linea_credito_dolares,
            c.credito_unitario_dolares,
            c.disponible_dolares,
            b.linea_credito_uso
            FROM
            cotizacion a
            RIGHT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN clientes_proveedores c ON c.id_cliente_proveedor=a.id_cliente_proveedor
            WHERE  a.id_cotizacion ='$id_cotizacion' AND id_estado_orden_despacho='862'
               ");
        return $resultados->row();
    }

    public function enlace_actualizar_detalle($id_cotizacion)
    {
        $resultados = $this->db->query("
        SELECT 
        a.id_cotizacion,
        b.codigo_producto,
        b.descripcion_producto,
        b.ds_unidad_medida,
        b.ds_marca_producto,
        b.precio_ganancia,
        b.cantidad,
        b.valor_venta,
        '||',
        c.stock
        FROM
        cotizacion a
        LEFT JOIN detalle_cotizacion b ON b.id_cotizacion=a.id_cotizacion
        LEFT JOIN productos c ON c.id_producto=b.id_producto
        WHERE  a.id_cotizacion ='$id_cotizacion'
               ");
        return $resultados->result();
    }

    public function registrar(
        $id_cotizacion,
        $total,
        $igv,
        $precio_venta,
        $fecha_parcial_completa,
        $id_tipo_orden
    ) {
        return $this->db->query(
            "
        INSERT INTO parciales_completas
        (
            id_parcial_completa,
            id_cotizacion,total,igv,precio_venta,fecha_parcial_completa,id_tipo_orden
        )
        VALUES
        (
            '',
            '$id_cotizacion','$total','$igv','$precio_venta','$fecha_parcial_completa','$id_tipo_orden'
        )"
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function registrar_detalle_cotizacion(
        $id_parcial_completa,
        $salida_prod,
        $pendiente_prod,
        $valor_venta

    ) {
        return $this->db->query(
            "
        INSERT INTO detalle_parciales_completas
        (
        id_dparcial_completa,
        id_parcial_completa,salida_prod,pendiente_prod,valor_venta
        )
        VALUES
        (
        '', 
        '$id_parcial_completa','$salida_prod','$pendiente_prod','$valor_venta'
        )
        "
        );
    }
}
