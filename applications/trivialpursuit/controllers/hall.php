<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

    	public function __construct()
	{
            parent::__construct();
        }

	public function registreer()
	{
            $gegevens = new stdClass();
            $gegevens->naam = $this->input->post('naam');
            $gegevens->email = $this->input->post('email');
            
            $this->load->model('hall_model');
            
            $this->hall_model->insert($gegevens);
            
            redirect('hall/lijst','refresh');
	}
       
	public function lijst()
	{
            $this->load->model('hall_model');
            
            $data['lijst'] = $this->hall_model->getAll();
            
            $partials = array('header' => 'main_header', 'content' => 'hall_lijst', 'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
	}

}

/* End of file hall.php */
/* Location: ./applications/trivialpursuit/controllers/hall.php */