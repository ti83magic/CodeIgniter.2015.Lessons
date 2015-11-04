<?php

class Product_model extends CI_Model {

    // +----------------------------------------------------------
    // | Fair Trade Shop - product_model
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Product model
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    function __construct() {
        parent::__construct();
    }

    function getAll() {
        $this->db->order_by('nederlandseNaam', 'asc');
        $query = $this->db->get('shop_product');
        return $query->result();
    }

    function getAllWithCategorie() {
        $this->db->order_by('nederlandseNaam', 'asc');
        $query = $this->db->get('shop_product');
        $producten = $query->result();

        $this->load->model('categorie_model');

        foreach ($producten as $product) {
            $product->categorie = $this->categorie_model->get($product->categorieId);
        }
        return $producten;
    }

    function getAllWithCategorieEnLeverancier() {
        $this->db->order_by('nederlandseNaam', 'asc');
        $query = $this->db->get('shop_product');
        $producten = $query->result();

        $this->load->model('categorie_model');
        $this->load->model('leverancier_model');

        foreach ($producten as $product) {
            $product->categorie = $this->categorie_model->get($product->categorieId);
            $product->leverancier = $this->leverancier_model->get($product->leverancierId);
        }

        return $producten;
    }

    function getAllByCategorie($categorieId) {
        $this->db->where('categorieId', $categorieId);
        $this->db->order_by('nederlandseNaam', 'asc');
        $query = $this->db->get('shop_product');
        return $query->result();
    }

    function getAllByLeverancier($leverancierId) {
        $this->db->where('leverancierId', $leverancierId);
        $this->db->order_by('nederlandseNaam', 'asc');
        $query = $this->db->get('shop_product');
        return $query->result();
    }

    function get($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('shop_product');
        return $query->row();
    }

    function getProductenInKarretje($karretje) {
        $producten = array();
        foreach ($karretje as $id => $aantal) {
            $producten[$id] = $this->get($id);
        }
        return $producten;
    }

    function getNext($aantal, $startRow) {
        $this->db->order_by('nederlandseNaam', 'asc');
        $query = $this->db->get('shop_product', $aantal, $startRow);
        return $query->result();
    }

    function getNextWithCategorie($aantal, $startRow) {
        $this->load->model('categorie_model');

        $this->db->order_by('nederlandseNaam', 'asc');
        $query = $this->db->get('shop_product', $aantal, $startRow);

        $producten = $query->result();

        foreach ($producten as $product) {
            $product->categorie = $this->categorie_model->get($product->categorieId);
        }

        return $producten;
    }

    function getCount() {
        return $this->db->count_all('shop_product');
    }

    function getAllJoinLeverancier() {
        $this->db->select('*, shop_product.id as productid');
        $this->db->from('shop_product');
        $this->db->join('shop_leverancier', 'shop_leverancier.id = shop_product.leverancierId');
        $this->db->order_by('nederlandseNaam', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    
    
    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('shop_product');
    }

}

?>