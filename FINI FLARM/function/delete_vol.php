<?php
//PROJET : FLARM
//BTS SNIR - LP2I
//URBAIN AXEL
//JANVIER-MAI 2019

require_once 'db-config.php';
require('function.php');

//Vérification de la connexion
session_start();
if(!isset($_SESSION['login'])){
  header('Location: ../index.php');
  exit();
}

if(isset($_POST['delete_vol'])){
  // Connexion à la base de données
  $id = $_GET['id'];
  //requete de suppression du vol et des informations du vol
  $queryVols = $bdd->prepare("DELETE FROM vols WHERE id = ".$id."");
  $queryInfVols = $bdd->prepare("DELETE FROM information_vol WHERE id_Vol = ".$id."");

  $queryVols->execute();
  $queryInfVols->execute();

  $queryVols->closeCursor();
  $queryInfVols->closeCursor();

  //Redirection en fonction du role de l'utilisateur
  if($_SESSION['id_role']!=4)
  {
    header('Location: ../historique.php');
  }
  else
  {
    header('Location: ../PanelAdmin/hist_adm.php');
  }
}
else {
  echo "ERREUR : Vous n'avez pas suivi la procédure !";
}
