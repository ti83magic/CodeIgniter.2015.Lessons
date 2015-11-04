<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cookies extends CI_Controller {

        // +----------------------------------------------------------
        // | Fair Trade Shop - cookies
        // +----------------------------------------------------------
        // | KHK - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Cookies controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------
    
        public function __construct()
	{
            parent::__construct();

            $this->load->helper('cookie');
            $this->load->helper('form');
            $this->load->helper('url');
        }
        
	public function index()
	{
            if (! get_cookie('taal', TRUE)) {
                $this->load->view('cookies_form');
            } else {
                $data['taal'] = get_cookie('taal', TRUE);
                $data['naam'] = get_cookie('naam', TRUE);
                $this->load->view('cookies_welkom', $data);
            }
        }
        
        public function registreer( )
	{
            $naam = $this->input->post('naam');
            $taal = $this->input->post('taal');
            if ($taal == '') {
                $taal = 'N';
            }
            
            $cookie = array('name' => 'naam', 'value' => $naam, 'expire' => '86500');    
            set_cookie($cookie);
            
            $cookie = array('name' => 'taal', 'value' => $taal, 'expire' => '86500');    
            set_cookie($cookie);
            
            $this->load->view('cookies_klaar');
        }
}

/* End of file cookies.php */
/* Location: ./application/controllers/cookies.php */