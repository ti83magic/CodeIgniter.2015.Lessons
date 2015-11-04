<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// -----------------------------------------------------------------------------
// Class:                   Admin
// Type:                    CodeIgniter Controller
// -----------------------------------------------------------------------------
// Auteur:                  Anthony Woudenberg
//                          Thomas More Kempen 2Ti
//                          2015 - 2016
// -----------------------------------------------------------------------------


class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('table');
    }

    public function index() {
        $data['title'] = 'Admin';

        $this->load->model('auto_model');
        $data['autos'] = $this->auto_model->getAllWithInfo();

        $this->load->view('auto_admin', $data);
    }

    // verwijder een info label uit de database.
    public function verwijder($id) {
        $this->load->model('info_model');
        $this->info_model->delete($id);

        $data['boodschap'] = "Bericht [$id] succesvol verwijderd.";

        // Zou eigenlijk weer naar index moeten springen, gaat dat niet?
        $data['title'] = 'Admin';

        $this->load->model('auto_model');
        $data['autos'] = $this->auto_model->getAllWithInfo();

        $this->load->view('auto_admin', $data);
    }

}

?>