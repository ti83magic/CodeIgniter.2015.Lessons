<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Soort/lijst
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<script type="text/javascript">
    
    function zoekproducten ( soortId ) {
        $.ajax({type : "GET",
                url : site_url + "/soort/ajax1",
                data : { soortId : soortId },
                success : function(result){
                    $( "#product" ).html(result);
                }
        });
    }


    function toonProduct ( productId ) {
        alert('');
        $.ajax({type : "GET",
                url : site_url + "/soort/ajax2",
                data : { productId : productId },
                success : function(result){
                    $( "#kader" ).show();
                    $( "#kader" ).html(result);
                }
        });
    }


    $(function() {
        $( "#terug" ).button();
        $( "#kader" ).tabs();
        $( "#kader" ).hide();
    });
   
    $(document).ready(function(){

        $( "#soort" ).change(function() {
            zoekproducten( $( this ).val() );
        });

        $( "#product" ).change(function() {
            toonproduct( $( this ).val() );
        });

    });

</script>

<h4><?php echo $title; ?></h4>

<p>
    <?php echo anchor('home/index', 'Terug', 'id="terug"'); ?>
</p>

<?php
    foreach ($soorten as $soort) {
        $options[$soort->id] = $soort->naam;
    }
?>

<table>
    <tr>
        <td valign="top">
            <p>
                <?php echo form_dropdown('soort', $options, '0', 'id="soort" size="10" class="text ui-widget-content" style="width:250px"'); ?>
            </p>
            <p>
                <?php echo form_dropdown('product', array(), '', 'id="product" size="10" class="text ui-widget-content" style="width:250px"'); ?>
            </p>
        </td>
        <td>&nbsp;</td>
        <td>
            <div id="kader" style="width:600px">
                <ul>
                    <li><a>Product</a></li>
                </ul>
                <div id="kader1">
                    <p>
                        <div id="resultaat"></div>
                    </p>
                </div>
            </div>
        </td>
    </tr>
</table>