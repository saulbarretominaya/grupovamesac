<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_orden_despacho extends CI_Model
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
            "
        );
        return $resultados->result();
    }


    public function aprobar_estado($id_orden_despacho, $linea_credito_dolares)
    {
        return $this->db->query(
            "
            update orden_despacho set
            linea_credito_uso='$linea_credito_dolares',
            id_estado_orden_despacho='862'
            where id_orden_despacho='$id_orden_despacho'
            "
        );
    }

    public function aprobar_estado_directo($id_orden_despacho)
    {
        return $this->db->query(
            "
            update orden_despacho set
            id_estado_orden_despacho='862'
            where id_orden_despacho='$id_orden_despacho'
            "
        );
    }

    public function aplicar_tipo_cambio($id_orden_despacho, $resultado_valor_cambio)
    {
        return $this->db->query(
            "
            update orden_despacho set
            resultado_valor_cambio='$resultado_valor_cambio'
            where id_orden_despacho='$id_orden_despacho'
            "
        );
    }

    public function actualizar_linea_credito($id_cliente_proveedor, $nueva_linea_credito, $monto_cotizacion)
    {
        return $this->db->query(
            "
            UPDATE clientes_proveedores 
            SET 
            credito_unitario_dolares='$monto_cotizacion',
            disponible_dolares='$nueva_linea_credito'
            WHERE id_cliente_proveedor='$id_cliente_proveedor'
            "
        );
    }

    public function desaprobar_estado($id_orden_despacho)
    {
        return $this->db->query(
            "
            update orden_despacho set
            id_estado_orden_despacho='863'
            where id_orden_despacho='$id_orden_despacho'
            "
        );
    }

    public function cambiar_estado_pendiente_cotizacion($id_cotizacion)
    {
        return $this->db->query(
            "
            update cotizacion set
            id_estado_cotizacion='857'
            where id_cotizacion='$id_cotizacion'
            "
        );
    }
}
