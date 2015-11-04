<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessies extends CI_Controller {

        // +----------------------------------------------------------
        // | Fair Trade Shop - sessies
        // +----------------------------------------------------------
        // | KHK - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Sessies controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------
    
        public function __construct()
	{
            parent::__construct();
            
            $this->load->helper('url');
            $this->load->library('session');
        }
        
        public function index()
	{
            $this->session->set_userdata('naam', 'Piet Pienter');
            
            $this->vervolg();
	}

        public function vervolg()
	{            
            $data['naam'] = $this->session->userdata('naam');
            $data['session_id'] = $this->session->userdata('session_id');
            
            $this->load->view('sessies_toon', $data);
	}
        
}

/* End of file sessies.php */
/* Location: ./application/controllers/sessies.php */