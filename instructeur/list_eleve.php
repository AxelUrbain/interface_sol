<?php
require('../function/function.php');
require_once '../function/db-config.php';
session_start();
if(!isset($_SESSION['login'])){
  header('Location: ../index.php');
  exit();
}
if($_SESSION['id_role'] != 2){
  header('Location: ../index.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <?php include('../include/instructeur/header.php'); ?>
  <body>
    <?php include('../include/instructeur/navbar.php'); ?>
    <div class="title">
      <center>
        <h4 class="">Gestion des élèves</h4>
      </center>
    </div>

    <div class="container">
          <div class="table table-stock">
            <?php
            $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
            $limite = 10;
            /* CALCUL LE NUMERO DU PREMIER ELEMENT A RECUPERER */
            $debut = ($page-1) * $limite;

            $req = $bdd->prepare("SELECT SQL_CALC_FOUND_ROWS membre.id, membre.nom, membre.prenom, membre.password, membre.Date_inscription, roles.role
            FROM membre
            INNER JOIN roles ON membre.id_role = roles.id
            WHERE roles.role = 'élève' LIMIT :limite OFFSET :debut ");

            $req->bindValue('limite', $limite, PDO::PARAM_INT);
            $req->bindValue('debut', $debut, PDO::PARAM_INT);

            $req->execute();
            ?>

        <table class="table table-sm">
          <caption>Liste des membres</caption>
          <thead>
          <tr class="bg-dark">
            <th class="text-uppercase th-membre" scope="col"><p> Nom </p></th>
            <th class="text-uppercase th-membre" scope="col"><p> Prénom </p></th>
            <th class="text-uppercase th-membre" scope="col"><p> Date Inscription </p></th> 
            <th class="text-uppercase th-membre" scope="col"><p> Historique</p></th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <?php while($row = $req->fetch()){ ?>
              <th scope="row" class="bg-warning"><?php echo $row['nom']; ?></th>
              <th scope="row" class="bg-warning"><?php echo $row['prenom']; ?></th>
              <td><?php echo $row['Date_inscription']; ?></td>
              <?php echo '<td>'.'<a class="btn btn-info" name="button_hist_eleve" href="hist_eleve.php?id='.$row['id'].'">'."Historique".'</a>'.'</th>'; ?>
          </tr>
        </tbody>
        <?php }

        $resultFoundRows = $bdd->query("SELECT found_rows()");
        $nombreElementsTotal = $resultFoundRows->fetchColumn();
        $nombreDePages = ceil($nombreElementsTotal / $limite);


        $req->closeCursor();
        ?>
        </table>
        <?php
        /*Si on est sur la première page, on n'a pas besoin d'afficher de lien
         vers la précédente. On va donc l'afficher que si on est sur une autre
         page que la première */
         if($page > 1)
         {
           ?><a href="?page=<?php echo $page-1; ?>">Page précedente</a> - <?php
         }

         /* On va effectuer une boucle autant de fois que l'on a de pages */
         for($i = 1; $i <= $nombreDePages; $i++)
         {
           ?><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a> <?php
         }

         /* Avec le nombre total de pages, on peut aussi masquer le lien
 * vers la page suivante quand on est sur la dernière */
        if($page < $nombreDePages)
        {
          ?> - <a href="?page=<?php echo $page+1; ?>">Page suivante</a><?php
        }
        ?>
        </div>
        <div class="space"></div>
    </div>

    <?php include('../include/footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
