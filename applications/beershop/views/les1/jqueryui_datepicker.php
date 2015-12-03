<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Datepicker
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>

<script type="text/javascript">
	//------------------
	// jQuery UI bepalen
	//------------------
    $(function() {
        $( "#terug" ).button();
    });
    
    $(function() {
        $( "#datum" ).datepicker({ dateFormat: 'dd/mm/yy' });
    });
        
</script>

<?php echo form_label('Date:', 'date'); ?>
&nbsp;
<?php echo form_input(array('name' => 'datum', 'id' => 'datum', 'size' => '10',  'class' => 'text ui-widget-content')); ?>

<p>
  <a id="terug" href="javascript:history.go(-1);">Terug</a>
</p>