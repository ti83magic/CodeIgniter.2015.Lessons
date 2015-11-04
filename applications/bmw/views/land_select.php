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
                Select the country of your choice:

                <?php
                $js = 'id="landen" onChange="document.myform.submit();"';
                $attributes = array('id' => 'myform', 'name' => 'myform');

                echo form_open('land/info', $attributes);
                echo form_dropdownpro('land', $adressen, 'id', 'land', '0', $js);
                echo form_close();
                
                ?>

                </form>
            </div>

        </section>
        <div>
            <hr>
            <?php echo anchor("home/index", "Back"); ?>
        </div>
    </body>
</html>
