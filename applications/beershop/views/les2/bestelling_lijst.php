<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Bestelling/lijst
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>

<script type="text/javascript">

    function zoek ( zoekstring ) {
        $.ajax({type : "GET",
                url : site_url + "/bestelling/ajax",
                data : { zoekstring : zoekstring },
                success : function(result){
                    $( "#resultaat" ).html(result);
                }
        });
    }

    $(function() {
        $( "#kader" ).tabs();
        $( "#terug" ).button();
    });

    $(document).ready(function(){

        $( "#naam" ).keyup(function() {
            if ( $( this ).val() == "") {
                $( "#resultaat" ).html( "" );
            } else {
                zoek( $( this ).val() );   
            }
        });

    });
        
</script>

<p>
    <?php echo anchor('home/index', 'Terug', 'id="terug"'); ?>
</p>

<div id="kader" style="width:400px">
    <ul>
        <li><a>Zoeken</a></li>
    </ul>
    <div id="kader1">
        <p>
            <?php echo form_label('Klant:', 'klant'); ?>
            <?php echo form_input(array('name' => 'naam', 'id' => 'naam', 'size' => '55',  'class' => 'text ui-widget-content')); ?>
        </p>
    </div>
</div>

<p>
    <div id="resultaat"></div>
</p>

