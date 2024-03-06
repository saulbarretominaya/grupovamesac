
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_trabajadores extends CI_Model
{
    public function index()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query(
            "
        SELECT
        a.id_trabajador_empresa,a.nombres,a.ape_materno,a.ape_paterno,a.num_documento,a.celular,a.id_trabajador,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_tipo_documento) AS ds_tipo_documento,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_empresa) AS ds_empresa,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_almacen) AS ds_sucursal,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_cargo_trabajador) AS ds_cargo_trabajador
        FROM trabajadores a
        WHERE a.id_empresa='$id_empresa'
        "
        );
        return $resultados->result();
    }

    public function index_modal_cabecera($id_trabajador)
    {
        $resultados = $this->db->query(
            "
            SELECT
            nombres,ape_materno,ape_paterno,num_documento,celular,id_trabajador,
            email,fecha_nacimiento,num_documento,referencia,telefono,celular,
            lugar_nacimiento,domicilio,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_nacionalidad) AS ds_nacionalidad,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_departamento) AS ds_departamento,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_provincia) AS ds_provincia,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_distrito) AS ds_distrito,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_est_civil) AS ds_estado_civil,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_grado_instruccion) AS ds_grado_instruccion,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_trabajador) AS ds_tipo_trabajador,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_empresa) AS ds_empresa,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_almacen) AS ds_sucursal,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_tipo_documento) AS ds_tipo_documento,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_sexo) AS ds_tipo_sexo,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_cargo_trabajador) AS ds_cargo_trabajador
            FROM trabajadores a
        where id_trabajador='$id_trabajador'
        "
        );
        return $resultados->row();
    }

    public function registrar_grupo_vame_trabajadores()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_trabajadores
            (
            id_grupo_vame
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function registrar_inversiones_alpev_trabajadores()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_trabajadores
            (
            id_inversion_alpev
            )
            VALUES
            (
            ''
            )
            "
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function registrar(
        $num_documento,
        $nombres,
        $ape_paterno,
        $ape_materno,
        $email,
        $fecha_nacimiento,
        $lugar_nacimiento,
        $domicilio,
        $referencia,
        $telefono,
        $celular,
        $tipo_trabajador,
        $tipo_documento,
        $almacen,
        $cargo_trabajador,
        $sexo,
        $nacionalidad,
        $estado_civil,
        $grado_instruccion,
        $departamento,
        $provincia,
        $distrito,
        $id_empresa,
        $id_trabajador_empresa
    ) {
        return $this->db->query(
            "
        INSERT INTO trabajadores 
        (
         id_trabajador,
         num_documento, nombres, ape_paterno, ape_materno, email, fecha_nacimiento,
         lugar_nacimiento, domicilio, referencia, telefono, celular, id_tipo_trabajador, 
         id_tipo_documento, id_almacen, id_cargo_trabajador, id_sexo, id_nacionalidad, 
         id_est_civil, id_grado_instruccion, id_departamento, id_provincia, id_distrito, id_empresa,id_trabajador_empresa
        )
        VALUES 
        (
         '',
        '$num_documento', '$nombres', '$ape_paterno', '$ape_materno', '$email', STR_TO_DATE(REPLACE('$fecha_nacimiento','/','.') ,
        GET_FORMAT(date,'EUR')), '$lugar_nacimiento', '$domicilio', '$referencia', '$telefono', '$celular', '$tipo_trabajador',
        '$tipo_documento', '$almacen', '$cargo_trabajador', '$sexo', '$nacionalidad',
        '$estado_civil', '$grado_instruccion', '$departamento', '$provincia', '$distrito','$id_empresa','$id_trabajador_empresa'
        )
        "
        );
    }

    public function enlace_actualizar($id_trabajador)
    {
        $this->db->where("id_trabajador", $id_trabajador);
        $resultados = $this->db->get("trabajadores");
        return $resultados->row();
    }

    public function actualizar(
        $id_trabajador,
        $num_documento,
        $nombres,
        $ape_paterno,
        $ape_materno,
        $email,
        $fecha_nacimiento,
        $lugar_nacimiento,
        $domicilio,
        $referencia,
        $telefono,
        $celular,
        $tipo_trabajador,
        $tipo_documento,
        $almacen,
        $cargo_trabajador,
        $sexo,
        $nacionalidad,
        $estado_civil,
        $grado_instruccion,
        $departamento,
        $provincia,
        $distrito,
        $id_empresa
    ) {
        return $this->db->query(
            "
        UPDATE trabajadores SET num_documento='$num_documento' , nombres = '$nombres', ape_paterno ='$ape_paterno',
        ape_materno = '$ape_materno', email ='$email', fecha_nacimiento = STR_TO_DATE(REPLACE('$fecha_nacimiento','/','.'),
        GET_FORMAT(date,'EUR')), lugar_nacimiento='$lugar_nacimiento', domicilio ='$domicilio',referencia ='$referencia',
        telefono ='$telefono', celular ='$celular', id_tipo_trabajador ='$tipo_trabajador', id_almacen ='$almacen',
        id_cargo_trabajador ='$cargo_trabajador', id_sexo ='$sexo', id_tipo_documento='$tipo_documento',
        id_nacionalidad ='$nacionalidad', id_est_civil ='$estado_civil', id_grado_instruccion ='$grado_instruccion',
        id_departamento ='$departamento', id_provincia ='$provincia', id_distrito ='$distrito',id_empresa='$id_empresa' 
        WHERE  id_trabajador='$id_trabajador'
        "
        );
    }
}
