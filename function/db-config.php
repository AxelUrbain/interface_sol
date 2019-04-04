<?php
//Connexion a la base de donnéees
$host = 'localhost';
$dbname = 'interface-sol';
$user = 'root';
$password = 'root';

// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=interface-sol;charset=utf8', $user, $password);
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
