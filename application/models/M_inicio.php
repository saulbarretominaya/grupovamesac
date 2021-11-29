<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_inicio extends CI_Model
{

  public function ingresar($usuario, $contraseña)
  {
    $resultados = $this->db->query("
    SELECT 
    id_trabajador,
    usuario,
    PASSWORD,
    CONCAT(nombres,' ',ape_paterno,' ',ape_materno) AS ds_nombre_trabajador,
    id_rol,
    (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_rol) AS ds_rol_usuario,
    num_documento,
    id_empresa,
    celular
    FROM trabajadores
    WHERE usuario= '$usuario' AND password ='$contraseña'");
    return $resultados->row();
  }
}
