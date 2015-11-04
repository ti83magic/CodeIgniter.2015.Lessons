<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

        // +----------------------------------------------------------
        // | Fair Trade Shop - Shop
        // +----------------------------------------------------------
        // | KHK - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Shop controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------
    
        public function __construct()
	{
            parent::__construct();
            
            $this->load->helper('url');
        }
        
        public function index()
	{     
            $this->load->view('home_menu');
	}
 
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */