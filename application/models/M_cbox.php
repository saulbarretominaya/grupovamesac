
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_cbox extends CI_Model
{

    /* COMBOX PRODUCTOS  */
    //1
    public function cbox_tipo_comprobante()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='1';");
        return $resultados->result();
    }

    //2
    public function cbox_motivo_pago()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='2';");
        return $resultados->result();
    }

    //3
    public function cbox_cta_vta()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='3';");
        return $resultados->result();
    }

    //4
    public function cbox_medio_pago()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='4';");
        return $resultados->result();
    }

    //5
    public function cbox_asunto()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='5';");
        return $resultados->result();
    }

    //6
    public function cbox_banco()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='6';");
        return $resultados->result();
    }

    //7
    public function cbox_prioridad()
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
    public function cbox_mercaderia()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='9';");
        return $resultados->result();
    }

    //10
    public function cbox_condicion_pago()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='10';");
        return $resultados->result();
    }

    //11
    public function cbox_transaccion()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='11';");
        return $resultados->result();
    }

    //12
    public function cbox_unidad_medida()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='12';");
        return $resultados->result();
    }

    //13
    public function cbox_grupo()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='13';");
        return $resultados->result();
    }

    //14
    public function cbox_sub_clase()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='14';");
        return $resultados->result();
    }

    //15
    public function cbox_marca_productos()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='15';");
        return $resultados->result();
    }

    //16
    public function cbox_cta_ent()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='16';");
        return $resultados->result();
    }

    //17
    public function cbox_familia()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='17';");
        return $resultados->result();
    }

    //18
    public function cbox_sub_clase_dos()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='18';");
        return $resultados->result();
    }

    //19
    public function cbox_clase()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='19';");
        return $resultados->result();
    }

    //20
    public function cbox_almacen()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='20';");
        return $resultados->result();
    }

    //21
    public function cbox_equipo_tablero()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='21';");
        return $resultados->result();
    }

    //22
    public function cbox_placa_tablero()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='22';");
        return $resultados->result();
    }

    //23
    public function cbox_modelo_tableros()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='23';");
        return $resultados->result();
    }

    //24
    public function cbox_serie_tablero()
    {
        $resultados = $this->db->query("
           SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='24';");
        return $resultados->result();
    }

    //25
    public function cbox_tipo_ingresos()
    {
        $resultados = $this->db->query("
           SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='25';");
        return $resultados->result();
    }

    //26
    public function cbox_numero_importacion()
    {
        $resultados = $this->db->query("
           SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='26';");
        return $resultados->result();
    }

    //27
    public function cbox_tipo_trabajador()
    {
        $resultados = $this->db->query("
          SELECT a.*,b.* FROM multitablas a 
          INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
          WHERE b.id_multitabla='27';");
        return $resultados->result();
    }

    //28
    public function cbox_cargo_trabajador()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='28';");
        return $resultados->result();
    }

    //29
    public function cbox_sexo()
    {
        $resultados = $this->db->query("
          SELECT a.*,b.* FROM multitablas a 
          INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
          WHERE b.id_multitabla='29';");
        return $resultados->result();
    }

    //30
    public function cbox_tipo_documento()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='30';");
        return $resultados->result();
    }

    //31
    public function cbox_nacionalidad()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='31';");
        return $resultados->result();
    }

    //32
    public function cbox_estado_civil()
    {
        $resultados = $this->db->query("
          SELECT a.*,b.* FROM multitablas a 
          INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
          WHERE b.id_multitabla='32';");
        return $resultados->result();
    }

    //33
    public function cbox_grado_instruccion()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='33';");
        return $resultados->result();
    }

    //34
    public function cbox_departamento()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='34';");
        return $resultados->result();
    }

    //35
    public function cbox_provincia()
    {
        $resultados = $this->db->query("
                   SELECT a.*,b.* FROM multitablas a 
                   INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                   WHERE b.id_multitabla='35';");
        return $resultados->result();
    }

    //36
    public function cbox_distrito()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='36';");
        return $resultados->result();
    }

    //37
    public function cbox_tipo_persona()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='37';");
        return $resultados->result();
    }

    //38
    public function cbox_tipo_persona_sunat()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='38';");
        return $resultados->result();
    }

    //39
    public function cbox_origen()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='39';");
        return $resultados->result();
    }

    //40
    public function cbox_condicion()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='40';");
        return $resultados->result();
    }

    //41
    public function cbox_tipo_cliente_pago()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='41';");
        return $resultados->result();
    }

    //42
    public function cbox_tipo_giro()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='42';");
        return $resultados->result();
    }

    //43
    public function cbox_linea_disponible()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='43';");
        return $resultados->result();
    }

    //44
    public function cbox_dias()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='44';");
        return $resultados->result();
    }

    //45
    public function cbox_mes()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='45';");
        return $resultados->result();
    }

    //46
    public function cbox_año()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='46';");
        return $resultados->result();
    }

    //47
    public function cbox_dias_entrega()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='47';");
        return $resultados->result();
    }

    //48
    public function cbox_tasa()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='48';");
        return $resultados->result();
    }

    //49
    public function cbox_tipo_orden()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='49';");
        return $resultados->result();
    }

    //50
    public function cbox_empresa()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='50';");
        return $resultados->result();
    }

    //51
    public function cbox_codigos_sunat()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='51';");
        return $resultados->result();
    }

    //52
    public function cbox_marca_tableros()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='52';");
        return $resultados->result();
    }

    //53
    public function cbox_leyenda()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='53';");
        return $resultados->result();
    }

    //54
    public function cbox_roles_usuarios()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='54';");
        return $resultados->result();
    }

    //55
    public function cbox_estado_cotizacion()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='55';");
        return $resultados->result();
    }
    //56 - ESTADO DE ORDEN DE DESPACHO HARCODE
    //57
    public function cbox_condicion_pago_cotizacion()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='57';");
        return $resultados->result();
    }

    /* No tocar */
    public function correlativo_producto()
    {
        $resultados = $this->db->query("
          SELECT 
          b.id_multitabla,
          b.descripcion,
          b.correlativo+1 AS correlativo_producto
          FROM multitablas a 
          INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
          WHERE b.id_multitabla='53';");
        return $resultados->result();
    }
    public function actualizar_correlativo_producto($codigo_producto)
    {
        $resultados = $this->db->query("
          UPDATE detalle_multitablas SET correlativo='$codigo_producto'
          WHERE id_multitabla='53';");
    }
}
