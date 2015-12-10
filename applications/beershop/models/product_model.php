<?php

class Product_model extends CI_Model {

    // +----------------------------------------------------------
    // | Beershop - product_model
    // +----------------------------------------------------------
    // | Thomas More Kempen - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Product model
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    function __construct()
    {
        parent::__construct();
    }

        
    function get($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('bier_product');
        return $query->row();
    }
    
    function getAll()
    {
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('bier_product');
        return $query->result();
    }
    
    function getAllBySoort($soortId)
    {
        $this->db->where('soortId', $soortId);
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('bier_product');
        return $query->result();
    }

    function getAllByBrouwerij($brouwerijId)
    {
        $this->db->where('brouwerijId', $brouwerijId);
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('bier_product');
        return $query->result();
    }
    
    function getWithSoortBrouwerij($id)
    {
        $this->load->model('soort_model');
        $this->load->model('brouwerij_model');

        $product = $this->get($id);
        $product->soort = $this->soort_model->get($product->soortId);
        $product->brouwerij = $this->brouwerij_model->get($product->brouwerijId);
        
        return $product;
    }    
                        
}

?>