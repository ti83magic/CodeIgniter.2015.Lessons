<?php

class Raadsel_model extends CI_Model {

        // +----------------------------------------------------------
        // | Trivial Pursuit - oefening
        // +----------------------------------------------------------
        // | KHK - 2 TI - 201x-201x
        // +----------------------------------------------------------
        // | Raadsel model
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
        $query = $this->db->get('trivial_raadsel');
        return $query->row();
    }

    function isAntwoordJuist($id, $antwoord)
    {
        $raadsel = $this->get($id);
        
        return ($raadsel->juist == $antwoord);
    }

}

?>