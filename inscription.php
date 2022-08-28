<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=restaurinaux','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$errors = [];

$email = '';
$password = '';
$first_name='';
$last_name='';
$country='';
$zip= '';
$adress='';
$gender='';
$city= '';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $country = $_POST['country'];
  $zip = $_POST['zip'];
  $adress = $_POST['adress'];
  $gender = $_POST['gender'];
  $city = $_POST['city'];
  $password = password_hash($password, PASSWORD_DEFAULT);

  if (!$email){
    $errors[] = 'Le mail est requis';
  }

  if (!$password){
    $errors[] = 'Le mot de passe est requis';
  }
  if (!$first_name){
    $errors[] = 'Le nom est requis';
  }
  if (!$last_name){
    $errors[] = 'Le prénom est requis';
  }
  if (!$country){
    $errors[] = 'Le pays est requis';
  }
  if (!$zip){
    $errors[] = 'Le code postal est requis';
  }
  if (!$adress){
    $errors[] = 'L\' adresse est requise';
  }
  if (!$gender){
    $errors[] = 'Le genre est requis';
  }
  if (!$city){
  	$errors[]= 'la ville est requise';
  }
  if (empty($errors)){

  $statement = $pdo->prepare("INSERT INTO user (email, password, first_name, last_name, country, city, zip, adress, gender)
              VALUES(:email, :password, :first_name, :last_name, :country, :city, :zip, :adress, :gender)
            ");


  $statement ->bindValue(':email', $email);
  $statement ->bindValue(':password', $password);
  $statement ->bindValue(':first_name', $first_name);
  $statement ->bindValue(':last_name', $last_name);
  $statement ->bindValue(':zip', $zip);
  $statement ->bindValue(':country', $country);
  $statement ->bindValue(':adress', $adress);
  $statement ->bindValue(':gender', $gender);
  $statement ->bindValue(':city', $city);
  $statement ->execute();
  header("Location: login.php");
  }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="global.css">
		<title>Inscription Restaurinaux </title>
	</head>

	<body>
		<section class="container-fluid bg">
			<div class="form-container">
				<h1>Inscription</h1>
				<?php if (!empty($errors)): ?>
				<div class= "alert alert-danger">
					<?php foreach ($errors as $error): ?>
						<div> <?php echo $error; ?> <div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
				<form method="post">
					<div mb-3>
						<label class="form-label">email</label>
						<input class="form-control" type="text" name="email" value="<?php echo $email ?>" placeholder="email">
					</div>
					<div mb-3>
						<label class="form-label">mot de passe</label>
						<input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?php echo $password ?>" placeholder="mot de passe">
					</div>
					<div mb-3>
						<label class="form-label">Nom</label>
						<input class="form-control" type="text" name="first_name" value="<?php echo $first_name ?>" placeholder="nom">
					</div>
					<div mb-3>
						<label class="form-label">Prénom</label>
						<input class="form-control" type="text" name="last_name" value="<?php echo $last_name ?>" placeholder="prénom">
					</div>
					<div mb-3>
						<label for="gender">Genre</label><br>
					    <input name="gender" value="m" checked="" type="radio">Homme
					    <input name="gender" value="f" type="radio">Femme<br><br>
					</div>
					<div mb-3>
						<label class="form-label">Pays</label>
						<input class="form-control" type="text" name="country" value="<?php echo $country ?>" placeholder="pays">
					</div>
					<div mb-3>
						<label class="form-label">Ville</label>
						<input class="form-control" type="text" name="city" value="<?php echo $city ?>" placeholder="ville">
					</div>
					<div mb-3>
						<label class="form-label">Code postal</label>
						<input class="form-control" type="text" name="zip" value="<?php echo $zip ?>" placeholder="code postal">
					</div>
					<div mb-3>
						<label class="form-label">Adresse</label>
						<input class="form-control" type="text" name="adress" value="<?php echo $adress ?>" placeholder="adresse">
					</div>
				</br>
					<button type="submit" class="btn btn-primary ">Soumettre</button>
          <a href="login.php" class="btn btn-secondary"> Retour </a>
				</form>
			</div>
		</section>
	</body>
</html>
