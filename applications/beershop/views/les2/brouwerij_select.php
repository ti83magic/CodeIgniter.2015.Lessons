<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Brouwerij/select
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<script type="text/javascript">

    function zoekbrouwerij ( brouwerijId ) {
        $.ajax({type : "GET",
                url : site_url + "/brouwerij/ajax",
                data : { brouwerijId : brouwerijId },
                success : function(result){
                    $( "#resultaat" ).html(result);
                }
        });
    }
    
    $(function() {
        $( "#terug" ).button();
    });
   
    $(document).ready(function(){

        $( "#brouwerij" ).change(function() {
            zoekbrouwerij( $( this ).val() );
        });
        
    });

</script>

<h4><?php echo $title; ?></h4>

<p>
    <?php echo anchor('home/index', 'Terug', 'id="terug"'); ?>
</p>

<?php
    foreach ($brouwerijen as $brouwerij) {
        $options[$brouwerij->id] = $brouwerij->naam;
    }
?>

<table>
    <tr>
        <td valign="top">
            <p>
                <?php echo form_dropdown('brouwerij', $options, '0', 'id="brouwerij" size="10" class="text ui-widget-content" style="width:250px"'); ?>
            </p>
        </td>
        <td>&nbsp;</td>
        <td valign="top">
            <div id="resultaat"></div>
        </td>
    </tr>
</table>