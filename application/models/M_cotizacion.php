<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_cotizacion extends CI_Model
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
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_cotizacion) AS ds_estado_cotizacion,
            b.id_orden_despacho,
            DATE_FORMAT(b.fecha_orden_despacho,'%d/%m/%Y') AS fecha_orden_despacho,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_estado_orden_despacho) AS ds_estado_orden_despacho
            FROM
            cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN detalle_cotizacion c ON c.id_cotizacion=a.id_cotizacion
            where a.categoria='PRODUCTOS'
            GROUP BY a.id_cotizacion;
            "
        );
        return $resultados->result();
    }

    public function index_2()
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
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_estado_cotizacion) AS ds_estado_cotizacion,
            b.id_orden_despacho,
            DATE_FORMAT(b.fecha_orden_despacho,'%d/%m/%Y') AS fecha_orden_despacho,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_estado_orden_despacho) AS ds_estado_orden_despacho
            FROM
            cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN detalle_cotizacion c ON c.id_cotizacion=a.id_cotizacion
            where a.categoria='TABLEROS'
            GROUP BY a.id_cotizacion;
            "
        );
        return $resultados->result();
    }

    public function insertar(
        $serie_cotizacion,
        $categoria,
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
                serie_cotizacion,categoria,id_trabajador,ds_nombre_trabajador,fecha_cotizacion,
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
                '$serie_cotizacion','$categoria','$id_trabajador','$ds_nombre_trabajador','$fecha_cotizacion',
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

    public function insertar_detalle_condicion_pago(
        $id_cotizacion,
        $fecha_cuota,
        $monto_cuota

    ) {
        return $this->db->query(
            "
        INSERT INTO detalle_condicion_pagos_cotizacion
        (
        id_dcondicion_pago,
        id_cotizacion,fecha_cuota,monto_cuota
        )
        VALUES
        (
        '', 
        '$id_cotizacion',STR_TO_DATE('$fecha_cuota','%d/%m/%Y'),'$monto_cuota'
        )
        "
        );
    }

    public function index_clientes_proveedores()
    {
        $id_trabajador = $this->session->userdata('id_trabajador');

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
            where id_trabajador='$id_trabajador' and id_tipo_persona='615';
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

    public function index_tableros()
    {
        $resultados = $this->db->query(
            "
        SELECT 
        id_tablero,
        CONCAT('TAB',id_tablero) AS id_general,
        codigo_tablero,
        id_almacen,
        cantidad_tablero,
        precio_unitario_por_tablero,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_almacen) AS ds_almacen,
        id_sunat,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_sunat) AS ds_codigo_sunat,
        LEFT(descripcion_tablero,30) AS descripcion_tablero,
        id_moneda,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
        id_marca_tablero,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_marca_tablero) AS ds_marca_tablero,
        id_modelo_tablero,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_modelo_tablero) AS ds_modelo_tablero
        FROM tableros
        ORDER BY id_tablero ASC
        "
        );
        return $resultados->result();
    }

    public function index_comodin()
    {
        $resultados = $this->db->query(
            "
            SELECT
            id_comodin,
            CONCAT('COM',id_comodin) AS id_general,
            codigo_producto,
            descripcion_producto,
            id_marca_producto,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_marca_producto) AS ds_marca_producto,
            id_unidad_medida,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_unidad_medida) AS ds_unidad_medida,
            id_moneda,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
            precio_unitario,
            nombre_proveedor
            FROM comodin
        "
        );
        return $resultados->result();
    }

    public function tipo_cambio()
    {
        $resultados = $this->db->query("
        select * from tipo_cambio where id_tipo_cambio='1'");
        return $resultados->row();
    }

    public function validar_existencia_comodin_registrar($id_cotizacion)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            COUNT(*) AS cantidad_num_comodin,
            item
            FROM detalle_cotizacion
            WHERE id_cotizacion='$id_cotizacion' AND id_comodin != '0';
            "
        );
        return $resultados->row();
    }

    public function aprobar_estado($id_cotizacion)
    {
        return $this->db->query(
            "
            update cotizacion set
            id_estado_cotizacion='858',
            fecha_aprobacion=NOW()
            where id_cotizacion='$id_cotizacion'
            "
        );
    }

    public function cambiar_estado_pendiente_orden_despacho($id_orden_despacho)
    {
        return $this->db->query(
            "
            update orden_despacho set
            id_estado_orden_despacho='861'
            where id_orden_despacho='$id_orden_despacho'
            "
        );
    }

    public function insertar_orden_despacho(
        $id_cotizacion
    ) {
        return $this->db->query(
            "
        INSERT INTO orden_despacho
        (
            id_orden_despacho,
            id_cotizacion,fecha_orden_despacho,id_estado_orden_despacho
        )
        VALUES
        (
            '',
            '$id_cotizacion',CURDATE(),'861'
        )"
        );
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

    public function enlace_actualizar_detalle($id_cotizacion)
    {
        $resultados = $this->db->query("
        SELECT 
        a.id_cotizacion,
        b.codigo_producto,
        b.descripcion_producto,
        b.ds_unidad_medida,
        b.ds_marca_producto,
        b.precio_ganancia,
        b.cantidad,
        b.valor_venta,
        '||',
        c.stock
        FROM
        cotizacion a
        LEFT JOIN detalle_cotizacion b ON b.id_cotizacion=a.id_cotizacion
        LEFT JOIN productos c ON c.id_producto=b.id_producto
        WHERE  a.id_cotizacion ='$id_cotizacion'
               ");
        return $resultados->result();
    }

    public function index_modal_cabecera_productos($id_cotizacion)
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

    public function index_modal_detalle_productos($id_cotizacion)
    {
        $resultados = $this->db->query(
            "
            SELECT
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
            WHERE a.id_cotizacion='$id_cotizacion'
        "
        );
        return $resultados->result();
    }

    public function index_modal_cabecera_tableros($id_cotizacion)
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

    public function index_modal_detalle_tableros($id_cotizacion)
    {
        $resultados = $this->db->query(
            "
        SELECT
        a.item as item_tablero_cabecera,
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
        a.dias_entrega as dias_entrega_tablero_cabecera,
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
        WHERE a.id_cotizacion='$id_cotizacion'
        "
        );
        return $resultados->result();
    }
}
