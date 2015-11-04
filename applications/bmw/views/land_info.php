<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
// -----------------------------------------------------------------------------
// Oefening:                x.y
// -----------------------------------------------------------------------------
// Auteur:                  Anthony Woudenberg
//                          Thomas More Kempen 2Ti
// Pagina:                  oefeningyy.php
// Doel van de oefening:    <vul in>
// -----------------------------------------------------------------------------
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Oefening x.y</title>
        <link rel="stylesheet" href="../deelx_oef.css" />
    </head>
    <body>
        <header>
            <?php
            echo imgbmw("logos/autobanner.jpg");
            echo heading($title, 3);
            ?>
        </header>
        <section>
            <div>
                <?php
                echo imgbmw("landen/vlag$adres->id.gif");

                $data = array(
                    'name' => 'text',
                    'id' => 'text',
                    'value' => "$adres->land\n$adres->naam\n$adres->straat\n$adres->plaats\n$adres->tel\n$adres->fax",
                    'rows' => '10',
                    'cols' => '50',
                );
                echo form_textarea($data);
                ?>
            </div>

        </section>
        <div>
            <hr>
            <?php echo anchor("land/index", "Back"); ?>
        </div>
    </body>
</html>
