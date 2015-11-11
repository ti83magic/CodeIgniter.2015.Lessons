<?php

// +----------------------------------------------------------
// | TV Shop
// +----------------------------------------------------------
// | KHK - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Aanmelden
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>

<?php
    $attributes = array('name' => 'myform');
    echo form_open('home/aanmelden', $attributes);
?>
<table>
    <tr>
        <td><?php echo form_label('E-mail:', 'email'); ?></td>
        <td><?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '30')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Wachtwoord:', 'password'); ?></td>
        <td><?php 
                $data = array('name' => 'password', 'id' => 'password', 'size' => '30');
                echo form_password($data);
            ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_submit('mysubmit', 'Submit'); ?></td>
    </tr>
</table>

<?php echo form_close(); ?>

<p>Geen account?

<?php echo anchor('user/nieuw', 'Registreren'); ?>

</p>