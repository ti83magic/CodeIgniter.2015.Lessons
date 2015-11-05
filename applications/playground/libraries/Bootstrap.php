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

    private $level = 0;
    private $spacer = '    ';

    public function __contruct() {
        $this->load->helper('url');
    }

    // Expects an array of links, with link->url and link->text.
    public function breadcrumbs($links) {
        $ret = "\n\n" . $this->spacers(0) . "<ol class = \"breadcrumb\">\n";
        $lastlink = end($links);

        foreach ($links as $link) {
            if ($link == $lastlink) {
                $ret.=$this->spacers(1) . "<li class=\"active\">$link->text</li>\n";
            } else {
                $ret.=$this->spacers(1) . '<li>'. anchor($link->url, $link->text) . "</li>\n";
                // <a href = \"$link->url\">$link->text</a>
            }
        }

        $ret.=$this->spacers(0) . "</ol>\n\n";

        return $ret;
    }

    public function setLevel($level) {
        if ($level >= 0) {
            $this->level = $level;
        }
    }

    public function setSpacer($spacer) {
        if (is_string($spacer)) {
            $this->spacer = $spacer;
        }
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
