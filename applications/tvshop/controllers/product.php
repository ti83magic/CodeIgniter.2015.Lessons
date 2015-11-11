<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

        // +----------------------------------------------------------
        // | TV Shop
        // +----------------------------------------------------------
        // | KHK - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Product Controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------

    	public function __construct()
	{
            parent::__construct();
        }

	public function lijst()
	{
            $data['title'] = 'Productenlijst';
            $data['user']  = $this->authex->getUserInfo();
            
            $partials = array('header' => 'main_header', 'menu' => 'main_menu', 'content' => 'product_lijst', 'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
	}

        public function bestel()
	{
            if(! $this->authex->loggedIn()) {
                redirect('home/login');
            }
            
            $data['title'] = 'Producten bestellen';
            $data['user']  = $this->authex->getUserInfo();
            
            $partials = array('header' => 'main_header', 'menu' => 'main_menu', 'content' => 'product_bestel', 'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
	}
        
        public function beheer()
	{
            if(! $this->authex->loggedIn()) {
                redirect('home/login');
            } else {
                $user = $this->authex->getUserInfo();
                if($user->level < 5) {
                    redirect('home/login');
                }
            }
            $data['user']  = $this->authex->getUserInfo();
            
            $partials = array('header' => 'main_header', 'menu' => 'main_menu', 'content' => 'product_beheer', 'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
	}
}

/* End of file product.php */
/* Location: ./applications/tvshop/controllers/product.php */