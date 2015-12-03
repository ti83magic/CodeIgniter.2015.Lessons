<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen- 2 TI - 201x-201x
// +----------------------------------------------------------
// | Product/lijst1
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
        $( "#accordion" ).accordion({
                autoHeight: false,
                navigation: true
        });
    });
        
</script>

<?php 

echo '<div id="accordion">';

foreach ($soorten as $soort) {
    echo '<h3><a href="#">' . $soort->naam . "</a></h3>\n"; 
    echo "<div><p>\n";
    
    foreach ($soort->producten as $product) {
        echo divAnchor('product/detail/' . $product->id, $product->naam) . "\n";
    }  
    echo "</p></div>\n";
}

echo '</div>';
    
?>

<p>
  <a id="terug" href="javascript:history.go(-1);">Terug</a>
</p>