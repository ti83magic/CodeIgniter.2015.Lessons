<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Bestelling/zoek
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>

<script type="text/javascript">
    
    function zoekbestelling ( gekozenbestelling ) {
        $.ajax({type : "GET",
                url : site_url + "/bestelling/bestellijnen",
                data : { bestellingId : gekozenbestelling },
                success : function(result){
                    $( "#kader2" ).show();
                    $( "#resultaat" ).html(result);
                }
        });
    }

    $(function() {
        $( "#kader1" ).tabs();
        $( "#kader2" ).tabs();
        $( "#terug" ).button();
        
        $( "#kader2" ).hide();
    });

    $(function() {
        $( "#naam" ).autocomplete({
            source: site_url + "/bestelling/json",
            minLength: 2,
            select: function( event, ui ) {
                var gekozenbestelling = ui.item.id;
                $( this ).val(ui.item.value);
                zoekbestelling( gekozenbestelling );
            }
        });

    });
    
</script>

<p>
    <?php echo anchor('home/index', 'Terug', 'id="terug"'); ?>
</p>

<div id="kader1" style="width:400px">
    <ul>
        <li><a>Zoeken</a></li>
    </ul>
    <div id="kader1i">
        <p>
            <?php echo form_label('Klant:', 'klant'); ?>
            <?php echo form_input(array('name' => 'naam', 
                'id' => 'naam', 'size' => '55',  
                'class' => 'text ui-widget-content')); ?>
        </p>
    </div>
</div>

<p></p>

<div id="kader2" style="width:400px">
    <div id="kader2i">
        <p>
            <div id="resultaat"></div></p>
    </div>
</div>

