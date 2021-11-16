
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_inicio extends CI_Controller
{

    public function __construct()
    { // 7. Crea el metodo constructor para al modelo al modelo_login.
        parent::__construct();
        $this->load->model("M_inicio");
    }

    public function index()
    {
        if ($this->session->userdata("ingresar_session")) {
            redirect(base_url() . "C_menu");
        } else {
            $this->load->view("inicio/V_index");
        }
    }

    #Login del Usuario

    public function ingresar()
    {
        $usuario = $this->input->post("usuario"); // 1. El metodo ingresar recibe los campos username y password de tipo input y lo almacena en una variable $nombre_variable.
        $contraseña = $this->input->post("contraseña");
        //$res=$this->Model_login->ingresar($username,sha1($password)); Si la contraseña en la BD esta incryptado retornara verdado, sino false
        $res = $this->M_inicio->ingresar($usuario, $contraseña); // 2. Despues llama al Modelo_login y al metodo ingresar, y despues recupera los campos de tabla y lo almacenada en una variable $res.

        if (!$res) {
            $this->session->set_flashdata("error_session", "El usuario y/o contraseña son incorrectos");
            redirect(base_url());
        } else { // 8. Sino, crea una variable de sesion $data de tipo array 
            $data = array(
                //'id_jefe' => $res->id_jefe,
                //'ds_sesion' => $res->ds_sesion,
                // 'ds_jefe' => $res->ds_jefe,
                //'ds_area' => $res->ds_area,
                //'id_area' => $res->id_area,
                //'codrol' => $res->codrol,
                //'ds_rol' => $res->ds_rol,
                //'monto_actual' => $res->monto_actual,
                'ingresar_session' => TRUE
            ); //Fin del array
            $this->session->set_userdata($data); // 9. Luego pasamos el metodo set_userdata() para establecer la variable de sesion.  
            //redirect(base_url() . "C_menu"); // 10. Luego lo redireccion al Controller_Principal
            echo json_encode($data);
        }
    }

    #Metodo para cerra la sesion del usuario, que se encuentra en la vista Layout header, linea 51.

    public function cerrar_login()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
