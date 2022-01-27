<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_productos extends CI_Model
{

    public function index()
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
        UPPER(descripcion_producto) as descripcion_producto,
        id_moneda,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
        precio_costo,
        porcentaje,
        ganancia_unidad,
        precio_unitario,
        rentabilidad,
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


    public function insertar(
        $codigo_producto,
        $descripcion_producto,
        $precio_costo,
        $precio_unitario,
        $porcentaje,
        $ganancia_unidad,
        $rentabilidad,
        $id_unidad_medida,
        $id_grupo,
        $id_familia,
        $id_clase,
        $id_sub_clase,
        $id_sub_clase_dos,
        $id_marca_producto,
        $id_moneda,
        $id_cta_vta,
        $id_cta_ent,
        $id_sunat,
        $id_almacen
    ) {
        return $this->db->query(
            "
        INSERT INTO productos
        (
            id_producto,codigo_producto,descripcion_producto,
            precio_costo,precio_unitario,porcentaje,ganancia_unidad,rentabilidad,
            id_unidad_medida,id_grupo,id_familia,id_clase,id_sub_clase,id_sub_clase_dos, 
            id_marca_producto,id_moneda,id_cta_vta,id_cta_ent,id_sunat,id_almacen
        )
        VALUES
        (
            '','$codigo_producto','$descripcion_producto',
            '$precio_costo','$precio_unitario','$porcentaje','$ganancia_unidad','$rentabilidad',
            '$id_unidad_medida','$id_grupo','$id_familia','$id_clase','$id_sub_clase','$id_sub_clase_dos',
            '$id_marca_producto','$id_moneda','$id_cta_vta','$id_cta_ent','$id_sunat','$id_almacen'
        )"
        );
    }


    public function enlace_actualizar($id_producto)
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
        rentabilidad,
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
        FROM productos where id_producto='$id_producto'");
        return $resultados->row();
    }


    public function actualizar(
        $id_producto,
        $codigo_producto,
        $descripcion_producto,
        $precio_costo,
        $precio_unitario,
        $porcentaje,
        $ganancia_unidad,
        $rentabilidad,
        $id_unidad_medida,
        $id_grupo,
        $id_familia,
        $id_clase,
        $id_sub_clase,
        $id_sub_clase_dos,
        $id_marca_producto,
        $id_moneda,
        $id_cta_vta,
        $id_cta_ent,
        $id_sunat,
        $id_almacen
    ) {
        return $this->db->query("
        update productos set
        codigo_producto='$codigo_producto',
        descripcion_producto ='$descripcion_producto',
        precio_costo='$precio_costo',
        precio_unitario='$precio_unitario',
        porcentaje='$porcentaje',
        ganancia_unidad='$ganancia_unidad',
        rentabilidad='$rentabilidad',
        id_unidad_medida='$id_unidad_medida',
        id_grupo='$id_grupo',
        id_familia='$id_familia',
        id_clase='$id_clase',
        id_sub_clase='$id_sub_clase',
        id_sub_clase_dos='$id_sub_clase_dos',
        id_marca_producto='$id_marca_producto',
        id_moneda='$id_moneda',
        id_cta_vta='$id_cta_vta',
        id_cta_ent='$id_cta_ent',
        id_sunat='$id_sunat',
        id_almacen='$id_almacen'
        WHERE id_producto='$id_producto'");
    }
}
