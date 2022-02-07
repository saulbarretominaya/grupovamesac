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
            a.ds_nombre_trabajador,
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

    public function index_modal_cabecera($id_orden_despacho)
    {
        $resultados = $this->db->query(
            "
            SELECT
            d.id_orden_despacho,
            DATE_FORMAT(d.fecha_orden_despacho,'%d/%m/%Y') AS fecha_orden_despacho,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
            a.ds_condicion_pago,a.ds_nombre_cliente_proveedor,
            b.num_documento,b.direccion_fiscal,lugar_entrega,a.ds_nombre_trabajador,
            c.celular,c.email,a.observacion,a.total,a.descuento_total,a.igv,a.precio_venta,a.clausula,a.nombre_encargado
            FROM
            cotizacion a
            LEFT JOIN clientes_proveedores b ON b.id_cliente_proveedor=a.id_cliente_proveedor
            LEFT JOIN trabajadores c ON c.id_trabajador=a.id_trabajador
            LEFT JOIN orden_despacho d ON d.id_cotizacion=a.id_cotizacion
            WHERE d.id_orden_despacho='$id_orden_despacho'
            "
        );
        return $resultados->row();
    }

    public function index_modal_detalle($id_orden_despacho)
    {
        $resultados = $this->db->query(
            "
            SELECT
            e.id_orden_despacho,
            b.item,a.id_cotizacion,b.id_dcotizacion,b.id_producto,
            b.id_tablero,b.id_comodin,c.descripcion_tablero,
            b.cantidad AS cantidad_tablero,d.id_dtablero,c.codigo_tablero,'VAME' AS ds_marca_tablero,
            b.precio_ganancia,b.d AS d_tablero,b.precio_descuento AS precio_descuento_tablero,
            b.valor_venta AS valor_venta_tablero,b.dias_entrega AS dias_entrega_tablero,
            (CASE 
            WHEN b.id_tablero  != '0' THEN d.cantidad_total_producto
            WHEN b.id_producto !='0' THEN b.cantidad
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
            WHEN b.id_producto !='0' THEN b.valor_venta
            WHEN b.id_comodin !='0' THEN b.valor_venta
            END) AS valor_venta,
            (CASE 
            WHEN b.id_tablero  != '0' THEN ''
            WHEN b.id_producto !='0' THEN b.dias_entrega
            WHEN b.id_comodin !='0' THEN b.dias_entrega
            END) AS dias_entrega
            FROM cotizacion a
            LEFT JOIN detalle_cotizacion b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN tableros c ON c.id_tablero=b.id_tablero
            LEFT JOIN detalle_tableros d ON d.id_tablero=b.id_tablero
            LEFT JOIN orden_despacho e ON e.id_cotizacion=a.id_cotizacion
            WHERE e.id_orden_despacho='$id_orden_despacho'
            ORDER BY b.id_dcotizacion ASC, d.id_dtablero ASC
        "
        );
        return $resultados->result();
    }
}
