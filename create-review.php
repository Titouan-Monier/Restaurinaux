<?php
// Récuperer les paramètre de l'url (query params)
$restaurantId = $_GET["restaurantId"] ?? null;

$pdo= new PDO ('mysql:host=localhost; port=3306; dbname=restaurinaux', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$statement = $pdo->prepare("SELECT type, image, price, nom, adress, id FROM restaurant WHERE id='$restaurantId'");
$statement->execute();
$restaurants = $statement->fetchAll(PDO::FETCH_ASSOC);
$restaurant= $restaurants[0];

  // Initialiser la session
  session_start();

 // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["email"])){
    header("Location: login.php");
    exit();

  }

$errors = [];
$note = '';
$comment='';

//requête post attribuant la donnée rentré au variable
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $note = $_POST['note'];
  $comment = $_POST['comment'];
  $userId = $_SESSION["id"];
  $restaurantId = $_GET["restaurantId"];
  //affichage d'erreur en front si les champs ne sont pas remplies
  if (!$note){
    $errors[] = 'La note est requise';
  }

  if (!$comment){
    $errors[] = 'Le commentaire est requis';
  }

  //si il n'y a pas d'erreurs on prepare puis execute la requete
  if (empty($errors)){

    $statement = $pdo->prepare("INSERT INTO review (note, comment, user_id, restaurant_id)
                VALUES(:note, :comment, :user_id, :restaurant_id)
              ");


    $statement ->bindValue(':note', $note);
    $statement ->bindValue(':comment', $comment);
    $statement ->bindValue(':user_id', $userId);
    $statement ->bindValue(':restaurant_id', $restaurantId);
    $statement ->execute();
    header('Location: index.php');
  }
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
		<title>Avis - Restaurinaux  </title>
	</head>

	<body>
    <?php include 'navbar.php'; ?>
    <div id="page">
      <div id="review-content">
        <a href="<?php echo $restaurant['image'] ?>" class="picture">
          <img src= "	<?php echo $restaurant['image'] ?>"  alt="<?php echo $restaurant['nom'] ?>"/>
        </a>
        <div class="description">
          <?php echo $restaurant['nom'] ?></br>
        </div>
        <form method="post" action="create-review.php?restaurantId=<?php echo $_GET["restaurantId"] ?>">
          <div id="formulaire">

            <label for="fname">Commentaire:</label><br>
            <label><textarea name="comment" cols="35" rows ="5"> </textarea> </label>
            <div>
            <br>
            <label for="lname">note:</label>
            <select name="note">
              <option>0</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div>
            <br>
            <a href="index.php" type="button" class="btn btn-outline-secondary btn-sm annuler">Annuler</a>
            <button type="submit" class="btn btn-secondary btn-sm">Publier</button>
          </div>
         </div>

        </form>
      </div>
    </div>
    <?php include 'footer.php'; ?>
	</body>
<html>
