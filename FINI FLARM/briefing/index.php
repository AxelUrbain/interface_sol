<?php require_once('include/header.html'); ?>
<head>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Briefing d'avant vol</title>
</head>
<div class="container-fluid">
<body>
  <br>
  <form name="OACI_METAR" id="OACI_METAR" method="post" action="index.php">
    <label>Entrez le code OACI de votre aérodrome</label>
    <input type="text" name="oaci" placeholder="Code OACI (EX : LFCT)"/>
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
$url_vac = "https://www.sia.aviation-civile.gouv.fr/dvd/eAIP_23_MAY_2019/Atlas-VAC/PDF_AIPparSSection/VAC/AD/AD-2.".$code_oaci.".pdf";
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
  <body>
   <iframe width="650" height="450" src="https://embed.windy.com/embed2.html?lat=46.920&lon=-0.138&zoom=11&level=surface&overlay=wind&menu=&message=true&marker=&calendar=&pressure=true&type=map&location=coordinates&detail=true&detailLat=46.962&detailLon=-0.155&metricWind=kt&metricTemp=%C2%B0C&radarRange=-1" frameborder="0"></iframe>
  </body>
</div>
</center>
<?php require_once('include/footer.html'); ?>
</html>
