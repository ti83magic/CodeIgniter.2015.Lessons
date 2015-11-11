<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hall extends CI_Controller {

    // +----------------------------------------------------------
    // | Trivial Pursuit - oefening
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Hall controller
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    public function __construct() {
        parent::__construct();
    }

    public function registreer() {
        $this->load->library('email');
        $this->load->model('hall_model');

        // Voeg de gegevens toe aan de databank.
        $gegevens = new stdClass();
        $gegevens->naam = $this->input->post('naam');
        $gegevens->email = $this->input->post('email');

        $this->hall_model->insert($gegevens);

        // Stuur een email ter bevestiging.
        $this->email($gegevens->email);

        redirect('hall/lijst', 'refresh');
    }

    public function lijst() {
        $this->load->model('hall_model');

        $data['lijst'] = $this->hall_model->getAll();

        $partials = array('header' => 'main_header', 'content' => 'hall_lijst', 'footer' => 'main_footer');
        $this->template->load('main_master', $partials, $data);
    }
    
    private function email($email) {
        $this->email->from('ti83magic@hotmail.com', 'Anthony Woudenberg');
        $this->email->to($email);
        $this->email->subject('Wat een score!');
        $this->email->message('Fantastisch gedaan, zegt het voort!');

        $ret =  $this->email->send();
        
        //echo $this->email->print_debugger();
        
        return $ret;
    }

}

/* End of file hall.php */
/* Location: ./applications/trivialpursuit/controllers/hall.php */