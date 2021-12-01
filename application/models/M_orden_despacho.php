<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_orden_despacho extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query("
        select * from cotizacion
        ");
        return $resultados->result();
    }
}
