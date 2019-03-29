<?php
session_start();
if(!isset($_SESSION['login'])){
  header('Location: index.php');
  exit();
}

if(isset($_POST['submit']))
{
  // Vérifie si le fichier a été uploadé sans erreur.
if(isset($_FILES["FileImport"]) && $_FILES["FileImport"]["error"] == 0){
    $nomOrigine = $_FILES["FileImport"]["name"];
    $filetype = $_FILES["FileImport"]["type"];
    $filesize = $_FILES["FileImport"]["size"];

    // Vérifie l'extension du fichier
    $elementChemin = pathinfo($nomOrigine);
    $extensionFichier = $elementChemin['extension'];
    $extensionAutorise = array("fc", "txt", "png");

    if(!(in_array($extensionFichier, $extensionAutorise))) {
      echo "Erreur : Veuillez sélectionner un format de fichier valide.";
    }
    else{
      // Vérifie la taille du fichier - 5Mo maximum
      $maxsize = 5 * 1024 * 1024;
      if($filesize > $maxsize){
        echo "Error: La taille du fichier est supérieure à la limite autorisée.";
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
              echo "ca marche ! ";
            }
            else{
              echo "Le fichier ne s'est pas téléchargé";
           }
      }
    }
    // Ouvre le fichier en lecture
    //$fp = fopen($filename,"r");

    //Parcourir le fichier

    //Stocker les informations dans la base de données information_vol

    //Supprimer le fichier

} else{
    echo "Error: " . $_FILES["FileImport"]["error"];
}
} ?>

<!doctype html>
<html lang="fr">
  <?php include('include/membre/header.php'); ?>
  <body>

    <?php include('include/membre/navbar.php'); ?>

    <div class="formulaire">
        <h2 class="form-title">Ajouter un vol</h2>
        <form class="form-group" action="add_fly.php" method="post" enctype="multipart/form-data">
          <center>
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
            <input class="btn btn-danger" type="file" name="FileImport">
            <input class="btn btn-success" type="submit" name="submit" value="Upload File">
          </center>
        </form>
    </div>

    <div class="row space">
      <div class="col-lg-4 col-md-4">
        <center><h3 class="title">Vol</h3></center>
        <center><i class="fa fa-fighter-jet fa-10x"></i></center>
      </div>
      <div class="col-lg-4 col-md-4">
        <center><h3 class="title">Transfert</h3></center>
        <center><i class="fa fa-download fa-10x"></i></center>
      </div>
      <div class="col-lg-4 col-md-4">
        <center><h3 class="title">Consultation</h3></center>
        <center><i class="fa fa-desktop fa-10x"></i></center>
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
