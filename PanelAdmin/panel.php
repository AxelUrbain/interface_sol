<?php
require('../function/function.php');
require_once '../function/db-config.php';
session_start();
if(!isset($_SESSION['login'])){
  header('Location: ../index.php');
  exit();
}
if($_SESSION['id_role'] != 4){
  header('Location: ../index.php');
  exit();
}
else
{
  $MessageMembre = InscriptionMembre($bdd);
  $MessageMachine = InscriptionMachine($bdd);
}
?>

 <!doctype html>
 <html lang="fr">
   <?php include('../include/admin/header.php'); ?>
   <body>

     <?php include('../include/admin/navbar.php'); ?>
     <div class="title">
       <center>
         <h2 class="title">Panel Administrateur</h2>
       </center>
     </div>

     <div class="container">
       <!-- MESSAGE D'ERREUR OU DE SUCCES ! -->
       <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
          <center>  <?php echo $MessageMembre; ?> </center>
        </div>
       </div>

       <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
          <center>  <?php echo $MessageMachine; ?> </center>
        </div>
       </div>

       <div class="row space2">
         <div class="col-md-6 col-lg-6">
           <center>
            <!-- VISUEL - Inscription -->
            <h3 class="">Inscription</h3>
            <a data-toggle="modal" data-target="#Inscription"><i class="fa fa-address-card fa-10x"></i></a>
            </center>
            <!-- Modal -->
            <div class="modal fade" id="Inscription" tabindex="-1" role="dialog" aria-labelledby="Inscription" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Inscription d'un membre</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>



                 <!-- CORPS DU MODAL - FORMULAIRE INSCRIPTION -->
                 <div class="modal-body">
                   <!-- FORMULAIRE - Redirection pour le traitement php -->
                  <form method="post" action="panel.php">
                  <!-- DIV - NOM - Titre, taille class css etc ... -->
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nom</label>
                    <div class="col-sm-8">
                      <input name="nom" type="text" class="form-control" placeholder="Nom">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Prénom</label>
                    <div class="col-sm-8">
                      <input name="prenom" type="text" class="form-control" placeholder="Prénom">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Mot de Passe</label>
                    <div class="col-sm-8">
                      <input name="motdepasse" type="password" class="form-control" placeholder="Mot de Passe">
                    </div>
                  </div>

                    <div class="form-group row">
                      <legend class="col-form-label col-sm-4">Rôle</legend>
                      <div class="col-sm-8">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="role" value="4" checked>
                          <label class="form-check-label" for="gridRadios1">
                            Administrateur
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="role" value="2">
                          <label class="form-check-label" for="gridRadios2">
                            Instructeurs
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="role" value="3">
                          <label class="form-check-label" for="gridRadios2">
                            Pilote
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="role" value="1">
                          <label class="form-check-label" for="gridRadios2">
                            Élèves
                          </label>
                        </div>
                      </div>
                    </div>

                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                     <button name="Btn_Inscription" type="submit" class="btn btn-primary">Inscrire</button>
                   </div>
                   </form>
                 </div>
               </div>
              </div>
           </div>

         <div class="col-md-6 col-lg-6">
           <center>
             <h3 class="">Matériels</h3>
             <a data-toggle="modal" data-target="#Materiel"><i class="fab fa-avianex fa-10x"></i></a>
           </center>
           <!-- Modal -->
          <div class="modal fade" id="Materiel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ajout d'un matériel</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                <form method="post" action="panel.php">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Type</label>
                  <div class="col-sm-8">
                    <input name="type" type="text" class="form-control" placeholder="Planeur" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Marque</label>
                  <div class="col-sm-8">
                    <input name="marque" type="text" class="form-control" placeholder="Schleicher" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Modèle</label>
                  <div class="col-sm-8">
                    <input name="modele" type="text" class="form-control" placeholder="ASK 13" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Année</label>
                  <div class="col-sm-8">
                    <input name="years" type="number" min="1900" max="2099" step="1" value="2019" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Finesse Théorique</label>
                  <div class="col-sm-8">
                    <input name="finesse" type="number" min="0" max="1000" step="1" value="" class="form-control" required>
                  </div>
                </div>
                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                   <button name="Btn_Machine" type="submit" class="btn btn-primary">Inscrire</button>
                 </div>
                 </form>
               </div>
             </div>
            </div>
         </div>
       </div>
       <div class="row space2">
         <div class="col-md-6 col-md-6">
           <center>
             <h3 class="">Membres</h3>
             <a href="list_member.php"><i class="fa fa-users fa-10x"></i></a>
           </center>
         </div>
         <div class="col-md-6 col-lg-6">
           <center>
             <h3 class="">Historique</h3>
             <a href="hist_adm.php"><i class="fa fa-folder-open fa-10x"></i></a>
           </center>
         </div>
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
