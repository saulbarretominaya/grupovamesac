
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_trabajadores extends CI_Model
{
    public function index()
    {
        $resultados = $this->db->query(
            "
        SELECT
        a.nombres,a.ape_materno,a.ape_paterno,a.num_documento,a.celular,id_trabajador,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_tipo_documento) AS ds_tipo_documento,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_empresa) AS ds_empresa
        FROM trabajadores a
        "
        );
        return $resultados->result();
    }

    public function index_modal($id_trabajador)
    {
        $this->db->where("id_trabajador", $id_trabajador);
        $resultados = $this->db->get("trabajadores");
        return $resultados->row();
    }

    public function insertar(
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
        return $this->db->query("INSERT INTO trabajadores 
        (id_trabajador,num_documento, nombres, ape_paterno, ape_materno, email, fecha_nacimiento, lugar_nacimiento, domicilio, referencia, telefono, celular, id_tipo_trabajador, id_tipo_documento, id_almacen, id_cargo_trabajador, id_sexo, id_nacionalidad, id_est_civil, id_grado_instruccion, id_departamento, id_provincia, id_distrito, id_empresa)
        VALUES ('','$num_documento', '$nombres', '$ape_paterno', '$ape_materno', '$email', STR_TO_DATE(REPLACE('$fecha_nacimiento','/','.') ,GET_FORMAT(date,'EUR')), '$lugar_nacimiento', '$domicilio', '$referencia', '$telefono', '$celular', '$tipo_trabajador', '$tipo_documento', '$almacen', '$cargo_trabajador', '$sexo', '$nacionalidad', '$estado_civil', '$grado_instruccion', '$departamento', '$provincia', '$distrito','$id_empresa')");
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
        return $this->db->query("UPDATE trabajadores SET num_documento='$num_documento' , nombres = '$nombres', ape_paterno ='$ape_paterno',    ape_materno = '$ape_materno', email ='$email', fecha_nacimiento = STR_TO_DATE(REPLACE('$fecha_nacimiento','/','.') ,GET_FORMAT(date,'EUR')), lugar_nacimiento='$lugar_nacimiento', domicilio ='$domicilio',referencia ='$referencia', telefono ='$telefono', celular ='$celular', id_tipo_trabajador ='$tipo_trabajador', id_almacen ='$almacen', id_cargo_trabajador ='$cargo_trabajador', id_sexo ='$sexo', id_tipo_documento='$tipo_documento', id_nacionalidad ='$nacionalidad', id_est_civil ='$estado_civil', id_grado_instruccion ='$grado_instruccion', id_departamento ='$departamento', id_provincia ='$provincia', id_distrito ='$distrito',id_empresa='$id_empresa' WHERE  id_trabajador='$id_trabajador'");
    }
}
