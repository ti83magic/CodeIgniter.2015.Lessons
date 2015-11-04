<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function imgbmw($src = '', $index_page = FALSE) {
    $CI =& get_instance();
    return img(APPPATH . $CI->config->item('image_path') . $src, $index_page) . "\n";
}

?>