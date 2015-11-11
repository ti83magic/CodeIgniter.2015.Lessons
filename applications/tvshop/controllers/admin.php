<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

        // +----------------------------------------------------------
        // | TV Shop
        // +----------------------------------------------------------
        // | KHK - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Admin Controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------

    	public function __construct()
	{
            parent::__construct();
            
            if(! $this->authex->loggedIn()) {
                redirect('home/login');
            } else {
                $user = $this->authex->getUserInfo();
                if($user->level < 5) {
                    redirect('home/login');
                }
            }
        }

	public function userbeheer()
	{
            $data['title'] = 'Gebruikers beheren';
            $data['user']  = $this->authex->getUserInfo();
            
            $partials = array('header' => 'main_header', 'menu' => 'main_menu', 'content' => 'admin_userbeheer', 'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
	}

        public function config()
	{
            $data['title'] = 'Configureren';
            $data['user']  = $this->authex->getUserInfo();
            
            $partials = array('header' => 'main_header', 'menu' => 'main_menu', 'content' => 'admin_config', 'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
	}

}

/* End of file admin.php */
/* Location: ./applications/tvshop/controllers/admin.php */