<?php
//PROJET : FLARM
//BTS SNIR - LP2I
//URBAIN AXEL
//JANVIER-MAI 2019

 require_once '../function/function.php';
 require_once '../function/db-config.php';
 //Suppression d'une machine
 function deleteMachine($bdd)
 {
   $id = $_GET['id'];
   $query = $bdd->prepare(deleteMachineId());
   $array = array(
     'id' => $id
   );
   $query->execute($array);
   $query->closeCursor();
   header('Location: list_equipment.php');
 }

 deleteMachine($bdd);
