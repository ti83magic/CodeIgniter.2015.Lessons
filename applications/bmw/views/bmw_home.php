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
        <title><?php echo $title ?></title>
        <link rel="stylesheet" href="../deelx_oef.css" />
    </head>
    <body>
        <header>
            <h3><?php echo $heading ?></h3>
            <hr>
        </header>
        <section>
            <div>
                <?php
                $img = rand(1, 4);
                echo img(APPPATH . "/images/logos/banner$img.jpg", FALSE);
                ?>
            </div>

            <div><h3>BMW Home</h3></div>
            <div>
                <?php
                echo anchor("auto/index", img(APPPATH . "/images/logos/auto.jpg", FALSE)) . "\n";
                echo anchor("land/index", img(APPPATH . "/images/logos/country.jpg", FALSE)) . "\n";
                echo anchor("info/form", img(APPPATH . "/images/logos/info.jpg", FALSE)) . "\n";
                ?>
            </div>

        </section>
        <footer>
            <hr>

        </footer>
    </body>
</html>
