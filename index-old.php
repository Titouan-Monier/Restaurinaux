<?php

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
		<link rel="stylesheet" href="styles-old.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
		<script type="text/javascript" src="script.js" defer></script>
		<title>Page d'accueil- Restaurinaux  </title>
	</head>

	<body>
		<div id="page">
			<div id = "frontbar">
				<div id="menu">
					<div id="tradi" class="menu_item">
						<h1> Traditionelle </h1>
					</div>
					<div id="brasse" class="menu_item">
						<h1> Brasserie </h1>
					</div>
					<div id="bis" class="menu_item">
						<h1> Bistrot </h1>
					</div>
					<div id="gastro" class="menu_item">
					 <h1> Gastro </h1>
					</div>
					<div id="monde" class="menu_item">
						<h1> Cuisine du Monde </h1> </div>
					<a href ="login.php"id="login"class="menu_item"> login</a>
				</div>

				<div id="logo_restaurinaux">
					<div id="logo_title"> <strong> Restaurinaux </strong> </div>
					<div id="logo_image">
							<a href="Logo.png" id="Logo">
								<img src= "Logo.png" width="125" alt="Logo_Restaurinaux"/>
							</a>
					</div>

				</div>
				<button id="mode_nuit" onclick="triggerNightMode()">
					<h6 > Mode Nuit </h6>
				</button>
			</div>
			<div id= "filtres-container">

				<div id= "filtres">
					<div><h3><?php  echo 'Bonjour ' .$_SESSION['last_name']. '! :)';?> </h3></div>
				</div>
			</div>

			<div id="mediumbar">
				<div id="thefourth">
					<div id="twins1">
						<div class="sheet">
							<p>
								<a href="cochon.jpg" id="cochon">
									<img src= "cochon.jpg" width ="200" alt="Au cochon Dodue"/>
								</a>
								<div id="texte1">
									Au cochon dodue-Brasserie </br>
									<span class="fas fa-star checked"data-star="1"> </span>
									<span class="fas fa-star checked"data-star="2"> </span>
									<span class="fas fa-star checked"data-star="3"> </span>
									<span class="fas fa-star checked"data-star="4"> </span>
									<span class="fas fa-star"data-star="5"> </span>
								</div>
							</p>
						</div>
						<div class="sheet">
							<p>
								<a href="oeuf.jpg" id="oeuf">
									<img src="oeuf.jpg" width="155" alt="A l'oeuf cuit"/>
								</a>
								<div id="texte2">
									A l'oeuf cuit-Traditionelle </br>
									<span class="fas fa-star checked"data-star="1"> </span>
									<span class="fas fa-star checked"data-star="2"> </span>
									<span class="fas fa-star"data-star="3"> </span>
									<span class="fas fa-star"data-star="4"> </span>
									<span class="fas fa-star"data-star="5"> </span>
								</div>
							</p>
						</div>
					</div>
					<div id="twins2">
						<div class="sheet">
							<p>
								<a href="japon.jpg" id="japon">
									<img src="japon.jpg" width="200" alt="Au petit Japon"/>
								</a>
								<div id= "texte3">
									Au petit japon-Japonais </br>
									<span class="fas fa-star checked"data-star="1"> </span>
									<span class="fas fa-star checked"data-star="2"> </span>
									<span class="fas fa-star checked"data-star="3"> </span>
									<span class="fas fa-star checked"data-star="4"> </span>
									<span class="fas fa-star checked"data-star="5"> </span>
  							</div>
							</p>
						</div>
						<div class="sheet">
							<p>
								<a href="bar.jpg" id="bar">
									<img src="bar.jpg" width="200" alt="Au bar fantomatique"/>
								</a>
								<div id ="texte4">
									Au Bar fantômatique-Bistrot </br>
									<span class="fas fa-star checked"data-star="1"> </span>
									<span class="fas fa-star"data-star="2"> </span>
									<span class="fas fa-star"data-star="3"> </span>
									<span class="fas fa-star"data-star="4"> </span>
									<span class="fas fa-star"data-star="5"> </span>
								</div>
							</p>
						</div>
					</div>
				</div>
				<div id="map">
					<p>
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d45266.255195403144!2d-0.6151542253829377!3d44.83906283071986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1619254077224!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</p>
				</div>
			</div>
		</div>
	</body>
<html>
