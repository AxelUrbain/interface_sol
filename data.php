<?php
header('Content-Type: application/json');

define('DB_HOST','127.0.0.1');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','interface_sol');

$bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8', DB_USERNAME, DB_PASSWORD);


$req = $bdd->query("SELECT id, Altitude FROM information_vol ORDER BY id");

$data = array();

foreach($req->fetchAll(PDO::FETCH_ASSOC) as $row){
  $data[] = $row;
}


$req->closeCursor();

print json_encode($data);
?>
