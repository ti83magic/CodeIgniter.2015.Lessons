<?php
// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Product/lijst2
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

    $(function () {
        $("#terug").button();
        $('#tabs').tabs();
    });



</script>

<?php
$hoofd;
$i = 0;

// Maak een array met alle soorten bier.
foreach ($soorten as $soort) {
    //$hoofd[$i] = anchor("#tabs-$soort->id", $soort->naam) . "\n";
    $hoofd[$i] = "<a href=#tabs-$soort->id>$soort->naam</a>\n";
    $i++;
}
?>


<div id="tabs">
    <?php
    echo ul($hoofd);
    
    //echo print_r($hoofd);
    

    foreach ($soorten as $soort) {
        echo "    <div id='tabs-$soort->id'>\n";
        foreach($soort->producten as $product) {
            echo "        <p>".anchor("product/detail/$product->id",$product->naam)."</p>\n";
        }
        echo "    </div>\n";
    }
    ?>


</div>


<p>
    <a id="terug" href="javascript:history.go(-1);">Terug</a>
</p>