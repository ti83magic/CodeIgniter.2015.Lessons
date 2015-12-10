<?php
// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Product/detail
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
        $("#accordion").accordion({
            autoHeight: true,
            navigation: true
        });
    });

</script>


<div id="accordion">
    <h3><a href="#">Algemeen</a></h3>
    <div>
        <table>
            <tr>
                <td>
                    <?php echo imgbier($product->afbeelding); ?>

                </td>
                <td>
                    <p>

                    <h4><?php echo $product->naam; ?></h4>
                    <?php
                    echo $product->uitleg;
                    ?>
                    </p>

                </td>
            </tr>
        </table>

    </div>
    <h3><a href="#">Kenmerken</a></h3>
    <div>
        <?php
        echo "Soort: " . $product->soort->naam . "<br>\n";
        echo "Graden: $product->graden<br>\n";
        echo "Prijs: " . toKomma($product->prijs) . " euro<br>\n";
        ?>
    </div>
    <h3><a href="#">Brouwerij</a></h3>
    <div>
        <?php
        echo "Naam: " . $product->brouwerij->naam . "<br>\n";
        echo "Opgericht: " . $product->brouwerij->oprichting . "<br>\n";
        echo "Stichter: " . $product->brouwerij->stichter . "<br>\n";
        echo "Plaats: " . $product->brouwerij->plaats . "<br>\n";
        ?>

    </div>



</div>




<p>
    <a id="terug" href="javascript:history.go(-1);">Terug</a>
</p>
