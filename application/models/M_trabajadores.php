
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_trabajadores extends CI_Model
{
    public function index()
    {
        $resultados = $this->db->query(
            "select * from trabajadores where id_estado=1"
        );
        return $resultados->result();
    }

    public function index_modal($id_trabajador)
    {
        $this->db->where("id_trabajador", $id_trabajador);
        $resultados = $this->db->get("trabajadores");
        return $resultados->row();
    }

    public function insertar($num_documento, $nombres, $ape_paterno, $ape_materno, $email, $fecha_nacimiento, $lugar_nacimiento, $domicilio, $referencia, $telefono, $celular, $tipo_trabajador, $tipo_documento, $almacen, $cargo_trabajador, $sexo, $nacionalidad, $estado_civil, $grado_instruccion, $departamento, $provincia, $distrito)
    {
        return $this->db->query("INSERT INTO trabajadores 
        (id_trabajador,num_documento, nombres, ape_paterno, ape_materno, email, fecha_nacimiento, lugar_nacimiento, domicilio, referencia, telefono, celular, id_tipo_trabajador, id_tipo_documento, id_almacen, id_cargo_trabajador, id_sexo, id_nacionalidad, id_est_civil, id_grado_instruccion, id_departamento, id_provincia, id_distrito, id_estado)
        VALUES ('','$num_documento', '$nombres', '$ape_paterno', '$ape_materno', '$email', STR_TO_DATE(REPLACE('$fecha_nacimiento','/','.') ,GET_FORMAT(date,'EUR')), '$lugar_nacimiento', '$domicilio', '$referencia', '$telefono', '$celular', '$tipo_trabajador', '$tipo_documento', '$almacen', '$cargo_trabajador', '$sexo', '$nacionalidad', '$estado_civil', '$grado_instruccion', '$departamento', '$provincia', '$distrito','1')");
    }

    //  STR_TO_DATE(REPLACE('$fecha_nacimiento','/','-'))
    //  STR_TO_DATE(REPLACE('$fecha_nacimiento','/','.') ,GET_FORMAT(date,'EUR'))
    // http://codigolinea.com/insertando-fechas-con-diferente-formato-en-mysql/


    public function enlace_actualizar($id_trabajador)
    {
        $this->db->where("id_trabajador", $id_trabajador);
        $resultados = $this->db->get("trabajadores");
        return $resultados->row();
    }


    public function actualizar($id_trabajador, $num_documento, $nombres, $ape_paterno, $ape_materno, $email, $fecha_nacimiento, $lugar_nacimiento, $domicilio, $referencia, $telefono, $celular, $tipo_trabajador, $tipo_documento, $almacen, $cargo_trabajador, $sexo, $nacionalidad, $estado_civil, $grado_instruccion, $departamento, $provincia, $distrito)
    {
        return $this->db->query("UPDATE trabajadores SET num_documento='$num_documento' , nombres = '$nombres', ape_paterno ='$ape_paterno',    ape_materno = '$ape_materno', email ='$email', fecha_nacimiento = STR_TO_DATE(REPLACE('$fecha_nacimiento','/','.') ,GET_FORMAT(date,'EUR')), lugar_nacimiento='$lugar_nacimiento', domicilio ='$domicilio',referencia ='$referencia', telefono ='$telefono', celular ='$celular', id_tipo_trabajador ='$tipo_trabajador', id_almacen ='$almacen', id_cargo_trabajador ='$cargo_trabajador', id_sexo ='$sexo', id_tipo_documento='$tipo_documento', id_nacionalidad ='$nacionalidad', id_est_civil ='$estado_civil', id_grado_instruccion ='$grado_instruccion', id_departamento ='$departamento', id_provincia ='$provincia', id_distrito ='$distrito'   WHERE  id_trabajador='$id_trabajador'");
    }


    public function verificar_trabajador($num_documento, $nombres, $ape_paterno, $ape_materno, $email, $fecha_nacimiento, $lugar_nacimiento, $domicilio, $referencia, $telefono, $celular, $tipo_trabajador, $tipo_documento, $almacen, $cargo_trabajador, $sexo, $nacionalidad, $estado_civil, $grado_instruccion, $departamento, $provincia, $distrito)
    {
        $resultados = $this->db->query("SELECT * from trabajadores WHERE num_documento='$num_documento' && nombres = '$nombres' && ape_paterno ='$ape_paterno' && ape_materno && '$ape_materno' && email ='$email' && fecha_nacimiento ='$fecha_nacimiento' && lugar_nacimiento='$lugar_nacimiento' && domicilio ='$domicilio' && referencia ='$referencia' && telefono ='$telefono' && celular ='$celular' && id_tipo_trabajador ='$tipo_trabajador' && id_almacen ='$almacen' && id_cargo_trabajador ='$cargo_trabajador' && id_sexo ='$sexo' && id_tipo_documento='$tipo_documento' && id_nacionalidad ='$nacionalidad' && id_est_civil ='$estado_civil' && id_grado_instruccion ='$grado_instruccion' && id_departamento ='$departamento' && id_provincia ='$provincia' && id_distrito ='$distrito'");

        return $resultados->row();
    }


    public function actualizar_estado($id_trabajador)
    {
        return $this->db->query(" UPDATE trabajadores SET  id_estado='0'
                                    WHERE id_trabajador='$id_trabajador'");
    }
}
