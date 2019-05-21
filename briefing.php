<?php
session_start();
require('function/function.php');
require_once 'function/db-config.php';
if(!isset($_SESSION['login'])){
  header('Location: index.php');
  exit();
}
 ?>

<!doctype html>
<html lang="fr">
<?php include('include/membre/header.php'); ?>
<div class="">
<body>
  <?php include('include/membre/navbar.php'); ?>
  <center><h1>Briefing d'avant vol</h1></center>
  <form name="OACI_METAR" id="OACI_METAR" method="post" action="index.php">
    <label>Entrez le code OACI de votre aérodrome</label>
    <input type="text" name="oaci" placeholder="Code OACI (EX : LFCT)"/>
    <input type="button" class="btn btn-secondary" type="submit" value="Envoyer" />
  </form>
</body>
</html>
<?php

// Exectution de la condition si clic sur le bouton
if(isset($_POST['oaci']) && $_POST['oaci']!=NULL){
// Recuperation des valeurs du formulaire
$code_oaci = strtoupper($_POST["oaci"]);

// Recuperation Date & Heure
$date = date("Y/m/d");
$heure = date("H:i");

// Application des variables aux URLs
$url_api_metar = "https://api.checkwx.com/metar/".$code_oaci;
$url_api_taf = "https://api.checkwx.com/taf/".$code_oaci;
$url_vac = "https://www.sia.aviation-civile.gouv.fr/dvd/eAIP_25_APR_2019/Atlas-VAC/PDF_AIPparSSection/VAC/AD/AD-2.".$code_oaci.".pdf";
?>
</br>
<form id="leform" name="leform" action="http://notamweb.aviation-civile.gouv.fr/Script/IHM/Bul_Aerodrome.php" method="POST" enctype="x-www-form-urlencoded">
	<input type="hidden" name="bResultat" value="true">	<input type="hidden" name="bImpression" value="">	<input type="hidden" name="AERO_Langue" value="FR">
	<input type="hidden" name="ModeAffichage" value="RESUME">	<input type="hidden" name="AERO_Date_DATE" value="<?php echo $date ?>">
	<input type="hidden" name="AERO_Date_HEURE" value="<?php echo $heure ?>">	<input type="hidden" name="AERO_Duree" value="48">
	<input name="AERO_CM_REGLE" type="hidden" value="3"> <input name="AERO_CM_GPS" type="hidden" value="1">
	<input type="hidden" name="AERO_CM_INFO_COMP" value="1">	<input type="hidden" name="AERO_Tab_Aero[0]" value="<?php echo $code_oaci ?>">
	<input type="hidden" name="AERO_Tab_Aero[1]" value="">	<input type="hidden" name="AERO_Tab_Aero[2]" value="">
	<input type="hidden" name="AERO_Tab_Aero[3]" value="">	<input type="hidden" name="AERO_Tab_Aero[4]" value="">
	<input type="hidden" name="AERO_Tab_Aero[5]" value="">	<input type="hidden" name="AERO_Tab_Aero[6]" value="">
	<input type="hidden" name="AERO_Tab_Aero[7]" value="">	<input type="hidden" name="AERO_Tab_Aero[8]" value="">
	<input type="hidden" name="AERO_Tab_Aero[9]" value="">	<input type="hidden" name="AERO_Tab_Aero[10]" value="">
	<input type="hidden" name="AERO_Tab_Aero[11]" value="">	<input type="hidden" name="AERO_Tab_Aero[12]" value="">

	<input name="nom" class="btn btn-secondary" type="submit" value="Notams VFR" formtarget="_blank">
  <a href="<?php echo $url_vac; ?>" class="btn btn-secondary" role="button" title="Lien 1" target="_blank">Carte VAC</a>
	</form>
</br>
<?php
// Initialisation de l'API
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-API-KEY:3780bb8403352653e23a334eab']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Appel de l'API pour le METAR
curl_setopt($ch, CURLOPT_URL, $url_api_metar);
$result_metar = curl_exec ($ch);

// Decoupage du resultat
$test[] = $result_metar;
// Boucle qui parcourt le tableau
foreach ($test as $key => $value) {
$affichage_metar[] = explode('"', $result_metar);
unset($affichage_metar[',']);
}
if ($affichage_metar[0][2] == ":1,"){
// Affichage du resultat (Metar)
?>
  <div class="alert alert-primary" role="alert">
  <?php echo "METAR : ".$affichage_metar[0][5];?>
  </div>
<?php
}
else
{?>
  <div class="alert alert-primary" role="alert">
  <?php echo "METAR : Pas de METAR disponible pour ".$code_oaci."."?>
  </div>
<?php
}
// Appel de l'API pour le TAF
curl_setopt($ch, CURLOPT_URL,$url_api_taf);
$result_taf = curl_exec ($ch);

// Decoupage du resultat
$test[] = $result_taf;
// Boucle qui parcourt le tableau
foreach ($test as $key => $value) {
$affichage_taf[] = explode('"', $result_taf);
unset($affichage_taf[',']);
}
if ($affichage_taf[0][2] == ":1,"){
// Affichage du resultat (TAF)
?>
<div class="alert alert-primary" role="alert">
<?php echo "TAF : ".$affichage_taf[0][5]; ?>
</div>
<?php
}else
{?>
  <div class="alert alert-primary" role="alert">
  <?php echo "TAF : Pas de TAF disponible pour ".$code_oaci."."?>
  </div>
<?php
}}
?>

<!-- API WINDY METEO -->
</br></br>
<center>
  <head>
    <script src="https://unpkg.com/leaflet@0.7.7/dist/leaflet.js"></script>
    <script src="https://api4.windy.com/assets/libBoot.js"></script>
  	<style>
  		#windy {
  			width: 50%;
  			height: 500px;
  		}
  	</style>
  </head>
  <body>
    <div id="windy"></div>

    <script>
    // On vérifie que l'API soit disponible
    if (navigator.geolocation) {

        // On demande l'obtention de l'emplacement actuel.
        navigator.geolocation.getCurrentPosition(function (position) {

            // En cas de succès, on recupère les données de l'emplacement
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;

    const options = {

                // Required: API key
                key: 'RTKBP4EFNwgy4Y8VESMGTv7h1JpdQM2l',

                // Put additional console output
                verbose: true,

                // Optional: Initial state of the map
                lat: position.coords.latitude,
                lon: position.coords.longitude,
                zoom: 5,
        }

    // Initialize Windy API
    windyInit( options, windyAPI => {
        // windyAPI is ready, and contain 'map', 'store',
        // 'picker' and other usefull stuff

        const { map } = windyAPI
        // .map is instance of Leaflet map

        L.popup()
            .setLatLng([lat, lng])
            .setContent("Vous êtes ici")
            .openOn( map );

    })
  });
}
    </script>
  </br></br>
  </body>
</div>
</center>
<?php include('include/footer.php'); ?>
</html>
