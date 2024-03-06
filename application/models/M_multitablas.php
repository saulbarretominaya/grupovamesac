
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_multitablas extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "
            SELECT*FROM multitablas 
            "
        );
        return $resultados->result();
    }

    public function index_modal_cabecera($id_multitabla)
    {
        $resultados = $this->db->query(
            "
            SELECT*FROM multitablas WHERE id_multitabla='$id_multitabla'
            "
        );
        return $resultados->row();
    }

    public function index_modal_detalle($id_multitabla)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            a.id_multitabla, -- MULTITABLAS
            b.id_dmultitabla,b.abreviatura,b.descripcion -- DETALLE DE MULTITABLAS
            FROM multitablas a
            LEFT JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla
            WHERE a.id_multitabla='$id_multitabla' and id_estado_dmultitabla='1';
            "
        );
        return $resultados->result();
    }

    public function insertar($nombre_tabla)
    {
        return $this->db->query(
            "
        INSERT INTO multitablas VALUES ('','$nombre_tabla')
        "
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function insertar_detalle($id_multitabla, $abreviatura, $descripcion)
    {
        return $this->db->query("
        INSERT INTO detalle_multitablas VALUES ('','$id_multitabla','$abreviatura','$descripcion',NULL,NULL,NULL,'1')
        ");
    }

    public function actualizar($id_multitabla, $nombre_tabla)
    {
        return $this->db->query("UPDATE multitablas SET nombre_tabla ='$nombre_tabla'
        WHERE id_multitabla='$id_multitabla'");
    }

    public function actualizar_detalle($id_dmultitabla_actualizar, $abreviatura_actualizar, $descripcion_actualizar)
    {
        return $this->db->query("
        UPDATE detalle_multitablas 
        SET abreviatura='$abreviatura_actualizar',descripcion='$descripcion_actualizar'
        WHERE id_dmultitabla ='$id_dmultitabla_actualizar'
        ");
    }

    public function eliminar_detalle($id_dmultitabla)
    {
        return $this->db->query("
        UPDATE detalle_multitablas 
        SET id_estado_dmultitabla='0'
        WHERE id_dmultitabla ='$id_dmultitabla' 
        ");
    }

    public function cabecera($id_multitabla)
    {
        $resultados = $this->db->query("
        SELECT*FROM multitablas WHERE id_multitabla='$id_multitabla'");
        return $resultados->row();
    }

    public function detalle($id_multitabla)
    {
        $resultados = $this->db->query("
        SELECT 
        a.id_multitabla, -- MULTITABLAS
        b.id_dmultitabla,b.abreviatura,b.descripcion -- DETALLE DE MULTITABLAS
        FROM multitablas a
        LEFT JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla
        WHERE a.id_multitabla='$id_multitabla' and id_estado_dmultitabla='1';
        ");
        return $resultados->result();
    }
}
