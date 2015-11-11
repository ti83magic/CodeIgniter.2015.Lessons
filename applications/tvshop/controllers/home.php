<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

        // +----------------------------------------------------------
        // | TV Shop
        // +----------------------------------------------------------
        // | KHK - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Home Controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------

    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }

	public function index()
	{
            $data['title'] = 'Home';
            $data['user']  = $this->authex->getUserInfo();
            
            $partials = array('header' => 'main_header', 'menu' => 'main_menu', 
                              'content' => 'home_index', 'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
	}
        
        public function login()
	{
            $data['title'] = 'Aanmelden';
            $data['user']  = $this->authex->getUserInfo();
            
            $partials = array('header' => 'main_header', 'menu' => 'main_menu', 'content' => 'home_login', 'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
        }
        
        public function fout()
	{
            $data['title'] = 'Fout';
            $data['user']  = $this->authex->getUserInfo();
            
            $partials = array('header' => 'main_header', 'menu' => 'main_menu', 'content' => 'home_fout', 'footer' => 'main_footer');
            $this->template->load('main_master', $partials, $data);
        }
        
        public function aanmelden()
	{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            if ($this->authex->login($email, $password)) {
                redirect('home/index');
            } else {
                redirect('home/fout');
            }
        } 
        
        public function afmelden()
	{
            $this->authex->logout();
            redirect('home/index');
        }       
        
}

/* End of file home.php */
/* Location: ./applications/tvshop/controllers/home.php */