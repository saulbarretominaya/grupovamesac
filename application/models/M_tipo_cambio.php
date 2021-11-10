
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tipo_cambio extends CI_Model
{
    public function index()
    {
        $resultados = $this->db->query(
            "SELECT id_tipo_cambio,compra,venta, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM tipo_cambio"
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

        select * from tipo_cambio 
        where id_tipo_cambio='$id_tipo_cambio'");
        return $resultados->row();
    }


    public function actualizar(
        $id_tipo_cambio,
        $compra,
        $venta
    ) {
        return $this->db->query("
        update tipo_cambio set
        fecha =CURDATE(),
        compra ='$compra',
        venta='$venta'
        WHERE id_tipo_cambio ='$id_tipo_cambio'");
    }
}
