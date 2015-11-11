<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

        // +----------------------------------------------------------
        // | TV Shop
        // +----------------------------------------------------------
        // | KHK - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | User Controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------

    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }     
        
        public function nieuw()
	{
        }
        
        private function sendmail ($to, $id)
        {
        }
        
        public function registreer()
        {
        }
 
        public function activeer($id)
        {
        }
        
        public function bestaat()
	{
        }
        
        public function klaar()
	{
        }
        
}

/* End of file user.php */
/* Location: ./applications/tvshop/controllers/user.php */