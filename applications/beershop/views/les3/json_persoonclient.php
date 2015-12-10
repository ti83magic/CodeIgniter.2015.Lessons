<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Json - Persoonclient
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>

<script type="text/javascript">

    function haalpersoon ( ) {
        $.ajax({type : "GET",
                url : site_url + "/json/persoon",
                success : function(result){
                    var persoon = jQuery.parseJSON(result);
                    $( "#naam" ).val(persoon.naam);
                    $( "#voornaam" ).val(persoon.voornaam);
                    $( "#geboortedatum" ).val(persoon.geboortedatum);
                    $( "#stripfiguur" ).val(persoon.stripfiguur);
                    $( "#saldo" ).val(persoon.saldo);
                }
        });
    }

    $(function() {
        $( "#kader" ).tabs();
        $( "#terug" ).button();
        $( "#knop" ).button();
        
        $( "#knop" ).click(function() {
            haalpersoon();
        });
            
    });
        
</script>

<div id="kader" style="width:400px">
    <ul>
        <li><a>Json</a></li>
    </ul>
    <div id="kader1">
        <p>
            <table>
                <tr>
                    <td rowspan="5">
                        <?php echo form_button('knop', 'Persoon', 'id="knop"'); ?>
                    </td>
                    <td>
                        <?php echo form_input(array('name' => 'naam', 'id' => 'naam', 'size' => '35',  'class' => 'text ui-widget-content')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_input(array('name' => 'voornaam', 'id' => 'voornaam', 'size' => '35',  'class' => 'text ui-widget-content')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_input(array('name' => 'geboortedatum', 'id' => 'geboortedatum', 'size' => '20',  'class' => 'text ui-widget-content')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_input(array('name' => 'stripfiguur', 'id' => 'stripfiguur', 'size' => '20',  'class' => 'text ui-widget-content')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_input(array('name' => 'saldo', 'id' => 'saldo', 'size' => '20',  'class' => 'text ui-widget-content')); ?>
                    </td>
                </tr>
            </table>
        </p>
    </div>
</div>

<p>
  <a id="terug" href="javascript:history.go(-1);">Terug</a>
</p>