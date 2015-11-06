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
            
            echo heading('Pagination', 3) . "\n";
            echo $this->typography->auto_typography("Standaard paginering met een bootstrap uiterlijk:");
            echo $this->bootstrap->paging('examples/bootstrap/', 300, 20, $current_page) . "<br>\n";
            
            echo $this->typography->auto_typography("Aangepaste paginering met gespleten groepen:");
            echo $this->bootstrap->pagingSplit('examples/bootstrap/', 300, 20, $current_page) . "<br>\n";
            
            
            ?>

        </div>

    </body>
</html>


<?php
/* End of file examples_bootstrap.php */
?>