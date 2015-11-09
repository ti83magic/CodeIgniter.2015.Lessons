<html>
<head>
    <?php

    // +----------------------------------------------------------
    // | Trivial Pursuit - oefening
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Main Master
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------

    ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $title; ?></title>

    
    <?php echo link_tag(base_url() . APPPATH. "/css/style.css" ); ?>
    
</head>
<body>
    <div id="hoofding"><?php echo $header; ?></div>
    <div id="inhoud"><?php echo $content; ?></div>
    <div id="voetnoot"><?php echo $footer; ?></div>
</body>
</html>