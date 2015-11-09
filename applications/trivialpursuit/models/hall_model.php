<?php

class Hall_model extends CI_Model {

    // +----------------------------------------------------------
    // | Trivial Pursuit - oefening
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Hall model
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
        $query = $this->db->get('trivial_hall');
        return $query->result();
    }

    function insert($hall)
    {
        $this->db->insert('trivial_hall', $hall);
        return $this->db->insert_id();
    }

}

?>