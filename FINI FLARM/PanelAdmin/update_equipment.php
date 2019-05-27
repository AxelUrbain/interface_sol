<?php
//PROJET : FLARM
//BTS SNIR - LP2I
//URBAIN AXEL
//JANVIER-MAI 2019

require_once '../function/function.php';
require_once '../function/db-config.php';
function updateInfoMachine($bdd)
{
  $type = $_POST['type'];
  $modele = $_POST['modele'];
  $marque = $_POST['marque'];
  $annee = $_POST['annee'];
  $finesse = $_POST['finesse'];
  $immatriculation = $_POST['immatriculation'];
  $id = $_GET['id'];

  $query = $bdd->prepare(updateMachineID());
  $array = array(
    'type'=> $type,
    'marque'=> $marque,
    'modele'=> $modele,
    'annee'=> $annee,
    'finesse'=> $finesse,
    'immatriculation'=> $immatriculation,
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
