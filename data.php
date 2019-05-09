<?php
require_once 'function/db-config.php';
require_once 'function/function.php';
//Récupération de la Latitude et de la Longitude
$dataLongLat = array();
$reqLatLon = $bdd->query("SELECT id,Longitude,Latitude,DirLongitude,DirLatitude FROM information_vol");

//Récupérer toutes les longitudes faire un tableau puis les convertirs
//Récupérer toutes les latitudes faire un tableau puis les convertirs
while ($row = $reqLatLon->fetch()) {
  //Conversion Longitude
  $Longitude = $row['Longitude'];
  $DirLong = $row['DirLongitude'];
  $LongitudeDD = DMtoDD(substr($Longitude,0,3),substr($Longitude,3,10),$DirLong);
  //Conversion Latitude
  $Latitude = $row['Latitude'];
  $DirLat = $row['DirLatitude'];
  $LatitudeDD = DMtoDD(substr($Latitude,0,2),substr($Latitude,2,9),$DirLat);
  $dataLongLat[] = $LongitudeDD.','.$LatitudeDD;
}

$reqLatLon->closeCursor();

print json_encode($dataLongLat);
?>
