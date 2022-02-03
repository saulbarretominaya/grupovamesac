<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_elaborar_pc extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "
            SELECT 
            a.id_cotizacion,
            MAX(e.id_parcial_completa) AS id_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
            a.ds_nombre_cliente_proveedor,
            a.ds_nombre_trabajador,
            a.precio_venta,
            a.id_estado_cotizacion,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_cotizacion) AS ds_estado_valor_cot,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_cotizacion) AS ds_estado_cotizacion,
            a.id_estado_elaborar_pc,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_elaborar_pc) AS ds_estado_valor_epc,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_elaborar_pc) AS ds_estado_epc,
            b.id_orden_despacho,
            DATE_FORMAT(b.fecha_orden_despacho,'%d/%m/%Y') AS fecha_orden_despacho,
            b.id_estado_orden_despacho,
            DATE_FORMAT(b.fecha_orden_despacho,'%d/%m/%Y') AS fecha_orden_despacho,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=b.id_estado_orden_despacho) AS ds_estado_valor_od,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_estado_orden_despacho) AS ds_estado_orden_despacho,
            d.ds_condicion_pago
            FROM
            cotizacion a
            RIGHT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN clientes_proveedores c ON c.id_cliente_proveedor=a.id_cliente_proveedor
            LEFT JOIN cotizacion d ON d.id_cotizacion=b.id_cotizacion
            LEFT JOIN parciales_completas e ON e.id_cotizacion=d.id_cotizacion
            WHERE b.id_estado_orden_despacho='862'
            GROUP BY a.id_cotizacion
            ORDER BY a.id_cotizacion
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
            a.ds_nombre_trabajador,
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

    public function enlace_actualizar_detalle($id_cotizacion, $id_parcial_completa)
    {
        $resultados = $this->db->query("
        SELECT
        a.id_cotizacion,
        a.id_dcotizacion,
        b.id_parcial_completa,
        a.codigo_producto,
        a.descripcion_producto,
        a.ds_unidad_medida,
        a.ds_marca_producto,
        a.precio_ganancia,
        a.valor_venta,
        a.cantidad,
        b.pendiente_prod,
        c.stock,
        (
        CASE WHEN b.pendiente_prod IS NULL THEN a.cantidad ELSE
        CASE WHEN b.pendiente_prod IS NOT NULL THEN b.pendiente_prod
        END END
        ) AS cantidad_por_despachar
        FROM
        detalle_cotizacion a
        LEFT JOIN detalle_parciales_completas b ON b.id_dcotizacion=a.id_dcotizacion
        LEFT JOIN productos c ON c.id_producto=a.id_producto
        WHERE
        a.id_cotizacion='$id_cotizacion' AND b.pendiente_prod IS NULL
        OR
        a.id_cotizacion='$id_cotizacion' AND b.pendiente_prod > '0' AND b.id_parcial_completa='$id_parcial_completa'
               ");
        return $resultados->result();
    }

    public function registrar(
        $id_cotizacion,
        $total,
        $igv,
        $precio_venta,
        $fecha_parcial_completa
    ) {
        return $this->db->query(
            "
            INSERT INTO parciales_completas
            (
            id_parcial_completa,
            id_cotizacion,total,igv,precio_venta,fecha_parcial_completa
            )
            VALUES
            (
            '',
            '$id_cotizacion','$total','$igv','$precio_venta','$fecha_parcial_completa'
            )"
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function registrar_detalle_cotizacion(
        $id_parcial_completa,
        $id_dcotizacion,
        $salida_prod,
        $pendiente_prod,
        $valor_venta

    ) {
        return $this->db->query(
            "
        INSERT INTO detalle_parciales_completas
        (
        id_dparcial_completa,
        id_dcotizacion,
        id_parcial_completa,salida_prod,pendiente_prod,valor_venta
        )
        VALUES
        (
        '',
        '$id_dcotizacion',
        '$id_parcial_completa','$salida_prod','$pendiente_prod','$valor_venta'
        )
        "
        );
    }

    public function verifica_numero_filas($id_cotizacion, $id_parcial_completa)
    {
        $resultados = $this->db->query("
         SELECT COUNT(*) AS numero_filas FROM (SELECT
        a.id_cotizacion,
        a.id_dcotizacion,
        b.id_parcial_completa,
        a.codigo_producto,
        a.descripcion_producto,
        a.ds_unidad_medida,
        a.ds_marca_producto,
        a.precio_ganancia,
        a.valor_venta,
        a.cantidad,
        b.pendiente_prod,
        c.stock,
        (
        CASE WHEN b.pendiente_prod IS NULL THEN a.cantidad ELSE
        CASE WHEN b.pendiente_prod IS NOT NULL THEN b.pendiente_prod
        END END
        ) AS cantidad_por_despachar
        FROM
        detalle_cotizacion a
        LEFT JOIN detalle_parciales_completas b ON b.id_dcotizacion=a.id_dcotizacion
        LEFT JOIN productos c ON c.id_producto=a.id_producto
        WHERE
        a.id_cotizacion='$id_cotizacion' AND b.pendiente_prod IS NULL
        OR
        a.id_cotizacion='$id_cotizacion' AND b.pendiente_prod > '0' AND b.id_parcial_completa='$id_parcial_completa') a
               ");
        return $resultados->row();
    }

    public function finalizado_estado_elaborar_cotizacion($id_cotizacion)
    {
        return $this->db->query(
            "
        update cotizacion set
        id_estado_elaborar_pc='870'
        where id_cotizacion='$id_cotizacion'
        "
        );
    }

    public function pendiente_estado_elaborar_cotizacion($id_cotizacion)
    {
        return $this->db->query(
            "
            update cotizacion set
            id_estado_elaborar_pc='869'
            where id_cotizacion='$id_cotizacion'
            "
        );
    }

    public function completa_estado_parciales_completas($id_parcial_completa)
    {
        return $this->db->query(
            "
            update parciales_completas set
            id_estado_parcial_completa='868'
            where id_parcial_completa='$id_parcial_completa'
            "
        );
    }

    public function parcial_estado_parciales_completas($id_parcial_completa)
    {
        return $this->db->query(
            "
            update parciales_completas set
            id_estado_parcial_completa='867'
            where id_parcial_completa='$id_parcial_completa'
            "
        );
    }
}
