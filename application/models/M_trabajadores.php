
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_trabajadores extends CI_Model
{
    public function index()
    {
        $resultados = $this->db->query(
            "select * from trabajadores"
        );
        return $resultados->result();
    }


    // public function insertar($nombre_tabla)
    // {
    //     return $this->db->query("INSERT INTO multitablas VALUES ('','$nombre_tabla');");
    // }


    public function insertar($data)
    {
        return $this->db->insert("trabajadores", $data);
    }
}
