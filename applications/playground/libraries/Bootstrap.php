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
        $this->_CI->load->library('table');
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

        $config['first_link'] = 'Eerste';
        $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
        $config['last_link'] = 'Laatste';

        $config['full_tag_open'] = "\n\n" . $this->spacers(0) . "<ul class=\"pagination\">\n";
        $config['full_tag_close'] = $this->spacers(0) . "</ul>\n\n";
        $config['first_tag_open'] = $this->spacers(1) . '<li>';
        $config['first_tag_close'] = "</li>\n";
        $config['last_tag_open'] = $this->spacers(1) . '<li>';
        $config['last_tag_close'] = "</li>\n";
        $config['cur_tag_open'] = $this->spacers(1) . '<li class="active"><span href="#">';
        $config['cur_tag_close'] = "<span class=\"sr-only\">(huidig)</span></span></li>\n";
        $config['next_tag_open'] = $this->spacers(1) . '<li>';
        $config['next_tag_close'] = "</li>\n";
        $config['prev_tag_open'] = $this->spacers(1) . '<li>';
        $config['prev_tag_close'] = "</li>\n";

        $config['num_tag_open'] = $this->spacers(1) . '<li>';
        $config['num_tag_close'] = "</li>\n";

        $this->_CI->pagination->initialize($config);

        return $this->_CI->pagination->create_links();
    }

    // Attempt at doing some ugly postprocessing, to get the buttons to split.
    // This function is so incredibly ugly, that it is probably better to just
    // rewrite the pagination library myself. At the moment, it's a hassle to 
    // use, unsafe, and ugly as a monkey. The only thing it has going for it is
    // that the html it produces is clean.
    public function pagingSplit($baseUrl, $totalRows, $perPage, $currentPage) {
        // Set the config for the paginationlibrary.
        $config['base_url'] = site_url($baseUrl);
        $config['total_rows'] = $totalRows;
        $config['per_page'] = $perPage;
        $config['num_links'] = 2;
        $config['cur_page'] = $currentPage;

        $config['first_link'] = 'Eerste';
        $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
        $config['last_link'] = 'Laatste';

        $config['full_tag_open'] = '';
        $config['full_tag_close'] = '';
        $config['first_tag_open'] = $this->spacers(1) . '<span data-type="first">';
        $config['first_tag_close'] = "</span>\n";
        $config['last_tag_open'] = $this->spacers(1) . '<span data-type="last">';
        $config['last_tag_close'] = "</span>\n";
        $config['cur_tag_open'] = $this->spacers(1) . '<button type="button" class="btn btn-primary disabled"><span href="#">';
        $config['cur_tag_close'] = "<span class=\"sr-only\">(huidig)</span></span></button>\n";
        $config['next_tag_open'] = $this->spacers(1) . '<span data-type="next">';
        $config['next_tag_close'] = "</span>\n";
        $config['prev_tag_open'] = $this->spacers(1) . '<span data-type="prev">';
        $config['prev_tag_close'] = "</span>\n";

        $config['num_tag_open'] = $this->spacers(1) . '';
        $config['num_tag_close'] = "\n";
        
        $config['anchor_class'] = 'class="btn btn-default" role="button" ';

        $this->_CI->pagination->initialize($config);

        $linkString = $this->_CI->pagination->create_links();
        
        // Do the ugly postprocessing.
        $links = explode("\n", $linkString);
        $groups[0] = array();
        $groups[1] = array();
        $groups[2] = array();

        // Split the buttons into three groups. Ugly code.
        foreach ($links as $link) {
            if (strpos($link, 'data-type="first"') !== false ||
                    strpos($link, 'data-type="prev"') !== false) {
                array_push($groups[0], strip_tags($link, '<a>'));
            } else
            if (strpos($link, 'data-type="next"') !== false ||
                    strpos($link, 'data-type="last"') !== false) {
                array_push($groups[2], strip_tags($link, '<a>'));
            } else {
                array_push($groups[1], $link);
            }
        }
        
        // Now that we have three groups of buttons, create the code that we need.

        $ret = "\n\n".'<div class="btn-toolbar" role="toolbar" aria-label="...">' . "\n";
        
        foreach($groups as $group) {
            $ret.='    <div class="btn-group" role="group" aria-label="...">' . "\n";
            foreach($group as $str) {
                $ret.=$str."\n";
            }
            $ret.="    </div>\n";
        }
        $ret.="</div>\n\n";
               
        return $ret;
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
