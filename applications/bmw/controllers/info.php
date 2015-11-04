<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {

        // +----------------------------------------------------------
        // | BMW - oefening
        // +----------------------------------------------------------
        // | KHK - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Info controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------

    	public function __construct()
	{
            parent::__construct();

            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->helper('html');
        }

	public function form()
	{
            $data['title'] = 'Information';

            $this->load->model('auto_model');
            $data['autos'] = $this->auto_model->getAllByName();
            $this->load->model('land_model');
            $data['landen'] = $this->land_model->getAll();

            $this->load->view('info_form', $data);
	}

        public function registreer()
	{
            $info = new stdClass();
            $info->naam = $this->input->post('naam');
            $info->email = $this->input->post('email');
            $info->straat = $this->input->post('straat');
            $info->plaats = $this->input->post('plaats');
            $info->land = $this->input->post('land');
            $info->auto = $this->input->post('auto');
            $info->datum = date( 'Y-m-d' );
            
            $this->load->model('info_model');
            $id = $this->info_model->insert($info);

            $data['title'] = 'Information';
            $data['id'] = $id;
            
            $this->load->view('info_confirm', $data);
	}

}

/* End of file info.php */
/* Location: ./applications/bmw/controllers/info.php */