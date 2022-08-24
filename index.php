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
		<link rel="stylesheet" href="styles.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
		<script type="text/javascript" src="script.js" defer></script>
		<title>Page d'accueil- Restaurinaux  </title>
	</head>

	<body>
    <?php include 'navbar.php'; ?>
		<div id="page">
  		<div id="list">
      <?php foreach ($restaurants as $i => $restaurant): ?>
				<div class="sheet">
					<p>
						<a href="<?php echo $restaurant['image'] ?>" class="picture">
							<img src= "	<?php echo $restaurant['image'] ?>"  alt="<?php echo $restaurant['nom'] ?>"/>
						</a>
						<div class="description">
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
      <?php endforeach;?>
			</div>
    </div>
    <?php include 'footer.php'; ?>
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
