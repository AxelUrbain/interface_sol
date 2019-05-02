<?php
require_once 'db-config.php';

function Disconnect(){
  session_start();
  $_SESSION = array();
  session_unset();
  session_destroy();
  header('Location : index.php');
}

function Traitement_Connexion($bdd){
  $error = array();
  $success = array();
  // Si je boutton est de connexion appuyé
  if(isset($_POST['button'])){
    //Vérification des champs
    if((empty($_POST['login'])) OR (empty($_POST['password']))){
      if(empty($_POST['login'])){
        $error = "Le champ pseudo est vide.";
      }
      if(empty($_POST['password'])){
          $error = "Le champ mot de passe est vide.";
      }
      return $error;
    }
    else{
        $login = htmlentities($_POST['login'], ENT_QUOTES, "ISO-8859-1");
        $password = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
        //hashage du mot de passe avec Bcrypt
        $req = $bdd->prepare("SELECT id, password, id_role FROM membre WHERE nom = :login");
        $req->execute(array(
          'login'=>$login));

        $resultat = $req->fetch();
        if(!$resultat)
        {
          $error = "Mauvais pseudo ou mot de passe.";
          return $error;
        }
        else{
          $password_hashed = $resultat['password'];
          if(password_verify($password, $password_hashed)){
            $success = "Mot de passe correct !";
            //Redirection vers l'interface admin ou gestionnaire
            $groupe = $resultat['id_role'];
            if(!$resultat){
              $error = " Ou vous n'avez pas de groupe !";
              return $error;
            }
            else{
              if($groupe == 4){
                session_start();
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['id_role'] = $groupe;
                header('Location: PanelAdmin/panel.php');
                exit();
              }

              if($groupe == 3){
                session_start();
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['id_role'] = $groupe;
                header('Location: add_fly.php');
                exit();
              }

              if($groupe == 2){
                session_start();
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['id_role'] = $groupe;
                header('Location: add_fly.php');
                exit();
              }

              if($groupe == 1){
                session_start();
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['id_role'] = $groupe;
                header('Location: add_fly.php');
                exit();
              }
          }
         }
        }
      }
  }
}

function InscriptionMembre($bdd){
 //Déclaration du tableau qui stockera tout les messages d'erreurs
  $error = array();
  //Vérification SI LE BOUTON NE RETOURNE PAS UN NULL
  if(isset($_POST['Btn_Inscription'])){
    //Vérification SI AU MOINS UN CHAMP EST VIDE
    if((empty($_POST['nom'])) OR (empty($_POST['prenom'])) OR (empty($_POST['motdepasse'])) OR (empty($_POST['role'])) ){
      //Si au moins un champ est vide déterminer qu'elles sont les champs vide
      if(empty($_POST['nom'])){
        $error = "Le nom n'est pas référencé !";
      }
      if(empty($_POST['prenom'])){
        $error = "Le prénom n'est pas référencé !";
      }
      if(empty($_POST['motdepasse'])){
        $error = "Le mot de passe n'est pas référencé ou valide !";
      }
      if(empty($_POST['role'])){
        $error = "Le role n'est pas référencé !";
      }
      //Retouner tout les messages d'erreurs du tableau error
      return $error;
    }
    else
    {
      //Récupération des informations du formulaire
      $password = $_POST['motdepasse'];
      $name = $_POST['nom'];
      $first_name = $_POST['prenom'];
      $role = $_POST['role'];
      //hashage du mot de passe avec Bcrypt
      $password_hashed = password_hash($password, PASSWORD_BCRYPT);
      //Préparation de la requete d'Inscription
      $requete = $bdd->prepare("INSERT INTO membre(nom, prenom, password, Date_inscription, id_role)
      VALUES(:nom, :prenom, :password, NOW(), :id_role)");
      //Exécution de la requete
      $requete->execute(array(
        'nom'=> $name,
        'prenom'=> $first_name,
        'password'=> $password_hashed,
        'id_role'=> $role
      ));
      //Message qui valide l'inscription
      $success = "Vous avez inscits un membre !";
      echo $success;
    }
}
}

function InscriptionMachine($bdd){
  //Déclaration du tableau qui stockera tout les messages d'erreurs
   $error = array();

   //Vérification des champs
   if(isset($_POST['Btn_Machine'])){
     //Vérification des champs
     if(empty($_POST['type'])){
       $error[] = "Le type n'est pas référencé !";
     }
     if(empty($_POST['marque'])){
       $error[] = "La marque n'est pas référencé !";
     }
     if(empty($_POST['modele'])){
       $error[] = "Le modele n'est pas référencé ou valide !";
     }
     if(empty($_POST['years'])){
       $error[] = "L'année n'est pas référencé !";
     }
     if(empty($_POST['finesse'])){
       $error[] = "La finesse n'est pas référencé !";
     }
     else
     {
       //Récupération des informations du formulaire
       $type = $_POST['type'];
       $marque = $_POST['marque'];
       $modele = $_POST['modele'];
       $years = $_POST['years'];
       $finesse = $_POST['finesse'];
       //Préparation de la requete d'Inscription
       $requete = $bdd->prepare("INSERT INTO machine(type, marque, modele, annee, finesse)
       VALUES(:type, :marque, :modele, :annee, :finesse)");
       //Exécution de la raquete
       $requete->execute(array(
         'type'=> $type,
         'marque'=> $marque,
         'modele'=> $modele,
         'annee'=> $years,
         'finesse'=> $finesse
       ));
       //Message qui valide l'inscription
       $success = "Vous avez mis un nouvel appareil !";
     }
 }
}

// Fonction préparation de la requete pour la suppression d'un utilisateur
function  deleteUserId()
{
  return "DELETE FROM membre WHERE id=:id";
}
// Fonction préparation de la requete pour la suppression d'une machine
function deleteMachineId()
{
  return "DELETE FROM machine WHERE id=:id";
}
// Fontion préparation de la requete pour la modification d'un membre
function selectUserId()
{
  return "SELECT * FROM membre WHERE id=:id";
}

// Fontion préparation de la requete pour la modification d'une machine
function selectMachineId()
{
  return "SELECT * FROM machine WHERE id=:id";
}

// Fonction préparation de la requete de modification d'un membre
function updateMemberID()
{
  return 'UPDATE membre SET nom = :nom, prenom = :prenom, password = :password, id_role = :role WHERE id = :id';
}

// Fonction préparation de la requete de modification d'une machine
function updateMachineID()
{
  return 'UPDATE machine SET type = :type, marque = :marque, modele = :modele, annee = :annee, finesse = :finesse WHERE id = :id';
}

function displayInfoMember($bdd){
  $id = $_GET['id'];
  $query = $bdd->prepare(selectUserId());
  $array  =array(
    'id'=> $id
  );
  $query->execute($array);
  $data=$query->fetch();
  if($data)
  {
    echo '<form class="form-group" action="update_equipment.php?id='.$data['id'].'" method="post">';
    echo '<label>Nom : </label>';
    echo '<input class="form-control" type="text" name="nom" value="'.$data['nom'].'" required/>'.'</br>'.'</br>';
    echo '<label>Prénom : </label>';
    echo '<input class="form-control" type="text" name="prenom" value="'.$data['prenom'].'" required/>'.'</br>'.'</br>';
    echo '<label>Mot de Passe : </label>';
    echo '<input class="form-control" type="password" name="password" value="'.$data['password'].'" required/>'.'</br>'.'</br>';
    echo '<label>id Role : </label>';
    echo '<input class="form-control" type="number" min="1" max="4" name="role" value="'.$data['id_role'].'" required/>'.'</br>'.'</br>';
    echo '<input type="submit" name="form_update" value="Modifier" class="btn btn-success" />';
    echo '</form>';
  }
  else
  {
    echo '<p>'."Aucun résultat n'a pas été trouvé...".'</p>';
  }
  $query->closeCursor();
}

function displayInfoMachine($bdd)
{
  $id = $_GET['id'];
  $query = $bdd->prepare(selectMachineId());
  $array  =array(
    'id'=> $id
  );
  $query->execute($array);
  $data=$query->fetch();
  if($data)
  {
    echo '<form class="form-group" action="update_equipment.php?id='.$data['id'].'" method="post">';
    echo '<label>Type : </label>';
    echo '<input class="form-control" type="text" name="type" value="'.$data['type'].'" required/>'.'</br>'.'</br>';
    echo '<label>Marque : </label>';
    echo '<input class="form-control" type="text" name="marque" value="'.$data['marque'].'" required/>'.'</br>'.'</br>';
    echo '<label>Modèle : </label>';
    echo '<input class="form-control" type="text" name="modele" value="'.$data['modele'].'" required/>'.'</br>'.'</br>';
    echo '<label>Année : </label>';
    echo '<input class="form-control" type="number" min="1900" max="2050" name="annee" value="'.$data['annee'].'" required/>'.'</br>'.'</br>';
    echo '<label>Finesse : </label>';
    echo '<input class="form-control" type="text"  name="finesse" value="'.$data['finesse'].'" required/>'.'</br>'.'</br>';
    echo '<input type="submit" name="form_update_equipment" value="Modifier" class="btn btn-success" />';
    echo '</form>';
  }
  else
  {
    echo '<p>'."Aucun résultat n'a pas été trouvé...".'</p>';
  }
  $query->closeCursor();
}
