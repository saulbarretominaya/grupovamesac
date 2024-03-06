<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_comodin extends CI_Model
{

    public function index()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query("
         SELECT
         a.id_comodin,
         a.id_comodin_empresa,
         (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_categoria_comodin) AS ds_categoria_comodin,
         (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_unidad_medida) AS ds_unidad_medida,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_marca_producto) AS ds_marca_producto,
        a.codigo_producto,
        a.descripcion_producto,
        a.nombre_proveedor,
        a.precio_unitario,
        a.ds_nombre_trabajador
        FROM comodin a
        WHERE a.id_empresa='$id_empresa'
        ORDER BY a.id_comodin DESC
        ");
        return $resultados->result();
    }

    public function registrar_grupo_vame_comodin()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_comodin
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

    public function registrar_inversiones_alpev_comodin()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_comodin
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

    public function registrar(
        $id_categoria_comodin,
        $codigo_producto,
        $descripcion_producto,
        $id_unidad_medida,
        $id_marca_producto,
        $precio_unitario,
        $id_moneda,
        $nombre_proveedor,
        $id_trabajador,
        $ds_nombre_trabajador,
        $id_comodin_empresa,
        $id_empresa
    ) {
        return $this->db->query(
            "
            INSERT INTO comodin
            (
            id_comodin,id_categoria_comodin,
            codigo_producto, descripcion_producto, id_unidad_medida, 
            id_marca_producto,precio_unitario,id_moneda,nombre_proveedor,
            id_trabajador,ds_nombre_trabajador,id_comodin_empresa,id_empresa
            )
            VALUES
            (
            '','$id_categoria_comodin',
            '$codigo_producto','$descripcion_producto', '$id_unidad_medida',
            '$id_marca_producto','$precio_unitario','$id_moneda','$nombre_proveedor',
            '$id_trabajador','$ds_nombre_trabajador','$id_comodin_empresa','$id_empresa'
            )
            "
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
        $id_categoria_comodin,
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
            update comodin set
            id_categoria_comodin='$id_categoria_comodin',
            codigo_producto='$codigo_producto',
            descripcion_producto='$descripcion_producto',
            id_unidad_medida='$id_unidad_medida',
            id_marca_producto='$id_marca_producto',
            precio_unitario='$precio_unitario',
            id_moneda='$id_moneda',
            nombre_proveedor='$nombre_proveedor'
            where id_comodin='$id_comodin'
            "
        );
    }
}
