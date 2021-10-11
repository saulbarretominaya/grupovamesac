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
        (select descripcion from detalle_multitablas where id_dmultitabla=id_almacen) as ds_almacen,
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
        codigo_tablero,
        id_almacen,
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
}
