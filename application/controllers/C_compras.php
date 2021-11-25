<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_compras extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_compras");
        $this->load->model("M_cbox");
    }


    public function index()
    {
        $data = array(
            'index' => $this->M_compras->index(),
        );

        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('compras/V_index', $data);
    }

    public function index_modal()

    {
        $id_compras = $this->input->post("id_compras");
        $data = array(
            'detalle' => $this->M_compras->index_modal($id_compras),
            'cbox_tipo_comprobante' => $this->M_cbox->cbox_tipo_comprobante(),
            'cbox_mercaderia' => $this->M_cbox->cbox_mercaderia(),
            'cbox_condicion_pago' => $this->M_cbox->cbox_condicion_pago(),
            'cbox_medio_pago' => $this->M_cbox->cbox_medio_pago(),
            'cbox_moneda' => $this->M_cbox->cbox_moneda(),
            'cbox_cta_ent' => $this->M_cbox->cbox_cta_ent(),
            'cbox_transaccion' => $this->M_cbox->cbox_transaccion(),
            'cbox_banco' => $this->M_cbox->cbox_banco(),
            'cbox_leyenda' => $this->M_cbox->cbox_leyenda(),

        );

        $this->load->view('compras/V_index_modal', $data);
    }

    public function enlace_registrar()
    {
        $data = array(

            'proveedor' => $this->M_compras->proveedor(),
            'encargado' => $this->M_compras->encargado(),
            'cbox_tipo_comprobante' => $this->M_cbox->cbox_tipo_comprobante(),
            'cbox_mercaderia' => $this->M_cbox->cbox_mercaderia(),
            'cbox_condicion_pago' => $this->M_cbox->cbox_condicion_pago(),
            'cbox_medio_pago' => $this->M_cbox->cbox_medio_pago(),
            'cbox_medio_pago_voucher' => $this->M_cbox->cbox_medio_pago(),
            'cbox_moneda' => $this->M_cbox->cbox_moneda(),
            'cbox_moneda_voucher' => $this->M_cbox->cbox_moneda(),
            'cbox_cta_ent' => $this->M_cbox->cbox_cta_ent(),
            'cbox_transaccion' => $this->M_cbox->cbox_transaccion(),
            'cbox_banco' => $this->M_cbox->cbox_banco(),
            'cbox_leyenda' => $this->M_cbox->cbox_leyenda(),
        );

        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('compras/V_registrar', $data);
    }

    public function insertar()
    {
        //CABECERA
        $count = $this->input->post("count");
        $id_trabajador = $this->input->post("id_trabajador");
        $fecha_emision_voucher = $this->input->post("fecha_emision_voucher");
        $fecha_vencimiento_voucher = $this->input->post("fecha_vencimiento_voucher");
        $id_tipo_comprobante = $this->input->post("tipo_comprobante");
        $numero_serie = $this->input->post("numero_serie");
        $id_mercaderia = $this->input->post("mercaderia");
        $id_cliente_proveedor = $this->input->post("id_cliente_proveedor");
        $id_condicion_pago = $this->input->post("condicion_pago");
        $id_medio_pago = $this->input->post("medio_pago");
        $id_moneda = $this->input->post("moneda");
        $id_cta_ent = $this->input->post("cta_ent");
        $subtotal_factura = $this->input->post("subtotal_factura");
        $igv_factura = $this->input->post("igv_factura");
        $total_factura = $this->input->post("total_factura");
        $id_estado_compra = $this->input->post("estado_compra");
        $observacion_pago = $this->input->post("observacion_pago");

        // PAGOS DE COMPRAS
        $voucher_pago = $this->input->post("voucher_pago");
        $id_transaccion = $this->input->post("transaccion");
        $fecha_pago_voucher = $this->input->post("fecha_pago_voucher");
        $tipo_cambio = $this->input->post("tipo_cambio");
        $numero_deposito = $this->input->post("numero_deposito");
        $numero_letra_cheque = $this->input->post("numero_letra_cheque");
        $id_banco = $this->input->post("banco");
        $id_medio_pago_voucher = $this->input->post("medio_pago_voucher");
        $importe_pago = $this->input->post("importe_pago");
        $id_leyenda = $this->input->post("leyenda");
        $observacion_voucher = $this->input->post("observacion_voucher");
        $id_estado_voucher = $this->input->post("estado_voucher");

        //DETALLE

        // $dt_voucher_pago = $this->input->post("dt_voucher_pago");
        // $dt_fecha_pago_voucher = $this->input->post("dt_fecha_pago_voucher");
        // $dt_ds_medio_pago_voucher = $this->input->post("dt_ds_medio_pago_voucher");
        // $id_dt_medio_pago_voucher = $this->input->post("medio_pago_voucher");
        // $id_dt_banco = $this->input->post("dt_banco");
        // $dt_ds_banco = $this->input->post("dt_ds_banco");
        // $dt_importe_pago = $this->input->post("dt_importe_pago");
        // $id_dt_estado_voucher = $this->input->post("dt_estado_voucher");
        $total_deuda_voucher = $this->input->post("total_deuda_voucher");
        $monto_pagado_voucher = $this->input->post("monto_pagado_voucher");
        $monto_pendiente_voucher = $this->input->post("monto_pendiente_voucher");

        if ($this->M_compras->insertar(

            $id_trabajador,
            $fecha_emision_voucher,
            $fecha_vencimiento_voucher,
            $id_tipo_comprobante,
            $numero_serie,
            $id_mercaderia,
            $id_cliente_proveedor,
            $id_condicion_pago,
            $id_medio_pago,
            $id_moneda,
            $id_cta_ent,
            $subtotal_factura,
            $igv_factura,
            $total_factura,
            $id_estado_compra,
            $observacion_pago,
            $total_deuda_voucher,
            $monto_pagado_voucher,
            $monto_pendiente_voucher


        ))

            if ($count != "1") {

                $id_compras = $this->M_compras->lastID();
                $this->insertar_detalle(
                    $id_compras,
                    $voucher_pago,
                    $id_transaccion,
                    $fecha_pago_voucher,
                    $tipo_cambio,
                    $numero_deposito,
                    $numero_letra_cheque,
                    $id_banco,
                    $id_medio_pago_voucher,
                    $importe_pago,
                    $id_leyenda,
                    $observacion_voucher,
                    $id_estado_voucher

                );
                echo json_encode($id_compras);
            }
        echo json_encode($id_trabajador);
    }

    public function insertar_detalle(
        $id_compras,
        $voucher_pago,
        $id_transaccion,
        $fecha_pago_voucher,
        $tipo_cambio,
        $numero_deposito,
        $numero_letra_cheque,
        $id_banco,
        $id_medio_pago_voucher,
        $importe_pago,
        $id_leyenda,
        $observacion_voucher,
        $id_estado_voucher

    ) {
        for ($i = 0; $i < count($voucher_pago); $i++) {
            $this->M_compras->insertar_detalle(
                $id_compras,
                $voucher_pago[$i],
                $id_transaccion[$i],
                $fecha_pago_voucher[$i],
                $tipo_cambio[$i],
                $numero_deposito[$i],
                $numero_letra_cheque[$i],
                $id_banco[$i],
                $id_medio_pago_voucher[$i],
                $importe_pago[$i],
                $id_leyenda[$i],
                $observacion_voucher[$i],
                $id_estado_voucher[$i]

            );
        }
    }

    public function enlace_actualizar($id_compras)
    {

        $data = array(

            'enlace_actualizar' => $this->M_compras->enlace_actualizar($id_compras),
            'detalle_pagos' => $this->M_compras->detalle_pagos($id_compras),
            'proveedor' => $this->M_compras->proveedor(),
            'encargado' => $this->M_compras->encargado(),
            'cbox_tipo_comprobante' => $this->M_cbox->cbox_tipo_comprobante(),
            'cbox_mercaderia' => $this->M_cbox->cbox_mercaderia(),
            'cbox_condicion_pago' => $this->M_cbox->cbox_condicion_pago(),
            'cbox_medio_pago' => $this->M_cbox->cbox_medio_pago(),
            'cbox_medio_pago_voucher' => $this->M_cbox->cbox_medio_pago(),
            'cbox_moneda' => $this->M_cbox->cbox_moneda(),
            'cbox_moneda_voucher' => $this->M_cbox->cbox_moneda(),
            'cbox_cta_ent' => $this->M_cbox->cbox_cta_ent(),
            'cbox_transaccion' => $this->M_cbox->cbox_transaccion(),
            'cbox_banco' => $this->M_cbox->cbox_banco(),
            'cbox_leyenda' => $this->M_cbox->cbox_leyenda(),
        );

        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('compras/V_actualizar', $data);
    }

    // public function actualizar()
    // {

    //     $id_compras = $this->input->post("id_compras");
    //     $id_trabajador = $this->input->post("id_trabajador");
    //     $fecha_emision_voucher = $this->input->post("fecha_emision_voucher");
    //     $fecha_vencimiento_voucher = $this->input->post("fecha_vencimiento_voucher");
    //     $numero_serie = $this->input->post("numero_serie");
    //     $id_cliente_proveedor = $this->input->post("id_cliente_proveedor");
    //     $subtotal_factura = $this->input->post("subtotal_factura");
    //     $igv_factura = $this->input->post("igv_factura");
    //     $total_factura = $this->input->post("total_factura");
    //     $estado_compra = $this->input->post("estado_compra");
    //     $observacion_pago = $this->input->post("observacion_pago");
    //     $codigo_pago_voucher = $this->input->post("codigo_pago_voucher");
    //     $voucher_pago = $this->input->post("voucher_pago");
    //     $fecha_pago_voucher = $this->input->post("fecha_pago_voucher");
    //     $tipo_cambio = $this->input->post("tipo_cambio");
    //     $numero_letra_cheque = $this->input->post("numero_letra_cheque");
    //     $importe_pago = $this->input->post("importe_pago");
    //     $observacion_voucher = $this->input->post("observacion_voucher");
    //     $estado_voucher = $this->input->pot("estado_voucher");
    //     $total_deuda_voucher = $this->input->post("total_deuda_voucher");
    //     $beneficiario_pago = $this->input->post("beneficiario_pago");
    //     $numero_deposito = $this->input->post("numero_deposito");
    //     $monto_pagado_voucher = $this->input->post("monto_pagado_voucher");
    //     $monto_pendiente_voucher = $this->input->post("monto_pendiente_voucher");
    //     $tipo_comprobante = $this->input->post("tipo_comprobante");
    //     $mercaderia = $this->input->post("mercaderia");
    //     $condicion_pago = $this->input->post("condicion_pago");
    //     $medio_pago = $this->input->post("medio_pago");
    //     $moneda = $this->input->post("moneda");
    //     $cta_ent = $this->input->post("cta_ent");
    //     $transaccion = $this->input->post("transaccion");
    //     $banco = $this->input->post("banco");
    //     $medio_pago_voucher = $this->input->post("medio_pago_voucher");
    //     $medio_leyenda = $this->input->post("medio_leyenda");
    //     $moneda_voucher = $this->input->post("moneda_voucher");


    //     $this->M_compras->actualizar($id_compras, $id_trabajador, $fecha_emision_voucher, $fecha_vencimiento_voucher, $numero_serie,  $id_cliente_proveedor, $subtotal_factura, $igv_factura, $total_factura, $estado_compra, $observacion_pago, $codigo_pago_voucher, $voucher_pago, $fecha_pago_voucher, $tipo_cambio, $numero_letra_cheque, $importe_pago, $observacion_voucher, $estado_voucher, $total_deuda_voucher, $condicion_pago, $beneficiario_pago, $numero_deposito, $monto_pagado_voucher, $monto_pendiente_voucher, $tipo_comprobante, $mercaderia, $condicion_pago, $medio_pago, $moneda, $cta_ent, $transaccion, $banco, $medio_pago_voucher, $medio_leyenda, $moneda_voucher);

    //     echo json_encode($id_compras);
    // }

    // public function verificar_compras()
    // {

    //     $id_compras = $this->input->post("id_compras");
    //     $id_trabajador = $this->input->post("id_trabajador");
    //     $fecha_emision_voucher = $this->input->post("fecha_emision_voucher");
    //     $fecha_vencimiento_voucher = $this->input->post("fecha_vencimiento_voucher");
    //     $numero_serie = $this->input->post("numero_serie");
    //     $id_cliente_proveedor = $this->input->post("id_cliente_proveedor");
    //     $subtotal_factura = $this->input->post("subtotal_factura");
    //     $igv_factura = $this->input->post("igv_factura");
    //     $total_factura = $this->input->post("total_factura");
    //     $estado_compra = $this->input->post("estado_compra");
    //     $observacion_pago = $this->input->post("observacion_pago");
    //     $codigo_pago_voucher = $this->input->post("codigo_pago_voucher");
    //     $voucher_pago = $this->input->post("voucher_pago");
    //     $fecha_pago_voucher = $this->input->post("fecha_pago_voucher");
    //     $tipo_cambio = $this->input->post("tipo_cambio");
    //     $numero_letra_cheque = $this->input->post("numero_letra_cheque");
    //     $importe_pago = $this->input->post("importe_pago");
    //     $observacion_voucher = $this->input->post("observacion_voucher");
    //     $estado_voucher = $this->input->pot("estado_voucher");
    //     $total_deuda_voucher = $this->input->post("total_deuda_voucher");
    //     $beneficiario_pago = $this->input->post("beneficiario_pago");
    //     $numero_deposito = $this->input->post("numero_deposito");
    //     $monto_pagado_voucher = $this->input->post("monto_pagado_voucher");
    //     $monto_pendiente_voucher = $this->input->post("monto_pendiente_voucher");
    //     $tipo_comprobante = $this->input->post("tipo_comprobante");
    //     $mercaderia = $this->input->post("mercaderia");
    //     $condicion_pago = $this->input->post("condicion_pago");
    //     $medio_pago = $this->input->post("medio_pago");
    //     $moneda = $this->input->post("moneda");
    //     $cta_ent = $this->input->post("cta_ent");
    //     $transaccion = $this->input->post("transaccion");
    //     $banco = $this->input->post("banco");
    //     $medio_pago_voucher = $this->input->post("medio_pago_voucher");
    //     $medio_leyenda = $this->input->post("medio_leyenda");
    //     $moneda_voucher = $this->input->post("moneda_voucher");



    //     $data = $this->M_compras->verificar_compras($id_compras, $id_trabajador, $fecha_emision_voucher, $fecha_vencimiento_voucher, $numero_serie,  $id_cliente_proveedor, $subtotal_factura, $igv_factura, $total_factura, $estado_compra, $observacion_pago, $codigo_pago_voucher, $voucher_pago, $fecha_pago_voucher, $tipo_cambio, $numero_letra_cheque, $importe_pago, $observacion_voucher, $estado_voucher, $total_deuda_voucher, $condicion_pago, $beneficiario_pago, $numero_deposito, $monto_pagado_voucher, $monto_pendiente_voucher, $tipo_comprobante, $mercaderia, $condicion_pago, $medio_pago, $moneda, $cta_ent, $transaccion, $banco, $medio_pago_voucher, $medio_leyenda, $moneda_voucher);

    //     echo json_encode($data);
    // }

    // public function eliminar($id_compras)
    // {

    //     $this->M_compras->actualizar_estado($id_compras);
    //     redirect(base_url() . "C_compras");
    // }
}
