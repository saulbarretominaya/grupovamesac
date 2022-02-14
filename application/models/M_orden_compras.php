<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_orden_compras extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.id_cotizacion,
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
            DATE_FORMAT(b.fecha_orden_despacho,'%d/%m/%Y') AS fecha_orden_despacho,
            id_estado_orden_despacho,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_estado_orden_despacho) AS ds_estado_valor_od,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_estado_orden_despacho) AS ds_estado_orden_despacho
            FROM
            cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            "
        );
        return $resultados->result();
    }

    public function insertar(
        $serie_cotizacion,
        $id_trabajador,
        $ds_nombre_trabajador,
        $fecha_cotizacion,
        $validez_oferta_cotizacion,
        $fecha_vencimiento_validez_oferta,
        $id_cliente_proveedor,
        $ds_nombre_cliente_proveedor,
        $ds_departamento_cliente_proveedor,
        $ds_provincia_cliente_proveedor,
        $ds_distrito_cliente_proveedor,
        $direccion_fiscal_cliente_proveedor,
        $email_cliente_proveedor,
        $clausula,
        $lugar_entrega,
        $nombre_encargado,
        $observacion,
        $id_condicion_pago,
        $ds_condicion_pago,
        $numero_dias_condicion_pago,
        $fecha_condicion_pago,
        $valor_venta_total_sin_d,
        $valor_venta_total_con_d,
        $descuento_total,
        $igv,
        $precio_venta,
        $valor_cambio,
        $id_moneda
    ) {
        return $this->db->query(
            "
            INSERT INTO cotizacion
            (
                id_cotizacion,
                serie_cotizacion,id_trabajador,ds_nombre_trabajador,fecha_cotizacion,
                validez_oferta_cotizacion,fecha_vencimiento_validez_oferta,id_cliente_proveedor,ds_nombre_cliente_proveedor,ds_departamento_cliente_proveedor,
                ds_provincia_cliente_proveedor,ds_distrito_cliente_proveedor,direccion_fiscal_cliente_proveedor,email_cliente_proveedor,
                clausula,lugar_entrega,nombre_encargado,observacion,
                id_condicion_pago,ds_condicion_pago,numero_dias_condicion_pago,fecha_condicion_pago,
                valor_venta_total_sin_d,valor_venta_total_con_d,
                descuento_total,igv,precio_venta,valor_cambio,id_moneda,id_estado_cotizacion
            )
            VALUES
            (
                '',
                '$serie_cotizacion','$id_trabajador','$ds_nombre_trabajador','$fecha_cotizacion',
                '$validez_oferta_cotizacion',STR_TO_DATE('$fecha_vencimiento_validez_oferta','%d/%m/%Y'),'$id_cliente_proveedor','$ds_nombre_cliente_proveedor','$ds_departamento_cliente_proveedor',
                '$ds_provincia_cliente_proveedor','$ds_distrito_cliente_proveedor','$direccion_fiscal_cliente_proveedor','$email_cliente_proveedor',
                '$clausula','$lugar_entrega','$nombre_encargado','$observacion',
                '$id_condicion_pago','$ds_condicion_pago','$numero_dias_condicion_pago',STR_TO_DATE('$fecha_condicion_pago','%d/%m/%Y'),
                '$valor_venta_total_sin_d','$valor_venta_total_con_d',
                '$descuento_total','$igv','$precio_venta','$valor_cambio','$id_moneda','857'
            )
            "
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function insertar_detalle_cotizacion(
        $id_cotizacion,
        $id_producto,
        $id_tablero,
        $id_comodin,
        $codigo_producto,
        $descripcion_producto,
        $id_unidad_medida,
        $ds_unidad_medida,
        $id_marca_producto,
        $ds_marca_producto,
        $cantidad,

        $precio_inicial,
        $precio_ganancia,
        $g,
        $g_unidad,
        $g_cant_total,

        $precio_descuento,
        $d,
        $d_unidad,
        $d_cant_total,

        $valor_venta_sin_d,
        $valor_venta_con_d,
        $dias_entrega,
        $item

    ) {
        return $this->db->query(
            "
            INSERT INTO detalle_cotizacion
            (
            id_dcotizacion,
            id_cotizacion,id_producto,id_tablero,id_comodin,
            codigo_producto,descripcion_producto,
            id_unidad_medida,ds_unidad_medida,id_marca_producto,ds_marca_producto,
            cantidad,
            precio_inicial,precio_ganancia,g,g_unidad,g_cant_total,
            precio_descuento,d,d_unidad,d_cant_total,
            valor_venta_sin_d,valor_venta_con_d,
            dias_entrega,item
            )
            VALUES
            (
            '', 
            '$id_cotizacion','$id_producto','$id_tablero','$id_comodin',
            '$codigo_producto','$descripcion_producto',
            '$id_unidad_medida','$ds_unidad_medida','$id_marca_producto','$ds_marca_producto',
            '$cantidad',
            '$precio_inicial','$precio_ganancia','$g','$g_unidad','$g_cant_total',
            '$precio_descuento','$d','$d_unidad','$d_cant_total',
            '$valor_venta_sin_d','$valor_venta_con_d',
            '$dias_entrega','$item');
        "
        );
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
            FROM clientes_proveedores
            where id_tipo_persona='616';
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


    public function index_modal_cabecera($id_cotizacion)
    {
        $resultados = $this->db->query(
            "
            SELECT
            DATE_FORMAT(a.fecha_cotizacion,'%d/%m/%Y') AS fecha_emision,a.validez_oferta_cotizacion,
            DATE_FORMAT(a.fecha_vencimiento_validez_oferta,'%d/%m/%Y') AS fecha_vencimiento_validez_oferta,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
            a.ds_condicion_pago,a.ds_nombre_cliente_proveedor,
            b.num_documento,b.direccion_fiscal,lugar_entrega,a.ds_nombre_trabajador,
            c.celular,c.email,a.observacion,a.valor_venta_total_sin_d,a.valor_venta_total_con_d,a.descuento_total,a.igv,a.precio_venta,a.clausula,a.nombre_encargado
            FROM
            cotizacion a
            LEFT JOIN clientes_proveedores b ON b.id_cliente_proveedor=a.id_cliente_proveedor
            LEFT JOIN trabajadores c ON c.id_trabajador=a.id_trabajador
            where a.id_cotizacion='$id_cotizacion'
        "
        );
        return $resultados->row();
    }

    public function index_modal_detalle($id_cotizacion)
    {
        $resultados = $this->db->query(
            "
            SELECT
            b.item,a.id_cotizacion,b.id_dcotizacion,b.id_producto,
            b.id_tablero,b.id_comodin,c.descripcion_tablero,
            b.cantidad AS cantidad_tablero,d.id_dtablero,c.codigo_tablero,'VAME' AS ds_marca_tablero,
            b.precio_ganancia,b.d AS d_tablero,b.precio_descuento AS precio_descuento_tablero,
            b.valor_venta_con_d AS valor_venta_tablero,b.dias_entrega AS dias_entrega_tablero,
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
            WHEN b.id_producto !='0' THEN b.valor_venta_con_d
            WHEN b.id_comodin !='0' THEN b.valor_venta_con_d
            END) AS valor_venta_con_d,
            (CASE 
            WHEN b.id_tablero  != '0' THEN ''
            WHEN b.id_producto !='0' THEN b.dias_entrega
            WHEN b.id_comodin !='0' THEN b.dias_entrega
            END) AS dias_entrega
            FROM cotizacion a
            LEFT JOIN detalle_cotizacion b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN tableros c ON c.id_tablero=b.id_tablero
            LEFT JOIN detalle_tableros d ON d.id_tablero=b.id_tablero
            WHERE a.id_cotizacion='$id_cotizacion'
            ORDER BY b.id_dcotizacion ASC,d.id_dtablero ASC
        "
        );
        return $resultados->result();
    }
}
