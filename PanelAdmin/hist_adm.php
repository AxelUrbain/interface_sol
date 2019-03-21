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
        <h4 class="">Historique des vols</h4>
      </center>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-6">
            <form class="form-group" action="hist_adm.php" method="post">
              <div class="row">
                <label class="col-lg-2 col-md-2" for="">Membre</label>
                <select class="col-lg-6 col-md-6 form-control" name="select_membre">
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

                  $resultat = $bdd->query("SELECT * FROM membre");
                  while ($donnes = $resultat->fetch())
                  {
                    echo "<option value=".$donnes['nom'].">".$donnes['nom']."</option>";
                  }
                  $resultat->closeCursor();
                   ?>
                </select>
                <button class="col-lg-4 col-md-4 btn btn-success" type="submit" name="button_select_membre">Trier</button>
              </div>
            </form>
        </div>
      </div>
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

            $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
            $limite = 10;
            /* CALCUL LE NUMERO DU PREMIER ELEMENT A RECUPERER */
            $debut = ($page-1) * $limite;

            $req = $bdd->prepare("SELECT SQL_CALC_FOUND_ROWS vols.id, membre.nom, machine.immatriculation, vols.Date, vols.Description
              FROM vols
              INNER JOIN membre ON vols.id_membre = membre.id
              INNER JOIN machine ON vols.id_machine = machine.id
              LIMIT :limite OFFSET :debut");

              $req->bindValue('limite', $limite, PDO::PARAM_INT);
              $req->bindValue('debut', $debut, PDO::PARAM_INT);

              $req->execute();
            ?>

        <table class="table table-sm">
          <caption>Liste des membres</caption>
          <thead>
          <tr class="bg-dark">
            <th class="text-uppercase th-membre" scope="col"><p>id</p></th>
            <th class="text-uppercase th-membre" scope="col"><p>membre</p></th>
            <th class="text-uppercase th-membre" scope="col"><p>machine</p></th>
            <th class="text-uppercase th-membre" scope="col"><p>Date</p></th>
            <th class="text-uppercase th-membre" scope="col"><p>description</p></th>
            <th class="text-uppercase th-membre" scope="col"><p>Statistiques</p></th>
            <th class="text-uppercase th-membre" scope="col"><p>Supprimer</p></th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <?php while($row = $req->fetch()){ ?>
              <th scope="row" class="bg-warning"><?php echo $row['id']; ?></th>
              <td class=""><?php echo $row['nom']; ?></td>
              <td><?php echo $row['immatriculation']; ?></td>
              <td><?php echo $row['Date']; ?></td>
              <td><?php echo $row['Description']; ?></td>
              <?php echo '<td>'.'<a class="btn btn-primary" name="stat_vol"  href="display_vol.php?id='.$row['id'].'">'."Statistiques".'</a>'.'</td>'; ?>
              <?php echo '<td>'.'<form action="../function/delete_vol.php?id='.$row['id'].'" method="post"> <button class="btn btn-danger" type="submit" name="delete_vol">'."Supprimer".'</button></form>'.'</td>'; ?>
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
    </div>

    <?php include('../include/footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
