
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_tableros extends CI_Model
{

    public function index()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query(
            "
            SELECT 
            a.id_tablero,
            a.id_tablero_empresa,
            a.codigo_tablero,
            a.id_almacen,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_almacen) AS ds_almacen,
            a.id_sunat,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_sunat) AS ds_codigo_sunat,
            UPPER(a.descripcion_tablero) as descripcion_tablero,
            a.id_moneda,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
            a.id_marca_tablero,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_marca_tablero) AS ds_marca_tablero,
            a.id_modelo_tablero,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_modelo_tablero) AS ds_modelo_tablero
            FROM tableros a
            WHERE a.id_empresa='$id_empresa' 
            ORDER BY a.id_tablero ASC"
        );
        return $resultados->result();
    }

    public function index_productos()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query("
        SELECT 
        a.id_producto,
        a.stock,
        UPPER(a.codigo_producto) as codigo_producto,
        a.id_almacen,
        (select descripcion from detalle_multitablas where id_dmultitabla=a.id_almacen) as ds_almacen,
        a.id_unidad_medida,
        (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_unidad_medida) AS ds_unidad_medida,
        a.id_sunat,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_sunat) AS ds_codigo_sunat,
        UPPER(a.descripcion_producto) as descripcion_producto,
        a.id_moneda,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
        a.precio_costo,
        a.porcentaje,
        a.ganancia_unidad,
        a.precio_unitario,
        a.rentabilidad,
        a.id_grupo,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_grupo) AS ds_grupo,
        a.id_familia,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_familia) AS ds_familia,
        a.id_clase,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_clase) AS ds_clase,
        a.id_sub_clase,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_sub_clase) AS ds_sub_clase,
        a.id_sub_clase_dos,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_sub_clase_dos) AS ds_sub_clase_dos,
        a.id_marca_producto,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_marca_producto) AS ds_marca_producto,
        a.id_cta_vta,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_cta_vta) AS ds_cta_vta,
        a.id_cta_ent,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_cta_ent) AS ds_cta_ent,
        a.stock
        FROM productos a
        where a.id_empresa='$id_empresa'    
        ORDER BY a.id_producto ASC
        ");
        return $resultados->result();
    }

    public function index_comodin()
    {
        $id_empresa = $this->session->userdata("id_empresa");

        $resultados = $this->db->query(
            "
            SELECT
            a.id_comodin,
            CONCAT('COM',a.id_comodin) AS id_general,
            a.codigo_producto,
            a.descripcion_producto,
            a.id_marca_producto,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_marca_producto) AS ds_marca_producto,
            a.id_unidad_medida,
            (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=a.id_unidad_medida) AS ds_unidad_medida,
            a.id_moneda,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
            a.precio_unitario,
            a.nombre_proveedor
            FROM comodin a
            where a.id_empresa='$id_empresa'
            ORDER BY a.id_comodin ASC
        "
        );
        return $resultados->result();
    }

    public function registrar_grupo_vame_tableros()
    {
        return $this->db->query(
            "
            INSERT INTO grupo_vame_tableros
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

    public function registrar_inversiones_alpev_tableros()
    {
        return $this->db->query(
            "
            INSERT INTO inversiones_alpev_tableros
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

    public function registrar(
        $codigo_tablero,
        $descripcion_tablero,
        $cantidad_tablero,
        $adicional,
        $id_sunat,
        $id_marca_tablero,
        $id_modelo_tablero,
        $id_moneda,
        $id_almacen,
        $precio_tablero,
        $porcentaje_margen,
        $precio_margen,
        $precio_unitario_por_tablero,
        $total_tablero,
        $id_trabajador,
        $ds_nombre_trabajador,
        $id_tablero_empresa,
        $id_empresa
    ) {
        return $this->db->query(
            "
        INSERT INTO tableros
        (
            id_tablero,codigo_tablero,descripcion_tablero,cantidad_tablero,adicional,id_sunat,
            id_marca_tablero,id_modelo_tablero,id_moneda,id_almacen,
            precio_tablero,porcentaje_margen,precio_margen,precio_unitario_por_tablero,total_tablero,
            id_trabajador,ds_nombre_trabajador,id_tablero_empresa,id_empresa

        )
        VALUES
        (
            '','$codigo_tablero','$descripcion_tablero','$cantidad_tablero','$adicional','$id_sunat',
            '$id_marca_tablero','$id_modelo_tablero','$id_moneda','$id_almacen',
            '$precio_tablero','$porcentaje_margen','$precio_margen','$precio_unitario_por_tablero','$total_tablero',
            '$id_trabajador','$ds_nombre_trabajador','$id_tablero_empresa','$id_empresa'
        )
        "
        );
    }

    public function lastID()
    {
        return $this->db->insert_id();
    }

    public function registrar_detalle(
        $id_tablero,
        $id_almacen_det,
        $ds_almacen,
        $id_producto,
        $codigo_producto,
        $descripcion_producto,
        $id_unidad_medida,
        $ds_unidad_medida,
        $id_marca_producto,
        $ds_marca_producto,
        $precio_unitario,
        $cantidad_unitaria,
        $cantidad_total_producto,
        $monto_total_producto,
        $item
    ) {

        $ip = $_SERVER['REMOTE_ADDR'];
        $id_trabajador = $this->session->userdata("id_trabajador");
        $ds_nombre_trabajador = $this->session->userdata("ds_nombre_trabajador");

        return $this->db->query(
            "
        INSERT INTO detalle_tableros
        (
        id_dtablero,
        id_tablero,id_almacen_det,ds_almacen,id_producto,
        codigo_producto,descripcion_producto,id_unidad_medida,ds_unidad_medida,
        id_marca_producto,ds_marca_producto,precio_unitario,cantidad_unitaria,
        cantidad_total_producto,monto_total_producto,id_estado_tablero,fecha_tablero,ip,id_trabajador,ds_nombre_trabajador,item
        )
        VALUES
        (
            '', 
        '$id_tablero','$id_almacen_det','$ds_almacen','$id_producto',
        '$codigo_producto','$descripcion_producto','$id_unidad_medida','$ds_unidad_medida',
        '$id_marca_producto','$ds_marca_producto','$precio_unitario','$cantidad_unitaria',
        '$cantidad_total_producto','$monto_total_producto','971',NOW(),'$ip','$id_trabajador','$ds_nombre_trabajador','$item'
        )
        "
        );
    }

    public function cabecera_modal($id_tablero)
    {
        $resultados = $this->db->query(
            "
        SELECT 
        id_tablero,
        codigo_tablero,
        id_almacen,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_almacen) AS ds_almacen,
        id_sunat,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_sunat) AS ds_codigo_sunat,
        LEFT(descripcion_tablero,30) AS descripcion_tablero,
        id_moneda,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_moneda) AS ds_moneda,
        id_marca_tablero,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_marca_tablero) AS ds_marca_tablero,
        id_modelo_tablero,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=id_modelo_tablero) AS ds_modelo_tablero,
        cantidad_tablero,
        FORMAT(adicional,2) as adicional,
        FORMAT(precio_tablero,2) as precio_tablero,
        FORMAT(porcentaje_margen,2) as porcentaje_margen,
        FORMAT(precio_margen,2) as precio_margen ,
        FORMAT(precio_unitario_por_tablero,2) as precio_unitario_por_tablero,
        FORMAT(total_tablero,2) as total_tablero
        FROM tableros
        where id_tablero='$id_tablero'"
        );
        return $resultados->row();
    }

    public function detalle_modal($id_tablero)
    {
        $resultados = $this->db->query(
            "
        SELECT
        c.codigo_producto,
        c.descripcion_producto,
        c.id_almacen,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_almacen) AS ds_almacen,
        (SELECT abreviatura FROM detalle_multitablas WHERE id_dmultitabla=c.id_unidad_medida) AS ds_unidad_medida,
        (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=c.id_marca_producto) AS ds_marca_producto,
        FORMAT(b.precio_unitario,2) as precio_unitario,
        b.cantidad_unitaria,
        b.cantidad_total_producto,
        FORMAT(b.monto_total_producto,2) as monto_total_producto,
        b.item
        FROM tableros a
        LEFT JOIN detalle_tableros b ON a.id_tablero=b.id_tablero
        LEFT JOIN productos c ON c.id_producto=b.id_producto
        WHERE a.id_tablero='$id_tablero' and b.id_estado_tablero='971'
        "
        );
        return $resultados->result();
    }

    public function enlace_actualizar_cabecera($id_tablero)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            a.id_tablero,
            a.codigo_tablero,
            a.id_almacen,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_almacen) AS ds_almacen,
            id_sunat,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_sunat) AS ds_codigo_sunat,
            a.descripcion_tablero,
            a.id_moneda,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_moneda) AS ds_moneda,
            a.id_marca_tablero,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_marca_tablero) AS ds_marca_tablero,
            a.id_modelo_tablero,
            (SELECT descripcion FROM detalle_multitablas WHERE id_dmultitabla=a.id_modelo_tablero) AS ds_modelo_tablero,
            a.cantidad_tablero,
            FORMAT(a.adicional,2) as adicional,
            FORMAT(a.precio_tablero,2) as precio_tablero,
            FORMAT(a.porcentaje_margen,2) as porcentaje_margen,
            FORMAT(a.precio_margen,2) as precio_margen ,
            FORMAT(a.precio_unitario_por_tablero,2) as precio_unitario_por_tablero,
            FORMAT(a.total_tablero,2) as total_tablero
            FROM tableros a
            WHERE a.id_tablero='$id_tablero'
            "
        );
        return $resultados->row();
    }

    public function enlace_actualizar_detalle($id_tablero)
    {
        $resultados = $this->db->query(
            "
            SELECT 
            a.*
            FROM detalle_tableros a
            WHERE a.id_tablero='$id_tablero' and a.id_estado_tablero='971'
            "
        );
        return $resultados->result();
    }

    public function actualizar(
        $id_tablero,
        $codigo_tablero,
        $descripcion_tablero,
        $cantidad_tablero,
        $adicional,
        $id_sunat,
        $id_marca_tablero,
        $id_modelo_tablero,
        $id_moneda,
        $id_almacen,
        $precio_tablero,
        $porcentaje_margen,
        $precio_margen,
        $precio_unitario_por_tablero,
        $total_tablero,
        $id_trabajador,
        $ds_nombre_trabajador,
        $id_tablero_empresa,
        $id_empresa
    ) {
        return $this->db->query(
            "
            UPDATE tableros SET 
            id_tablero='$id_tablero',
            codigo_tablero='$codigo_tablero',
            descripcion_tablero='$descripcion_tablero',
            cantidad_tablero='$cantidad_tablero',
            adicional='$adicional',
            id_sunat='$id_sunat',
            id_marca_tablero='$id_marca_tablero',
            id_modelo_tablero='$id_modelo_tablero',
            id_moneda='$id_moneda',
            id_almacen='$id_almacen',
            precio_tablero='$precio_tablero',
            porcentaje_margen='$porcentaje_margen',
            precio_margen='$precio_margen',
            precio_unitario_por_tablero='$precio_unitario_por_tablero',
            total_tablero='$total_tablero',
            id_trabajador='$id_trabajador',
            ds_nombre_trabajador='$ds_nombre_trabajador',
            id_tablero_empresa='$id_tablero_empresa',
            id_empresa='$id_empresa'
            where id_tablero='$id_tablero'

        "
        );
    }

    public function eliminar_detalle($id_dtablero_eliminar)
    {

        $ip = $_SERVER['REMOTE_ADDR'];
        $id_trabajador = $this->session->userdata("id_trabajador");
        $ds_nombre_trabajador = $this->session->userdata("ds_nombre_trabajador");

        return $this->db->query(
            "
            UPDATE detalle_tableros SET
            id_estado_tablero='972',
            fecha_tablero_eliminar=NOW(),
            ip_eliminar='$ip',
            id_trabajador_eliminar='$id_trabajador',
            ds_nombre_trabajador_eliminar='$ds_nombre_trabajador'
            WHERE id_dtablero='$id_dtablero_eliminar'
            "
        );
    }

    public function actualizar_detalle($id_dtablero_actualizar, $item_actualizar)
    {
        return $this->db->query(
            "
            UPDATE detalle_tableros SET
            item='$item_actualizar'
            WHERE id_dtablero='$id_dtablero_actualizar'
            "
        );
    }
}
