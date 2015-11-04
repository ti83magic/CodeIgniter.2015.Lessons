<?php

class Leverancier_model extends CI_Model {

    // +----------------------------------------------------------
    // | Fair Trade Shop - leverancier_model
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Leverancier model
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $this->db->order_by('bedrijf', 'asc');
        $query = $this->db->get('shop_leverancier');
        return $query->result();
    }
    
    function get($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('shop_leverancier');
        return $query->row();
    }
    
    function newLeverancier()
    {
        $leverancier = new stdClass();

        $leverancier->id = 0;
        $leverancier->bedrijf = '';
        $leverancier->adres = '';
        $leverancier->land = '';
        $leverancier->sinds = date('Y-m-d');   
        
        return $leverancier;
    }

    function insert($leverancier)
    {
        $this->db->insert('shop_leverancier', $leverancier);
        return $this->db->insert_id();
    }
    
    function update($leverancier)
    {
        $this->db->where('id', $leverancier->id);
        $this->db->update('shop_leverancier', $leverancier);
    }
    
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('shop_leverancier');
    }
}

?>