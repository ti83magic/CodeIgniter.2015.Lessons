<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    
    // +----------------------------------------------------------
    // | Fair Trade Shop - Categorie -> Product
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Categorie -> Product
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

    <h4>Categorie -> Product</h4>
    
    <?php 
    
        foreach ($categories as $categorie) {
            echo "<h4>" . $categorie->naam . "</h4>";      
            
            foreach($categorie->producten as $product) {
                echo $product->id . " " .  $product->nederlandseNaam . "<br>";
            }
        }
   
    ?>

</body>
</html>