<?php

include 'gegevens.php';

// -----------------------------------------------------------------------------
// Project:     CodeIgniter.2015.Lessons
// Bestand:     email.php
// 
// Gemaakt op:  9-nov-2015 22:33:05
// Auteur:      Anthony Woudenberg
//              Toegepaste Informatica
//              Thomas More Kempen
// 
// Samenvatting: 
// -------------
// Configuratiebestand voor de email-library.
// -----------------------------------------------------------------------------

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.live.com';
$config['smtp_user'] = $mailUser;
$config['smtp_pass'] = $mailPass;
$config['smtp_port'] = 587;
