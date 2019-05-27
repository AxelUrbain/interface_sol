<div id="menu">
  <nav class="navbar navbar-expand-lg">
    <a class="color-menu" href="#">Suivi de vol - <?php echo $_SESSION['login']; ?> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars fa-2x"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="item-menu" href="../PanelAdmin/panel.php">Panel</a>
        </li>
        <li class="nav-item">
          <a class="item-menu" href="../PanelAdmin/hist_adm.php">Historique</a>
        </li>
        <li class="nav-item">
          <a class="item-menu" href="../PanelAdmin/list_member.php">Membre</a>
        </li>
        <li class="nav-item">
          <a class="item-menu" href="../PanelAdmin/list_equipment.php">Matériels</a>
        </li>
        <li class="nav-item">
          <a class="item-menu" href="../direct.php">Live</a>
        </li>
        <li class="nav-item">
          <a class="item-menu" href="../function/script_disconnect.php">Deconnexion</a>
        </li>
      </ul>
    </div>
  </nav>

</div>
