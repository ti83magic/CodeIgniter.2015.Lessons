<?php

// iedereen
echo divAnchor('home/index', 'Home');
echo divAnchor('product/lijst', 'Productenlijst');
if ($user == null) { // niet aangemeld
    echo divAnchor('home/login', 'Aanmelden');
} else { // wel aangemeld
    echo divAnchor('home/afmelden', 'Afmelden');
    switch ($user->level) {
        case 1: // gewone geregistreerde gebruiker
            echo divAnchor('product/bestel', 'Producten bestellen');
            break;
        case 5: // administrator
            echo divAnchor('product/beheer', 'Producten beheren');
            echo divAnchor('admin/userbeheer', 'Gebruikers beheren');
            echo divAnchor('admin/config', 'Configureren');
            break;
    }
}
