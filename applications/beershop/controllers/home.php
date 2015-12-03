<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

        // +----------------------------------------------------------
        // | Beershop
        // +----------------------------------------------------------
        // | Thomas More Kempen - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Default controller
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
            $data['title']  = 'Beershop Home';

            $partials = array('header' => 'main_header', 'content' => 'home_index');
            $this->template->load('main_master', $partials, $data);
	}
}

/* End of file home.php */
/* Location: ./applications/beershop/controllers/home.php */
