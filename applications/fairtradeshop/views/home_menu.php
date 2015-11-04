<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    
    // +----------------------------------------------------------
    // | Fair Trade Shop - Menu
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Home menu
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------
    
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Fair Trade Shop Home</title>
    </head>
    <body>
        <img src="<?php echo base_url() . APPPATH . "images/fairtradeshop.jpg" ?>" />
        <h4>Fair Trade Shop Home</h4>
        <p>
            <div><?php echo anchor('product/lijst1', 'Notation Helper'); ?></div>
            <div><?php echo anchor('product/lijst2', 'Join'); ?></div>
            <div><?php echo anchor('product/lijst3', 'Product -> Categorie'); ?></div>
            <div><?php echo anchor('product/lijst4', 'Categorie -> Product'); ?></div>
            <div><?php echo anchor('product/paging', 'Paging'); ?></div>
        </p>
        <p>
            <div><?php echo anchor('leverancier/index', 'Beheer leveranciers'); ?></div>
        </p>
        <p>
            <div><?php echo anchor('cookies/index', 'Cookies'); ?></div>
            <div><?php echo anchor('sessies/index', 'Sessies'); ?></div>
            <div><?php echo anchor('shop/index', 'Winkelkarretje'); ?></div>
        </p>
    </body>
</html>