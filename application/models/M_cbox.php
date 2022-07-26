
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
        WHERE b.id_multitabla='1' and b.id_estado_dmultitabla='1'
        ");
        return $resultados->result();
    }

    public function cbox_tipo_comprobante_facturas_boletas()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='1' AND b.id_estado_dmultitabla='1' AND abreviatura='FACTURA' OR abreviatura='BOLETA'
        ");
        return $resultados->result();
    }

    public function cbox_tipo_comprobante_notas()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='1' AND b.id_estado_dmultitabla='1' AND abreviatura='NOTA DE CREDITO' OR abreviatura='NOTA DE DEBITO'
        ");
        return $resultados->result();
    }

    //2
    public function cbox_motivo_pago()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='2' AND b.id_estado_dmultitabla='1'
        ");
        return $resultados->result();
    }

    //3
    public function cbox_cta_vta()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='3' AND b.id_estado_dmultitabla='1'
         ");
        return $resultados->result();
    }

    //4
    public function cbox_medio_pago()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='4' AND b.id_estado_dmultitabla='1'
         ");
        return $resultados->result();
    }

    //5
    public function cbox_asunto()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='5' AND b.id_estado_dmultitabla='1'
         ");
        return $resultados->result();
    }

    //6
    public function cbox_banco()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='6' AND b.id_estado_dmultitabla='1'
         ");
        return $resultados->result();
    }

    //7
    public function cbox_prioridad()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='7' AND b.id_estado_dmultitabla='1'
         ");
        return $resultados->result();
    }

    //8
    public function cbox_moneda()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='8' AND b.id_estado_dmultitabla='1'
             ");
        return $resultados->result();
    }

    //9
    public function cbox_mercaderia()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='9' AND b.id_estado_dmultitabla='1'
             ");
        return $resultados->result();
    }

    //10
    public function cbox_condicion_pago()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='10' AND b.id_estado_dmultitabla='1'
             ");
        return $resultados->result();
    }

    //11
    public function cbox_transaccion()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='11' AND b.id_estado_dmultitabla='1'
             ");
        return $resultados->result();
    }

    //12
    public function cbox_unidad_medida()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='12' AND b.id_estado_dmultitabla='1'
        ");
        return $resultados->result();
    }

    //13
    public function cbox_grupo()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='13' AND b.id_estado_dmultitabla='1'
        ");
        return $resultados->result();
    }

    //14
    public function cbox_sub_clase()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='14' AND b.id_estado_dmultitabla='1'
         ");
        return $resultados->result();
    }

    //15
    public function cbox_marca_productos()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='15' AND b.id_estado_dmultitabla='1'
         ");
        return $resultados->result();
    }

    //16
    public function cbox_cta_ent()
    {
        $resultados = $this->db->query("
         SELECT a.*,b.* FROM multitablas a 
         INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
         WHERE b.id_multitabla='16' AND b.id_estado_dmultitabla='1'
         ");
        return $resultados->result();
    }

    //17
    public function cbox_familia()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='17' AND b.id_estado_dmultitabla='1'
        ");
        return $resultados->result();
    }

    //18
    public function cbox_sub_clase_dos()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='18' AND b.id_estado_dmultitabla='1'
             ");
        return $resultados->result();
    }

    //19
    public function cbox_clase()
    {
        $resultados = $this->db->query("
        SELECT a.*,b.* FROM multitablas a 
        INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
        WHERE b.id_multitabla='19' AND b.id_estado_dmultitabla='1'
        ");
        return $resultados->result();
    }

    //20
    public function cbox_almacen()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='20' AND b.id_estado_dmultitabla='1'
             ");
        return $resultados->result();
    }

    //21
    public function cbox_equipo_tablero()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='21' AND b.id_estado_dmultitabla='1'
             ");
        return $resultados->result();
    }

    //22
    public function cbox_placa_tablero()
    {
        $resultados = $this->db->query("
             SELECT a.*,b.* FROM multitablas a 
             INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
             WHERE b.id_multitabla='22' AND b.id_estado_dmultitabla='1'
             ");
        return $resultados->result();
    }

    //23
    public function cbox_modelo_tableros()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='23' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //24
    public function cbox_serie_tablero()
    {
        $resultados = $this->db->query("
           SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='24' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //25
    public function cbox_tipo_ingresos()
    {
        $resultados = $this->db->query("
           SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='25' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //26
    public function cbox_numero_importacion()
    {
        $resultados = $this->db->query("
           SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='26' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //27
    public function cbox_tipo_trabajador()
    {
        $resultados = $this->db->query("
          SELECT a.*,b.* FROM multitablas a 
          INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
          WHERE b.id_multitabla='27' AND b.id_estado_dmultitabla='1'
          ");
        return $resultados->result();
    }

    //28
    public function cbox_cargo_trabajador()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='28' AND b.id_estado_dmultitabla='1'
               ");
        return $resultados->result();
    }

    //29
    public function cbox_sexo()
    {
        $resultados = $this->db->query("
          SELECT a.*,b.* FROM multitablas a 
          INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
          WHERE b.id_multitabla='29' AND b.id_estado_dmultitabla='1'
          ");
        return $resultados->result();
    }

    //30
    public function cbox_tipo_documento()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='30' AND b.id_estado_dmultitabla='1'
               ");
        return $resultados->result();
    }

    //31
    public function cbox_nacionalidad()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='31' AND b.id_estado_dmultitabla='1'
               ");
        return $resultados->result();
    }

    //32
    public function cbox_estado_civil()
    {
        $resultados = $this->db->query("
          SELECT a.*,b.* FROM multitablas a 
          INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
          WHERE b.id_multitabla='32' AND b.id_estado_dmultitabla='1'
          ");
        return $resultados->result();
    }

    //33
    public function cbox_grado_instruccion()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='33' AND b.id_estado_dmultitabla='1'
               ");
        return $resultados->result();
    }

    //34
    public function cbox_departamento()
    {
        $resultados = $this->db->query("
               SELECT a.*,b.* FROM multitablas a 
               INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
               WHERE b.id_multitabla='34' AND b.id_estado_dmultitabla='1'
               ");
        return $resultados->result();
    }

    //35
    public function cbox_provincia()
    {
        $resultados = $this->db->query("
                   SELECT a.*,b.* FROM multitablas a 
                   INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                   WHERE b.id_multitabla='35' AND b.id_estado_dmultitabla='1'
                   ");
        return $resultados->result();
    }

    //36
    public function cbox_distrito()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='36' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //37
    public function cbox_tipo_persona()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='37' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //38
    public function cbox_tipo_persona_sunat()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='38' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //39
    public function cbox_origen()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='39' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //40
    public function cbox_condicion()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='40' AND b.id_estado_dmultitabla='1' 
                           ");
        return $resultados->result();
    }

    //41
    public function cbox_tipo_cliente_pago()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='41' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //42
    public function cbox_tipo_giro()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='42' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //43
    public function cbox_linea_disponible()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='43' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //44
    public function cbox_dias()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='44' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //45
    public function cbox_mes()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='45' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //46
    public function cbox_año()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='46' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //47
    public function cbox_dias_entrega()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='47' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //48
    public function cbox_tasa()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='48' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //49 -- BORRADA POR BD

    //50
    public function cbox_empresa()
    {
        $resultados = $this->db->query("
                           SELECT a.*,b.* FROM multitablas a 
                           INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
                           WHERE b.id_multitabla='50' AND b.id_estado_dmultitabla='1'
                           ");
        return $resultados->result();
    }

    //51
    public function cbox_codigos_sunat()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='51' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //52
    public function cbox_marca_tableros()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='52' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //53
    public function cbox_leyenda()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='53' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //54
    public function cbox_roles_usuarios()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='54' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //55
    public function cbox_estado_cotizacion()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='55' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //56 - ESTADO DE ORDEN DE DESPACHO HARCODE

    //57
    public function cbox_condicion_pago_cotizacion()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='57' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //58
    public function cbox_tipo_orden_parcial_completa()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='58' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //59 Estado Elaborar PC (Pendiente o Finalizado)

    //60
    public function cbox_tipo_envio_guia_remision()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='60' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //61
    public function cbox_tipo_compra_cobranza()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='61' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //62 Estado Compras Cobranzas  (Pendiente o Cancelado)
    public function cbox_estado_compra_cobranza()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='62' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    //63
    public function cbox_tipo_orden_compra()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='63' AND b.id_estado_dmultitabla='1'
            ");
        return $resultados->result();
    }

    // 64 ESTADO PARCIALES COMPLETAS
    // 65 ESTADO DE REGISTRAR O ELIMINAR - DETALLE CONDICION PAGO - MODULO COMPROBANTES
    // 66 ESTADO DE GUIA DE REMISION	
    // 67 ESTADO DE COMPROBANTES	
    // 68 CATEGORIA DE COMODIN	

    public function cbox_categoria_comodin()
    {
        $resultados = $this->db->query("
            SELECT a.*,b.* FROM multitablas a 
            INNER JOIN detalle_multitablas b ON b.id_multitabla=a.id_multitabla 
            WHERE b.id_multitabla='68' AND b.id_estado_dmultitabla='1'
            ");
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
          WHERE b.id_multitabla='53'
          ");
        return $resultados->result();
    }
    public function actualizar_correlativo_producto($codigo_producto)
    {
        $resultados = $this->db->query("
          UPDATE detalle_multitablas SET correlativo='$codigo_producto'
          WHERE id_multitabla='53' 
          ");
    }
    /*Fin de no Tocar*/
}
