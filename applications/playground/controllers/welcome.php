<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('Table');
        $this->load->helper('html');
    }

    public function index() {
        $test['Anthony'] = new stdClass();
        $test['Karen'] = new stdClass();

        $test['Anthony']->id = 1;
        $test['Anthony']->name = "Anthony";
        $test['Anthony']->surname = "Woudenberg";
        $test['Anthony']->marriedTo = $test['Karen'];

        $test['Karen']->id = 2;
        $test['Karen']->name = "Karen";
        $test['Karen']->surname = "Roelant";
        $test['Karen']->marriedTo = $test['Anthony'];
        
        $data['people'] = $test;
        
        $this->load->view('welcome_message', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */