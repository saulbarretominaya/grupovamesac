
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
        return $this->db->query("INSERT INTO MULTITABLAS VALUES ('','$nombre_tabla'");
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
        a.id_multitabla AS codigo, -- MULTITABLAS
        b.id_dmultitabla AS correlativo,b.abreviatura,b.descripcion -- DETALLE DE MULTITABLAS
        FROM multitablas a
        LEFT JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla
        WHERE a.id_multitabla='$id_multitabla'
        ");
        return $resultados->result();
    }
}
