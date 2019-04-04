<?php
require_once '../function/function.php';
require_once '../function/db-config.php';
function updateInfoMember()
{
  $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8', 'root', '');

  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  $id = $_GET['id'];

  $query = $bdd->prepare(updateMemberID());
  $array = array(
    'nom'=> $nom,
    'prenom'=> $prenom,
    'password'=> $password,
    'role'=> $role,
    'id'=> $id
  );
  $query->execute($array);

  $query->closeCursor();
}
if (isset($_POST['form_update']))
{
  updateInfoMember();
  header('Location: list_member.php');
}

 ?>
