<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_cotizacion extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query("
       
        ");
        return $resultados->result();
    }


    public function insertar(
        $validez_oferta,
        $direccion,
        $lugar_entrega,
        $clausula,
        $correo_electronico
    ) {
        return $this->db->query(
            "
        INSERT INTO cotizacion
        (
            id_cotizacion,
            validez_oferta,direccion,lugar_entrega,clausula,correo_electronico
        )
        VALUES
        (
            '',
            '$validez_oferta','$direccion','$lugar_entrega','$clausula','$correo_electronico'
        )"
        );
    }

    public function index_productos()
    {
        $resultados = $this->db->query("
        SELECT 
        id_producto,
        codigo_producto,
        id_almacen,
        (select abreviatura from detalle_multitablas where id_dmultitabla=id_almacen) as ds_almacen,
        id_unidad_medida,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_unidad_medida) AS ds_unidad_medida,
        id_sunat,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_sunat) AS ds_codigo_sunat,
        LEFT(descripcion_producto,30) as descripcion_producto,
        id_moneda,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
        precio_costo,
        porcentaje,
        ganancia_unidad,
        precio_venta,
        rentabilidad
        id_grupo,
        (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_grupo) AS ds_grupo,
        id_familia,
        (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_familia) AS ds_familia,
        id_clase,
        (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_clase) AS ds_clase,
        id_sub_clase,
        (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_sub_clase) AS ds_sub_clase,
        id_sub_clase_dos,
        (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_sub_clase_dos) AS ds_sub_clase_dos,
        id_marca,
        (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_marca) AS ds_marca,
        id_cta_vta,
        (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_cta_vta) AS ds_cta_vta,
        id_cta_ent,
        (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_cta_ent) AS ds_cta_ent,
        stock
        FROM productos
        ORDER BY id_producto ASC
        ");
        return $resultados->result();
    }
}
