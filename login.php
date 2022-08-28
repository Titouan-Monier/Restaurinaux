<?php

require('config.php');
session_start();

//technique n°1
  // function mailfounder(mail){
  // 	 for ($i=0; $i <  ; $i++) {
  // 	// code...
  // }

  // }
 // if (isset($_POST['email']) AND !empty($_POST['email']))
 // {
 // 	$_SESSION['email'] = $_POST['email'];
 // $sql = "SELECT * FROM user";
 //  $host = 'localhost';
 //  $dbname = 'restaurinaux';
 //  $dsn = "mysql:host=$host;dbname=$dbname";
 //  $username = 'root';
 //  $oui = '';
 //  $pdo = new PDO($dsn, $username, $oui);
 //  $stmt = $pdo->query($sql);
 //  $row = $stmt->fetch(PDO::FETCH_ASSOC);
 //  $hash= $row['password'];
 //  $mailbdd = $row['email'];
 //  $email = stripslashes($_REQUEST['email']);
 //  $password = stripslashes($_REQUEST['password']);
 //  $desynchash= password_verify($password, $hash);
 //  var_dump($password);
 //  var_dump($hash);
 //  var_dump($mailbdd);
 //  var_dump($desynchash);





 //  if($desynchash == true && $mailbdd == $email){
 //  	echo 'connexion réussi';

 //  }
 // }
//technique n°2



 if (isset($_POST['email'])){
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  $_SESSION['email'] = $email;

  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `user` WHERE email='$email'
  ";

  $result = mysqli_query($conn,$query) or die(mysql_error($conn));
  $user = mysqli_fetch_assoc($result);

  if (password_verify($password, $user['password'])) {

    //var_dump($user);

  	/*$name= $user['last_name'];*/

  		//on met en place le cookie avec le prénom de l'utilisateur

	/*	setcookie(
	    'user',
	    $name,

	    [
	        'expires' => time() + 365*24*3600,
	        'secure' => true,
	        'httponly' => true,
	    ]
			);

*/
  	$admin= $user['admin'];
		$_SESSION['admin'] = $admin;
    $name= $user['last_name'];
    $_SESSION['last_name'] = $name;
    $id= $user['id'];
    $_SESSION['id'] = $id;


		// $cookie_name = "user";
		// $cookie_value = $name;
		// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day



	    //vérifier si l'utilisateur est un administrateur ou un utilisateur
	    if ($user['admin'] == true) {
	      header('location: /crudfile.php');
	    }else{
	      header('location: /index.php');
    	}

  }else{
    $message = "Le mail ou le mot de passe est incorrect.";

	}
}


//technique n°3
// $email = addslashes($_POST['email']);
// $password = $_POST['password'];

// $stmt = $mysqli->prepare("SELECT email, password FROM user where email = ?");
// $stmt->bind_param("s",$email);
// $stmt->execute();
// $stmt->bind_result($email, $pw);

// if ($stmt->num_rows == 1) {
// 	$stmt->fetch();
// 	if (password_verify($password, $pw)) {
// 		 if ($user['admin'] == true) {
// 	      header('location: /crudfile.php');
// 	    }else{
// 	      header('location: /index.php');
//     }
// 	}
// }




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
    <link rel="stylesheet" type="text/css" href="styles.css">
		<title>Login Restaurinaux </title>
	</head>

	<body>

		<section class="container-fluid bg"  name= "login">
			<section class="login-container row justify-content-center">
				<section class="col-12 col-sm-6 col-md-3">
					<form class="form-container" action="" method="post">
					  <div class="form-group">
					    <label for="exampleInputEmail1">Adresse Mail</label>
					    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre mail">
					    <small id="emailHelp" class="form-text text-muted">Ne partagez pas votre email ou mot de passe</small>
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Mot de passe</label>
					    <input type="password" class="form-control" name="password"  id="exampleInputPassword1" placeholder="Mot de passe">
					  </div>
					  <div id ="inscription">
					  	<a href="/inscription.php">S'inscrire</a>
					  </div>
					</br>

					  <button type="submit" name="submit" class="btn btn-primary btn-block">Connexion</button>
					  	<?php if (! empty($message)) { ?>
    						<p class="errorMessage"><?php echo $message; ?></p>
						<?php } ?>
					</form>
				</section>

			</section>

		</section>

    <?php include 'footer.php';?>


	</body>
</html>
