<?php

class Land_model extends CI_Model {

    // +----------------------------------------------------------
    // | BMW - oefening
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Land model
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
        $this->db->order_by('land', 'asc');
        $query = $this->db->get('bmw_land');
        return $query->result();
    }

}

?>