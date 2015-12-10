<?php

class Bestelling_model extends CI_Model {

    // +----------------------------------------------------------
    // | Beershop - bestelling_model.php
    // +----------------------------------------------------------
    // | Thomas More Kempen - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Bestelling model
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    function __construct()
    {
        parent::__construct();
    }

    function getByZoekstring($zoekstring)
    {
        $this->db->like('naam', $zoekstring, 'after'); 
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('bier_bestelling');
        return $query->result();
    }

    function getIdValueByZoekstring($zoekstring)
    {
        $this->db->select('id , naam as value');
        $this->db->like('naam', $zoekstring, 'after'); 
        $this->db->order_by('naam', 'asc');
        $query = $this->db->get('bier_bestelling');
        return $query->result();
    }
    
//    function vulbestellijnen()
//    {
//        $query = $this->db->get('bier_bestelling');
//        $bestellingen = $query->result();
//        
//        foreach ($bestellingen as $bestelling) {
//            $k = rand(1, 5);
//            for ($i = 0; $i < $k; $i++) {
//                $bestellijn->bestellingId = $bestelling->id;
//                $bestellijn->aantal = rand(1, 15);
//                $bestellijn->productId = rand(1, 32);
//                $this->db->insert('bier_bestellijn', $bestellijn);
//            }
//        }
//    }
                        
}

?>