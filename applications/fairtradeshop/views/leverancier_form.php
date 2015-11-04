<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    // +----------------------------------------------------------
    // | Fair Trade Shop - Leverancier form
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Leverancier form
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Leveranciers</title>
    </head>
    <body>
        <?php
        echo imgshort('fairtradeshop.jpg') . "\n";
        echo heading('Leverancier ' . $actie, 4) . "\n";

        $attributes = array('name' => 'myform');
        echo form_open('leverancier/registreer', $attributes) . "\n";
        echo form_hidden('id', $leverancier->id);

        
        echo table_open(2);

        echo table_output(array(form_label('Bedrijf:', 'bedrijf'), form_input('bedrijf', $leverancier->bedrijf)));
        echo table_output(array(form_label('Adres:', 'adres'), form_input('adres', $leverancier->adres)));
        echo table_output(array(form_label('Land:', 'land'), form_input('land', $leverancier->land)));
        echo table_output(array(form_label('Sinds:', 'sinds'), form_input('sinds', toDDMMYYYY($leverancier->sinds))));

        echo table_output(array('', form_submit('submit', 'Submit')));

        echo table_close();

        echo form_close();
        
        echo anchor('leverancier/index','Back');
        ?>


    </body>
</html>