<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Bestelling/ajax
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------

?>

<?php

$this->table->class = 'fancy';

$i = 0;
foreach ($bestellingen as $bestelling) {    
    $i++;
    $rijen[$i] = new stdClass();
    $rijen[$i]->ID = $i;
    $rijen[$i]->Naam = $bestelling->naam;
    $rijen[$i]->Email = $bestelling->email;
    $rijen[$i]->Datum = toDDMMYYYY($bestelling->datum);
    $rijen[$i]->Adres = $bestelling->adres;
}

echo $this->table->create($rijen); //, ['','Naam','Email','Datum','Adres']);


?>
</table