<?php

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | Thomas More Kempen - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Brouwerij/ajax
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------
?>

<?php

$this->table->class = 'fancy';

$rijen[0] = new stdClass();
$rijen[0]->titel = 'Naam';
$rijen[0]->inhoud = $brouwerij->naam;

$rijen[1] = new stdClass();
$rijen[1]->titel = 'Oprichting';
$rijen[1]->inhoud = toDDMMYYYY($brouwerij->oprichting);

$rijen[2] = new stdClass();
$rijen[2]->titel = 'Stichter';
$rijen[2]->inhoud = $brouwerij->stichter;

$rijen[3] = new stdClass();
$rijen[3]->titel = 'Plaats';
$rijen[3]->inhoud = $brouwerij->plaats;

$rijen[4] = new stdClass();
$rijen[4]->titel = 'Aantal werknemers';
$rijen[4]->inhoud = $brouwerij->werknemers;


echo $this->table->create($rijen, ['','']); //, ['','Naam','Email','Datum','Adres']);
?>