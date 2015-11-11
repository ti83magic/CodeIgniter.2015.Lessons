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

    // Compleet opnieuw, zonder gebruik te maken van de paging library. Zal
    // mooiere code moeten opleveren.
    // $showAllButtons: als dit op true staat, laten we de first/prev/next/last
    // knoppen ook zien als ze niet nodig zijn.
    public function paginating($baseUrl, $totalRows, $perPage, $currentRow, $splitButtons = true, $showAllButtons = false) {
        // Settings
        $neighbourCount = 2; // The amount of buttons next to the current one. We'll always show twice this, plus 1.
        $firstLink = 'Eerste';
        $prevLink = '<span aria-hidden="true">&laquo;</span>';
        $nextLink = '<span aria-hidden="true">&raquo;</span>';
        $lastLink = 'Laatste';

        // Berekend, afblijven.
        $currentPage = 1 + floor($currentRow / $perPage);
        $lastPage = floor($totalRows / $perPage);

        $groups['left'] = array();
        $groups['middle'] = array();
        $groups['right'] = array();

        // 'Eerste' knop
        if ($showAllButtons || $currentPage > $neighbourCount + 1) {
            $addendum = ($currentPage <= $neighbourCount + 1 ? 'disabled' : ''); // nakijken
            $attributes = "role='button' class='btn btn-default $addendum'";
            $link = anchor($baseUrl . '0', $firstLink, $attributes);

            array_push($groups['left'], $link);
        }

        // 'Vorige' knop
        if ($showAllButtons || $currentPage > 1) {
            $addendum = ($currentPage <= 1 ? 'disabled' : '');
            $attributes = "role='button' class='btn btn-default $addendum'";
            $link = anchor($baseUrl . ($currentRow - $perPage), $prevLink, $attributes);

            array_push($groups['left'], $link);
        }

        // 'Volgende' knop
        if ($showAllButtons || $currentPage < $lastPage) {
            $addendum = ($currentPage >= $lastPage ? 'disabled' : '');
            $attributes = "role='button' class='btn btn-default $addendum'";
            $link = anchor($baseUrl . ($currentRow + $perPage), $nextLink, $attributes);

            array_push($groups['right'], $link);
        }

        // 'Laatste' knop
        if ($showAllButtons || $currentPage < $lastPage - $neighbourCount) {
            $addendum = ($currentPage >= $lastPage - $neighbourCount ? 'disabled' : ''); // nakijken
            $attributes = "role='button' class='btn btn-default $addendum'";
            $link = anchor($baseUrl . ($totalRows - $perPage), $lastLink, $attributes);

            array_push($groups['right'], $link);
        }

        // We tonen altijd 2n+1 knoppen, waar n het aantal buren is. Als de
        // huidige pagina 1 is, tonen we bijvoorbeeld toch vier in plaats van
        // slechts 2 (bijvoorbeeld).
        $startPage = ($currentPage - $neighbourCount < 1 ? 1 : $currentPage - $neighbourCount); // lower bound
        $startPage = ($startPage < $lastPage - 2 * $neighbourCount ? $startPage : $lastPage - 2 * $neighbourCount); // upper bound
        $startPage = ($startPage < 1 ? 1 : $startPage); // Make sure we're not below 1.
        // Als er minder pagina's zijn dan 2n+1, toon ze dan maar allemaal.
        $pageCount = ($lastPage < 2 * $neighbourCount + 1 ? $lastPage : 2 * $neighbourCount + 1);

        // Maak eindelijk de middelste knoppen.
        for ($i = $startPage; $i < $startPage + $pageCount; $i++) {
            $addendum = ($i == $currentPage ? 'btn-primary disabled' : 'btn-default'); // nakijken
            $attributes = "role='button' class='btn $addendum'";
            $link = anchor($baseUrl . (($i - 1) * $perPage), $i, $attributes);

            array_push($groups['middle'], $link);
        }

        // Voeg alles samen
        $ret = "\n\n" . $this->spacers(0) . '<div class="btn-toolbar" role="toolbar" aria-label="...">' . "\n";
        // Als we niet moeten splitsen, mag de groep hier al beginnen...
        $ret.=(!$splitButtons ? $this->spacers(1) . '<div class="btn-group" role="group" aria-label="...">' . "\n" : '');

        foreach ($groups as $group) {
            // ...en anders maken we een groep aan per deel.
            $ret.=($splitButtons ? $this->spacers(1) . '<div class="btn-group" role="group" aria-label="...">' . "\n" : '');
            foreach ($group as $line) {
                $ret.=$this->spacers(2) . $line;
            }
            $ret.=($splitButtons ? $this->spacers(1) . "</div>\n" : '');
        }

        $ret.=(!$splitButtons ? $this->spacers(1) . "</div>\n" : '');
        $ret.=$this->spacers(0) . "</div>\n\n";

        return $ret;
    }

    // Nog uit te werken ideeën:
    // Dropdown (met headers/separators/disabled?)
    // Navigatie (tabs/pills), evt ook justified en disabled- dropdowns?
    // labels (makkie)
    // badges
    // 
    // 
    // Maakt een informatieveld.
    public function alert($message, $title = '', $type = 'info', $closeable = false) {
        // Niet heel netjes, maar elke link in een boodschap moet deze class krijgen.
        $message = str_replace('<a ', '<a class="alert-link" ', $message);

        if ($closeable) {
            $ret = "\n\n<div class='alert alert-$type alert-dismissible' role='alert'>\n" .
                    "    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>\n" .
                    "    <strong>$title</strong>\n" .
                    "    $message\n" .
                    "</div>\n\n";
        } else {
            $ret = "\n\n<div class='alert alert-$type' role='alert'>\n" .
                    "    <strong>$title</strong>\n" .
                    "    $message\n" .
                    "</div>\n\n";
        }

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
