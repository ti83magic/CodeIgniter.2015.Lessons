<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Leverancier extends CI_Controller {

    // +----------------------------------------------------------
    // | Fair Trade Shop - Leverancier
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Leverancier controller
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        $this->load->helper('table');
        $this->load->helper('notation');
    }

    public function index() {
        $this->load->model('leverancier_model');

        $data['leveranciers'] = $this->leverancier_model->getAll();

        $this->load->view('leverancier_lijst.php', $data);
    }

    public function wijzigen($id) {
        $this->load->model('leverancier_model');

        $data['actie'] = 'wijzigen';
        $data['leverancier'] = $this->leverancier_model->get($id);

        $this->load->view('leverancier_form.php', $data);
    }

    public function toevoegen() {
        $this->load->model('leverancier_model');

        $data['actie'] = 'toevoegen';
        $data['leverancier'] = $this->leverancier_model->newLeverancier();

        $this->load->view('leverancier_form.php', $data);
    }

    public function registreer() {
        $this->load->model('leverancier_model');

        $leverancier = new stdClass();
        $leverancier->id = $this->input->post('id');
        $leverancier->bedrijf = $this->input->post('bedrijf');
        $leverancier->adres = $this->input->post('adres');
        $leverancier->land = $this->input->post('land');
        $leverancier->sinds = toYYYYMMDD($this->input->post('sinds'));

        if ($leverancier->id == 0) {
            $this->leverancier_model->insert($leverancier);
        } else {
            $this->leverancier_model->update($leverancier);
        }

        redirect('leverancier/index', 'refresh');
    }
    
    
    public function verwijder($id, $forceer = false) {
        $this->load->model('leverancier_model');
        $this->load->model('product_model');
        
        $producten = $this->product_model->getAllByLeverancier($id);
        
        if(count($producten)>0 && $forceer==false) {
            $data['leverancier'] = $this->leverancier_model->get($id);
            
            $this->load->view('leverancier_verwijderen', $data);
        } else {
            foreach($producten as $product) {
                $this->product_model->delete($product->id);
            }
            
            $this->leverancier_model->delete($id);
            redirect('leverancier/index', 'refresh');
        }
        
        
    }

}

/* End of file leverancier.php */
/* Location: ./application/controllers/leverancier.php */