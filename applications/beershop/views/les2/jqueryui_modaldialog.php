<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | ModalDialog
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>

<script type="text/javascript">

    var deleteid = 0;

    $(function() {
        $( "#terug" ).button();
    });
    
    $(function(){

        $( "#dialog-delete" ).dialog({
            autoOpen: false,
            resizable: false,
            height: 175,
            modal: true,
            buttons: {
                "Ja": function() {
                    $( this ).dialog( "close" );
                    // location.href = site_url + '/brouwerij/schrappen/' + 
                    // deleteid;
                    alert(site_url + '/brouwerij/schrappen/' + deleteid);
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

<p>
  <a id="terug" href="javascript:history.go(-1);">Terug</a>
</p>

<div id="dialog-delete" title="Verwijderen">
    <p><span style="float:left; margin:0 20px 20px 0;">
            <img src="<?php echo base_url() . APPPATH; ?>images/icons/32x32/delete.png" />
        </span>
        <span>Brouwerij wordt verwijderd. Ben je zeker?</span>
    </p>
</div>

<div>InBev <a class='delete' href='#' id='6'>verwijderen</a></div>
<div>De Kluis <a class='delete' href='#' id='1'>verwijderen</a></div>
<div>Haacht <a class='delete' href='#' id='12'>verwijderen</a></div>
