<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trivialpursuit extends CI_Controller {

        // +----------------------------------------------------------
        // | Trivial Pursuit - oefening
        // +----------------------------------------------------------
        // | KHK - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Trivialpursuit controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------

    	public function __construct()
	{
            parent::__construct();
            
        }

	public function index()
	{
		$data['title']  = 'Trivial Pursuit';

            $partials = array('header' => 'main_header', 'content' => 'home', 'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
	}
}

/* End of file trivialpursuit.php */
/* Location: ./applications/trivialpursuit/controllers/trivialpursuit.php */
