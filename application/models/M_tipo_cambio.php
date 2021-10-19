
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tipo_cambio extends CI_Model
{
    public function index()
    {
        $resultados = $this->db->query(
            // "select * from trabajadores where id_estado=1"

            "select
             *
             from tipo_cambio"
        );
        return $resultados->result();
    }


    public function insertar(
        $compra,
        $venta
    ) {
        return $this->db->query(
            "
        INSERT INTO tipo_cambio
        (
            id_tipo_cambio,compra,venta,fecha
        )
        VALUES
        (
            '','$compra','$venta',CURDATE()
        )"
        );
    }
    public function enlace_actualizar($id_tipo_cambio)
    {
        $resultados = $this->db->query("

                SELECT 
                *
        FROM tipo_cambio 
        where id_tipo_cambio='$id_tipo_cambio'");
        return $resultados->row();
    }


    public function actualizar(
        $fecha,
        $compra,
        $venta
    ) {
        return $this->db->query("
        update tipo_cambio set
        fecha =STR_TO_DATE('$fecha', '%d/%m/%Y'),
        compra ='$compra',
        venta='$venta'
        WHERE id_tipo_cambio =''");
    }
}
