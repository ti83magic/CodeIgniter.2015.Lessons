<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    // +----------------------------------------------------------
    // | Fair Trade Shop - Shop
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Shop
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

        <h4>Bestel een product</h4>

        <?php
        
        echo anchor('product/inBestelling','Toon producten in bestelling').'<br><br>';
        
        foreach ($producten as $product) {
            echo '<div>' . anchor("shop/voegtoe/$product->id", $product->nederlandseNaam) . " ({$product->categorie->naam})" . "</div>";
        }
        
        echo "<br><Br>".$links;

        echo "<p>" . anchor('shop/karretje', 'Naar winkelkarretje') . "</p>";
        ?>

    </body>
</html>