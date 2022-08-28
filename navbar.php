<div>

  <nav class="navbar navbar-light navbar-expand-md bg-faded justify-content-center">
    <a href="."class="navbar-brand mb-0 h1">
      <img class="d-inline-block "src="Logo.png" width="100"/>
      Restaurinaux
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
        <ul class="navbar-nav w-100 justify-content-center">
            <li class="nav-item active">
              <a class="nav-link" href="index.php?type=traditionnel">Traditionnel <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php?type=bistrot">Bistrot <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php?type=brasserie">Brasserie <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php?type=gastronomique">Gastronomique<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active" style="min-width:150px;">
              <a class="nav-link" href="index.php?type=cuisine-du-monde">Cuisine du Monde<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <li class="nav-item active">
              <a class="nav-link" href="login.php">Se connecter<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="deconnexion.php">Se déconnecter<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <div class="nav-link">
                <i class="fas fa-solid fa-user"></i>
                <span> <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?> </span>
              </div>
            </li>
        </ul>
    </div>
</nav>
</div>
