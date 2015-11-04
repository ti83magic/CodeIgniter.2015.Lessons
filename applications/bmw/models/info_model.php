<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// -----------------------------------------------------------------------------
// Class:                   Info_model
// Type:                    CodeIgniter Model
// -----------------------------------------------------------------------------
// Auteur:                  Anthony Woudenberg
//                          Thomas More Kempen 2Ti
//                          2015 - 2016
// -----------------------------------------------------------------------------


class Info_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($info) {
        $this->db->insert('bmw_info', $info);
        return $this->db->insert_id();
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('bmw_info');
    }

    function getBerichtenBijAuto($id) {
        $this->db->order_by('datum', 'asc');
        $this->db->where('auto', $id);
        $query = $this->db->get('bmw_info');
        return $query->result();
    }

}

?>