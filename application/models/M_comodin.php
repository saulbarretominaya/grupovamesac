<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_comodin extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query("
         SELECT
         id_unidad_medida,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_unidad_medida) AS ds_unidad_medida,
        id_moneda,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
        id_marca_producto,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_marca_producto) AS ds_marca_producto,
        id_comodin,
        codigo_producto,
        descripcion_producto,
        nombre_proveedor,
        precio_unitario
        FROM comodin
        ");
        return $resultados->result();
    }


    public function insertar(
        $codigo_producto,
        $descripcion_producto,
        $id_unidad_medida,
        $id_marca_producto,
        $precio_unitario,
        $id_moneda,
        $nombre_proveedor

    ) {
        return $this->db->query(
            "
        INSERT INTO comodin
        (
            id_comodin,codigo_producto ,descripcion_producto ,id_unidad_medida,id_marca_producto,
             precio_unitario,id_moneda,nombre_proveedor   
        )
        VALUES
        (
            '','$codigo_producto','$descripcion_producto', '$id_unidad_medida',
       ' $id_marca_producto',
        '$precio_unitario',
        '$id_moneda',
        '$nombre_proveedor'
            
        )"
        );
    }


    public function enlace_actualizar($id_comodin)
    {
        $resultados = $this->db->query("
            SELECT
            *
            FROM comodin
            WHERE id_comodin = '$id_comodin'
               ");
        return $resultados->row();
    }


    public function actualizar(
        $id_comodin,
        $codigo_producto,
        $descripcion_producto,
        $id_unidad_medida,
        $id_marca_producto,
        $precio_unitario,
        $id_moneda,
        $nombre_proveedor

    ) {
        return $this->db->query("
        update comodin set
                codigo_producto='$codigo_producto',
                descripcion_producto='$descripcion_producto',
                id_unidad_medida='$id_unidad_medida',
                id_marca_producto='$id_marca_producto',
                precio_unitario='$precio_unitario',
                id_moneda='$id_moneda',
                nombre_proveedor='$nombre_proveedor'
        where id_comodin='$id_comodin'
    ");
    }
}
