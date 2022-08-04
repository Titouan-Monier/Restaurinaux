<?php
session_start();

$isConnected = isset($_SESSION['email']);
$isAdmin = $isConnected && ($_SESSION['admin'] === "1");

// redirection si l'user n'est pas admin
if(!$isConnected || !$isAdmin){
    header("Location: login.php");
    exit(); 

  }
$pdo= new PDO ('mysql:host=localhost; port=3306; dbname=restaurinaux', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM restaurant ORDER BY id DESC');
$statement->execute();
$restaurants = $statement->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurants CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <h1>Restaurants CRUD</h1>
    <p>
      <a href="create.php" class="btn btn-success"> Créer un Restaurant </a>
    </p>
    <table class="table">
    <thead>
      <tr>
        <th scope="col"> Nombre </th>
        <th scope="col">Type</th>
        <th scope="col">Prix</th>
        <th scope="col">Adresse</th>
        <th scope="col">Note</th>
        <th scope="col">Image</th>
      </tr>
    </thead>
    <tbody>
      <!-- Fait apparaitre chaque ligne de la table restaurant -->
      <?php foreach ($restaurants as $i => $restaurant): ?>

        <tr>
          <th scope="row"><?php echo $i + 1 ?></th>
          
          <td><?php echo $restaurant['type'] ?></td>
          <td><?php echo $restaurant['price'] ?></td>
          <td><?php echo $restaurant['adress'] ?></td>
          <td><?php echo $restaurant['note'] ?></td>
          <td><?php echo $restaurant['image'] ?></td>
          <td>
            <button type="button" class="btn btn-outline-primary"> Editer</button>
            <button type="button" class="btn btn-outline-danger"> Supprimer</button>
          </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
  </body>
</html>
