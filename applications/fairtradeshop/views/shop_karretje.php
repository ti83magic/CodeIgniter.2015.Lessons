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
        <h4>Winkelkarretje</h4>
        <?php
        if (count($karretje) == 0) {
            echo "<div>Geen producten in winkelkarretje!</div>";
        } else {
            echo table_open(6);

            echo table_row_open();
            
            echo table_data('Product');
            echo table_data('Prijs');
            echo table_data('Aantal');
            echo table_data('Totaal');
            echo table_data('');
            
            echo table_row_close();
            
            $totaalprijs = 0;

            foreach ($karretje as $id => $aantal) {
                $prijs = $producten[$id]->prijsPerEenheid;
                $totaalprijs+=$aantal * $prijs;
                
                echo table_row_open();

                echo table_data($producten[$id]->nederlandseNaam);
                echo table_data(toKomma($prijs));
                echo table_data($aantal);
                echo table_data(toKomma($aantal*$prijs));
                echo table_data(anchor("shop/verwijder/$id", 'verwijder'));

                echo table_row_close();
            }
            echo table_close();
            
            echo "<div>Totaal: ". toKomma($totaalprijs) . " euro</div>";
        }

        echo "<p>" . anchor('shop/index', 'Verder winkelen') . "</p>";
        echo "<p>" . anchor('shop/leeg', 'Leeg maken') . "</p>";
        ?>
    </body>
</html>