<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_usuarios extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query("
      SELECT * FROM trabajadores WHERE usuario IS NOT NULL
        ");
        return $resultados->result();
    }
}
