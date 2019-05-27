<?php
//PROJET : FLARM
//BTS SNIR - LP2I
//URBAIN AXEL
//JANVIER-MAI 2019

session_start();
$_SESSION = array();
//Destruction de la session
session_unset();
session_destroy();
//Redirection vers la page d'accueil
header('Location: ../index.php');
exit();
