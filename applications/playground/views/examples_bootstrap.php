<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

// -----------------------------------------------------------------------------
// Project:     CodeIgniter.2015.Lessons
// Bestand:     examples_bootstrap.php
// 
// Gemaakt op:  5-nov-2015 11:54:10
// Auteur:      Anthony Woudenberg
//              Toegepaste Informatica
//              Thomas More Kempen
// 
// Samenvatting: 
// -------------
// Hier vindt u enkele voorbeelden rond de bootstrap library.
// -----------------------------------------------------------------------------
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Examples: Bootstrap</title>
        <?php echo link_tag('css/bootstrap.css'); ?>        
        <?php echo link_tag('css/custom.css'); ?>     

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">

            <?php
            $this->bootstrap->level = 2;

            echo heading('Examples: Bootstrap', 1) . "\n";

            echo heading('Breadcrumbs', 3) . "\n";
            echo $this->bootstrap->breadcrumbs($links);

            echo heading('Icons', 3) . "\n";
            echo $this->bootstrap->icon('eye-open');
            echo $this->bootstrap->icon('glyphicon-heart');
            echo $this->bootstrap->icon('glyphicon glyphicon-magnet');

            echo heading('Paginating', 3);
            ?>

            <p>
                NB: De paginating library van codeigniter bleek te beperkt, en
                kon geen gesplitste groepen van knoppen maken- iets dat ik wel
                graag in mijn projecten zou gebruiken. Ook de standaard paging
                class van bootstrap kon dit niet. Ik heb geprobeerd om dit met
                de paging helper te realiseren, maar de resulterende code was zo
                ongelooflijk lelijk dat ik een volledig nieuwe functie heb
                geschreven.
            </p>

            <?php
            echo "Alles, gesplitst: " . $this->bootstrap->paginating('examples/bootstrap/', $nRows, $perPage, $current_page, true, true) . "<br>\n";
            echo "Alles, niet gesplitst: " . $this->bootstrap->paginating('examples/bootstrap/', $nRows, $perPage, $current_page, false, true) . "<br>\n";
            echo "Niet alles, gesplitst: " . $this->bootstrap->paginating('examples/bootstrap/', $nRows, $perPage, $current_page, true, false) . "<br>\n";
            echo "Niet alles, niet gesplitst: " . $this->bootstrap->paginating('examples/bootstrap/', $nRows, $perPage, $current_page, false, false) . "<br>\n";

            echo heading('Alerts', 3);
            echo $this->bootstrap->alert('Dit is een informatieveld.', 'Info');
            echo $this->bootstrap->alert('Enkel wat tekst, en een <a href="#">link</a> die van kleur verandert.', 'Waarschuwing', 'warning');
            echo $this->bootstrap->alert('Alles was in orde! Nog een <a href="#">link</a>.', 'Succes', 'success', true);
            echo $this->bootstrap->alert('Alerts zijn ook weg te klikken.', 'Error', 'danger', true);
            ?>

        </div>

    </body>
</html>


<?php
/* End of file examples_bootstrap.php */
?>