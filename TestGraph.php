<?php
session_start();
if(!isset($_SESSION['login'])){
  header('Location: index.php');
  exit();
}
 ?>

<!doctype html>
<html lang="fr">
  <?php include('include/membre/header.php'); ?>
  <body>

    <?php include('include/membre/navbar.php'); ?>


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <h3>Test Graph</h3>
          <canvas id="myChart" style="width:100%; height:650px;"></canvas>
        </div>
      </div>
    </div>


    <?php include('include/footer.php'); ?>

    <script src="https://code.highcharts.com/highcharts.src.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="chart-db-php.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

  </body>
</html>
