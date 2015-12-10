<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Ajax/tijd
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>

<script type="text/javascript">

    function zoek ( zoekstring ) {
        $.ajax({type : "GET",
                url : site_url + "/jqueryui/ajax",
                data : { zoekstring : zoekstring },
                success : function(result){
                    $( "#resultaat" ).html(result);
                }
        });
    }

    $(function() {
        $( "#kader" ).tabs();
        $( "#terug" ).button();
        
        $( "#tijd" ).button();
        $( "#datum" ).button();
    });

    $(document).ready(function(){

        $( "#tijd" ).click(function() {
            zoek( "tijd" );   
        });

        $( "#datum" ).click(function() {
            zoek( "datum" );   
        });
        
    });
        
</script>

<p>
    <?php echo anchor('home/index', 'Terug', 'id="terug"'); ?>
</p>

<div id="kader" style="width:400px">
    <ul>
        <li><a>Ajax</a></li>
    </ul>
    <div id="kader1">
        <p>
            <?php
                echo form_button(array('name' => 'tijd', 'id' => 'tijd', 'content' => 'Tijd'));
                echo form_button(array('name' => 'datum', 'id' => 'datum', 'content' => 'Datum'));
            ?>
        </p>
    </div>
</div>

<p>
    <div id="resultaat"></div>
</p>

