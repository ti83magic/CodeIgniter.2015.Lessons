<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    
    // +----------------------------------------------------------
    // | Fair Trade Shop - cookies
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Cookies
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------
    
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cookies</title>
    </head>
    <body>
    <img src="<?php echo base_url() . APPPATH . "images/fairtradeshop.jpg" ?>" />
        <h4>Cookies</h4>
        <?php
	if ($taal == 'N') {
            echo "<div>Welkom " . $naam . "!</div>";
	} else {
            echo "<div>Welcome " . $naam . "!</div>";		
	}
        ?>
    </body>
</html>
