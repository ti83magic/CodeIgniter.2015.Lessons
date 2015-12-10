<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soort extends CI_Controller {

        // +----------------------------------------------------------
        // | Beershop
        // +----------------------------------------------------------
        // | Thomas More Kempen - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Soort controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------

    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
            $this->load->helper('html');
        }

	public function lijst()
	{
            $data['title']  = 'Soort/product Ajax';

            $this->load->model('soort_model');
            $data['soorten'] = $this->soort_model->getAll();
            
            $partials = array('header' => 'main_header', 
                                'content' => 'les2/soort_lijst');
            $this->template->load('main_master', $partials, $data);
	}

        public function ajax1()
	{
            $soortId = $this->input->get('soortId');
            
            $this->load->model('product_model');
            $data['producten'] = 
                $this->product_model->getAllBySoort($soortId);
            
            $this->load->view('les2/soort_ajax1', $data);          
        }

        public function ajax2()
	{
            $productId = $this->input->get('productId');
            
            $this->load->model('product_model');
            $data['product'] = 
                $this->product_model->get($productId);
            
            $this->load->view('les2/soort_ajax2', $data);   
	}
        
}

/* End of file soort.php */
/* Location: ./applications/beershop/controllers/soort.php */
