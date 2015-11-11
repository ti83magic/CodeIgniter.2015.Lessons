<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Raadsel extends CI_Controller {

    // +----------------------------------------------------------
    // | Trivial Pursuit - oefening
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Raadsel controller
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    public function __construct() {
        parent::__construct();

        $this->load->helper('form');
    }

    public function vraag($id) {
        if ($id == 1) { // zal niet hier mogen staan
            $this->session->set_userdata('score', 0);
        }

        $this->load->model('raadsel_model');

        $raadsel = $this->raadsel_model->get($id);

        $data['id'] = $id;
        $data['raadsel'] = $raadsel;

        $partials = array('header' => 'main_header', 'content' => 'raadsel_vraag', 'footer' => 'main_footer');

        $this->template->load('main_master', $partials, $data);
    }

    public function antwoord($id, $antwoord) {
        $this->load->model('raadsel_model');

        if ($this->raadsel_model->isAntwoordJuist($id, $antwoord)) {
            $score = $this->session->userdata('score') + 1;
            $this->session->set_userdata('score', $score);
        }

        $id++;

        if ($id > 10) { // hardcoded, niet goed.
            redirect('raadsel/einde', 'refresh');
        } else {
            redirect("raadsel/vraag/$id", 'refresh');
        }
        
        
    }

    public function einde() {
        $this->load->model('raadsel_model');

        $data['score'] = $this->session->userdata('score');

        if ($data['score'] < 10) {
            $partials = array('header' => 'main_header', 'content' => 'raadsel_resultaat', 'footer' => 'main_footer');
        } else {
            $partials = array('header' => 'main_header', 'content' => 'raadsel_tienoptien', 'footer' => 'main_footer');
        }

        $this->template->load('main_master', $partials, $data);
    }

}

/* End of file raadsel.php */
/* Location: ./applications/trivialpursuit/controllers/raadsel.php */