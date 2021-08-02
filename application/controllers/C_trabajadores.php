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
        $this->load->view('plantilla/V_footer');
    }

    public function enlace_registrar()
    {

        $data = array(


            // COMBO BOX
            'cbox_tipo_trabajador' => $this->M_cbox->cbox_tipo_trabajador(),
            'cbox_tipo_documento' => $this->M_cbox->cbox_tipo_documento(),
            'cbox_local' => $this->M_cbox->cbox_local(),
            'cbox_cargo' => $this->M_cbox->cbox_cargo(),
            'cbox_sexo' => $this->M_cbox->cbox_sexo(),
            'cbox_nacionalidad' => $this->M_cbox->cbox_nacionalidad(),
            'cbox_estado_civil' => $this->M_cbox->cbox_estado_civil(),
            'cbox_grado_instruccion' => $this->M_cbox->cbox_grado_instruccion(),
            'cbox_departamento' => $this->M_cbox->cbox_departamento(),
            'cbox_provincia' => $this->M_cbox->cbox_provincia(),
            'cbox_distrito' => $this->M_cbox->cbox_distrito(),
        );




        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('trabajadores/V_registrar', $data);
        $this->load->view('plantilla/V_footer');
    }

    public function insertar()
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
        print_r($tipo_trabajador);

        $tipo_documento = $this->input->post("tipo_documento");
        $local = $this->input->post("local");
        $cargo = $this->input->post("cargo");
        $sexo = $this->input->post("sexo");
        $nacionalidad = $this->input->post("nacionalidad");
        $estado_civil = $this->input->post("est_civil");
        $grado_instruccion = $this->input->post("grado_instruccion");
        $departamento = $this->input->post("departamento");
        $provincia = $this->input->post("provincia");
        $distrito = $this->input->post("distrito");

        $data = array(

            'num_documento' => $num_documento,
            'nombres' => $nombres,
            'ape_paterno' => $ape_paterno,
            'ape_materno' => $ape_materno,
            'email' => $email,
            'fecha_nacimiento' => $fecha_nacimiento,
            'lugar_nacimiento' => $lugar_nacimiento,
            'domicilio' => $domicilio,
            'referencia' => $referencia,
            'telefono' => $telefono,
            'celular' => $celular,
            'id_tipo_trabajador' => $tipo_trabajador,
            'id_local' => $local,
            'id_cargo' => $cargo,
            'id_sexo' => $sexo,
            'id_tipo_documento' => $tipo_documento,
            'id_nacionalidad' => $nacionalidad,
            'id_est_civil' => $estado_civil,
            'id_grado_instruccion' => $grado_instruccion,
            'id_departamento' => $departamento,
            'id_provincia' => $provincia,
            'id_distrito' => $distrito,


            // COMBO BOX
            // 'cbox_tipo_trabajador' => $this->M_cbox->cbox_tipo_trabajador(),
            // 'cbox_tipo_documento' => $this->M_cbox->cbox_tipo_documento(),
            // 'cbox_local' => $this->M_cbox->cbox_local(),
            // 'cbox_cargo' => $this->M_cbox->cbox_cargo(),
            // 'cbox_sexo' => $this->M_cbox->cbox_sexo(),
            // 'cbox_nacionalidad' => $this->M_cbox->cbox_nacionalidad(),
            // 'cbox_estado_civil' => $this->M_cbox->cbox_estado_civil(),
            // 'cbox_grado_instruccion' => $this->M_cbox->cbox_grado_instruccion(),
            // 'cbox_departamento' => $this->M_cbox->cbox_departamento(),
            // 'cbox_provincia' => $this->M_cbox->cbox_provincia(),
            // 'cbox_distrito' => $this->M_cbox->cbox_distrito(),
        );


        $this->M_trabajadores->insertar($data);

        echo json_encode($data);
    }
}
