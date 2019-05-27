<?php
//PROJET : FLARM
//BTS SNIR - LP2I
//URBAIN AXEL
//JANVIER-MAI 2019

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
<head>
  <meta charset="utf-8">
  <title>Carte Aéronautique</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<?php include('include/membre/header.php'); ?>
<body>
  <!-- 21:9 aspect ratio -->
<div class="embed-responsive embed-responsive-21by9">
  <iframe class="embed-responsive-item" src="https://staging.openaip.net/map/#10.71/46.9549/-0.1478"></iframe>
</div>
</body>
<?php include('include/footer.php'); ?>
</html>
