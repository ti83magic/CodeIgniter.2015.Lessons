<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auto extends CI_Controller {

    // +----------------------------------------------------------
    // | BMW - oefening
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Auto controller
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('table');
    }

    public function index() {
        $data['title'] = 'Automobiles';

        $this->load->model('auto_model');
        $data['autos'] = $this->auto_model->getAllBySerie();

        $this->load->view('auto_select', $data);
    }

    public function info($id) {
        $data['title'] = 'Automobiles';

        $this->load->model('auto_model');
        $data['auto'] = $this->auto_model->get($id);

        $this->load->view('auto_info', $data);
    }

}

/* End of file auto.php */
/* Location: ./applications/bmw/controllers/auto.php */