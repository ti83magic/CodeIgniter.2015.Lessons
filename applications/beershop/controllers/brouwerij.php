<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brouwerij extends CI_Controller {

        // +----------------------------------------------------------
        // | Fair Trade Shop - Brouwerij
        // +----------------------------------------------------------
        // | Thomas More Kempen - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Brouwerij controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------
    
        public function __construct()
	{
            parent::__construct();
            
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->helper('notation');
            $this->load->library('table');
        }

        public function lijst()
	{
            $data['title']  = 'Brouwerijen';

            $this->load->model('brouwerij_model');
            $data['brouwerijen'] = $this->brouwerij_model->getAll();
            
            $partials = array('header' => 'main_header', 'content' => 'les2/brouwerij_lijst');
            $this->template->load('main_master', $partials, $data);
	}
       
        public function toevoegen()
	{
            $data['title']  = 'Brouwerij toevoegen';
            
            $this->load->model('brouwerij_model');
            $data['brouwerij'] = $this->brouwerij_model->newObject();
            $data['actie'] = 'Toevoegen';
            
            $partials = array('header' => 'main_header', 'content' => 'les2/brouwerij_form');
            $this->template->load('main_master', $partials, $data);
	}
        
        public function wijzigen($id)
	{
            $data['title']  = 'Brouwerij wijzigen';
            
            $this->load->model('brouwerij_model');
            $data['brouwerij'] = $this->brouwerij_model->get($id);
            $data['actie'] = 'Wijzigen';
            
            $partials = array('header' => 'main_header', 'content' => 'les2/brouwerij_form');
            $this->template->load('main_master', $partials, $data);
	}
        
        public function schrappen($id)
	{    
            $this->load->model('brouwerij_model');
            $this->brouwerij_model->delete($id);
            
            $this->lijst();
	}
        
        public function registreer()
	{
            $brouwerij = new stdClass();
            $brouwerij->id = $this->input->post('id');
            $brouwerij->naam = $this->input->post('naam');
            $brouwerij->stichter = $this->input->post('stichter');
            $brouwerij->plaats = $this->input->post('plaats');
            $brouwerij->oprichting = toYYYYMMDD($this->input->post('oprichting'));
            $brouwerij->werknemers = $this->input->post('werknemers');
            
            $this->load->model('brouwerij_model');
            if ($brouwerij->id == 0) {
                $this->brouwerij_model->insert($brouwerij);
            } else {
                $this->brouwerij_model->update($brouwerij);
            }
            
            $this->lijst();
	}

        public function select()
	{
            $data['title']  = 'Brouwerijen';

            $this->load->model('brouwerij_model');
            $data['brouwerijen'] = $this->brouwerij_model->getAll();
            
            $partials = array('header' => 'main_header', 'content' => 'les2/brouwerij_select');
            $this->template->load('main_master', $partials, $data);
	}

        public function ajax()
	{
            $id = $this->input->get('brouwerijId');
            
            $this->load->model('brouwerij_model');
            $data['brouwerij'] = $this->brouwerij_model->get($id);
            
            $this->load->view('les2/brouwerij_ajax', $data);            
	}
        
}

/* End of file brouwerij.php */
/* Location: ./application/controllers/brouwerij.php */