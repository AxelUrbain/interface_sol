<?php
require_once 'function/db-config.php';
session_start();
if(!isset($_SESSION['login'])){
  header('Location: index.php');
  exit();
}

if(isset($_POST['submit']))
{
  //Tableau erreur
  $erreur = array();
  // Vérifie si le fichier a été uploadé sans erreur.
if(isset($_FILES["FileImport"]) && $_FILES["FileImport"]["error"] == 0){
    $nomOrigine = $_FILES["FileImport"]["name"];
    $filetype = $_FILES["FileImport"]["type"];
    $filesize = $_FILES["FileImport"]["size"];

    // Vérifie l'extension du fichier
    $elementChemin = pathinfo($nomOrigine);
    $extensionFichier = $elementChemin['extension'];
    $extensionAutorise = array("fc","txt");

    if(!(in_array($extensionFichier, $extensionAutorise))) {
      $erreur = "Erreur : Veuillez sélectionner un format de fichier valide.";
      return;
    }
    else{
      // Vérifie la taille du fichier - 5Mo maximum
      $maxsize = 5 * 1024 * 1024;
      if($filesize > $maxsize){
        $erreur = "Error: La taille du fichier est supérieure à la limite autorisée.";
        return;
      }
      else{
            //Télécharger le fichier
            // Copie dans le repertoire du script avec un nom
            // incluant l'heure a la seconde pres
            // PROBLEME DE DESTINATION A REGLER EN FIN DE PROJET !!!!
            $repertoireDestination = dirname(__FILE__)."/";
            //$repertoireDestination = '/fc';
            $nomDestination = "fichier_du_".date("YmdHis").".".$extensionFichier;
            if(move_uploaded_file($_FILES["FileImport"]["tmp_name"],$repertoireDestination.$nomDestination)){
              $success = "ca marche ! ";
            }
            else{
              $erreur = "Le fichier ne s'est pas téléchargé";
              return;
           }
      }
    }
    //Récupération des info de vol ,Requete insertion des informations table vols
    $recupInfoMembre = $bdd->query('SELECT id, nom, prenom FROM membre WHERE nom = "'.$_SESSION['login'].'"');
    $infoMembre = $recupInfoMembre->fetch();
    $membre = $infoMembre['id'];
    $description = $_POST['Description'];
    $recupInfoMembre->closeCursor();
    //RECUPERATION DE LA MACHINE
    $recupInfoMachine = $bdd->query('SELECT * FROM machine WHERE immatriculation = "'.$_POST['immatriculation'].'"');
    $infoMachine = $recupInfoMachine->fetch();
    $machine = $infoMachine['id'];
    $recupInfoMachine->closeCursor();
    //INSERTION DES INFORMATIONS DU FORMULAIRE DANS LA TABLE VOL
    $requeteVols = $bdd->prepare("INSERT INTO vols (id_membre, id_machine, description)
    VALUES(:id_membre, :id_machine, :description)");

    $requeteVols->execute(array(
      'id_membre'=> $membre,
      'id_machine'=> $machine,
      'description'=> $description
    ));
    $requeteVols->closeCursor();
    //Récupération de l'identifiant du vol
    $requeteIdVol = $bdd->query('SELECT MAX(id) FROM vols');
    $IdVol = $requeteIdVol->fetch();
    $requeteIdVol->closeCursor();
    //Requete d'insertion des informations du fichier
    $requeteImport = $bdd->prepare("INSERT INTO information_vol (UTC, Latitude, Longitude, DirLatitude, DirLongitude, Altitude, Cap, Vitesse, TypeAlarme, NiveauAlarme,
    EtatFLARM, PositionAutre, LongitudeAutre, LatitudeAutre, CapAutre, DirLatAutre, DirLongAutre, id_Vol) VALUES(:UTC, :Latitude, :Longitude, :DirLatitude, :DirLongitude, :Altitude, :Cap, :Vitesse,
    :TypeAlarme, :NiveauAlarme, :EtatFLARM, :PositionAutre, :LongitudeAutre, :LatitudeAutre, :CapAutre, :DirLatAutre, :DirLongAutre, :id_Vol)");

    // Ouvre le fichier en lecture
    $row = 1;
    if(($fp = fopen($nomDestination,"r")) !== FALSE){
      while(($data = fgetcsv($fp, 1000, "/")) !== FALSE){
        $requeteImport->execute(array(
          'UTC'=> $data[1],
          'Latitude'=> $data[2],
          'Longitude'=> $data[3],
          'DirLatitude'=> $data[4],
          'DirLongitude'=> $data[5],
          'Altitude'=> $data[6],
          'Cap'=> $data[7],
          'Vitesse'=> $data[8],
          'TypeAlarme'=> $data[9],
          'NiveauAlarme'=> $data[10],
          'EtatFLARM'=> $data[11],
          'PositionAutre'=> $data[12],
          'LongitudeAutre'=> $data[13],
          'LatitudeAutre'=> $data[14],
          'CapAutre'=> $data[15],
          'DirLatAutre'=> $data[16],
          'DirLongAutre'=> $data[17],
          'id_Vol'=> $IdVol[0]
        ));
      }
      fclose($fp);
      //Supprimer le fichier
      unlink($nomDestination);
      $requeteImport->closeCursor();
      //MESSAGE DE NOTIFICATION
      $success = "Le vol est bien enregistré !";
    }

} else{
    $erreur = "Error: " . $_FILES["FileImport"]["error"];
    return;
}
}
?>
<!doctype html>
<html lang="fr">
<?php include('include/membre/header.php'); ?>
<script src="Script/bootstrap-progressbar.min.js" type="text/javascript"></script>
<script src="progress-bar.js" type="text/javascript"></script>
  <body>
    <?php include('include/membre/navbar.php');?>
    <div class="container">
      <h2 class="form-title">Ajouter un vol</h2>
      <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
          <form action="add_fly.php" method="post" enctype="multipart/form-data" id="upload_form">
              <div class="form-group">
                <label>Sélectionner un matériel</label>
                <select class="form-control" name="immatriculation">
                  <?php
                  $resultat = $bdd->query("SELECT * FROM machine");
                  while ($donnes = $resultat->fetch())
                  {
                    echo "<option value=".$donnes['immatriculation'].">".$donnes['immatriculation']."</option>";
                  }
                  $resultat->closeCursor();
                   ?>
                </select>
              </div>
              <div class="form-group">
                 <label>Description du vol</label>
                 <input class="form-control" type="textarea" name="Description" placeholder="Texte ..." required>
              </div>
              <div class="form-group">
                  <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                  <input class="btn btn-danger btn-lg btn-block" type="file" name="FileImport">
              </div>
              <div class="form-group">
                <input class="btn btn-success btn-lg btn-block" type="submit" name="submit" value="Envoyer le vol">
              </div>
          </form>
          <div id="progress-wrp" class="progress" style="height:20px;">
            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4"></div>
      </div>
    </div>

    <?php include('include/footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
