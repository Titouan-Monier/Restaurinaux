<?php
// Récuperer les paramètre de l'url (query params)
$type = $_GET["type"] ?? null;
$search = $_GET["search"] ?? null;

$pdo= new PDO ('mysql:host=localhost; port=3306; dbname=restaurinaux', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!$type) {
  /*
  SELECT `restaurant`.*,AVG(review.note),COUNT(review.id)
  FROM `restaurant`
  LEFT JOIN `review` ON
  `restaurant`.id = `review`.`restaurant_id`
  GROUP BY `restaurant`.`id`;
  $statement = $pdo->prepare("SELECT type, image, price, nom, adress, id FROM restaurant WHERE type='$type'");
  */
  $statement = $pdo->prepare(
    "SELECT restaurant.*, AVG(review.note) AS average_note, COUNT(review.id) AS review_count
    FROM restaurant
    LEFT JOIN review ON
    restaurant.id = review.restaurant_id
    WHERE restaurant.nom LIKE '%$search%'
    GROUP BY restaurant.id"
  );
} else {
  $statement = $pdo->prepare(
    "SELECT restaurant.*,AVG(review.note) AS average_note, COUNT(review.id) AS review_count
    FROM restaurant
    LEFT JOIN review ON
    restaurant.id = review.restaurant_id
    WHERE type='$type' AND restaurant.nom LIKE '%$search%'
    GROUP BY restaurant.id"
  );
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
      <div id="page-content">
    		<div id="page-search">
          <form action="index.php">
            <div class="input-group">
              <input type="hidden" name="type" value="<?php echo $type;?>">
              <input type="text" class="form-control" placeholder="Recherche de restaurant" name="search" value="<?php echo $search;?>">
              <button class="btn btn-secondary" type="submit">Rechercher</button>
            </div>
          </form>
        </div>
    		<div id="page-list">
        <?php foreach ($restaurants as $i => $restaurant): ?>
  				<div class="sheet">
  					<p>
  						<a href="<?php echo $restaurant['image'] ?>" class="picture">
  							<img src= "	<?php echo $restaurant['image'] ?>"  alt="<?php echo $restaurant['nom'] ?>"/>
  						</a>
  						<div class="description">

  						 <strong> <?php echo $restaurant['nom'] ?> </strong></br></br>
                <?php echo $restaurant['type'] ?></br>
                <div>
                  <span> <?php echo  number_format($restaurant['average_note'],1) ?></span>
                  <?php for ($i = 1; $i <= 5; $i++): ?>
                    <?php if (round($restaurant['average_note']) >= $i ) : ?>
                      <span class="fas fa-star checked"> </span>
                    <?php else : ?>
                      <span class="fas fa-star"> </span>
                    <?php endif; ?>
                  <?php endfor;?>
                  <span>(<?php echo $restaurant['review_count']?> avis) </span>
                  <a href="create-review.php?restaurantId=<?php echo $restaurant['id'] ?>" class="btn btn-secondary btn-sm">Noter</a>
                </div>
                <?php echo $restaurant['adress'] ?> </br>
                <?php echo $restaurant['price'] ?> euros </br>
  						</div>
  					</p>
  				</div>
        <?php endforeach;?>
  			</div>
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
