<?php
 require_once '../function/function.php';
 require_once '../function/db-config.php';
 function deleteMachine($bdd)
 {
   $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8', 'root', '');
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
