<?php
//PROJET : FLARM
//BTS SNIR - LP2I
//URBAIN AXEL
//JANVIER-MAI 2019

session_start();
if(!isset($_SESSION['login'])){
  header('Location: index.php');
  exit();
}
require_once 'function/db-config.php';
require_once 'function/function.php';

  //Récupération de la Latitude et de la Longitude
  $dataLongLat = array();
  $reqLatLon = $bdd->query("SELECT id,Longitude,Latitude FROM information_vol WHERE id_Vol =".$_SESSION['id_Vol']."");

  //Récupérer toutes les longitudes faire un tableau puis les convertirs
  //Récupérer toutes les latitudes faire un tableau puis les convertirs
  while ($row = $reqLatLon->fetch()) {
    $Longitude = $row['Longitude'];
    $Latitude = $row['Latitude'];
    $dataLongLat[] = $Latitude.','.$Longitude;
  }

  $reqLatLon->closeCursor();

  print json_encode($dataLongLat);
?>
