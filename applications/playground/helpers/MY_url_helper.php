<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// -----------------------------------------------------------------------------
// Project:     CodeIgniter.2015.Lessons
// Bestand:     MY_url_helper.php
// 
// Gemaakt op:  4-nov-2015 21:10:43
// Auteur:      Anthony Woudenberg
//              Toegepaste Informatica
//              Thomas More Kempen
// 
// Samenvatting: 
// -------------
// Een kleine uitbreiding van de url helper.
// -----------------------------------------------------------------------------

// Expects a 2d array with links and texts, and creates a breadcrumb trail.
function breadcrumbs($links) {
    $ret = '';
    
    for($i=0; $i<count($links)-1; $i++) {
        $ret.=anchor($links[$i][0], $links[$i][1]) . ' >> ';
    }
    
    $ret.=anchor(end($links)[0], end($links)[1]);
    
    return $ret;
}


/* End of file MY_url_helper.php */
?>