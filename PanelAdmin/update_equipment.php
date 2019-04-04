<?php
require_once '../function/function.php';
require_once '../function/db-config.php';
function updateInfoMachine($bdd)
{
  $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8', 'root', '');

  $type = $_POST['type'];
  $modele = $_POST['modele'];
  $marque = $_POST['marque'];
  $annee = $_POST['annee'];
  $finesse = $_POST['finesse'];
  $id = $_GET['id'];

  $query = $bdd->prepare(updateMachineID());
  $array = array(
    'type'=> $type,
    'marque'=> $marque,
    'modele'=> $modele,
    'annee'=> $annee,
    'finesse'=> $finesse,
    'id'=> $id
  );
  $query->execute($array);

  $query->closeCursor();
}
if (isset($_POST['form_update_equipment']))
{
  updateInfoMachine($bdd);
  header('Location: list_equipment.php');
}

 ?>
