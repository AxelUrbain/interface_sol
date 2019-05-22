<?php
require_once '../function/function.php';
require_once '../function/db-config.php';
function updateInfoMember($bdd)
{
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  $id = $_GET['id'];

  //Cryptage du nouveau mot de passe
  $password_hashed = password_hash($password, PASSWORD_BCRYPT);

  $query = $bdd->prepare(updateMemberID());
  $array = array(
    'nom'=> $nom,
    'prenom'=> $prenom,
    'password'=> $password_hashed,
    'role'=> $role,
    'id'=> $id
  );
  $query->execute($array);

  $query->closeCursor();
  //Message qui valide l'inscription
  $success = '<div class="alert alert-success">Vous avez modifié les données du membre !</div>';
  return $success;
}
if (isset($_POST['form_update']))
{
  updateInfoMember($bdd);
  header('Location: list_member.php');
}

 ?>
