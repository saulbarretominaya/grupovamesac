<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_inicio extends CI_Model
{

  public function ingresar($usuario, $contraseña)
  {
    $resultados = $this->db->query("
    SELECT
    a.id_usuario, 
    a.usuario,
    a.password,
    CONCAT(b.nombres,' ',b.ape_paterno,' ',b.ape_materno) AS ds_nombre_usuario,
    a.id_rol,
    (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_rol) AS ds_rol_usuario,
    a.id_empresa,
    (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_empresa) AS ds_empresa
    FROM usuarios a
    LEFT JOIN trabajadores b ON b.id_trabajador=a.id_trabajador
    WHERE a.usuario= '$usuario' AND a.password ='$contraseña'");
    return $resultados->row();
  }
}
