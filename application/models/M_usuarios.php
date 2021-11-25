<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_usuarios extends CI_Model
{

  public function index()
  {
    $resultados = $this->db->query("
    SELECT 
    id_trabajador,
    usuario,
    password,
    CONCAT(nombres,' ',ape_paterno,' ',ape_materno) AS ds_nombres,
    id_rol,
    (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_rol) AS ds_rol_usuario,
    num_documento,
    id_empresa,
    celular
    FROM trabajadores
    WHERE usuario IS NOT NULL
        ");
    return $resultados->result();
  }

  public function index_trabajadores()
  {
    $resultados = $this->db->query("
    SELECT 
    id_trabajador,
    usuario, 
    password,
    CONCAT(nombres,' ',ape_paterno,' ',ape_materno) AS ds_nombres,
    nombres,
    ape_paterno,
    ape_materno,
    num_documento,
    id_empresa,
    celular
    FROM trabajadores
    WHERE usuario IS NULL
");
    return $resultados->result();
  }


  public function registrar($id_trabajador, $usuario, $password, $id_rol)
  {
    return $this->db->query("
    UPDATE trabajadores
    set usuario ='$usuario', password='$password',id_rol='$id_rol'
    where id_trabajador='$id_trabajador'
");
  }

  public function enlace_actualizar($id_trabajador)
  {
    $resultados = $this->db->query("
      SELECT 
      id_trabajador,
      usuario,
      password,
      CONCAT(nombres,' ',ape_paterno,' ',ape_materno) AS ds_nombres,
      id_rol,
      (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=id_rol) AS ds_rol_usuario,
      num_documento,
      id_empresa,
      celular
      FROM trabajadores
      WHERE id_trabajador = '$id_trabajador'
      ");
    return $resultados->row();
  }


  public function actualizar($id_trabajador, $usuario, $password, $id_rol)
  {
    return $this->db->query("
    UPDATE trabajadores
    set usuario ='$usuario', password='$password',id_rol='$id_rol'
    where id_trabajador='$id_trabajador'
");
  }
}
