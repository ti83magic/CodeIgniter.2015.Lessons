<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bestelling extends CI_Controller {

        // +----------------------------------------------------------
        // | Beershop
        // +----------------------------------------------------------
        // | Thomas More Kempen - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Bestelling controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------

    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('notation');
            $this->load->helper('form');
        }

	public function lijst()
	{
            $data['title']  = 'Bestellingen';
            
            $partials = array('header' => 'main_header', 
                                'content' => 'les2/bestelling_lijst');
            $this->template->load('main_master', $partials, $data);
	}

        public function ajax()
	{
            $zoekstring = $this->input->get('zoekstring');
            
            $this->load->model('bestelling_model');
            $data['bestellingen'] = 
                $this->bestelling_model->getByZoekstring($zoekstring);
            
            $this->load->view('les2/bestelling_ajax', $data);
	}

        public function zoek()
	{
            $data['title']  = 'Bestellingen zoeken';
            
            $partials = array('header' => 'main_header', 
                                'content' => 'les3/bestelling_zoek');
            $this->template->load('main_master', $partials, $data);
	}

        public function json()
	{
            $zoekstring = $this->input->get('term');
                        
            $this->load->model('bestelling_model');
            $bestellingen = 
                $this->bestelling_model->getIdValueByZoekstring($zoekstring);
                        
            echo json_encode($bestellingen); 
	}
        
        public function bestellijnen()
	{
            $bestellingId = $this->input->get('bestellingId');
            $data['bestellingId'] = $bestellingId;
            
            $this->load->model('bestellijn_model');
            $data['bestellijnen'] = 
                $this->bestellijn_model->getAllByBestellingId($bestellingId);
            
            $this->load->view('les3/bestelling_bestellijnen', $data);
	}    
        
//        public function vul()
//	{
//            $this->load->model('bestelling_model');
//            $this->bestelling_model->vulbestellijnen();
//            
//	}
        
}

/* End of file bestelling.php */
/* Location: ./applications/beershop/controllers/bestelling.php */
