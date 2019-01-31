<?php

 ?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Suivi de Vol</title>
  </head>
  <body>
    <div id="menu">
      <nav class="navbar navbar-expand-lg">
        <a class="color-menu" href="index.php">Suivi de vol</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars fa-2x"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="item-menu disabled" href="#" aria-disabled="true">Ajouter vol</a>
            </li>
            <li class="nav-item">
              <a class="item-menu disabled" href="#" aria-disabled="true">Historique</a>
            </li>
            <li class="nav-item">
              <a class="item-menu disabled" href="#" aria-disabled="true">Statistiques</a>
            </li>
            <li class="nav-item">
              <a class="item-menu" href="#">Connexion</a>
            </li>
          </ul>
        </div>
      </nav>

    </div>

    <div class="row form-space">
      <div class="col-lg-4 col-md-4"></div>

      <div class="formulaire col-lg-4 col-md-4">
        <h2 class="form-title">Connexion</h2>
        <form action="connect.php" method="post">
          <div class="form-group">
            <label for="user" class="label-title">Utilisateur</label>
            <input class="form-control" type="text" name="user" placeholder="Prenom.Nom" required>
          </div>
          <div class="form-group">
            <label for="password" class="label-title">Mot de Passe</label>
            <input class="form-control" type="password" name="password" required>
          </div>
          <button type="button" class="btn btnConnect" name="button">Connecte-toi !</button>
        </form>
      </div>

      <div class="col-lg-4 col-md-4"></div>
    </div>


    <footer id="footer-color">
      <div class="footer-text">
        <p>Tout droit réservé - FlarmCalculator @2019</p>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
