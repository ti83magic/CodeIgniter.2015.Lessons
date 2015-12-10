<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Json - Productenclient
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>

<script type="text/javascript">

    function haalproducten( gekozensoort ) {
        $.ajax({type : "GET",
                url : site_url + "/json/producten",
                data : { soort : gekozensoort },
                success : function(result){
                    var producten = jQuery.parseJSON(result);
                    var tekst = "";
                    for (var i = 0; i < producten.length; i++) {
                        tekst += producten[i].naam + "\n";
                    }
                    $( "#producten" ).val(tekst);
                }
        });
    }

    $(function() {
        $( "#kader" ).tabs();
        $( "#terug" ).button();
        
        $( "[type='radio']" ).click(function() {
            haalproducten( $( this ).val() );
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
                    <td>
                        <?php echo "<div>" . form_radio(array('name' => 'soort', 'id' => 'soort1', 'value' => 'bureel')) . "bureel</div>\n"; ?>
                        <?php echo "<div>" . form_radio(array('name' => 'soort', 'id' => 'soort2', 'value' => 'middag')) . "middag</div>\n"; ?>
                    </td>
                    <td>
                        <?php echo form_textarea(array('name' => 'producten', 'id' => 'producten', 'rows' => '5', 'cols' => '40',  'class' => 'text ui-widget-content')); ?>
                    </td>
                </tr>
            </table>
        </p>
    </div>
</div>

<p>
  <a id="terug" href="javascript:history.go(-1);">Terug</a>
</p>