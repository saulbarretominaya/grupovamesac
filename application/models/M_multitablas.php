
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_multitablas extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "SELECT*FROM multitablas"
        );
        return $resultados->result();
    }

    public function insertar($nombre_tabla)
    {
        return $this->db->query("INSERT INTO MULTITABLAS VALUES ('','$nombre_tabla');");
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function insertar_detalle($id_multitabla, $abreviatura, $descripcion)
    {
        return $this->db->query("INSERT INTO DETALLE_MULTITABLAS VALUES ('','$id_multitabla','$abreviatura','$descripcion')");
    }

    public function actualizar($id_multitabla, $nombre_tabla)
    {
        return $this->db->query("UPDATE multitablas SET nombre_tabla ='$nombre_tabla'
        WHERE id_multitabla='$id_multitabla'");
    }

    public function eliminar_detalle($id_dmultitabla)
    {
        return $this->db->query("DELETE from detalle_multitablas WHERE id_dmultitabla ='$id_dmultitabla'");
    }



    public function cabecera($id_multitabla)
    {
        $resultados = $this->db->query("
        SELECT*FROM multitablas WHERE id_multitabla='$id_multitabla'");
        return $resultados->row();
    }

    public function detalle($id_multitabla)
    {
        $resultados = $this->db->query("SELECT 
        a.id_multitabla, -- MULTITABLAS
        b.id_dmultitabla,b.abreviatura,b.descripcion -- DETALLE DE MULTITABLAS
        FROM multitablas a
        LEFT JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla
        WHERE a.id_multitabla='$id_multitabla'
        ");
        return $resultados->result();
    }
}
