<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_parciales_completas extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "
            SELECT 
            a.id_cotizacion,
            a.valor_cambio,
            DATE_FORMAT(a.fecha_cotizacion,'%d/%m/%Y') AS fecha_cotizacion,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
            a.ds_nombre_cliente_proveedor,
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
            WHERE id_estado_orden_despacho='862'
            "
        );
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
