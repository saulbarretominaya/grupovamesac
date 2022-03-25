<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_orden_compras extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.id_orden_compra,
            DATE_FORMAT(a.fecha_orden_compra,'%d/%m/%Y') AS fecha_orden_compra,
            a.ds_nombre_cliente_proveedor,
            a.ds_condicion_pago,
            a.ds_moneda,
            a.precio_venta,
            a.observacion
            FROM
            orden_compras a
            "
        );
        return $resultados->result();
    }

    public function insertar(
        $id_trabajador,
        $ds_nombre_trabajador,
        $fecha_orden_compra,
        $id_cliente_proveedor,
        $ds_nombre_cliente_proveedor,
        $ds_departamento_cliente_proveedor,
        $ds_provincia_cliente_proveedor,
        $ds_distrito_cliente_proveedor,
        $direccion_fiscal_cliente_proveedor,
        $clausula,
        $lugar_entrega,
        $nombre_encargado,
        $observacion,
        $id_condicion_pago,
        $ds_condicion_pago,
        $id_moneda,
        $ds_moneda,
        $valor_venta,
        $igv,
        $precio_venta
    ) {
        return $this->db->query(
            "
            INSERT INTO orden_compras
            (
                id_orden_compra,
                id_trabajador,ds_nombre_trabajador,fecha_orden_compra,id_cliente_proveedor,
                ds_nombre_cliente_proveedor,ds_departamento_cliente_proveedor,ds_provincia_cliente_proveedor,
                ds_distrito_cliente_proveedor,direccion_fiscal_cliente_proveedor,clausula,
                lugar_entrega,nombre_encargado,observacion,id_condicion_pago,
                ds_condicion_pago,id_moneda,ds_moneda,valor_venta,igv,precio_venta
            )
            VALUES
            (
                '',
                '$id_trabajador','$ds_nombre_trabajador','$fecha_orden_compra','$id_cliente_proveedor',
                '$ds_nombre_cliente_proveedor','$ds_departamento_cliente_proveedor','$ds_provincia_cliente_proveedor',
                '$ds_distrito_cliente_proveedor','$direccion_fiscal_cliente_proveedor','$clausula',
                '$lugar_entrega','$nombre_encargado','$observacion','$id_condicion_pago',
                '$ds_condicion_pago','$id_moneda','$ds_moneda','$valor_venta','$igv','$precio_venta'
            )
            "
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function insertar_detalle_orden_compras(
        $id_orden_compra,
        $id_producto,
        $codigo_producto,
        $descripcion_producto,
        $id_unidad_medida,
        $ds_unidad_medida,
        $id_marca_producto,
        $ds_marca_producto,
        $cantidad,
        $precio_unitario_venta,
        $precio_unitario_costo,
        $rentabilidad,
        $total_compra,
        $item

    ) {
        return $this->db->query(
            "
            INSERT INTO detalle_orden_compras
            (
            id_dorden_compra,
            id_orden_compra,id_producto,
            codigo_producto,descripcion_producto,
            id_unidad_medida,ds_unidad_medida,id_marca_producto,ds_marca_producto,
            cantidad,
            precio_unitario_venta,precio_unitario_costo,rentabilidad,total_compra,item
            )
            VALUES
            (
            '', 
            '$id_orden_compra','$id_producto',
            '$codigo_producto','$descripcion_producto',
            '$id_unidad_medida','$ds_unidad_medida','$id_marca_producto','$ds_marca_producto',
            '$cantidad',
            '$precio_unitario_venta','$precio_unitario_costo','$rentabilidad','$total_compra','$item');
        "
        );
    }

    public function index_clientes_proveedores()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query("
            SELECT
            a.id_cliente_proveedor,
            a.nombres,
            a.ape_paterno,
            a.ape_materno,
            a.num_documento,
            a.razon_social,
            a.id_departamento,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_departamento) AS ds_departamento_cliente_proveedor,
            id_provincia,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_provincia) AS ds_provincia_cliente_proveedor,
            id_distrito,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_distrito) AS ds_distrito_cliente_proveedor,
            id_tipo_persona,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_tipo_persona) AS ds_tipo_persona,
            (CASE
            WHEN a.razon_social='' THEN CONCAT(a.nombres,' ',a.ape_paterno,' ',a.ape_materno)
            WHEN a.nombres='' AND a.ape_paterno='' AND a.ape_materno='' THEN a.razon_social
            ELSE 'Existe un conflicto'
            END) ds_nombre_cliente_proveedor,
            a.id_tipo_documento,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_tipo_documento) AS ds_tipo_documento,
            a.num_documento,
            a.direccion_fiscal as direccion_fiscal_cliente_proveedor,
            a.email as email_cliente_proveedor,
            a.contacto_registro,
            a.telefono,
            a.celular,
            a.id_tipo_giro,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_tipo_giro) AS ds_tipo_giro
            FROM clientes_proveedores a
            LEFT JOIN usuarios b ON b.id_trabajador=a.id_trabajador
            where a.id_tipo_persona='616' AND b.id_empresa='$id_empresa';
        ");
        return $resultados->result();
    }

    public function index_productos()
    {
        $resultados = $this->db->query("
        SELECT 
        id_producto,
        stock,
        CONCAT('PRO',id_producto) AS id_general,
        UPPER(codigo_producto) as codigo_producto,
        id_almacen,
        (select descripcion from detalle_multitablas where id_dmultitabla=id_almacen) as ds_almacen,
        id_unidad_medida,
        (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_unidad_medida) AS ds_unidad_medida,
        id_sunat,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_sunat) AS ds_codigo_sunat,
        UPPER(descripcion_producto) as descripcion_producto,
        id_moneda,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
        precio_costo,
        porcentaje,
        ganancia_unidad,
        precio_unitario,
        rentabilidad
        id_grupo,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_grupo) AS ds_grupo,
        id_familia,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_familia) AS ds_familia,
        id_clase,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_clase) AS ds_clase,
        id_sub_clase,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_sub_clase) AS ds_sub_clase,
        id_sub_clase_dos,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_sub_clase_dos) AS ds_sub_clase_dos,
        id_marca_producto,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_marca_producto) AS ds_marca_producto,
        id_cta_vta,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_cta_vta) AS ds_cta_vta,
        id_cta_ent,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_cta_ent) AS ds_cta_ent,
        stock
        FROM productos
        ORDER BY id_producto ASC
        ");
        return $resultados->result();
    }


    public function index_modal_cabecera($id_orden_compra)
    {
        $resultados = $this->db->query(
            "
            SELECT
            DATE_FORMAT(a.fecha_orden_compra,'%d/%m/%Y') AS fecha_orden_compra,
            a.ds_moneda,a.ds_condicion_pago,a.ds_nombre_cliente_proveedor,
            a.direccion_fiscal_cliente_proveedor,a.lugar_entrega,a.ds_nombre_trabajador,
            a.observacion,a.nombre_encargado,
            a.valor_venta,a.igv,a.precio_venta,a.clausula,a.ds_nombre_trabajador,
            b.num_documento
            FROM
            orden_compras a
            LEFT JOIN clientes_proveedores b ON b.id_cliente_proveedor=a.id_cliente_proveedor
            WHERE a.id_orden_compra='$id_orden_compra'
        "
        );
        return $resultados->row();
    }

    public function index_modal_detalle($id_orden_compra)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            item,
            cantidad,
            codigo_producto,
            descripcion_producto,
            ds_marca_producto,
            ds_unidad_medida,
            precio_unitario_costo,
            total_compra
            FROM 
            detalle_orden_compras
            WHERE id_orden_compra='$id_orden_compra'
        "
        );
        return $resultados->result();
    }
}
