<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    // +----------------------------------------------------------
    // | BMW - oefening
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Info confirm
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body background="<?php echo base_url() . APPPATH; ?>images/logos/background3.jpg">
        <img src="<?php echo base_url() . APPPATH; ?>images/logos/infobanner.jpg " />
        <p>
            Thank you for your interest! Your information request with id <?php echo $id; ?><br />
            is registered on <?php echo date('d/m/Y'); ?>
            and will be answered as soon as possible.
        </p>

        <div>
            <hr>
            <?php echo anchor("home/index", "Back"); ?>
        </div>

    </body>
</html>