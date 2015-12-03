<?php

class Brouwerij_model extends CI_Model {

    // +----------------------------------------------------------
    // | Beershop - brouwerij_model
    // +----------------------------------------------------------
    // | Thomas More Kempen - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Brouwerij model
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
        $query = $this->db->get('bier_brouwerij');
        return $query->row();
    }

    function getAll()
    {
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('bier_brouwerij');
        return $query->result();
    }

    function newObject()
    {
		$brouwerij = new stdClass();
        $brouwerij->id = 0;
        $brouwerij->naam = '';
        $brouwerij->stichter = '';
        $brouwerij->plaats = '';
        $brouwerij->oprichting = date('Y-m-d');   
        $brouwerij->werknemers = '';
        
        return $brouwerij;
    }
    
    function insert($brouwerij)
    {
        $this->db->insert('bier_brouwerij', $brouwerij);
        return $this->db->insert_id();
    }
    
    function update($brouwerij)
    {
        $this->db->where('id', $brouwerij->id);
        $this->db->update('bier_brouwerij', $brouwerij);
    }
    
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('bier_brouwerij');
    }
    
}

?>