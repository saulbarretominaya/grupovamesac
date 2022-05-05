<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_orden_despacho extends CI_Model
{

    public function index()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query(
            "
            SELECT 
            a.id_cotizacion,
            a.id_cotizacion_empresa,
            a.valor_cambio,
            DATE_FORMAT(a.fecha_cotizacion,'%d/%m/%Y') AS fecha_cotizacion,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
            a.ds_nombre_cliente_proveedor,
            a.ds_condicion_pago,
            a.ds_nombre_trabajador,
            a.precio_venta,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_cotizacion) AS ds_estado_cotizacion,
            b.id_orden_despacho,
            b.id_orden_despacho_empresa,
            b.resultado_valor_cambio,
            DATE_FORMAT(b.fecha_orden_despacho,'%d/%m/%Y') AS fecha_orden_despacho,
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
            where a.categoria='PRODUCTOS' AND a.id_empresa='$id_empresa'
            GROUP BY a.id_cotizacion
            ORDER BY a.id_cotizacion desc;
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
            a.id_cotizacion,
            a.id_cotizacion_empresa,
            a.valor_cambio,
            DATE_FORMAT(a.fecha_cotizacion,'%d/%m/%Y') AS fecha_cotizacion,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
            a.ds_nombre_cliente_proveedor,
            a.ds_condicion_pago,
            a.ds_nombre_trabajador,
            a.precio_venta,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_cotizacion) AS ds_estado_cotizacion,
            b.id_orden_despacho,
            b.id_orden_despacho_empresa,
            b.resultado_valor_cambio,
            DATE_FORMAT(b.fecha_orden_despacho,'%d/%m/%Y') AS fecha_orden_despacho,
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
            where a.categoria='TABLEROS' AND a.id_empresa='$id_empresa'
            GROUP BY a.id_cotizacion
            ORDER BY a.id_cotizacion desc;
            "
        );
        return $resultados->result();
    }

    public function aprobar_estado(
        $id_orden_despacho,
        $linea_credito_dolares,
        $id_trabajador,
        $ds_nombre_trabajador
    ) {
        return $this->db->query(
            "
            update orden_despacho set
            linea_credito_uso='$linea_credito_dolares',
            id_estado_orden_despacho='862',
            id_trabajador='$id_trabajador',
            ds_nombre_trabajador='$ds_nombre_trabajador'
            where id_orden_despacho='$id_orden_despacho'
            "
        );
    }

    public function aprobar_estado_directo(
        $id_orden_despacho,
        $id_trabajador,
        $ds_nombre_trabajador
    ) {
        return $this->db->query(
            "
            update orden_despacho set
            id_estado_orden_despacho='862',
            id_trabajador='$id_trabajador',
            ds_nombre_trabajador='$ds_nombre_trabajador'
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


    public function index_modal_cabecera_productos($id_orden_despacho)
    {
        $resultados = $this->db->query(
            "
            SELECT
            d.id_orden_despacho,
            DATE_FORMAT(d.fecha_orden_despacho,'%d/%m/%Y') AS fecha_orden_despacho,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
            a.ds_condicion_pago,a.ds_nombre_cliente_proveedor,
            b.num_documento,b.direccion_fiscal,lugar_entrega,a.ds_nombre_trabajador,
            c.celular,c.email,a.observacion,a.valor_venta_total_sin_d,a.valor_venta_total_con_d,a.descuento_total,a.igv,a.precio_venta,a.clausula,a.nombre_encargado
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

    public function index_modal_detalle_productos($id_orden_despacho)
    {
        $resultados = $this->db->query(
            "
            SELECT		
            b.id_orden_despacho,
            a.item,
            a.cantidad,
            a.codigo_producto,
            a.descripcion_producto,
            a.ds_marca_producto,
            a.ds_unidad_medida,
            a.precio_ganancia AS precio_u,
            a.d,
            a.precio_descuento AS precio_u_d,
            a.valor_venta_con_d AS valor_venta,
            a.dias_entrega
            FROM 
            detalle_cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            WHERE b.id_orden_despacho='$id_orden_despacho'
        "
        );
        return $resultados->result();
    }

    public function index_modal_cabecera_tableros($id_orden_despacho)
    {
        $resultados = $this->db->query(
            "
           SELECT
            d.id_orden_despacho,
            DATE_FORMAT(d.fecha_orden_despacho,'%d/%m/%Y') AS fecha_orden_despacho,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
            a.ds_condicion_pago,a.ds_nombre_cliente_proveedor,
            b.num_documento,b.direccion_fiscal,lugar_entrega,a.ds_nombre_trabajador,
            c.celular,c.email,a.observacion,a.valor_venta_total_sin_d,a.valor_venta_total_con_d,a.descuento_total,a.igv,a.precio_venta,a.clausula,a.nombre_encargado
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

    public function index_modal_detalle_tableros($id_orden_despacho)
    {
        $resultados = $this->db->query(
            "
        SELECT
        d.id_orden_despacho,
        a.item AS item_tablero_cabecera,
        a.id_tablero,
        '-------',
        b.cantidad_tablero AS cantidad_tablero_cabecera,
        b.codigo_tablero AS codigo_tablero_cabecera,
        b.descripcion_tablero AS descripcion_tablero_cabecera,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_marca_tablero) AS marca_tablero_cabecera,
        a.precio_ganancia AS precio_u_tablero_cabecera,
        a.d AS porcentaje_descuento_tablero_cabecera,
        a.precio_descuento AS precio_u_d_tablero_cabecera,
        a.valor_venta_con_d AS valor_venta_tablero_cabecera,
        a.dias_entrega AS dias_entrega_tablero_cabecera,
        '-------',
        c.cantidad_unitaria AS cantidad_unitaria_componente,
        c.cantidad_total_producto AS cantidad_total_componente,
        c.codigo_producto AS codigo_componente,
        c.descripcion_producto AS descripcion_componente,
        c.ds_marca_producto AS marca_componente,
        c.ds_unidad_medida AS unidad_medida_componente
        FROM 
        detalle_cotizacion a
        LEFT JOIN tableros b ON b.id_tablero=a.id_tablero
        LEFT JOIN detalle_tableros c ON c.id_tablero=b.id_tablero
        LEFT JOIN orden_despacho d ON d.id_cotizacion=a.id_cotizacion
        WHERE d.id_orden_despacho='$id_orden_despacho'
        "
        );
        return $resultados->result();
    }
}
