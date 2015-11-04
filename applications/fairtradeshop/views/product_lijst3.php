<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    
    // +----------------------------------------------------------
    // | Fair Trade Shop - Product -> Categorie
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Product -> Categorie
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------
    
    ?>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Producten</title>
</head>
<body>
    <img src="<?php echo base_url() . APPPATH . "images/fairtradeshop.jpg" ?>" />

    <h4>Product -> Categorie</h4>
    
    <?php 
    
        foreach ($producten as $product) {
            echo "<div>". $product->id  . ' ' . 
                    $product->nederlandseNaam . ' -> ' . 
                    $product->categorie->naam .
                    " (". $product->leverancier->bedrijf.")" .                    
                     "</div>";
        }
   
    ?>

</body>
</html>