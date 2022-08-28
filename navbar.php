<div id="navbar">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="."class="navbar-brand mb-0 h1">
      <img class="d-inline-block "src="Logo.png" width="125"/>
      Restaurinaux
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/index.php?type=traditionnel">Traditionnel <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/index.php?type=bistrot">Bistrot <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/index.php?type=brasserie">Brasserie <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/index.php?type=gastronomique">Gastronomique<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/index.php?type=cuisine-du-monde">Cuisine du Monde<span class="sr-only">(current)</span></a>
        </li>

          <li class="nav-item active">
            <a class="nav-link" href="/login.php">Se connecter<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/login.php">Se déconnecter<span class="sr-only">(current)</span></a>
          </li>
        <div id= "filtres">
          <div><h3> <?php echo 'Bonjour ' .$_SESSION['last_name']. '! :)'; ?></h3></div>
        </div>
      </ul>
    </div>
  </nav>
</div>
