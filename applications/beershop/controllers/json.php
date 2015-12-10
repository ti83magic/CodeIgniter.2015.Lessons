<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Json extends CI_Controller {

    // +----------------------------------------------------------
    // | Beershop
    // +----------------------------------------------------------
    // | Thomas More Kempen - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Json controller
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }

    public function persoon() {
        $persoon = new stdClass();
        $persoon->naam = "Pienter";
        $persoon->voornaam = "Piet";
        $persoon->geboortedatum = "30/11/1959";
        $persoon->stripfiguur = true;
        $persoon->saldo = -500;

        echo json_encode($persoon);
    }

    public function persoonclient() {
        $data['title'] = 'JSON Persoon Client';

        $partials = array('header' => 'main_header', 'content' => 'les3/json_persoonclient');
        $this->template->load('main_master', $partials, $data);
    }

    public function productenclient() {
        $data['title'] = 'JSON Producten Client';

        $partials = array('header' => 'main_header', 'content' => 'les3/json_productenclient');
        $this->template->load('main_master', $partials, $data);
    }

    public function producten() {
        $soort = $this->input->get('soort');

        $producten = array();
        // uiteraard beter met een database
        if ($soort === 'bureel') {
            $product1 = new stdClass();
            $product1->id = 109;
            $product1->naam = "rekenmachine";
            $producten[] = $product1;

            $product2 = new stdClass();
            $product2->id = 29;
            $product2->naam = "plakband";
            $producten[] = $product2;
        }
        if ($soort === 'middag') {
            $product3 = new stdClass();
            $product3->id = 43;
            $product3->naam = "brooddoos";
            $producten[] = $product3;
            
            $product4 = new stdClass();
            $product4->id = 1;
            $product4->naam = "koffie";
            $producten[] = $product4;
        }

        echo json_encode($producten);
    }

    public function schoolclient() {
        $data['title'] = 'JSON School Client';

        $partials = array('header' => 'main_header', 'content' => 'les3/json_schoolclient');
        $this->template->load('main_master', $partials, $data);
    }

    public function school() {
        $school = new stdClass();
        $school->naam = "Thomas More Kempen";
        $school->straat = "Kleinhoefstraat 4";
        $school->gemeente = "2440 Geel";

        $school->telefoonnummers = array();

        $telefoonnummer1 = new stdClass();
        $telefoonnummer1->plaats = "Receptie";
        $telefoonnummer1->nummer = "014 56 23 10";
        $school->telefoonnummers[] = $telefoonnummer1;

        $telefoonnummer2 = new stdClass();
        $telefoonnummer2->plaats = "Labo Informatica";
        $telefoonnummer2->nummer = "014 56 23 11";
        $school->telefoonnummers[] = $telefoonnummer2;

        $telefoonnummer3 = new stdClass();
        $telefoonnummer3->plaats = "Bib";
        $telefoonnummer3->nummer = "014 56 23 26";
        $school->telefoonnummers[] = $telefoonnummer3;

        echo json_encode($school);
    }

}

/* End of file json.php */
/* Location: ./applications/beershop/controllers/json.php */
