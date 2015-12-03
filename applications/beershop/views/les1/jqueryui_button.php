<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Button
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>

<script type="text/javascript">

    $(function() {
		//------------------
		// jQuery UI bepalen
		//------------------

        $( "#terug" ).button();
        $( "input:submit" ).button();
        $( "#annuleer" ).button();
        
		//---------------
		// gebeurtenissen
		//---------------
        $( "#annuleer" ).click(function(e) {
            e.preventDefault();
            history.go(-1);
        });
            
    });
        
</script>

<div>  
  <?php echo form_submit('mysubmit', 'Aanmelden') . "\n"; ?>
  <?php echo form_button('mybutton', 'Annuleren', 'id="annuleer"'); ?>
</div>

<p>
  <a id="terug" href="javascript:history.go(-1);">Terug</a>
</p>