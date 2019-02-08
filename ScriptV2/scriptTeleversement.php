<?php
//Deuxième test de fonction
function exportBdd($hote, $pseudo, $mdp, $db, $table, $NomFichier){
  //Connexion simple sans gestion des erreurs à la base de données
  $bdd = new PDO('mysql:host='.$hote.';dbname='.$db.';charset=utf8', $pseudo, $mdp);
  //Requete de la Table à sélectionner
  $requete = $bdd->query('SELECT * FROM '.$table);
  //Parcours de la condition de la requete + stockage dans un tableau
  $tableau = array();

  //formatage du fichier
  $datestamp = date("Y-m-d");
  $NomFichier = $NomFichier."_".$datestamp."_table.txt";
  $fopen = fopen($NomFichier, "w");

  while ($ligne = $requete->fetch(PDO::FETCH_ASSOC))
  {
    $tableau[] = implode("/",$ligne);
    //$saut = implode("\n",$tableau);
  }

  $requete->closeCursor();

  fputs($fopen,implode("\r\n",$tableau));
  fclose($fopen);

  //Téléchargement du fichier
  header('Conent-Type: application/txt');
  header("Content-Transfer-Encoding: Binary");
  header("Content-disposition: attachment; filename=\"".$NomFichier."\"");
  readfile($NomFichier);

  //Fin du script
}

exportBdd("localhost","root","","departement","departement","Axel");
