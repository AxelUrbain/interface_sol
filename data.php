<?php
header('Content-Type: application/json');

define('DB_HOST','127.0.0.1');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','sondage');

//Connexion
try{
  $bdd = new PDO('mysql:host=localhost;dbname=sondage;charset=utf8',DB_USERNAME,DB_PASSWORD);
}
//Gestion des Erreurs
catch(Exception $e){
  die('Erreur :'.$e->getMessage());
}

$req = $bdd->query("SELECT Nom, numSondage, resultSondage FROM sondage ORDER BY numSondage");

$data = array();

foreach($req->fetchAll(PDO::FETCH_ASSOC) as $row){
  $data[] = $row;
}


$req->closeCursor();

print json_encode($data);
 ?>
