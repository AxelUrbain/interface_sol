<?php
//PROJET : FLARM
//BTS SNIR - LP2I
//URBAIN AXEL
//JANVIER-MAI 2019

 require_once '../function/function.php';
 require_once '../function/db-config.php';
 //Suppression d'un membre
 function deleteUser($bdd)
 {
    $id = $_GET['id'];
    $query = $bdd->prepare(deleteUserId());
    $array = array(
      'id' => $id
    );
    $query->execute($array);
    $query->closeCursor();
    header('Location: list_member.php');
 }

    deleteUser($bdd);
