<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    // +----------------------------------------------------------
    // | BMW - oefening
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Info form
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

        <?php
// echo niet vergeten!
        echo imgbmw("logos/infobanner.jpg");
        ?>

        <p>Please fill out the following fields:</p>
        <?php
        $attributes = array('name' => 'myform');
        echo form_open('info/registreer', $attributes);
        ?>
        <table>
            <tr>
                <td><?php echo form_label('Name:', 'naam'); ?></td>
                <td><?php
                    $data = array('name' => 'naam', 'id' => 'naam', 'size' => '30');
                    echo form_input($data);
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo form_label('Email:', 'email'); ?></td>
                <td><?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '30')); ?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Address:', 'straat'); ?></td>
                <td><?php echo form_input(array('name' => 'straat', 'id' => 'straat', 'size' => '30')); ?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Postal code, Town:', 'plaats'); ?></td>
                <td><?php echo form_input(array('name' => 'plaats', 'id' => 'plaats', 'size' => '30')); ?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Country:', 'land'); ?></td>
                <td><?php
                    /*
                      $options[0] = '-- Select --';
                      foreach ($landen as $land) {
                      $options[$land->id] = $land->land;
                      }
                      echo form_dropdown('land', $options, '0');
                     */

                    echo form_dropdownpro('land', $landen, 'id', 'land', '0');
                    ?>
                </td>
            </tr>
            <tr>
                <td valign="top"><?php echo form_label('Information about:', 'info'); ?></td>
                <td>
                    <?php
                    echo form_radiogroup('auto', $autos, 'id', 'auto');
                    ?>
                </td>
            </tr>


            <tr>
                <td></td>
                <td><?php echo form_submit('mysubmit', 'Submit'); ?></td>
            </tr>
        </table>

        <?php echo form_close(); ?>

        <?php echo anchor('home/index', 'Back', 'title = "Back"'); ?>

    </body>
</html>