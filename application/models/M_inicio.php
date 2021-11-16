<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_inicio extends CI_Model
{

  public function ingresar($usuario, $contraseña)
  {
    $resultados = $this->db->query("
    SELECT * FROM trabajadores WHERE usuario= '$usuario' AND password ='$contraseña'");
    return $resultados->row();
  }
}
