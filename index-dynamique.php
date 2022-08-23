<?php
// Récuperer les paramètre de l'url (query params)
$type = $_GET["type"] ?? null;

$pdo= new PDO ('mysql:host=localhost; port=3306; dbname=restaurinaux', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!$type) {
  $statement = $pdo->prepare('SELECT * FROM restaurant ORDER BY id DESC');
} else {
  $statement = $pdo->prepare("SELECT type, image, price, nom, adress FROM restaurant WHERE type='$type'");
}

$statement->execute();
$restaurants = $statement->fetchAll(PDO::FETCH_ASSOC);
  // Initialiser la session
  session_start();

 // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["email"])){
    header("Location: login.php");
    exit();

  }

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles-dyn.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<script type="text/javascript" src="script.js" defer></script>
		<title>Page d'accueil- Restaurinaux  </title>
	</head>

	<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a href="#"class="navbar-brand mb-0 h1">
        <img class="d-inline-block "src="Logo.png" width="125"/>
        Restaurinaux
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index-dynamique.php?type=traditionnel">Traditionnel <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index-dynamique.php?type=bistrot">Bistrot <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index-dynamique.php?type=brasserie">Brasserie <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index-dynamique.php?type=gastronomique">Gastronomique<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="index-dynamique.php?type=cuisine-du-monde">Cuisine du Monde<span class="sr-only">(current)</span></a>
          </li>

            <li class="nav-item active">
              <a class="nav-link" href="login.php">Se connecter<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="login.php">Se déconnecter<span class="sr-only">(current)</span></a>
            </li>
          <div id= "filtres">
            <div><h3><?php  echo 'Bonjour ' .$_SESSION['last_name']. '! :)';?> </h3></div>
          </div>
        </ul>
      </div>
    </nav>
		<div id="page">
      <?php foreach ($restaurants as $i => $restaurant): ?>
			<div id="mediumbar">
				<div id="thefourth">
					<div id="twins">
						<div class="sheet">
							<p>
								<a href="<?php echo $restaurant['image'] ?>" id="cochon">
									<img src= "	<?php echo $restaurant['image'] ?>" width ="200" alt="Au cochon Dodue"/>
								</a>
								<div id="texte1">
								<?php echo $restaurant['nom'] ?></br>
                <?php echo $restaurant['type'] ?></br>
									<span class="fas fa-star "data-star="0"> </span>
									<span class="fas fa-star "data-star="1"> </span>
									<span class="fas fa-star "data-star="2"> </span>
									<span class="fas fa-star "data-star="3"> </span>
									<span class="fas fa-star"data-star="4"> </span></br>
                  <?php echo $restaurant['adress'] ?> </br>
                  <?php echo $restaurant['price'] ?> euros </br>
								</div>
							</p>
						</div>

					</div>

					</div>
				</div>
        <?php endforeach;?>
				</div>
			</div>
		</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function () {
      resetStarColors();
      $('.fa-star').mouseover (function (){
        resetStarColors();
        var curentIndex = parseInt($(this).data('star'));
        for (var i = 1; i <= currentIndex; i++) {
          $('fa-star:eq('+i+')').css('color','yelow');
        }
      });
      $('.fa-star').mouseleave (function (){
        resetStarColors();
      });
    });
    </script>
	</body>
<html>
