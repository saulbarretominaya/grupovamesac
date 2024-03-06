<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->load->view('plantilla/V_header');
        $this->load->view('plantilla/V_aside');
        $this->load->view('menu/V_index');
    }
}
