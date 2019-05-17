<?php
require_once 'db-config.php';
require('function.php');

session_start();
if(!isset($_SESSION['login'])){
  header('Location: ../index.php');
  exit();
}

if(isset($_POST['delete_vol'])){
  // Connexion à la base de données
  $id = $_GET['id'];

  $queryVols = $bdd->prepare("DELETE FROM vols WHERE id = ".$id."");
  $queryInfVols = $bdd->prepare("DELETE FROM information_vol WHERE id_Vol = ".$id."");

  $queryVols->execute();
  $queryInfVols->execute();

  $queryVols->closeCursor();
  $queryInfVols->closeCursor();

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
  echo "ERREUR : Les informations sélectionné son éronés ou vous n'avez pas suivi la procédure !";
}
