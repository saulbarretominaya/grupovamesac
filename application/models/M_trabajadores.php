
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_trabajadores extends CI_Model
{

    public function index()
    {
        $resultados = $this->db->query(
            "SELECT*FROM trabajadores"
        );
        return $resultados->result();
    }
}
