<?php

class Soort_model extends CI_Model {

    // +----------------------------------------------------------
    // | Beershop - soort_model
    // +----------------------------------------------------------
    // | Thomas More Kempen - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Soort model
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
        $query = $this->db->get('bier_soort');
        return $query->row();
    }

    function getAll()
    {
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('bier_soort');
        return $query->result();
    }

    function getAllSoortProduct()
    {
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('bier_soort');
        $soorten = $query->result();
        
        $this->load->model('product_model');
        
        foreach ($soorten as $soort) {
            $soort->producten = 
                 $this->product_model->getAllBySoort($soort->id);
        }
        return $soorten;
    }
    
}

?>