<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

        // +----------------------------------------------------------
        // | Beershop
        // +----------------------------------------------------------
        // | Thomas More Kempen - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Product controller
        // |
        // +----------------------------------------------------------
        // | K. Vangeel
        // +----------------------------------------------------------

    	public function __construct()
	{
            parent::__construct();
            $this->load->helper('notation');
        }

	public function lijst1()
	{
            $data['title']  = 'Soort/product Accordion';

            $this->load->model('soort_model');
            $data['soorten'] = $this->soort_model->getAllSoortProduct();
            
            $partials = array('header' => 'main_header', 'content' => 'les1/product_lijst1');
            $this->template->load('main_master', $partials, $data);
	}

        public function lijst2()
	{
            $data['title']  = 'Soort/product Tabs';

            $this->load->model('soort_model');
            $data['soorten'] = $this->soort_model->getAllSoortProduct();
            
            $partials = array('header' => 'main_header', 'content' => 'les1/product_lijst2');
            $this->template->load('main_master', $partials, $data);
	}
        
	public function detail($id)
	{
            $data['title']  = 'Product detailgegevens';

            $this->load->model('product_model');
            $data['product'] = $this->product_model->getWithSoortBrouwerij($id);
            
            $partials = array('header' => 'main_header', 'content' => 'les1/product_detail');
            $this->template->load('main_master', $partials, $data);
	}
}

/* End of file product.php */
/* Location: ./applications/beershop/controllers/product.php */
