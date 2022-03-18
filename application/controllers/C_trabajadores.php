<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_trabajadores extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_trabajadores");
        $this->load->model("M_cbox");
    }


    public function index()
    {
        $data = array(
            'index' => $this->M_trabajadores->index(),
        );

        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('trabajadores/V_index', $data);
    }

    public function index_modal()

    {
        $id_trabajador = $this->input->post("id_trabajador");

        $data = array(
            'index_modal_cabecera' => $this->M_trabajadores->index_modal_cabecera($id_trabajador)
        );

        $this->load->view('trabajadores/V_index_modal', $data);
    }

    public function enlace_registrar()
    {

        $data = array(

            // COMBO BOX
            'cbox_tipo_trabajador' => $this->M_cbox->cbox_tipo_trabajador(),
            'cbox_tipo_documento' => $this->M_cbox->cbox_tipo_documento(),
            'cbox_almacen' => $this->M_cbox->cbox_almacen(),
            'cbox_cargo_trabajador' => $this->M_cbox->cbox_cargo_trabajador(),
            'cbox_sexo' => $this->M_cbox->cbox_sexo(),
            'cbox_nacionalidad' => $this->M_cbox->cbox_nacionalidad(),
            'cbox_estado_civil' => $this->M_cbox->cbox_estado_civil(),
            'cbox_grado_instruccion' => $this->M_cbox->cbox_grado_instruccion(),
            'cbox_departamento' => $this->M_cbox->cbox_departamento(),
            'cbox_provincia' => $this->M_cbox->cbox_provincia(),
            'cbox_distrito' => $this->M_cbox->cbox_distrito(),
            'cbox_empresa' => $this->M_cbox->cbox_empresa(),

        );

        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('trabajadores/V_registrar', $data);
    }

    public function registrar()
    {
        $num_documento = $this->input->post("num_documento");
        $nombres = $this->input->post("nombres");
        $ape_paterno = $this->input->post("ape_paterno");
        $ape_materno = $this->input->post("ape_materno");
        $email = $this->input->post("email");
        $fecha_nacimiento = $this->input->post("fecha_nacimiento");
        $lugar_nacimiento = $this->input->post("lugar_nacimiento");
        $domicilio = $this->input->post("domicilio");
        $referencia = $this->input->post("referencia");
        $telefono = $this->input->post("telefono");
        $celular = $this->input->post("celular");
        $tipo_trabajador = $this->input->post("tipo_trabajador");
        $tipo_documento = $this->input->post("tipo_documento");
        $almacen = $this->input->post("almacen");
        $cargo_trabajador = $this->input->post("cargo_trabajador");
        $sexo = $this->input->post("sexo");
        $nacionalidad = $this->input->post("nacionalidad");
        $estado_civil = $this->input->post("est_civil");
        $grado_instruccion = $this->input->post("grado_instruccion");
        $departamento = $this->input->post("departamento");
        $provincia = $this->input->post("provincia");
        $distrito = $this->input->post("distrito");
        $id_empresa = $this->input->post("id_empresa");

        if ($id_empresa == "3") {
            $this->M_trabajadores->registrar_grupo_vame_trabajadores();
            $id_trabajador_empresa = $this->M_trabajadores->lastID();
            $this->M_trabajadores->registrar(
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
            );
        } else if ($id_empresa == "4") {
            $this->M_trabajadores->registrar_inversiones_alpev_trabajadores();
            $id_trabajador_empresa = $this->M_trabajadores->lastID();
            $this->M_trabajadores->registrar(
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
            );
        }

        echo json_encode($num_documento);
    }


    public function enlace_actualizar($id_trabajador)
    {

        $data = array(
            'enlace_actualizar' => $this->M_trabajadores->enlace_actualizar($id_trabajador),
            'cbox_tipo_trabajador' => $this->M_cbox->cbox_tipo_trabajador(),
            'cbox_tipo_documento' => $this->M_cbox->cbox_tipo_documento(),
            'cbox_almacen' => $this->M_cbox->cbox_almacen(),
            'cbox_cargo_trabajador' => $this->M_cbox->cbox_cargo_trabajador(),
            'cbox_sexo' => $this->M_cbox->cbox_sexo(),
            'cbox_nacionalidad' => $this->M_cbox->cbox_nacionalidad(),
            'cbox_estado_civil' => $this->M_cbox->cbox_estado_civil(),
            'cbox_grado_instruccion' => $this->M_cbox->cbox_grado_instruccion(),
            'cbox_departamento' => $this->M_cbox->cbox_departamento(),
            'cbox_provincia' => $this->M_cbox->cbox_provincia(),
            'cbox_distrito' => $this->M_cbox->cbox_distrito(),
            'cbox_empresa' => $this->M_cbox->cbox_empresa(),
        );


        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('trabajadores/V_actualizar', $data);
    }

    public function actualizar()
    {
        $id_trabajador = $this->input->post("id_trabajador");
        $num_documento = $this->input->post("num_documento");
        $nombres = $this->input->post("nombres");
        $ape_paterno = $this->input->post("ape_paterno");
        $ape_materno = $this->input->post("ape_materno");
        $email = $this->input->post("email");
        $fecha_nacimiento = $this->input->post("fecha_nacimiento");
        $lugar_nacimiento = $this->input->post("lugar_nacimiento");
        $domicilio = $this->input->post("domicilio");
        $referencia = $this->input->post("referencia");
        $telefono = $this->input->post("telefono");
        $celular = $this->input->post("celular");
        $tipo_trabajador = $this->input->post("tipo_trabajador");
        $tipo_documento = $this->input->post("tipo_documento");
        $almacen = $this->input->post("almacen");
        $cargo_trabajador = $this->input->post("cargo_trabajador");
        $sexo = $this->input->post("sexo");
        $nacionalidad = $this->input->post("nacionalidad");
        $estado_civil = $this->input->post("est_civil");
        $grado_instruccion = $this->input->post("grado_instruccion");
        $departamento = $this->input->post("departamento");
        $provincia = $this->input->post("provincia");
        $distrito = $this->input->post("distrito");
        $id_empresa = $this->input->post("id_empresa");

        // print_r($fecha_nacimiento1);

        // // echo gettype($posible);

        // $fecha_nacimiento = 

        // // STR_TO_DATE(REPLACE('$fecha_nacimiento', '/', '.'), GET_FORMAT(date, 'EUR'))

        $this->M_trabajadores->actualizar(
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
        );


        echo json_encode($num_documento);
    }

    public function verificar_trabajador()
    {

        $num_documento = $this->input->post("num_documento");
        $nombres = $this->input->post("nombres");
        $ape_paterno = $this->input->post("ape_paterno"); //captura el parametro que le enviamos
        $ape_materno = $this->input->post("ape_materno");
        $email = $this->input->post("email");
        $fecha_nacimiento = $this->input->post("fecha_nacimiento");
        $lugar_nacimiento = $this->input->post("lugar_nacimiento");
        $domicilio = $this->input->post("domicilio");
        $referencia = $this->input->post("referencia");
        $telefono = $this->input->post("telefono");
        $celular = $this->input->post("celular");
        $tipo_trabajador = $this->input->post("tipo_trabajador");
        $tipo_documento = $this->input->post("tipo_documento");
        $almacen = $this->input->post("almacen");
        $cargo_trabajador = $this->input->post("cargo_trabajador");
        $sexo = $this->input->post("sexo"); //captura el parametro que le enviamos
        $nacionalidad = $this->input->post("nacionalidad"); //captura el parametro que le enviamos
        $estado_civil = $this->input->post("est_civil"); //captura el parametro que le enviamos
        $grado_instruccion = $this->input->post("grado_instruccion"); //captura el parametro que le enviamos
        $departamento = $this->input->post("departamento"); //captura el parametro que le enviamos
        $provincia = $this->input->post("provincia"); //captura el parametro que le enviamos
        $distrito = $this->input->post("distrito"); //captura el parametro que le enviamos


        $data = $this->M_trabajadores->verificar_trabajador($num_documento, $nombres, $ape_paterno, $ape_materno, $email, $fecha_nacimiento, $lugar_nacimiento, $domicilio, $referencia, $telefono, $celular, $tipo_trabajador, $tipo_documento, $almacen, $cargo_trabajador, $sexo, $nacionalidad, $estado_civil, $grado_instruccion, $departamento, $provincia, $distrito); // le paso el parametro al metodo verificar_trabajador que se encuentra en el MODELO
        echo json_encode($data);
    }

    public function eliminar($id_trabajador)
    {

        $this->M_trabajadores->actualizar_estado($id_trabajador);
        redirect(base_url() . "C_trabajadores");
    }
}
