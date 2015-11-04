<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
// -----------------------------------------------------------------------------
// Auteur:                  Anthony Woudenberg
//                          Thomas More Kempen 2Ti
// Pagina:                  oefeningyy.php
// Samenvatting:            <vul in>
// -----------------------------------------------------------------------------
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="../deelx_oef.css" />
    </head>
    <body>
        <header>
            <?php echo heading('Leverancier verwijderen', 3); ?>
            <hr>
        </header>
        <section>
            Weet je zeker dat je leverancier <?php $leverancier->bedrijf ?> wilt verwijderen?

        </section>
        <div>
            <hr>
            <?php echo anchor("home/index", "Back"); ?>
        </div>
    </body>
</html>
