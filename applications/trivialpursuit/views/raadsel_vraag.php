<?php

// +----------------------------------------------------------
// | Trivial Pursuit - oefening
// +----------------------------------------------------------
// | KHK - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Vraag
// |
// +----------------------------------------------------------
// | K. Vangeel
// +----------------------------------------------------------
?>


<?php

echo heading('Vraag ' . $raadsel->id, 4) . "\n";

echo "<p>$raadsel->vraag</p>\n";

$antwoorden = array(
    anchor("raadsel/antwoord/$raadsel->id/1", $raadsel->antwoord1),
    anchor("raadsel/antwoord/$raadsel->id/2", $raadsel->antwoord2),
    anchor("raadsel/antwoord/$raadsel->id/3", $raadsel->antwoord3)
);

echo ol($antwoorden);
