<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    // +----------------------------------------------------------
    // | Fair Trade Shop - Paging
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Product paging
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

        <h4>Producten in bestelling</h4>

        <div>

            <?php
            echo form_open('product/bestel');
            echo table_open(4);

            foreach ($producten as $product) {
                echo table_row_open();
                echo table_data(form_checkbox("product$product->id", $product->id , FALSE));
                echo table_data($product->nederlandseNaam);
                echo table_data($product->voorraad);
                echo table_data($product->inBestelling);
                echo table_row_close();
            }

            echo table_close();
            echo form_submit('submit', 'Verzenden');
            echo form_close();
            ?>
        </div>

    </body>
</html>