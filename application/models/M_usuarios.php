<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_usuarios extends CI_Model
{

  public function index()
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
      (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_rol) AS ds_rol_usuario
      FROM usuarios a
      LEFT JOIN trabajadores b ON b.id_trabajador=a.id_trabajador 
    "
    );
    return $resultados->result();
  }


  public function index_trabajadores()
  {
    $resultados = $this->db->query("
    SELECT 
    id_trabajador,
    CONCAT(nombres,' ',ape_paterno,' ',ape_materno) AS ds_nombre_usuario,
    nombres,
    ape_paterno,
    ape_materno,
    num_documento,
    id_empresa,
    celular,
    (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_cargo_trabajador) AS ds_cargo_trabajador,
    (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_empresa) AS ds_empresa,
    (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_almacen) AS ds_sucursal
    FROM trabajadores
    ");
    return $resultados->result();
  }

  public function validar_usuario_repetido_registrar($usuario)
  {
    $resultados = $this->db->query(
      "
      SELECT 
      COUNT(*) AS cantidad_usuario
      FROM usuarios
      WHERE usuario='$usuario';
      "
    );
    return $resultados->row();
  }

  public function validar_usuario_repetido_actualizar($id_usuario, $usuario)
  {
    $resultados = $this->db->query(
      "
      SELECT 
      COUNT(*) AS cantidad_usuario
      FROM usuarios
      WHERE id_usuario='$id_usuario' and usuario='$usuario';
      "
    );
    return $resultados->row();
  }

  public function registrar($usuario, $password, $id_empresa, $id_rol, $id_trabajador)
  {
    return $this->db->query(
      "
      INSERT INTO usuarios 
      (id_usuario,usuario,password,id_empresa,id_rol,id_trabajador) 
       VALUES
      ('','$usuario','$password','$id_empresa','$id_rol','$id_trabajador')
      "
    );
  }

  public function enlace_actualizar($id_usuario)
  {
    $resultados = $this->db->query(
      "
      SELECT
      a.id_usuario,
      a.usuario,
      a.password,
      a.id_empresa,
      a.id_rol,
      CONCAT(b.nombres,' ',b.ape_paterno,' ',b.ape_materno) AS ds_nombre_usuario,
      (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_empresa) AS ds_accesos_empresas,
      (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_empresa) AS ds_trabaja_rrhh,
      (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=b.id_almacen) AS ds_sucursal,
      (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_rol) AS ds_rol_usuario,
      b.id_trabajador
      FROM usuarios a
      LEFT JOIN trabajadores b ON b.id_trabajador=a.id_trabajador 
      where a.id_usuario='$id_usuario'
      "
    );
    return $resultados->row();
  }


  public function actualizar(
    $id_usuario,
    $usuario,
    $password,
    $id_empresa,
    $id_rol,
    $id_trabajador
  ) {
    return $this->db->query(
      "
      UPDATE usuarios
      set 
      usuario ='$usuario', password='$password',id_empresa='$id_empresa',
      id_rol='$id_rol',id_trabajador='$id_trabajador'
      where id_usuario='$id_usuario'
      "
    );
  }
}
