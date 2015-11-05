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
    </head>
    <body>
        <?php
        $this->bootstrap->setLevel(1);
        
        echo $this->bootstrap->breadcrumbs($links);
        ?>
    </body>
</html>


<?php
/* End of file examples_bootstrap.php */
?>