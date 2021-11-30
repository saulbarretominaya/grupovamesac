<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_usuarios extends CI_Model
{

  public function index()
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
    ");
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
    (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_empresa) AS ds_empresa
    FROM trabajadores
    ");
    return $resultados->result();
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
    b.id_trabajador,
    CONCAT(b.nombres,' ',b.ape_paterno,' ',b.ape_materno) AS ds_nombre_usuario,
    a.id_rol,
    (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_rol) AS ds_rol_usuario,
    a.id_empresa,
    (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_empresa) AS ds_empresa
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
