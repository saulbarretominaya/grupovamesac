
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_cbox extends CI_Model
{

    /* COMBOX PRODUCTOS  */
    //1
    public function cbox_unidad_medida()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='1';");
        return $resultados->result();
    }
    //2
    public function cbox_grupo()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='2';");
        return $resultados->result();
    }
    //3
    public function cbox_familia()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='3';");
        return $resultados->result();
    }
    //4
    public function cbox_clase()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='4';");
        return $resultados->result();
    }
    //5
    public function cbox_sub_clase()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='5';");
        return $resultados->result();
    }
    //6
    public function cbox_sub_clase_dos()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='6';");
        return $resultados->result();
    }
    //7
    public function cbox_marca()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='7';");
        return $resultados->result();
    }
    //8
    public function cbox_moneda()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='8';");
        return $resultados->result();
    }
    //9
    public function cbox_cta_vta()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='9';");
        return $resultados->result();
    }
    //10
    public function cbox_cta_ent()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='10';");
        return $resultados->result();
    }

    //22
    public function cbox_codigos_sunat()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='22';");
        return $resultados->result();
    }
    //23
    public function cbox_almacen()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='23';");
        return $resultados->result();
    }

    //24
    public function correlativo_producto()
    {
        $resultados = $this->db->query("
          SELECT 
          b.id_multitabla,
          b.descripcion,
          b.correlativo+1 AS correlativo_producto
          FROM multitablas a 
          INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
          WHERE b.id_multitabla='24';");
        return $resultados->result();
    }


    public function actualizar_correlativo_producto($codigo_producto)
    {
        $resultados = $this->db->query("
          UPDATE detalle_multitablas SET correlativo='$codigo_producto'
          WHERE id_multitabla='24';");
    }

    /*FIN DE COMBOX PRODUCTOS */



    /* COMBOX TRABAJADORES */
    //11
    public function cbox_tipo_trabajador()
    {
        $resultados = $this->db->query("
          SELECT a.*,b.* FROM multitablas a 
          INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
          WHERE b.id_multitabla='11';");
        return $resultados->result();
    }
    //12
    public function cbox_tipo_documento()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='12';");
        return $resultados->result();
    }
    //13
    public function cbox_local()
    {
        $resultados = $this->db->query("
          SELECT a.*,b.* FROM multitablas a 
          INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
          WHERE b.id_multitabla='13';");
        return $resultados->result();
    }
    //14
    public function cbox_cargo()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='14';");
        return $resultados->result();
    }
    //15
    public function cbox_sexo()
    {
        $resultados = $this->db->query("
          SELECT a.*,b.* FROM multitablas a 
          INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
          WHERE b.id_multitabla='15';");
        return $resultados->result();
    }
    //16
    public function cbox_nacionalidad()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='16';");
        return $resultados->result();
    }
    //17
    public function cbox_estado_civil()
    {
        $resultados = $this->db->query("
          SELECT a.*,b.* FROM multitablas a 
          INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
          WHERE b.id_multitabla='17';");
        return $resultados->result();
    }
    //18
    public function cbox_grado_instruccion()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='18';");
        return $resultados->result();
    }
    //19
    public function cbox_departamento()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='19';");
        return $resultados->result();
    }
    //20
    public function cbox_provincia()
    {
        $resultados = $this->db->query("
                   SELECT a.*,b.* FROM multitablas a 
                   INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                   WHERE b.id_multitabla='20';");
        return $resultados->result();
    }
    //21
    public function cbox_distrito()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='21';");
        return $resultados->result();
    }
    /* FIN DE TRABAJADOR*/
}
