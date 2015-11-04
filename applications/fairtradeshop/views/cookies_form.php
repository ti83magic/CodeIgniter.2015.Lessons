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
            $attributes = array('name' => 'myform');
            echo form_open('cookies/registreer', $attributes);
        ?>
            <div><?php echo form_label('Name:', 'naam'); ?>
                 <?php 
                        $data = array('name' => 'naam', 'id' => 'naam', 'size' => '30');
                        echo form_input($data);
                 ?>
            </div>
        
            <div><?php echo form_label('Taalkeuze:', 'taal'); ?>
                 <?php echo form_radio(array('name' => 'taal', 'id' => 'taal', 'value' => 'N')); ?> Nederlands 
                 <?php echo form_radio(array('name' => 'taal', 'id' => 'taal', 'value' => 'E')); ?> Engels 
            </div>
        
            <div><?php echo form_submit('mysubmit', 'Submit'); ?></div>
            
	<?php echo form_close(); ?>
    </body>
</html>