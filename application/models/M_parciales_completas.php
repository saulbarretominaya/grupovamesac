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
b.ds_nombre_cliente_proveedor,
b.ds_nombre_vendedor,
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
