<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shop extends CI_Controller {

    // +----------------------------------------------------------
    // | Noordenwinkel - Shop
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Shop controller
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('table');
        $this->load->helper('notation');
        $this->load->helper('notation');

        $this->load->library('session');
        $this->load->library('pagination');
    }

    public function index($startRow = 0) {
        $this->load->model('product_model');

        $aantal = 10;
        $totaal = $this->product_model->getCount();

        $config['base_url'] = site_url('shop/index/');
        $config['total_rows'] = $totaal;
        $config['per_page'] = $aantal;
        $config['num_links'] = $totaal / $aantal;
        $config['first_link'] = 'Eerste';
        $config['prev_link'] = 'Vorige';
        $config['next_link'] = 'Volgende';
        $config['last_link'] = 'Laatste';
        $this->pagination->initialize($config);

        $data['producten'] = $this->product_model->getNextWithCategorie($aantal, $startRow);
        $data['links'] = $this->pagination->create_links();

        $this->load->view('shop_lijst', $data);
    }

    private function haalopkarretje() {
        if (!$this->session->userdata('karretje')) {
            return array();
        } else {
            return $this->session->userdata('karretje');
        }
    }

    public function voegtoe($id) {
        $karretje = $this->haalopkarretje();
        
        if(!isset($karretje[$id])) { $karretje[$id] = 0; }
        $karretje[$id]++;
        $this->session->set_userdata('karretje', $karretje);

        redirect('shop/karretje', 'refresh');
    }

    public function verwijder($id) {
        $karretje = $this->haalopkarretje();
        $karretje[$id] --;

        if ($karretje[$id] <= 0) {
            unset($karretje[$id]);
        }

        $this->session->set_userdata('karretje', $karretje);

        redirect('shop/karretje', 'refresh');
    }

    public function karretje() {
        $karretje = $this->haalopkarretje();
        $this->load->model('product_model');

        $data['karretje'] = $karretje;
        $data['producten'] = $this->product_model->getProductenInKarretje($karretje);

        $this->load->view('shop_karretje', $data);
    }

    public function leeg() {
        $this->session->unset_userdata('karretje');

        redirect('shop/index', 'refresh');
    }

}

/* End of file shop.php */
/* Location: ./application/controllers/shop.php */