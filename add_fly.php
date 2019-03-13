<?php
session_start();
if(!isset($_SESSION['login'])){
  header('Location: index.php');
  exit();
}
 ?>
<!doctype html>
<html lang="fr">
  <?php include('include/membre/header.php'); ?>
  <body>

    <?php include('include/membre/navbar.php'); ?>

    <div class="formulaire">
        <h2 class="form-title">Ajouter un vol</h2>
        <form class="form-group" action="add_fly.php" method="post" enctype="multipart/form-data">
          <center>
            <input class="btn btn-danger" type="file" name="FileImport" id="FileImport">
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
