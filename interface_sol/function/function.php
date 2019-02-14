<?php
function Connexion(){
  //Connexion a la base de donnéees
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8','root','');
  }

//Gestion des Erreurs
  catch(Exception $e){
    die('Erreur :'.$e->getMessage());
  }
}

function Disconnect(){
  session_start();
  $_SESSION = array();
  session_unset();
  session_destroy();
  header('Location : index.php');
}

function Traitement_Connexion(){

  //Connexion a la base de donnéees
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8','root','');
  }
//Gestion des Erreurs
  catch(Exception $e){
    die('Erreur :'.$e->getMessage());
  }

  // Si je boutton est de connexion appuyé
  if(isset($_POST['button'])){
    //Vérification des champs
    if(empty($_POST['login'])){
      echo "Le champ pseudo est vide.";
    }
    else{
      if(empty($_POST['password'])){
        echo "Le champ mot de passe est vide.";
      }
      else{
        $login = htmlentities($_POST['login'], ENT_QUOTES, "ISO-8859-1");
        $password = htmlentities($_POST['password'], ENT_QUOTES, "ISO-8859-1");
        $req = $bdd->prepare("SELECT id FROM membre WHERE nom = :login AND password = :password");
        $req->execute(array(
          'login'=>$login,
          'password'=>$password));

        $resultat = $req->fetch();

        //comparaison des mot de passe
        if(!$resultat)
        {
          echo"Mauvais pseudo ou mot de passe.";
        }
        else{
          if($isPasswordCorrect){
            echo "Mot de passe correct !";
          } else{
            echo "Mauvais pseudo ou mot de passe";
          }
        }

        //Vérification du nombre de compte A REUTILISER POUR LES INSCRIPTIONS PAR L'ADMINISTRATEUR
    /*    $req = $bdd->query("SELECT * FROM membres WHERE pseudo='$login' AND password='$password'");
        $userexist = $req->rowCount();
        if($userexist==1){
          $userinfo = $req->fetch();
          $_SESSION['id'] = $userinfo['id'];
          $_SESSION['login'] = $userinfo['pseudo'];
        }
        else{
          $erreur = "Ce compte n'existe pas.";
          header('Location: index.php');
        } */

        //Redirection vers l'interface admin ou gestionnaire
        $req = $bdd->prepare("SELECT id_role FROM membre WHERE nom = :login AND password = :password");
        $req->execute(array('login'=>$login,
                             'password'=>$password));
        $resultat = $req->fetch();

        $groupe = $resultat['id_role'];

        if(!$resultat){
          echo " Ou vous n'avez pas de groupe !";
        }
        else{
          if($groupe == 4){
            session_start();
            $_SESSION['login'] = $_POST['login'];
            header('Location: PanelAdmin/panel.php');
            exit();
          }

          if($groupe == 2){
            session_start();
            $_SESSION['login'] = $_POST['login'];
            header('Location: add_fly.php');
            exit();
          }
        }
      }
    }
  }
}
