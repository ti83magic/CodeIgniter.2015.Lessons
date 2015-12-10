<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Brouwerij/form
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>
<script type="text/javascript" 
    src="<?php echo base_url() . APPPATH; ?>js/jquery.numeric.js">
<script type="text/javascript" 
            src="<?php echo base_url() . APPPATH; ?>js/jquery.maskedinput.js"></script>
<script type="text/javascript">

    $(function() {
        
//        $( "button" ).button();
//        $( "#oprichting" ).datepicker({ dateFormat: 'dd/mm/yy', 
//                                        changeMonth: true, 
//                                        changeYear: true });
										
                $( "#oprichting" ).mask("99/99/9999");										
        $( "#werknemers" ).numeric(false);
        
        $( "#annuleer" ).click(function(e) {
            e.preventDefault();
            history.go(-1);
        });
        
    });
    
</script>

<script type="text/javascript">

    var ok = true;

    $(function(){

        function validatieOK ()
        {
            ok = true;

            if ($( "#naam" ).val() == "") {
                $( "#naam" ).addClass( "ui-state-error" );
                ok = false;
            } else {
                $( "#naam" ).removeClass( "ui-state-error" );
            }
            if ($( "#plaats" ).val() == "") {
                $( "#plaats" ).addClass( "ui-state-error" );
                ok = false;
            } else {
                $( "#plaats" ).removeClass( "ui-state-error" );
            }

            return ok;
        }

        $( "#doen" ).click(function(e) {
            e.preventDefault();
            if (validatieOK()) {
                $( "#myform" ).submit();
            }
        });
        
    });
    
</script>            

<?php
    $attributes = array('name' => 'myform', 'id' => 'myform');
    echo form_open('brouwerij/registreer', $attributes);
    echo form_hidden('id', $brouwerij->id);
?>

<table>
    <tr>
        <td><?php echo form_label('Naam:', 'naam'); ?></td>
        <td><?php echo form_input(array('name' => 'naam', 'id' => 'naam', 'value' => $brouwerij->naam, 'size' => '60',  'class' => 'text ui-widget-content')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Oprichting:', 'oprichting'); ?></td>
        <td><?php echo form_input(array('name' => 'oprichting', 'id' => 'oprichting', 'value' => toDDMMYYYY($brouwerij->oprichting), 'size' => '10',  'class' => 'text ui-widget-content')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Stichter:', 'stichter'); ?></td>
        <td><?php echo form_input(array('name' => 'stichter', 'id' => 'stichter', 'value' => $brouwerij->stichter, 'size' => '30',  'class' => 'text ui-widget-content')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Plaats:', 'plaats'); ?></td>
        <td><?php echo form_input(array('name' => 'plaats', 'id' => 'plaats', 'value' => $brouwerij->plaats, 'size' => '60',  'class' => 'text ui-widget-content')); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Werknemers:', 'werknemers'); ?></td>
        <td><?php echo form_input(array('name' => 'werknemers', 'id' => 'werknemers', 'value' => $brouwerij->werknemers, 'size' => '10',  'class' => 'text ui-widget-content')); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_button('doen', $actie, 'id="doen"' ); ?>
            <?php echo form_button('annuleer', 'Annuleren', 'id="annuleer"'); ?>
        </td>
    </tr>
</table>

<?php echo form_close(); ?>