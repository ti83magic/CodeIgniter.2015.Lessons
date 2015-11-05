<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// -----------------------------------------------------------------------------
// Project:     CodeIgniter.2015.Lessons
// Bestand:     Bootstrap.php
// 
// Gemaakt op:  5-nov-2015 11:34:09
// Auteur:      Anthony Woudenberg
//              Toegepaste Informatica
//              Thomas More Kempen
// 
// Samenvatting: 
// -------------
// A collection of functions to help utilise the power of bootstrap, without the
// hassle of writing HTML.
// -----------------------------------------------------------------------------



class Bootstrap {

    var $level = 0;
    var $spacer = '    ';
    private $_CI;

    public function __construct() {
        $this->_CI = &get_instance();

        $this->_CI->load->helper('url');
        $this->_CI->load->library('pagination');
        $this->_CI->load->library('typography');
    }

    // Expects an array of links, with link->url and link->text.
    public function breadcrumbs($links) {
        $ret = "\n\n" . $this->spacers(0) . "<ol class = \"breadcrumb\">\n";
        $lastlink = end($links);

        foreach ($links as $link) {
            if ($link == $lastlink) {
                $ret.=$this->spacers(1) . "<li class=\"active\">$link->text</li>\n";
            } else {
                $ret.=$this->spacers(1) . '<li>' . anchor($link->url, $link->text) . "</li>\n";
                // <a href = \"$link->url\">$link->text</a>
            }
        }

        $ret.=$this->spacers(0) . "</ol>\n\n";

        return $ret;
    }

    // returns the string to insert a glyphicon.
    //
    // Use either of the following formats:
    // icon("sort-by-alphabet)
    // icon("glyphicon-sort-by-alphabet)
    // icon("glyphicon glyphicon-sort-by-alphabet)
    public function icon($name) {
        if (strpos($name, 'glyphicon') === false) {
            $name = 'glyphicon glyphicon-' . $name;
        } else
        if (strpos($name, 'glyphicon ') === false) {
            $name = 'glyphicon ' . $name;
        }

        return $this->spacers(0) . "<span class=\"$name\" aria-hidden=\"true\"></span>\n";
    }

    // Utilises the pagination library to create bootstrap pagination.
    // Renamed to paging to avoid naming conflicts.
    public function paging($baseUrl, $totalRows, $perPage, $currentPage) {
        $config['base_url'] = site_url($baseUrl);
        $config['total_rows'] = $totalRows;
        $config['per_page'] = $perPage;
        $config['num_links'] = 2; //$totalRows / $perPage;
        $config['cur_page'] = $currentPage;
        
        $config['first_link'] = 1;
        $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
        $config['last_link'] = $totalRows / $perPage;
        
        $config['full_tag_open'] = "\n\n" . $this->spacers(0) . "<ul class=\"pagination\">\n";
        $config['full_tag_close'] = $this->spacers(0) . "</ul>\n\n";
        $config['first_tag_open'] = $this->spacers(1) . '<li>';
        $config['first_tag_close'] = "<li>\n";
        $config['last_tag_open'] = $this->spacers(1) . '<li>';
        $config['last_tag_close'] = "<li>\n";
        $config['cur_tag_open'] = $this->spacers(1) . '<li class="active"><span href="#">';
        $config['cur_tag_close'] = "<span class=\"sr-only\">(huidig)</span></span><li>\n";
        $config['next_tag_open'] = $this->spacers(1) . '<li>';
        $config['next_tag_close'] = "<li>\n";
        $config['prev_tag_open'] = $this->spacers(1) . '<li>';
        $config['prev_tag_close'] = "<li>\n";
        
        $config['num_tag_open'] = $this->spacers(1) . '<li>';
        $config['num_tag_close'] = "</li>\n";
        
        $this->_CI->pagination->initialize($config);

        return $this->_CI->pagination->create_links();

        // Intended output:
        //            <div class="btn-group" role="group" aria-label="...">
        //                <a href="#" class="btn btn-default">Left</a>
        //                <button type="button" class="btn btn-default">Middle</button>
        //                <button type="button" class="btn btn-default">Right</button>
        //            </div>
    }

    // Returns n spacers, where n is $level if $isAbsolute is true. If not, n
    // equals $this->level + $level.
    private function spacers($level, $isAbsolute = false) {
        $ret = '';

        for ($i = 0; $i < ($isAbsolute ? $level : $this->level + $level); $i++) {
            $ret.=$this->spacer;
        }

        return $ret;
    }

}

/* End of file Bootstrap.php */
