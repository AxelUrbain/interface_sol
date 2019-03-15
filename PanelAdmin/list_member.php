<?php
require('../function/function.php');

session_start();
if(!isset($_SESSION['login'])){
  header('Location: ../index.php');
  exit();
}
if($_SESSION['id_role'] != 4){
  header('Location: ../index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <?php include('../include/admin/header.php'); ?>
  <body>
    <?php include('../include/admin/navbar.php'); ?>
    <div class="title">
      <center>
        <h2 class="title">Panel- Gestion des membres</h2>
      </center>
    </div>

    <div class="container">
          <div class="table table-stock">
            <?php
            // Connexion à la base de données
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=interface_sol;charset=utf8', 'root', '');
            }

            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }

            $req = $bdd->query("SELECT id, nom, prenom, Date_inscription, id_role FROM membre");
            ?>

            <h2>Liste des membres</h2>
        <table class="table table-sm">
          <caption>Liste des membres</caption>
          <thead>
          <tr class="bg-dark">
            <th class="text-uppercase th-membre" scope="col"><p>id </p></th>
            <th class="text-uppercase th-membre" scope="col"><p> Nom </p></th>
            <th class="text-uppercase th-membre" scope="col"><p> Prénom </p></th>
            <th class="text-uppercase th-membre" scope="col"><p> Date Inscription </p></th>
            <th class="text-uppercase th-membre" scope="col"><p> Role</p></th>
            <th class="text-uppercase th-membre" scope="col"><p> Modifier</p></th>
            <th class="text-uppercase th-membre" scope="col"><p> Supprimer</p></th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <?php while($row = $req->fetch()){ ?>
              <th scope="row" class="bg-warning"><?php echo $row['id']; ?></th>
              <td class=""><?php echo $row['nom']; ?></td>
              <td><?php echo $row['prenom']; ?></td>
              <td><?php echo $row['Date_inscription']; ?></td>
              <td><?php echo $row['id_role']; ?></td>
              <?php echo '<td>'.'<a class="btn btn-primary"  href="member/edit.php?id='.$row['id'].'">'."Modifier".'</a>'.'</th>'; ?>
              <?php echo '<td>'.'<a class="btn btn-danger"  href="delete.php?id='.$row['id'].'">'."Supprimer".'</a>'.'</th>'; ?>
          </tr>
        </tbody>
        <?php }
        $req->closeCursor();
        ?>
        </table>
        </div>
    </div>

    <?php include('../include/footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
