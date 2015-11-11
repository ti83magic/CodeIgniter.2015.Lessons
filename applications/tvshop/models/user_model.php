<?php

class User_model extends CI_Model {

    // +----------------------------------------------------------
    // | TV Shop
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | User model
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
        // geef user-object met opgegeven $id   
        $this->db->where('id', $id);
        $query = $this->db->get('tv_user');
        return $query->row();
    }

    function getAccount($email, $password)
    {
        // geef user-object met $email en $password EN geactiveerd = 1
        $this->db->where('email', $email);
        $this->db->where('password', sha1($password));
        $this->db->where('geactiveerd', 1);
        $query = $this->db->get('tv_user');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return null;
        }
    }
    
    function updateLaatstAangemeld($id)
    {
        // pas tijd laatstAangemeld aan
        $user->laatstAangemeld = date("Y-m-d H-i-s");
        $this->db->where('id', $id);
        $this->db->update('tv_user', $user); 
    }
    
    function emailVrij($email)
    {
        // is email al dan niet aanwezig
        $this->db->where('email', $email);
        $query = $this->db->get('tv_user');
        if ($query->num_rows() == 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function insert($naam, $email, $password)
    {
        // voeg nieuwe user toe
        $user->naam = $naam;
        $user->email = $email;
        $user->password = sha1($password);
        $user->level = 1;
        $user->laatstAangemeld = date("Y-m-d H-i-s");
        $user->geactiveerd = 0;
        $this->db->insert('tv_user', $user);
        return $this->db->insert_id();
    }
    
    function activeer($id)
    {
        // plaats geactiveerd op 1
        $user->geactiveerd = 1;
        $this->db->where('id', $id);
        $this->db->update('tv_user', $user); 
    }
}

?>