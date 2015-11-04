<?php

class Auto_model extends CI_Model {

    // +----------------------------------------------------------
    // | BMW - oefening
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Auto model
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    function __construct()
    {
        parent::__construct();
    }

    function getAllBySerie()
    {
        $this->db->order_by('serie', 'asc');
        $query = $this->db->get('bmw_auto');
        return $query->result();                // een resultset met alle auto-rijen
    }

    function getAllByName()
    {
        $this->db->order_by('auto', 'asc');
        $query = $this->db->get('bmw_auto');
        return $query->result();                // een resultset met alle auto-rijen
    }

    function get($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('bmw_auto');
        return $query->row();                   // een row met de gegevens
    }

    
    function getAllWithInfo() {
        $this->db->order_by('auto', 'asc');
        $query = $this->db->get('bmw_auto');
        $autos =  $query->result();               
        
        $this->load->model('info_model');

        foreach ($autos as $auto) {
            $auto->berichten = $this->info_model->getBerichtenBijAuto($auto->id);
        }
        
        return $autos;
    }
    
}

?>