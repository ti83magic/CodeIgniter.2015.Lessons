<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

        // +----------------------------------------------------------
        // | Fair Trade Shop - Product
        // +----------------------------------------------------------
        // | KHK - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Product controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------
    
        public function __construct()
	{
            parent::__construct();
            
            $this->load->helper('url');
            $this->load->helper('notation');          
            
            $this->load->library('pagination');
        }

        public function lijst1()
	{        
            $this->load->model('product_model');
            $data['producten'] = $this->product_model->getAll();
            
            $this->load->view('product_lijst1', $data);
	}
                
        public function lijst2()
	{        
            $this->load->model('product_model');
            $data['producten'] = $this->product_model->getAllJoinLeverancier();
            
            $this->load->view('product_lijst2', $data);
	}
        
        public function lijst3()
	{        
            $this->load->model('product_model');
            $data['producten'] = $this->product_model->getAllWithCategorieEnLeverancier();
            
            $this->load->view('product_lijst3', $data);
	}

        public function lijst4()
	{        
            $this->load->model('categorie_model');
            $data['categories'] = 
                $this->categorie_model->getAllCategorieProduct();
            
            $this->load->view('product_lijst4', $data);
	}
        
        public function paging($startRow = 0)
        {
            $this->load->model('product_model');

            $aantal = 10;
            $totaal = $this->product_model->getCount();            
                        
            $config['base_url'] = site_url('product/paging/');
            $config['total_rows'] = $totaal;
            $config['per_page'] = $aantal;
            $config['num_links'] = $totaal/$aantal;
            $config['first_link'] = 'Eerste';
            $config['prev_link'] = 'Vorige';
            $config['next_link'] = 'Volgende';
            $config['last_link'] = 'Laatste';
            $this->pagination->initialize($config);

            $data['producten'] = $this->product_model->getNext($aantal, $startRow);
            $data['links'] = $this->pagination->create_links();

            $this->load->view('product_paging', $data);          
        }
       
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */