<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Brouwerij/lijst
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>

<script type="text/javascript">

    $(function() {
        $( "#terug" ).button();
        $( "#toevoegen" ).button();
    });
        
</script>

<script type="text/javascript">

    var deleteid = 0;

    $(function(){

        $( "#dialog-delete" ).dialog({
            autoOpen: false,
            resizable: false,
            height: 175,
            modal: true,
            buttons: {
                "Ja": function() {
                    $( this ).dialog( "close" );
                    location.href = site_url + '/brouwerij/schrappen/' + deleteid;
                },
                "Neen": function() {
                    $( this ).dialog( "close" );
                }
            }
        });

        $( ".delete" ).click(function(e) {
            e.preventDefault();
            deleteid = $( this ).prop("id").valueOf();
            $( "#dialog-delete" ).dialog( "open" );
        });

    });
    
</script>

<div id="dialog-delete" title="Verwijderen">
    <p><span style="float:left; margin:0 20px 20px 0;">
            <img src="<?php echo base_url() . APPPATH; ?>images/icons/32x32/delete.png" />
        </span>
        <span>Brouwerij wordt verwijderd. Ben je zeker?</span>
    </p>
</div>

  <?php 
  
echo '<p>';
echo anchor('home/index', 'Terug', 'id="terug"'); 
echo "&nbsp;";
echo anchor('brouwerij/toevoegen', 'Brouwerij toevoegen', 'id="toevoegen"');
echo "</p>\n";

$i = 0;
foreach ($brouwerijen as $brouwerij) {
    $i++;
    echo '<div>';
    echo anchor('brouwerij/wijzigen/'  . $brouwerij->id , $i) . '. ';
    echo $brouwerij->naam . ' ';
    echo "<a class='delete' href='#' id='" . $brouwerij->id . "'>verwijderen</a>";
    echo "</div>\n";
}

?>