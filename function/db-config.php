<?php
//Connexion a la base de donnéees
$user = 'root';
$password = '';

// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8', $user, $password);
}

catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
