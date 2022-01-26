<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_inicio extends CI_Model
{

  public function ingresar($usuario, $contraseña)
  {
    $resultados = $this->db->query(
      "
      SELECT
      a.id_usuario,
      a.usuario,
      CONCAT(b.nombres,' ',b.ape_paterno,' ',b.ape_materno) AS ds_nombre_usuario,
      (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_empresa) AS ds_accesos_empresas,
      (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_empresa) AS ds_trabaja_rrhh,
      (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_almacen) AS ds_sucursal,
      (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_rol) AS ds_rol_usuario,
      (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_cargo_trabajador) AS ds_cargo_trabajador
      FROM usuarios a
      LEFT JOIN trabajadores b ON b.id_trabajador=a.id_trabajador
      WHERE a.usuario= '$usuario' AND a.password ='$contraseña'
    "
    );
    return $resultados->row();
  }
}
