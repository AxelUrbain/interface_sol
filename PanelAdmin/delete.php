<?php
 require_once '../function/function.php';
 require_once '../function/db-config.php';

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
