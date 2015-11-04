<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    
    // +----------------------------------------------------------
    // | Fair Trade Shop - Leverancier lijst
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Leverancier lijst
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
    <img src="<?php echo base_url() . APPPATH . "images/fairtradeshop.jpg" ?>" />

    <h4>Leveranciers</h4>
    
    <?php
    echo    "\n    ".
            anchor('leverancier/toevoegen', 'Leverancier toevoegen').
            "\n    <br>\n    <br>\n\n";
    
        for($i=0; $i<count($leveranciers); $i++) {
            echo    '    <div>'.
                    anchor('leverancier/wijzigen/'.$leveranciers[$i]->id, $i).
                    '. '.
                    $leveranciers[$i]->bedrijf.
                    " ".anchor("leverancier/verwijder/{$leveranciers[$i]->id}", 'verwijder').
                    "</div>\n";
        }
        
        echo    "\n    <br>\n    <hr>\n    ".
                anchor('home/index','Back')."\n";
    
    ?>

</body>
</html>