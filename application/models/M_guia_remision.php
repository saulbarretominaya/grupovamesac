<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_guia_remision extends CI_Model
{

    public function index()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query(
            "
            SELECT 
            a.id_cotizacion,
            a.ds_nombre_cliente_proveedor,
            a.ds_nombre_trabajador,
            a.ds_condicion_pago,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
            b.id_orden_despacho_empresa,
            c.id_parcial_completa,
            c.id_parcial_completa_empresa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_tipo_orden_parcial_completa) AS ds_estado_tipo_orden_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_estado_parcial_completa) AS ds_estado_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=d.id_estado_guia_remision) AS ds_estado_guia_remision,
            c.precio_venta,
            d.id_guia_remision,
            d.id_tienda,
            d.ds_serie_guia_remision,
            DATE_FORMAT(d.fecha_guia_remision,'%d/%m/%Y') AS fecha_guia_remision,
            d.ds_sucursal_trabajador
            FROM cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            RIGHT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
            LEFT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            LEFT JOIN trabajadores e ON e.id_trabajador=a.id_trabajador
            WHERE a.categoria='PRODUCTOS' AND c.id_estado_parcial_completa='893' AND c.id_empresa='$id_empresa'
            ORDER BY c.id_parcial_completa DESC;
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
            a.ds_nombre_cliente_proveedor,
            a.ds_nombre_trabajador,
            a.ds_condicion_pago,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
            b.id_orden_despacho_empresa,
            c.id_parcial_completa,
            c.id_parcial_completa_empresa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_tipo_orden_parcial_completa) AS ds_estado_tipo_orden_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_estado_parcial_completa) AS ds_estado_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=d.id_estado_guia_remision) AS ds_estado_guia_remision,            c.precio_venta,
            d.id_guia_remision,
            d.id_tienda,
            d.ds_serie_guia_remision,
            DATE_FORMAT(d.fecha_guia_remision,'%d/%m/%Y') AS fecha_guia_remision,
            d.ds_sucursal_trabajador
            FROM cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            RIGHT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
            LEFT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            LEFT JOIN trabajadores e ON e.id_trabajador=a.id_trabajador
            WHERE a.categoria='TABLEROS' AND c.id_estado_parcial_completa='893' AND c.id_empresa='$id_empresa'
            ORDER BY c.id_parcial_completa DESC;
            "
        );
        return $resultados->result();
    }

    public function enlace_registrar_cabecera($id_parcial_completa)
    {
        $resultados = $this->db->query(
            "
            SELECT
            c.id_parcial_completa,
            a.id_cotizacion,
            a.ds_nombre_trabajador,
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
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=e.id_almacen) AS ds_sucursal_trabajador,
            (SELECT serie FROM detalle_multitablas WHERE id_dmultitabla=e.id_almacen) AS ds_serie_guia_remision
            FROM
            cotizacion a
            RIGHT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            RIGHT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
            LEFT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            LEFT JOIN trabajadores e ON e.id_trabajador=a.id_trabajador
            WHERE c.id_parcial_completa='$id_parcial_completa'
            "
        );
        return $resultados->row();
    }

    public function enlace_registrar_detalle($id_parcial_completa)
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.item,
            a.id_parcial_completa,
            a.salida_prod,
            b.ds_unidad_medida,
            b.codigo_producto,
            descripcion_producto,
            ds_marca_producto
            FROM
            detalle_parciales_completas a
            LEFT JOIN detalle_cotizacion b ON b.id_dcotizacion=a.id_dcotizacion
            WHERE
            a.id_parcial_completa='$id_parcial_completa' AND a.salida_prod > '0'
            "
        );
        return $resultados->result();
    }

    public function registrar_grupo_vame_tienda_proceres()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_tienda_proceres
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

    public function registrar_grupo_vame_tienda_bellota()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_tienda_bellota
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

    public function registrar_grupo_vame_tienda_nicolini()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_tienda_nicolini
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

    public function registrar_inversiones_alpev_tienda_proceres()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_tienda_proceres
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

    public function registrar_inversiones_alpev_tienda_bellota()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_tienda_bellota
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

    public function registrar_inversiones_alpev_tienda_nicolini()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_tienda_nicolini
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

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function registrar_grupo_vame_guia_remision()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_guia_remision
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

    public function registrar_inversiones_alpev_guia_remision()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_guia_remision
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
        $tipo_transporte,
        $ruc,
        $transportista,
        $domiciliado,
        $licencia,
        $marca_modelo,
        $placa,
        $observaciones,
        $id_tipo_envio_guia_remision,
        $ds_tipo_envio_guia_remision,
        $peso_bruto_total,
        $num_bulto,
        $punto_partida,
        $punto_llegada,
        $contenedor,
        $embarque,
        $ds_sucursal_trabajador,
        $ds_serie_guia_remision,
        $id_parcial_completa,
        $id_tienda,
        $id_guia_remision_empresa,
        $id_trabajador,
        $ds_nombre_trabajador,
        $id_empresa
    ) {
        return $this->db->query(
            "
            INSERT INTO guia_remision
            (
            id_guia_remision,
            tipo_transporte,
            ruc,
            transportista,
            domiciliado,
            licencia,
            marca_modelo,
            placa,
            observaciones,
            id_tipo_envio_guia_remision,
            ds_tipo_envio_guia_remision,
            peso_bruto_total,
            num_bulto,
            punto_partida,
            punto_llegada,
            contenedor,
            embarque,
            ds_sucursal_trabajador,
			ds_serie_guia_remision,
            id_parcial_completa,
            id_tienda,
            fecha_guia_remision,
            id_guia_remision_empresa,
            id_trabajador,
            ds_nombre_trabajador,
            id_empresa
            )
            VALUES
            (
            '',
            '$tipo_transporte',
            '$ruc',
            '$transportista',
            '$domiciliado',
            '$licencia',
            '$marca_modelo',
            '$placa',
            '$observaciones',
            '$id_tipo_envio_guia_remision',
            '$ds_tipo_envio_guia_remision',
            '$peso_bruto_total',
            '$num_bulto',
            '$punto_partida',
            '$punto_llegada',
            '$contenedor',
            '$embarque',
            '$ds_sucursal_trabajador',
			'$ds_serie_guia_remision',
            '$id_parcial_completa',
            '$id_tienda',
            NOW(),
            '$id_guia_remision_empresa',
            '$id_trabajador',
            '$ds_nombre_trabajador',
            '$id_empresa'
            )
            "
        );
    }

    public function enlace_actualizar_cabecera($id_guia_remision)
    {
        $resultados = $this->db->query(
            "
            SELECT
            c.id_parcial_completa,
            a.id_cotizacion,
            a.ds_nombre_trabajador,
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
            d.id_guia_remision,
            d.id_tipo_envio_guia_remision,
            d.tipo_transporte,
            d.ruc,
            d.transportista,
            d.domiciliado,
            d.licencia,
            d.marca_modelo,
            d.placa,
            d.observaciones,
            d.peso_bruto_total,
            d.num_bulto,
            d.punto_partida,
            d.punto_llegada,
            d.contenedor,
            d.embarque,
            d.ds_sucursal_trabajador,
            d.ds_serie_guia_remision,
            d.id_tienda
            FROM
            cotizacion a
            RIGHT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            RIGHT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
            LEFT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            LEFT JOIN trabajadores e ON e.id_trabajador=a.id_trabajador
            WHERE d.id_guia_remision='$id_guia_remision'
            "
        );
        return $resultados->row();
    }

    public function enlace_actualizar_detalle($id_guia_remision)
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.item,
            c.id_cotizacion,
            d.id_orden_despacho,
            e.id_parcial_completa,
            f.id_guia_remision,
            a.salida_prod,
            b.ds_unidad_medida,
            b.codigo_producto,
            descripcion_producto,
            ds_marca_producto
            FROM
            detalle_parciales_completas a
            LEFT JOIN detalle_cotizacion b ON b.id_dcotizacion=a.id_dcotizacion
            LEFT JOIN cotizacion c ON c.id_cotizacion=b.id_cotizacion
            LEFT JOIN orden_despacho d ON d.id_cotizacion=c.id_cotizacion
            LEFT JOIN parciales_completas e ON e.id_orden_despacho=d.id_orden_despacho
            LEFT JOIN guia_remision f ON f.id_parcial_completa=e.id_parcial_completa
            WHERE
            f.id_guia_remision='$id_guia_remision' AND a.salida_prod > '0'
            "
        );
        return $resultados->result();
    }

    public function actualizar(
        $id_guia_remision,
        $tipo_transporte,
        $ruc,
        $transportista,
        $domiciliado,
        $licencia,
        $marca_modelo,
        $placa,
        $observaciones,
        $id_tipo_envio_guia_remision,
        $ds_tipo_envio_guia_remision,
        $peso_bruto_total,
        $num_bulto,
        $punto_partida,
        $punto_llegada,
        $contenedor,
        $embarque
    ) {
        return $this->db->query(
            "
            UPDATE guia_remision SET
            tipo_transporte='$tipo_transporte',
            ruc='$ruc',
            transportista='$transportista',
            domiciliado='$domiciliado',
            licencia='$licencia',
            marca_modelo='$marca_modelo',
            placa='$placa',
            observaciones='$observaciones',
            id_tipo_envio_guia_remision='$id_tipo_envio_guia_remision',
            ds_tipo_envio_guia_remision='$ds_tipo_envio_guia_remision',
            peso_bruto_total='$peso_bruto_total',
            num_bulto='$num_bulto',
            punto_partida='$punto_partida',
            punto_llegada='$punto_llegada',
            contenedor='$contenedor',
            embarque='$embarque',
            fecha_guia_remision=NOW()
            WHERE id_guia_remision='$id_guia_remision'
            "
        );
    }

    public function aprobar_estado($id_guia_remision)
    {
        return $this->db->query(
            "
            UPDATE guia_remision set
            id_estado_guia_remision='894'
            where id_guia_remision='$id_guia_remision'
            "
        );
    }

    public function index_modal_cabecera_productos($id_guia_remision)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            a.id_cotizacion,
            a.ds_nombre_cliente_proveedor,
            a.ds_nombre_trabajador,
            a.ds_condicion_pago,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
            b.id_orden_despacho,
            c.id_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_estado_parcial_completa) AS ds_estado_parcial_completa,
            c.precio_venta,
            d.id_guia_remision,
            d.id_tienda,
            d.ds_serie_guia_remision,
            d.ds_tipo_envio_guia_remision,
            d.peso_bruto_total,
            d.punto_partida,
            d.punto_llegada,
            d.num_bulto,
            d.tipo_transporte,
            d.transportista,
            d.placa,
            d.marca_modelo,
            d.licencia,
            d.domiciliado,
            d.observaciones,
            DATE_FORMAT(d.fecha_guia_remision,'%d/%m/%Y') AS fecha_guia_remision,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=e.id_almacen) AS ds_sucursal_trabajador,
            e.num_documento
            FROM cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
            LEFT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            LEFT JOIN trabajadores e ON e.id_trabajador=a.id_trabajador
            LEFT JOIN clientes_proveedores f ON f.id_cliente_proveedor=a.id_cliente_proveedor
            WHERE d.id_guia_remision='$id_guia_remision'
        "
        );
        return $resultados->row();
    }

    public function index_modal_detalle_productos($id_guia_remision)
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.item,
            a.id_parcial_completa,
            a.salida_prod,
            b.ds_unidad_medida,
            b.codigo_producto,
            descripcion_producto,
            ds_marca_producto
            FROM
            detalle_parciales_completas a
            LEFT JOIN detalle_cotizacion b ON b.id_dcotizacion=a.id_dcotizacion
            LEFT JOIN parciales_completas c ON c.id_parcial_completa=a.id_parcial_completa
            LEFT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            WHERE d.id_guia_remision='$id_guia_remision' AND a.salida_prod > '0'
        "
        );
        return $resultados->result();
    }

    public function index_modal_cabecera_tableros($id_guia_remision)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            a.id_cotizacion,
            a.ds_nombre_cliente_proveedor,
            a.ds_nombre_trabajador,
            a.ds_condicion_pago,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
            b.id_orden_despacho,
            c.id_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_estado_parcial_completa) AS ds_estado_parcial_completa,
            c.precio_venta,
            d.id_guia_remision,
            d.id_tienda,
            d.ds_serie_guia_remision,
            d.ds_tipo_envio_guia_remision,
            d.peso_bruto_total,
            d.punto_partida,
            d.punto_llegada,
            d.num_bulto,
            d.tipo_transporte,
            d.transportista,
            d.placa,
            d.marca_modelo,
            d.licencia,
            d.domiciliado,
            d.observaciones,
            DATE_FORMAT(d.fecha_guia_remision,'%d/%m/%Y') AS fecha_guia_remision,
            d.ds_sucursal_trabajador,
            e.num_documento
            FROM cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
            LEFT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            LEFT JOIN trabajadores e ON e.id_trabajador=a.id_trabajador
            LEFT JOIN clientes_proveedores f ON f.id_cliente_proveedor=a.id_cliente_proveedor
            WHERE d.id_guia_remision='$id_guia_remision'
        "
        );
        return $resultados->row();
    }

    public function index_modal_detalle_tableros($id_guia_remision)
    {
        $resultados = $this->db->query(
            "
            SELECT
            d.item AS item_tablero_cabecera,
            a.id_tablero,
            '-------',
            d.salida_prod AS cantidad_tablero_cabecera,
            b.codigo_tablero AS codigo_tablero_cabecera,
            b.descripcion_tablero AS descripcion_tablero_cabecera,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_marca_tablero) AS marca_tablero_cabecera,
            '-------',
            c.cantidad_unitaria AS cantidad_unitaria_componente,
            (c.cantidad_unitaria*d.salida_prod) AS cantidad_total_componente,
            c.codigo_producto AS codigo_componente,
            c.descripcion_producto AS descripcion_componente,
            c.ds_marca_producto AS marca_componente,
            c.ds_unidad_medida AS unidad_medida_componente
            FROM 
            detalle_cotizacion a
            LEFT JOIN tableros b ON b.id_tablero=a.id_tablero
            LEFT JOIN detalle_tableros c ON c.id_tablero=b.id_tablero
            LEFT JOIN detalle_parciales_completas d ON d.id_dcotizacion=a.id_dcotizacion
            LEFT JOIN parciales_completas e ON e.id_parcial_completa=d.id_parcial_completa
            LEFT JOIN guia_remision f ON f.id_parcial_completa=e.id_parcial_completa
            WHERE f.id_guia_remision='$id_guia_remision'
            "
        );
        return $resultados->result();
    }
}
