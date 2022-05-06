<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_comprobantes extends CI_Model
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
            b.id_orden_despacho,
            c.id_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_tipo_orden_parcial_completa) AS ds_estado_tipo_orden_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=d.id_estado_guia_remision) AS ds_estado_guia_remision,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=e.id_estado_comprobante) AS ds_estado_comprobante,   
            c.precio_venta,
            d.id_guia_remision,
            d.id_tienda,
            d.ds_serie_guia_remision,
            e.id_comprobante,
            DATE_FORMAT(d.fecha_guia_remision,'%d/%m/%Y') AS fecha_guia_remision,
            e.ds_tipo_comprobante,
            (SELECT serie FROM detalle_multitablas WHERE id_dmultitabla=e.id_tipo_comprobante) AS ds_serie_comprobante,
            e.id_num_comprobante AS num_comprobante,
            DATE_FORMAT(e.fecha_emision,'%d/%m/%Y') AS fecha_comprobante,
            d.ds_sucursal_trabajador,
            h.enlace_del_pdf as enlace_del_pdf_comprobante_emitido,
            h.enlace_del_xml as enlace_del_xml_comprobante_emitido,
            h.enlace_del_cdr as enlace_del_cdr_comprobante_emitido,
            e.id_estado_sunat as ds_estado_sunat,
            i.enlace_del_pdf as enlace_del_pdf_comprobante_anulado,
            i.enlace_del_xml as enlace_del_xml_comprobante_anulado
            FROM cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
            RIGHT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            LEFT JOIN comprobantes e ON e.id_guia_remision=d.id_guia_remision
            LEFT JOIN trabajadores f ON f.id_trabajador=a.id_trabajador
            LEFT JOIN comprobantes_emitidos h ON h.id_comprobante=e.id_comprobante
            LEFT JOIN comprobantes_anulados i ON i.id_comprobante=e.id_comprobante
            WHERE a.categoria='PRODUCTOS' AND d.id_estado_guia_remision='894' AND d.id_empresa='$id_empresa'
            ORDER BY a.id_cotizacion DESC;
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
            b.id_orden_despacho,
            c.id_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_tipo_orden_parcial_completa) AS ds_estado_tipo_orden_parcial_completa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=d.id_estado_guia_remision) AS ds_estado_guia_remision, 
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=e.id_estado_comprobante) AS ds_estado_comprobante,   
             c.precio_venta,
            d.id_guia_remision,
            d.id_tienda,
            d.ds_serie_guia_remision,
            e.id_comprobante,
            DATE_FORMAT(d.fecha_guia_remision,'%d/%m/%Y') AS fecha_guia_remision,
            e.ds_tipo_comprobante,
            (SELECT serie FROM detalle_multitablas WHERE id_dmultitabla=e.id_tipo_comprobante) AS ds_serie_comprobante,
            e.id_num_comprobante AS num_comprobante,
            DATE_FORMAT(e.fecha_emision,'%d/%m/%Y') AS fecha_comprobante,
            d.ds_sucursal_trabajador
            FROM cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
            RIGHT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            LEFT JOIN comprobantes e ON e.id_guia_remision=d.id_guia_remision
            LEFT JOIN trabajadores f ON e.id_trabajador=a.id_trabajador
            WHERE a.categoria='TABLEROS' AND d.id_empresa='$id_empresa'
            ORDER BY a.id_cotizacion desc;
        "
        );
        return $resultados->result();
    }

    public function enlace_registrar_cabecera($id_guia_remision)
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.ds_nombre_trabajador,
            d.id_guia_remision,
            d.id_tienda,
            a.ds_nombre_cliente_proveedor,
            a.direccion_fiscal_cliente_proveedor,
            c.valor_venta_total_sin_d,
            c.valor_venta_total_con_d,
            c.descuento_total,
            c.igv,
            c.precio_venta
            FROM 
            cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
            LEFT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            WHERE d.id_guia_remision='$id_guia_remision'
            "
        );
        return $resultados->row();
    }

    public function enlace_registrar_detalle($id_guia_remision)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            a.item,
            a.salida_prod AS cantidad,
            b.codigo_producto,
            b.descripcion_producto,
            b.ds_marca_producto,
            b.ds_unidad_medida,
            b.precio_ganancia AS precio_u,
            b.d,
            b.precio_descuento AS precio_u_d,
            a.valor_venta_con_d AS valor_venta
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

    public function registrar_grupo_vame_facturas()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_facturas
            (
            id_factura
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_grupo_vame_boletas()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_boletas
            (
            id_boleta
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_grupo_vame_nota_credito()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_nota_credito
            (
            id_nota_credito
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_grupo_vame_nota_debito()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_nota_debito
            (
            id_nota_debito
            )
            VALUES
            (
            ''
            )
            "
        );
    }



    public function registrar_inversiones_alpev_facturas()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_facturas
            (
            id_factura
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_inversiones_alpev_boletas()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_boletas
            (
            id_boleta
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_inversiones_alpev_nota_credito()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_nota_credito
            (
            id_nota_credito
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_inversiones_alpev_nota_debito()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_nota_debito
            (
            id_nota_debito
            )
            VALUES
            (
            ''
            )
            "
        );
    }



    public function registrar_grupo_vame_comprobantes()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_comprobantes
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

    public function registrar_inversiones_alpev_comprobantes()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_comprobantes
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
        $id_tipo_comprobante,
        $ds_tipo_comprobante,
        $fecha_emision,
        $dias,
        $fecha_vencimiento,
        $orden_compra,
        $id_condicion_pago,
        $ds_condicion_pago,
        $monto_total_condicion_pago,
        $observacion,
        $id_guia_remision,
        $id_num_comprobante,
        $id_comprobante_empresa,
        $id_trabajador,
        $ds_nombre_trabajador,
        $id_empresa
    ) {
        return $this->db->query(
            "
            INSERT INTO comprobantes
            (
                id_comprobante,
                id_tipo_comprobante,ds_tipo_comprobante,fecha_emision,dias,fecha_vencimiento,
                orden_compra,id_condicion_pago,ds_condicion_pago,monto_total_condicion_pago,
                observacion,id_guia_remision,id_num_comprobante,id_comprobante_empresa,
                id_trabajador,ds_nombre_trabajador,id_empresa
            )
            VALUES
            (
                '',
                '$id_tipo_comprobante','$ds_tipo_comprobante','$fecha_emision','$dias',STR_TO_DATE('$fecha_vencimiento','%d/%m/%Y'),
                '$orden_compra','$id_condicion_pago','$ds_condicion_pago','$monto_total_condicion_pago',
                '$observacion','$id_guia_remision','$id_num_comprobante','$id_comprobante_empresa',
                '$id_trabajador','$ds_nombre_trabajador','$id_empresa'
            )
            "
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function registrar_detalle_condicion_pago(
        $id_comprobante,
        $fecha_cuota,
        $monto_cuota

    ) {
        return $this->db->query(
            "
        INSERT INTO detalle_condicion_pagos_comprobantes
        (
        id_dcondicion_pago,
        id_comprobante,fecha_cuota,monto_cuota,
        id_estado_condicion_pago,fecha_condicion_pago
        )
        VALUES
        (
        '', 
        '$id_comprobante',STR_TO_DATE('$fecha_cuota','%d/%m/%Y'),'$monto_cuota',
        '895',NOW()
        )
        "
        );
    }

    public function enlace_actualizar_cabecera($id_comprobante)
    {
        $resultados = $this->db->query(
            "
            SELECT
            a.ds_nombre_trabajador,
            a.ds_nombre_cliente_proveedor,
            a.direccion_fiscal_cliente_proveedor,
            c.valor_venta_total_sin_d,
            c.valor_venta_total_con_d,
            c.descuento_total,
            c.igv,
            c.precio_venta,
            d.id_guia_remision,
            d.id_tienda,
            e.id_comprobante,
            e.id_tipo_comprobante,
            e.id_num_comprobante,
            (SELECT serie FROM detalle_multitablas WHERE id_dmultitabla=e.id_tipo_comprobante) AS ds_serie_comprobante,
            e.dias,
            DATE_FORMAT(e.fecha_vencimiento,'%d/%m/%Y') AS fecha_vencimiento,
            e.orden_compra,
            e.id_condicion_pago,
            e.monto_total_condicion_pago,
            e.observacion
            FROM 
            cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
            LEFT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            LEFT JOIN comprobantes e ON e.id_guia_remision=d.id_guia_remision
            WHERE e.id_comprobante='$id_comprobante'
            "
        );
        return $resultados->row();
    }

    public function enlace_actualizar_detalle($id_comprobante)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            a.item,
            a.salida_prod AS cantidad,
            b.codigo_producto,
            b.descripcion_producto,
            b.ds_marca_producto,
            b.ds_unidad_medida,
            b.precio_ganancia AS precio_u,
            b.d,
            b.precio_descuento AS precio_u_d,
            a.valor_venta_con_d AS valor_venta
            FROM 
            detalle_parciales_completas a
            LEFT JOIN detalle_cotizacion b ON b.id_dcotizacion=a.id_dcotizacion
            LEFT JOIN parciales_completas c ON c.id_parcial_completa=a.id_parcial_completa
            LEFT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            LEFT JOIN comprobantes e ON e.id_guia_remision=d.id_guia_remision
            WHERE e.id_comprobante='$id_comprobante' AND a.salida_prod > '0'
            "
        );
        return $resultados->result();
    }

    public function enlace_actualizar_detalle_condicion_pago($id_comprobante)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            a.id_dcondicion_pago,
            a.id_comprobante,
            DATE_FORMAT(a.fecha_cuota,'%d/%m/%Y') AS fecha_cuota,
            a.monto_cuota
            FROM 
            detalle_condicion_pagos_comprobantes a
            WHERE a.id_comprobante='$id_comprobante' AND a.id_estado_condicion_pago='895';
            "
        );
        return $resultados->result();
    }

    public function actualizar(
        $id_comprobante,
        $fecha_emision,
        $dias,
        $fecha_vencimiento,
        $orden_compra,
        $id_condicion_pago,
        $ds_condicion_pago,
        $monto_total_condicion_pago,
        $observacion
    ) {
        return $this->db->query(
            "
            UPDATE comprobantes SET
                fecha_emision='$fecha_emision',
                dias='$dias',
                fecha_vencimiento=STR_TO_DATE('$fecha_vencimiento','%d/%m/%Y'),
                orden_compra='$orden_compra',
                id_condicion_pago='$id_condicion_pago',
                ds_condicion_pago='$ds_condicion_pago',
                monto_total_condicion_pago='$monto_total_condicion_pago',
                observacion='$observacion'
            WHERE id_comprobante='$id_comprobante'
            "
        );
    }

    public function actualizar_estado_pendiente_por_facturar($id_comprobante)
    {
        return $this->db->query(
            "
            UPDATE comprobantes set
            id_estado_comprobante='900'
            where id_comprobante='$id_comprobante'
            "
        );
    }

    public function eliminar_detalle_condicion_pago($id_dcondicion_pago_eliminar)
    {
        return $this->db->query(
            "
            UPDATE detalle_condicion_pagos_comprobantes SET
            id_estado_condicion_pago='894',
            fecha_condicion_pago=NOW()
            WHERE id_dcondicion_pago='$id_dcondicion_pago_eliminar'
            "
        );
    }

    public function index_modal_cabecera_productos($id_comprobante)
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
            c.valor_venta_total_sin_d,c.valor_venta_total_con_d,c.descuento_total,c.igv,c.precio_venta,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_estado_parcial_completa) AS ds_estado_parcial_completa,
            c.precio_venta,
            d.id_guia_remision,
            d.id_tienda,
            d.ds_serie_guia_remision,
            e.id_comprobante,
            DATE_FORMAT(d.fecha_guia_remision,'%d/%m/%Y') AS fecha_guia_remision,
            e.ds_tipo_comprobante,
            (SELECT serie FROM detalle_multitablas WHERE id_dmultitabla=e.id_tipo_comprobante) AS ds_serie_comprobante,
            e.id_num_comprobante AS num_comprobante,
            DATE_FORMAT(e.fecha_emision,'%d/%m/%Y') AS fecha_comprobante,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=f.id_almacen) AS ds_sucursal_trabajador
            FROM cotizacion a
            LEFT JOIN orden_despacho b ON b.id_cotizacion=a.id_cotizacion
            LEFT JOIN parciales_completas c ON c.id_orden_despacho=b.id_orden_despacho
            LEFT JOIN guia_remision d ON d.id_parcial_completa=c.id_parcial_completa
            LEFT JOIN comprobantes e ON e.id_guia_remision=d.id_guia_remision
            LEFT JOIN trabajadores f ON e.id_trabajador=a.id_trabajador
            LEFT JOIN clientes_proveedores g ON g.id_cliente_proveedor=a.id_cliente_proveedor
            WHERE e.id_comprobante='$id_comprobante'
        "
        );
        return $resultados->row();
    }

    public function index_modal_cabecera_tableros($id_comprobante)
    {
        $resultados = $this->db->query(
            "
            SELECT
            DATE_FORMAT(f.fecha_emision,'%d/%m/%Y') AS fecha_comprobante,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
            a.ds_condicion_pago,a.ds_nombre_cliente_proveedor,
            b.num_documento,b.direccion_fiscal,lugar_entrega,a.ds_nombre_trabajador,
            c.celular,c.email,a.observacion,
            d.valor_venta_total_sin_d,d.valor_venta_total_con_d,d.descuento_total,d.igv,d.precio_venta,a.clausula,a.nombre_encargado
            FROM
            cotizacion a
            LEFT JOIN clientes_proveedores b ON b.id_cliente_proveedor=a.id_cliente_proveedor
            LEFT JOIN trabajadores c ON c.id_trabajador=a.id_trabajador
            LEFT JOIN parciales_completas d ON d.id_cotizacion=a.id_cotizacion
            LEFT JOIN guia_remision e ON e.id_parcial_completa=d.id_parcial_completa
            LEFT JOIN comprobantes f ON f.id_guia_remision=e.id_guia_remision
            WHERE f.id_comprobante='$id_comprobante'    
        "
        );
        return $resultados->row();
    }

    public function emitir_comprobantes_electronicos(
        $id_comprobante,
        $json_request,
        $json_response,
        $tipo_de_comprobante,
        $serie,
        $numero,
        $enlace,
        $aceptada_por_sunat,
        $sunat_description,
        $sunat_note,
        $sunat_responsecode,
        $sunat_soap_error,
        $anulado,
        $pdf_zip_base64,
        $xml_zip_base64,
        $cdr_zip_base64,
        $cadena_para_codigo_qr,
        $codigo_hash,
        $codigo_de_barras,
        $key,
        $digest_value,
        $enlace_del_pdf,
        $enlace_del_xml,
        $enlace_del_cdr

    ) {
        return $this->db->query(
            "
            INSERT INTO comprobantes_emitidos
            (
                id_comprobante_emitido,
                id_comprobante,
                json_request,
                json_response,
                tipo_de_comprobante,
                serie,
                numero,
                enlace,
                aceptada_por_sunat,
                sunat_description,
                sunat_note,
                sunat_responsecode,
                sunat_soap_error,
                anulado,
                pdf_zip_base64,
                xml_zip_base64,
                cdr_zip_base64,
                cadena_para_codigo_qr,
                codigo_hash,
                codigo_de_barras,
                `key`,
                digest_value,
                enlace_del_pdf,
                enlace_del_xml,
                enlace_del_cdr
            )
            VALUES
            (
                '',
                '$id_comprobante',
                '$json_request',
                '$json_response',
				'$tipo_de_comprobante',
				'$serie',
				'$numero',
				'$enlace',
				'$aceptada_por_sunat',
				'$sunat_description',
				'$sunat_note',
				'$sunat_responsecode',
				'$sunat_soap_error',
				'$anulado',
				'$pdf_zip_base64',
				'$xml_zip_base64',
				'$cdr_zip_base64',
				'$cadena_para_codigo_qr',
				'$codigo_hash',
				'$codigo_de_barras',
				'$key',
				'$digest_value',
				'$enlace_del_pdf',
				'$enlace_del_xml',
				'$enlace_del_cdr'
            )
            "
        );
    }

    public function actualizar_estado_comprobante_y_estado_sunat($id_comprobante, $aceptada_por_sunat)
    {
        return $this->db->query(
            "
            UPDATE comprobantes set
            id_estado_comprobante='902',
            id_estado_sunat='$aceptada_por_sunat'
            where id_comprobante='$id_comprobante'
            "
        );
    }

    public function actualizar_estado_sunat_aceptado($id_comprobante)
    {
        return $this->db->query(
            "
            UPDATE comprobantes set
            id_estado_sunat='1'
            where id_comprobante='$id_comprobante'
            "
        );
    }

    public function anular_comprobantes_electronicos(
        $id_comprobante,
        $motivo,
        $json_request,
        $json_response,
        $numero,
        $enlace,
        $sunat_ticket_numero,
        $aceptada_por_sunat,
        $sunat_description,
        $sunat_note,
        $sunat_responsecode,
        $sunat_soap_error,
        $pdf_zip_base64,
        $xml_zip_base64,
        $cdr_zip_base64,
        $enlace_del_pdf,
        $enlace_del_xml,
        $enlace_del_cdr,
        $key

    ) {
        return $this->db->query(
            "
            INSERT INTO comprobantes_anulados
            (
                id_comprobante_anulado,
                id_comprobante,
				motivo,
				json_request,
				json_response,
				numero,
				enlace,
				sunat_ticket_numero,
				aceptada_por_sunat,
				sunat_description,
				sunat_note,
				sunat_responsecode,
				sunat_soap_error,
				pdf_zip_base64,
				xml_zip_base64,
				cdr_zip_base64,
				enlace_del_pdf,
				enlace_del_xml,
				enlace_del_cdr,
                `key`
               )
            VALUES
            (
                '',
                '$id_comprobante',
                '$motivo',
                '$json_request',
                '$json_response',
                '$numero',
                '$enlace',
                '$sunat_ticket_numero',
                '$aceptada_por_sunat',
                '$sunat_description',
                '$sunat_note',
                '$sunat_responsecode',
                '$sunat_soap_error',
                '$pdf_zip_base64',
                '$xml_zip_base64',
                '$cdr_zip_base64',
                '$enlace_del_pdf',
                '$enlace_del_xml',
                '$enlace_del_cdr',
                '$key'
            )
            "
        );
    }

    public function actualizar_estado_sunat_anulado($id_comprobante)
    {
        return $this->db->query(
            "
            UPDATE comprobantes set
            id_estado_sunat='3'
            where id_comprobante='$id_comprobante'
            "
        );
    }
}
