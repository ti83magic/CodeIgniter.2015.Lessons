<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Json - Schoolclient
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>

<script type="text/javascript">

    function haalschool ( ) {
        $.ajax({type : "GET",
                url : site_url + "/json/school",
                success : function(result){
                    var school = jQuery.parseJSON(result);
                    $( "#naam" ).val(school.naam);
                    $( "#straat" ).val(school.straat);
                    $( "#gemeente" ).val(school.gemeente);
                    
                    var options = "";
                    for (var i = 0; i < school.telefoonnummers.length; i++) {
                        options += "<option value='" + i + "'>" + 
                            school.telefoonnummers[i].plaats + ": " + 
                            school.telefoonnummers[i].nummer +
                            "</option>";
                    }
                    $( "#telefoonlijst" ).html(options);
                }
        });
    }

    $(function() {
        $( "#kader" ).tabs();
        $( "#terug" ).button();
        $( "#knop" ).button();
        
        $( "#knop" ).click(function() {
            haalschool();
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
                    <td rowspan="4">
                        <?php echo form_button('knop', 'School', 'id="knop"'); ?>
                    </td>
                    <td>
                        <?php echo form_input(array('name' => 'naam', 'id' => 'naam', 'size' => '35',  'class' => 'text ui-widget-content')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_input(array('name' => 'straat', 'id' => 'straat', 'size' => '35',  'class' => 'text ui-widget-content')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_input(array('name' => 'gemeente', 'id' => 'gemeente', 'size' => '35',  'class' => 'text ui-widget-content')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo form_dropdown('telefoonlijst', array(), '', 'id="telefoonlijst" size="5" class="text ui-widget-content" style="width:250px"'); ?>
                    </td>
                </tr>
            </table>
        </p>
    </div>
</div>

<p>
  <a id="terug" href="javascript:history.go(-1);">Terug</a>
</p>