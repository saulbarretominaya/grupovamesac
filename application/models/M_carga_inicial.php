<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_carga_inicial extends CI_Model
{

    public function index()
    {
        $id_empresa = $this->session->userdata("id_empresa");

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
            WHERE a.id_empresa='$id_empresa'
            "
        );
        return $resultados->result();
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
            where a.id_empresa='$id_empresa';
        ");
        return $resultados->result();
    }

    public function index_productos()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query("
        SELECT 
        a.id_producto,
        a.stock,
        UPPER(a.codigo_producto) as codigo_producto,
        a.id_almacen,
        (select descripcion from detalle_multitablas where id_dmultitabla=a.id_almacen) as ds_almacen,
        a.id_unidad_medida,
        (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_unidad_medida) AS ds_unidad_medida,
        a.id_sunat,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_sunat) AS ds_codigo_sunat,
        UPPER(a.descripcion_producto) as descripcion_producto,
        a.id_moneda,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
        a.precio_costo,
        a.porcentaje,
        a.ganancia_unidad,
        a.precio_unitario,
        a.rentabilidad,
        a.id_grupo,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_grupo) AS ds_grupo,
        a.id_familia,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_familia) AS ds_familia,
        a.id_clase,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_clase) AS ds_clase,
        a.id_sub_clase,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_sub_clase) AS ds_sub_clase,
        a.id_sub_clase_dos,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_sub_clase_dos) AS ds_sub_clase_dos,
        a.id_marca_producto,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_marca_producto) AS ds_marca_producto,
        a.id_cta_vta,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_cta_vta) AS ds_cta_vta,
        a.id_cta_ent,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_cta_ent) AS ds_cta_ent,
        a.stock
        FROM productos a
        where a.id_empresa='$id_empresa'    
        ORDER BY a.id_producto ASC
        ");
        return $resultados->result();
    }

    public function registrar_grupo_vame_carga_inicial()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_carga_inicial
            (
            id_grupo_vame
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_inversiones_alpev_carga_inicial()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_carga_inicial
            (
            id_inversion_alpev
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar(
        $id_trabajador,
        $ds_nombre_trabajador,
        $fecha_carga_inicial,
        $id_tipo_ingreso,
        $id_moneda,
        $tipo_cambio,
        $id_cliente_proveedor,
        $ds_nombre_cliente_proveedor,
        $num_guia,
        $num_orden_compra,
        $id_tipo_comprobante,
        $fecha_comprobante,
        $num_comprobante,
        $observacion,
        $monto_total,
        $id_carga_inicial_empresa,
        $id_empresa
    ) {
        return $this->db->query(
            "
            INSERT INTO carga_inicial
            (
                id_carga_inicial,
                id_trabajador,ds_nombre_trabajador,fecha_carga_inicial,id_tipo_ingreso,
                id_moneda,tipo_cambio,id_cliente_proveedor,ds_nombre_cliente_proveedor,num_guia,
                num_orden_compra,id_tipo_comprobante,fecha_comprobante,num_comprobante,
                observacion,monto_total,id_carga_inicial_empresa,id_empresa
            )
            VALUES
            (
                '',
                '$id_trabajador','$ds_nombre_trabajador','$fecha_carga_inicial','$id_tipo_ingreso',
                '$id_moneda','$tipo_cambio','$id_cliente_proveedor','$ds_nombre_cliente_proveedor','$num_guia',
                '$num_orden_compra','$id_tipo_comprobante','$fecha_comprobante','$num_comprobante',
                '$observacion','$monto_total','$id_carga_inicial_empresa','$id_empresa'
            )
            "
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function registrar_detalle_carga_inicial(
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

    public function actualizar_stock_productos(
        $id_producto,
        $total_stock
    ) {
        return $this->db->query(
            "
            update productos
            set stock='$total_stock'
            where id_producto='$id_producto'
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
