<?php
//PROJET : FLARM
//BTS SNIR - LP2I
//URBAIN AXEL
//JANVIER-MAI 2019

//Connexion a la base de donnéees
$user = 'interface_sol';
$password = 'LP2I_Flarm';
$baseName = 'interface_sol';

// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname='.$baseName.';charset=utf8', $user, $password);
}

catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
