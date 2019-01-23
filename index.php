<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>

  <div id="menu">
    <nav class="navbar navbar-expand-lg navbar-default bg-success">
    <a class="color-menu title-menu" href="#">Suivi de vol</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars fa-2x"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-link">
          <a class="color-menu item" href="#">Ajouter un vol</a>
        </li>
        <li class="nav-link">
          <a class="color-menu item" href="#">Mon historique</a>
        </li>
        <li class="nav-link">
          <a class="color-menu item" href="#">Mes Statistiques</a>
        </li>
        <li class="nav-link">
          <a class="color-menu item" href="#" >Déconnexion</a>
        </li>
      </ul>
    </div>
  </nav>
  </div>

  <div class="row exemple">
        <div class="col-md-4">
          <h2 class="title-index">Vol</h2> <br>
          <span>
            <center>
              <i class="fa fa-plane fa-10x"></i>
            </center>
          </span>
        </div>
        <div class="col-md-4">
          <h2 class="title-index">Transféré</h2> <br>
          <span>
            <center>
              <i class="fa fa-upload fa-10x"></i>
            </center>
          </span>
        </div>
        <div class="col-md-4">
          <h2 class="title-index">Consulté</h2> <br>
          <span>
            <center>
              <i class="fa fa-desktop fa-10x"></i>
            </center>
          </span>
        </div>
  </div>
  <h2 class="title-index exemple">Connecte-toi !</h2>
        <form class="container-fluid col-lg-3 col-md-6" action="index.php" method="post">
          <div class="form-group">
            <label for="">Login</label>
            <input class="form-control" type="text" name="login" value="" placeholder="michel.truc">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input class="form-control" type="password" name="password" value="">
          </div>
          <button type="submit" name="button" class="btn btn-success btn-lg btn-block">Connecte-toi</button>
        </form>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
