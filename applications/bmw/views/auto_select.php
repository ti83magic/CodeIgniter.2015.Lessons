<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    // +----------------------------------------------------------
    // | BMW - oefening
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Auto select
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body style="background-repeat: no-repeat;" background="<?php echo base_url() . APPPATH; ?>images/logos/background1.jpg">

        <img src="<?php echo base_url() . APPPATH; ?>images/logos/autobanner.jpg" />

        <?php
        $serie = '';
        foreach ($autos as $auto) {
            if ($auto->serie != $serie) {
                $serie = $auto->serie;
                echo "<h3>$serie series</h3>\n\n";
            }

            echo '<div>' . anchor("auto/info/$auto->id", $auto->auto) . '</div>';
        }
        ?>

        <div>
            <hr>
            <?php echo anchor("home/index", "Back"); ?>
        </div>


    </body>
</html>