<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Land extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('url');
    }

    public function index() {
        $data['title'] = 'BMW in your country';

        $this->load->model('adres_model');
        $data['adressen'] = $this->adres_model->getAll();

        $this->load->view('land_select', $data);
    }

    public function info() {
        $data['title'] = 'BMW in your country';

        $id = $this->input->post('land');
        
        $this->load->model('adres_model');
        $data['adres'] = $this->adres_model->get($id);        
        
        $this->load->view('land_info', $data);
    }

}

/* End of file auto.php */
/* Location: ./applications/bmw/controllers/auto.php */