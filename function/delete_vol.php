<?php
require('function.php');

session_start();
if(!isset($_SESSION['login'])){
  header('Location: ../index.php');
  exit();
}
if($_SESSION['id_role'] != 4){
  header('Location: ../index.php');
  exit();
}

if(isset($_POST['delete_vol'])){
  // Connexion à la base de données
  $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8', 'root', '');
  $id = $_GET['id'];
  $query = $bdd->prepare();

  //FAIRE LE SUITE LA SEMAINE PRO 
  echo "ca marche !";
}
else {
  echo "ca marche pas !";
}

?>
