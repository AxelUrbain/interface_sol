<?php
session_start();
if(!isset($_SESSION['login'])){
  header('Location: index.php');
  exit();
}

require_once 'function/db-config.php';
require_once 'function/function.php';

if(isset($_POST['statistique']))
{
  $Altitude = '';
  $Vitesse = '';
  $UnitSec = '';

  //Création du cookie qui stockera le numéro de vol pour la map
  $cookie_name = "id_Vol";
  $cookie_value = $_GET['id'];
  setcookie($cookie_name,$cookie_value,time() + (86400 * 30), "/");

  //query to get data from the table
  $reqAltitude = $bdd->query("SELECT id,Altitude FROM information_vol WHERE id_Vol = ".$_COOKIE['id_Vol']."");
  $reqVitesse = $bdd->query("SELECT id,Vitesse FROM information_vol WHERE id_Vol = ".$_COOKIE['id_Vol']."");


  $nbrSec = 0;
  //loop through the returned data
  while ($row = $reqAltitude->fetch()) {

    $Altitude = $Altitude . '"'. $row['Altitude'].'",';
    $UnitSec = $UnitSec . '"'. $nbrSec.' sec",';
    $nbrSec++;
  }

  while ($row = $reqVitesse->fetch()) {
    $Vitesse = $Vitesse .'"'. $row['Vitesse'] .'",';
  }

  $Altitude = trim($Altitude,",");
  $Vitesse = trim($Vitesse,",");
  $UnitSec = trim($UnitSec,",");

  $reqAltitude->closeCursor();
  $reqVitesse->closeCursor();
}
else {
  echo "ERREUR : Aucunes données pour afficher des informations de vol !";
}
?>

<!doctype html>
<html lang="fr">
  <?php include('include/membre/header.php'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>

  <body>

    <?php include('include/membre/navbar.php'); ?>

    <div class="title">
      <center>
        <h4 class="">Données du vol : <?php echo $_COOKIE['id_Vol']; ?></h4>
      </center>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-lg-4">
          <h3>Altitude</h3>
          <canvas id="Altitude" style="width:100%;"></canvas>
          <h3>Vitesse</h3>
          <canvas id="Vitesse" style="width:100%;"></canvas>
          <script>
            var ctx = document.getElementById("Altitude").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php echo $UnitSec; ?>],
                    datasets:
                    [{
                        label: 'Altitude',
                        data: [<?php echo $Altitude; ?>],
                        backgroundColor: 'transparent',
                        borderColor:'rgba(255,99,132)',
                        borderWidth: 2
                    }]
                }
            });

            var ctx = document.getElementById("Vitesse").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php echo $UnitSec; ?>],
                    datasets:
                    [{
                        label: 'Vitesse',
                        data: [<?php echo $Vitesse; ?>],
                        backgroundColor: 'transparent',
                        borderColor:'rgba(50,192,204)',
                        borderWidth: 2
                    }]
                }
            });

          </script>
        </div>
        <div class=" col-xs-12 col-md-8 col-lg-8">
          <h2>TEST CARTE</h2>
          <div id="mapid"></div>
        </div>
      </div>
    </div>

    <?php include('include/footer.php'); ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
      integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
      crossorigin=""></script>
    <script src="map.js"></script>
  </body>
</html>
