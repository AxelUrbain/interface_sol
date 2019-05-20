<?php
require_once 'db-config.php';

function Disconnect(){
  session_start();
  $_SESSION = array();
  session_unset();
  session_destroy();
  $message = '<div class="alert alert-success">Vous êtes déconnecté.</div>';
  header('Location : index.php');
  return $message;
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
        //Récupérer le nom et prénom
        $user = explode(".",$login);
        $nom = $user[0];
        $prenom = $user[1];
        //hashage du mot de passe avec Bcrypt
        $req = $bdd->prepare("SELECT id, password, id_role FROM membre WHERE nom = :nom AND prenom = :prenom");
        $req->execute(array(
          'nom'=>$nom,
          'prenom'=>$prenom));

        $resultat = $req->fetch();
        if(!$resultat)
        {
          $error = '<div class="alert alert-danger">Mauvais pseudo ou mot de passe.</div>';
          return $error;
        }
        else{
          $password_hashed = $resultat['password'];
          if(password_verify($password, $password_hashed)){
            $success = "Mot de passe correct !";
            //Redirection vers l'interface admin ou gestionnaire
            $groupe = $resultat['id_role'];
            if(!$resultat){
              $error = '<div class="alert alert-danger">Pas de groupe affecté.</div>';
              return $error;
            }
            else{
              if($groupe == 4){
                session_start();
                $_SESSION['login'] = $nom;
                $_SESSION['id_role'] = $groupe;
                header('Location: PanelAdmin/panel.php');
                exit();
              }

              if($groupe == 3){
                session_start();
                $_SESSION['login'] = $nom;
                $_SESSION['id_role'] = $groupe;
                header('Location: add_fly.php');
                exit();
              }

              if($groupe == 2){
                session_start();
                $_SESSION['login'] = $nom;
                $_SESSION['id_role'] = $groupe;
                header('Location: instructeur/list_eleve.php');
                exit();
              }

              if($groupe == 1){
                session_start();
                $_SESSION['login'] = $nom;
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
        $error = '<div class="alert alert-danger">Le champs nom est vide.</div>';
      }
      if(empty($_POST['prenom'])){
        $error = '<div class="alert alert-danger">Le champs prénom est vide.</div>';
      }
      if(empty($_POST['motdepasse'])){
        $error = '<div class="alert alert-danger">Le champs mot de passe est vide.</div>';
      }
      if(empty($_POST['role'])){
        $error = '<div class="alert alert-danger">Aucun rôle référencé !</div>';
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
      $success = '<div class="alert alert-success">Vous avez inscrit un membre !</div>';
      return $success;
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
       $error[] = '<div class="alert alert-danger">Aucun type référencé !</div>';
     }
     if(empty($_POST['marque'])){
       $error[] = '<div class="alert alert-danger">Aucune marque référencé !</div>';
     }
     if(empty($_POST['modele'])){
       $error[] = '<div class="alert alert-danger">Aucun modèle référencé !</div>';
     }
     if(empty($_POST['years'])){
       $error[] = '<div class="alert alert-danger">Aucune année référencé !</div>';
     }
     if(empty($_POST['finesse'])){
       $error[] = '<div class="alert alert-danger">Aucune finesse référencé !</div>';
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
       $success = '<div class="alert alert-success">Vous avez inscrit un appareil !</div>';
       return $success;
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

function DMtoDD($deg,$min,$direction){
  //récupérer les infos
  $d = strtolower($direction);
  $ok = array('n','s','e','w');
  //degrees must be integer between 0 and 180
  if(!is_numeric($deg) || $deg < 0 || $deg > 180) {
     $decimal = false;
  }
  //minutes must be integer or float between 0 and 59
  elseif(!is_numeric($min) || $min < 0 || $min > 59) {
     $decimal = false;
  }
  //seconds must be integer or float between 0 and 59
  elseif(!in_array($d, $ok)) {
     $decimal = false;
  }
  else {
     //inputs clean, calculate
     $decimal = $deg + ($min / 60);
     //reverse for south or west coordinates; north is assumed
     if($d == 's' || $d == 'w') {
        $decimal *= -1;
     }
  }
  return $decimal;
}
