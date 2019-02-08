<?php
session_start();
if(!isset($_SESSION['login'])){
  header('Location: ../index.php');
  exit();
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
       <div class="row space">

         <div class="col-md-6 col-lg-6">
           <center>
             <h3 class="title">Inscription</h3>
             <a href="#"><i class="fa fa-address-card fa-10x"></i></a><br>
             <!-- Button trigger modal -->
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               Inscription
             </button>
            </center>
             <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Inscription d'un membre</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                  <form>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Nom</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Mot de Passe</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>

                    <div class="form-group row">
                      <legend class="col-form-label col-sm-4">Rôle</legend>
                      <div class="col-sm-8">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                          <label class="form-check-label" for="gridRadios1">
                            Administrateur
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                          <label class="form-check-label" for="gridRadios2">
                            Instructeurs
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                          <label class="form-check-label" for="gridRadios2">
                            Pilote
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                          <label class="form-check-label" for="gridRadios2">
                            Élèves
                          </label>
                        </div>
                      </div>
                    </div>

                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                     <button type="button" class="btn btn-primary">Inscrire</button>
                   </div>
                   </form>
                 </div>
               </div>
              </div>
           </div>

         <div class="col-md-6 col-lg-6">
           <center>
             <h3 class="title">Matériels</h3>
             <a href="#"><i class="fab fa-avianex fa-10x"></i></a> <br>
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               Inscription
             </button>
           </center>
         </div>
       </div>
       <div class="row space">
         <div class="col-md-6 col-md-6">
           <center>
             <h3 class="title">Membres</h3>
             <a href="#"><i class="fa fa-users fa-10x"></i></a> <br>
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               Inscription
             </button>
           </center>
         </div>
         <div class="col-md-6 col-lg-6">
           <center>
             <h3 class="title">Historique</h3>
             <a href="#"><i class="fa fa-plane fa-10x"></i></a> <br>
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
               du cul
             </button>
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
