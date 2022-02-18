<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_compras_cobranzas extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.id_carga_inicial,
            DATE_FORMAT(a.fecha_carga_inicial,'%d/%m/%Y') AS fecha_carga_inicial,
            a.ds_nombre_cliente_proveedor,
            a.num_guia,num_orden_compra,a.fecha_comprobante,a.num_comprobante,
            a.observacion,a.monto_total,observacion,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_ingreso) AS ds_tipo_ingreso,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda
            FROM 
            carga_inicial a
            "
        );
        return $resultados->result();
    }

    public function index_clientes_proveedores()
    {
        $resultados = $this->db->query("
            SELECT
            id_cliente_proveedor,
            nombres,
            ape_paterno,
            ape_materno,
            num_documento,
            razon_social,
            id_departamento,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_departamento) AS ds_departamento_cliente_proveedor,
            id_provincia,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_provincia) AS ds_provincia_cliente_proveedor,
            id_distrito,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_distrito) AS ds_distrito_cliente_proveedor,
            id_tipo_persona,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_persona) AS ds_tipo_persona,
            (CASE
            WHEN razon_social='' THEN CONCAT(nombres,' ',ape_paterno,' ',ape_materno)
            WHEN nombres='' AND ape_paterno='' AND ape_materno='' THEN razon_social
            ELSE 'Existe un conflicto'
            END) ds_nombre_cliente_proveedor,
            id_tipo_documento,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_documento) AS ds_tipo_documento,
            num_documento,
            direccion_fiscal as direccion_fiscal_cliente_proveedor,
            email as email_cliente_proveedor,
            contacto_registro,
            telefono,
            celular,
            id_tipo_giro,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_giro) AS ds_tipo_giro
            FROM clientes_proveedores;
        ");
        return $resultados->result();
    }

    public function insertar(
        $id_trabajador,
        $ds_nombre_trabajador,
        $fecha_compra_cobranza,
        $id_tipo_comprobante,
        $ds_tipo_comprobante,
        $num_comprobante,
        $id_almacen,
        $ds_almacen,
        $fecha_emision,
        $fecha_vencimiento,
        $id_tipo_compra_cobranza,
        $ds_tipo_compra_cobranza,
        $id_cliente_proveedor,
        $ds_nombre_cliente_proveedor,
        $observacion,
        $id_moneda,
        $ds_moneda,
        $sub_total,
        $igv,
        $total,
        $id_condicion_pago,
        $ds_condicion_pago,
        $pendiente,
        $pagado,
        $id_estado_compra_cobranza
    ) {
        return $this->db->query(
            "
            INSERT INTO compras_cobranzas
            (
            id_compra_cobranza,
            id_trabajador,ds_nombre_trabajador,fecha_compra_cobranza,id_tipo_comprobante,
            ds_tipo_comprobante,num_comprobante,id_almacen,ds_almacen,
            fecha_emision,fecha_vencimiento,id_tipo_compra_cobranza,ds_tipo_compra_cobranza,
            id_cliente_proveedor,ds_nombre_cliente_proveedor,observacion,id_moneda,
            ds_moneda,sub_total,igv,total,
            id_condicion_pago,ds_condicion_pago,pendiente,pagado,
            id_estado_compra_cobranza
            )
            VALUES
            (
            '',
            '$id_trabajador','$ds_nombre_trabajador','$fecha_compra_cobranza','$id_tipo_comprobante',
            '$ds_tipo_comprobante','$num_comprobante','$id_almacen','$ds_almacen',
            '$fecha_emision','$fecha_vencimiento','$id_tipo_compra_cobranza','$ds_tipo_compra_cobranza',
            '$id_cliente_proveedor','$ds_nombre_cliente_proveedor','$observacion','$id_moneda',
            '$ds_moneda','$sub_total','$igv','$total',
            '$id_condicion_pago','$ds_condicion_pago','$pendiente','$pagado',
            '$id_estado_compra_cobranza'
            )
            "
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function insertar_detalle_compras_cobranzas(
        $id_carga_inicial,
        $item,
        $id_almacen,
        $ds_almacen,
        $id_producto,
        $codigo_producto,
        $descripcion_producto,
        $id_unidad_medida,
        $ds_unidad_medida,
        $id_marca_producto,
        $ds_marca_producto,
        $stock_actual,
        $nueva_cantidad,
        $total_stock,
        $precio_unitario,
        $valor_total
    ) {
        return $this->db->query(
            "
            INSERT INTO detalle_carga_inicial
            (
            id_dcarga_inicial,
            id_carga_inicial,item,id_almacen,ds_almacen,id_producto,
            codigo_producto,descripcion_producto,
            id_unidad_medida,ds_unidad_medida,id_marca_producto,ds_marca_producto,
            stock_actual,nueva_cantidad,total_stock,precio_unitario,valor_total
            )
            VALUES
            (
            '', 
            '$id_carga_inicial','$item','$id_almacen','$ds_almacen','$id_producto',
            '$codigo_producto','$descripcion_producto',
            '$id_unidad_medida','$ds_unidad_medida','$id_marca_producto','$ds_marca_producto',
            '$stock_actual','$nueva_cantidad','$total_stock','$precio_unitario','$valor_total'
            )
        "
        );
    }


    public function index_modal_cabecera($id_carga_inicial)
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.id_carga_inicial,
            DATE_FORMAT(a.fecha_carga_inicial,'%d/%m/%Y') AS fecha_carga_inicial,
            a.ds_nombre_cliente_proveedor,tipo_cambio,
            a.num_guia,num_orden_compra,a.num_comprobante,
            a.observacion,a.monto_total,a.observacion,a.monto_total,
            DATE_FORMAT(a.fecha_comprobante,'%d/%m/%Y') AS fecha_comprobante,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_comprobante) AS ds_tipo_comprobante,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_ingreso) AS ds_tipo_ingreso,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda
            FROM 
            carga_inicial a
            where a.id_carga_inicial ='$id_carga_inicial'
        "
        );
        return $resultados->row();
    }

    public function index_modal_detalle($id_carga_inicial)
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.id_carga_inicial,
            a.item,
            a.ds_almacen,
            a.codigo_producto,
            a.descripcion_producto,
            a.ds_unidad_medida,
            a.ds_marca_producto,
            a.stock_actual,
            a.nueva_cantidad,
            a.total_stock,
            a.precio_unitario,
            a.valor_total
            FROM 
            detalle_carga_inicial a
            WHERE a.id_carga_inicial ='$id_carga_inicial'
        "
        );
        return $resultados->result();
    }
}
