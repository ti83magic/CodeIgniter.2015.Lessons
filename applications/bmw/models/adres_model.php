<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adres_model
 *
 * @author Anthony
 */
class Adres_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAll() {
        $this->db->order_by('land', 'asc');
        $query = $this->db->get('bmw_adres');
        return $query->result();
    }

    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('bmw_adres');
        return $query->row();                   // een row met de gegevens
    }

}

?>