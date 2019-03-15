<?php
 require_once '../function/function.php';

 function deleteUser()
 {
    $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8', 'root', '');
    $id = $_GET['id'];
    $query = $bdd->prepare(deleteUserId());
    $array = array(
      'id' => $id
    );
    $query->execute($array);
    $query->closeCursor();
    header('Location: list_member.php');
 }

 deleteUser();

?>
