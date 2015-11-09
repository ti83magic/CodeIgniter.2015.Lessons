<?php

// +----------------------------------------------------------
// | Trivial Pursuit - oefening
// +----------------------------------------------------------
// | KHK - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Tien op tien
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4>Resultaat</h4>

<p>
    Gefeliciteerd, je hebt nu <?php echo $score?> punten!!
</p>
<p>
    Omdat je alle vragen goed had, mag je je naam invoeren in de hall of fame.
</p>

<?php
    $attributes = array('name' => 'myform');
    echo form_open('hall/registreer', $attributes);
?>

<table>
<tr>
    <td><?php echo form_label('Naam:', 'naam'); ?></td>
    <td><?php echo form_input(array('name' => 'naam', 'id' => 'naam', 'size' => '30')); ?></td>
</tr>
<tr>
    <td><?php echo form_label('Email:', 'email'); ?></td>
    <td><?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '30')); ?></td>
</tr>
<tr><td></td>
    <td><?php echo form_submit('mysubmit', 'Registreren'); ?></td>
</tr>
</table>
<?php echo form_close(); ?>