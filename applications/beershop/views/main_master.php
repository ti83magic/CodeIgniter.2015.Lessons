<!DOCTYPE html">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<head>
    <?php

    // +----------------------------------------------------------
    // | Trivial Pursuit - oefening
    // +----------------------------------------------------------
    // | Thomas More Kempen - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Main Master
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    ?>

    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" 
          href="<?php echo base_url() . APPPATH; ?>css/style.css" />
    <link rel="stylesheet" type="text/css" 
          href="<?php echo base_url() . APPPATH; ?>css/jquery-ui.css" />

    <script type="text/javascript" 
            src="<?php echo base_url() . APPPATH; ?>js/jquery.js"></script>
    <script type="text/javascript" 
            src="<?php echo base_url() . APPPATH; ?>js/jquery-ui.js"></script>
    <script type="text/javascript">
        var site_url = '<?php echo site_url();?>';
    </script>
</head>
<body>
    <div id="hoofding"><?php echo $header; ?></div>
    <div id="inhoud"><?php echo $content; ?></div>
</body>
</html>