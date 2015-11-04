<?php

class Categorie_model extends CI_Model {

    // +----------------------------------------------------------
    // | Fair Trade Shop - categorie_model
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Categorie model
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
        $query = $this->db->get('shop_categorie');
        return $query->row();
    }
    
    function getAllCategorieProduct()
    {
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('shop_categorie');
        $categories = $query->result();
        
        $this->load->model('product_model');
        
        foreach ($categories as $categorie) {
            $categorie->producten = 
                 $this->product_model->getAllByCategorie($categorie->id);
        }
        return $categories;
    }
    
}

?>