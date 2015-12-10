<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jqueryui extends CI_Controller {

        // +----------------------------------------------------------
        // | Beershop
        // +----------------------------------------------------------
        // | Thomas More Kempen - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Jqueryui controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------

    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('form');
        }

        public function button()
	{
            $data['title']  = 'Button';
            
            $partials = array('header' => 'main_header', 'content' => 'les1/jqueryui_button');
            $this->template->load('main_master', $partials, $data);
	}
        
        public function datepicker()
	{
            $data['title']  = 'Datepicker';
            
            $partials = array('header' => 'main_header', 'content' => 'les1/jqueryui_datepicker');
            $this->template->load('main_master', $partials, $data);
	}
        
        public function modaldialog()
	{
            $data['title']  = 'Modal dialog';
            
            $partials = array('header' => 'main_header', 'content' => 'les2/jqueryui_modaldialog');
            $this->template->load('main_master', $partials, $data);
	}  
        
	public function accordion()
	{
            $data['title']  = 'Accordion';
            
            $partials = array('header' => 'main_header', 'content' => 'les1/jqueryui_accordion');
            $this->template->load('main_master', $partials, $data);
	}
        
        public function tabs()
	{
            $data['title']  = 'Tabs';
            
            $partials = array('header' => 'main_header', 'content' => 'les1/jqueryui_tabs');
            $this->template->load('main_master', $partials, $data);
	}
        
        public function tijd()
	{
            $data['title']  = 'Ajax';
            
            $partials = array('header' => 'main_header', 'content' => 'les2/jqueryui_tijd');
            $this->template->load('main_master', $partials, $data);
	}
        
        public function ajax()
	{
            $zoekstring = $this->input->get('zoekstring');
            if ($zoekstring == 'tijd') {
                $data['nu'] = date('H:i:s');
            } else {
                $data['nu'] = date('d/m/Y');
            }
            $this->load->view('les2/jqueryui_ajax', $data);
	}
        
}

/* End of file jqueryui.php */
/* Location: ./applications/beershop/controllers/jqueryui.php */
