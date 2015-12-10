<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Home
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<h4><?php echo $title; ?></h4>

<script type="text/javascript">
    
	$(function() {
                $( ".buttons" ).button();
	});
        
</script>

<table>
    <tr>
        <th>Les 1 Inleiding</th>
        <th>Les 2 Ajax</th>
        <th>Les 3 JSON</th>
        <th>Les 4 Forms</th>
    </tr>
    <tr>
        <td valign="top" style="width:190px">
            <?php

            echo "<h5>jQuery UI</h5>";

            echo divAnchor('jqueryui/button', 'Button', 'class="buttons"' );
            echo divAnchor('jqueryui/datepicker', 'Datepicker', 'class="buttons"' );
            echo divAnchor('jqueryui/accordion', 'Accordion', 'class="buttons"' );
            echo divAnchor('jqueryui/tabs', 'Tabs', 'class="buttons"' );

            echo "<h5>Beershop</h5>";

            echo divAnchor('product/lijst1', 'Soort/product Accordion', 'class="buttons"' );
            echo divAnchor('product/lijst2', 'Soort/product Tabs', 'class="buttons"' );

            ?>
        </td>
        <td valign="top" style="width:190px">
            <?php

            echo "<h5>jQuery UI</h5>";

            echo divAnchor('jqueryui/modaldialog', 'Modal dialog', 'class="buttons"' );
            echo divAnchor('jqueryui/tijd', 'Ajax', 'class="buttons"' );
            
            echo "<h5>Beershop</h5>";

            echo divAnchor('brouwerij/lijst', 'Brouwerijen Validatie', 'class="buttons"' );
            echo divAnchor('bestelling/lijst', 'Bestellingen Ajax', 'class="buttons"' );
            echo divAnchor('brouwerij/select', 'Brouwerijen Ajax', 'class="buttons"' );
            echo divAnchor('soort/lijst', 'Soort/product Ajax', 'class="buttons"' );
            ?>
        </td>
        <td valign="top" style="width:190px">
            <?php

            echo "<h5>jQuery UI</h5>";

            echo divAnchor('json/persoonclient', 'Persoon', 'class="buttons"' );
            echo divAnchor('json/productenclient', 'Producten', 'class="buttons"' );
            echo divAnchor('json/schoolclient', 'School', 'class="buttons"' );

            echo "<h5>Beershop</h5>";

            echo divAnchor('bestelling/zoek', 'Bestellingen zoeken', 'class="buttons"' );
            echo divAnchor('product/tabjson', 'Brouwerij/product-tab', 'class="buttons"' );
            
            ?>
        </td>
        <td valign="top" style="width:190px">
            <?php

            echo "<h5>jQuery UI</h5>";

            echo divAnchor('', '...', 'class="buttons"' );

            echo "<h5>Beershop</h5>";

            ?>
        </td>
    </tr>
</table>