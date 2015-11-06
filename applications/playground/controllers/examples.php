<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Examples extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('Table');
        $this->load->library('Bootstrap');
        
        $this->load->helper('html');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('examples_index');
    }

    public function table() {
        $test['Anthony'] = new stdClass();
        $test['Karen'] = new stdClass();
        $test['Wolf'] = new stdClass();

        $test['Anthony']->id = 1;
        $test['Anthony']->name = "Anthony";
        $test['Anthony']->surname = "Woudenberg";
        $test['Anthony']->marriedTo = $test['Karen'];

        $test['Karen']->id = 2;
        $test['Karen']->name = "Karen";
        $test['Karen']->surname = "Roelant";
        $test['Karen']->marriedTo = $test['Anthony'];
        
        $test['Wolf']->id = 3;
        $test['Wolf']->name = "Wolf";
        $test['Wolf']->surname = "Woudenberg";
        $test['Wolf']->marriedTo = null;
        
        

        $data['people'] = $test;

        $this->load->view('examples_table', $data);
    }
    
    public function bootstrap($page = 0) {
        $links[0] = new stdClass();
        $links[1] = new stdClass();
        $links[2] = new stdClass();
        
        $links[0]->url = '#';
        $links[0]->text = 'Home';
        $links[1]->url = '#';
        $links[1]->text = 'Examples';
        $links[2]->url = '#';
        $links[2]->text = 'Bootstrap';
        
        $data['links'] = $links;
        $data['current_page'] = $page;
        $data['nRows'] = 100;
        $data['perPage'] = 10;
        

        
        $this->load->view('examples_bootstrap', $data);
        
    }

}

/* End of file welcome.php */