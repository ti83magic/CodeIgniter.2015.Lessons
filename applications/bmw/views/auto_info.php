<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    // +----------------------------------------------------------
    // | BMW - oefening
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Auto info
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body style="background-repeat: no-repeat;" background="<?php echo base_url() . APPPATH . "images/$auto->achtergrond"; ?>">
    <section>
        <div>
            <?php
            echo imgbmw("logos/autobanner.jpg");
            echo heading($auto->auto, 3);

            echo table_open(2);
            echo table_row_open();

            echo table_data(imgbmw($auto->foto));
            echo table_data($auto->opmerking);

            echo table_row_close();
            echo table_close();
            ?>

        </div>
    </section>    
    <footer>
        <div>
            <hr>
            <?php echo anchor("auto/index", "back"); ?>
        </div>

    </footer>
</body>


</html>