<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    
    // +----------------------------------------------------------
    // | Fair Trade Shop - Sessies
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Sessies
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------
    
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sessies</title>
    </head>
    <body>
    <img src="<?php echo base_url() . APPPATH . "images/fairtradeshop.jpg" ?>" />
        <h4>Sessies</h4>
        <?php 
        
        echo "<div>" . $naam . "</div>";
        echo "<div>" . $session_id. "</div>";
        
        echo anchor('sessies/vervolg', 'Verder'); 
        
        ?>
    </body>
</html>