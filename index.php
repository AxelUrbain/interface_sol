<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <?php include('template/header.php'); ?>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

  <body>
  <div class="container">
    <?php include('template/menu.php'); ?>
    <div class="row exemple">
      <div class="col-md-4">
        <h2 class="title-index">Volé</h2> <br>
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
    <div class="formulaire-connect">
      <h2>Connecte-toi !</h2>
      <form class="" action="index.html" method="post">
        <div class="form-group">
          <label for="">Login</label>
          <input class="form-control" type="text" name="login" value="" placeholder="michel.truc">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input class="form-control" type="password" name="password" value="">
        </div>
        <button type="submit" name="button" class="btn btn-primary">Connecte-toi</button>
      </form>
    </div>
  </div>
  </body>
</html>
