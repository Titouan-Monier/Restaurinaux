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
$search = $_GET['search'] ?? '';
if ($search) {
  $statement = $pdo->prepare('SELECT * FROM restaurant WHERE nom LIKE :nom ORDER BY id DESC');
  $statement->bindValue(':nom', "%$search%");
}
else {
  $statement = $pdo->prepare('SELECT * FROM restaurant ORDER BY id DESC');
}

$statement->execute();
$restaurants = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="app.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurants CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <h1>Restaurants CRUD</h1>
    <p>
      <a href="create.php" class="btn btn-success"> Créer un Restaurant </a>

        <a href="login.php" class="btn btn-secondary"> Retour </a>

    </p>
    <form>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Recherche de restaurant" name="search" value="<?php echo $search;?>">
        <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
      </div>
    </form>


    <table class="table">
    <thead>
      <tr>
        <th scope="col"> Nombre </th>
        <th scope="col">Nom</th>
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
          <td><?php echo $restaurant['nom'] ?></td>
          <td><?php echo $restaurant['type'] ?></td>
          <td><?php echo $restaurant['price'] ?></td>
          <td><?php echo $restaurant['adress'] ?></td>
          <td><?php echo $restaurant['note'] ?></td>
          <td><a href="<?php echo $restaurant['image']?>"><img src="<?php echo $restaurant['image']?>"  class="thumb-image"> </a><td>

          <td>
              <a href="update.php?id=<?php echo $restaurant['id']?>" class="btn btn-outline-primary"> Editer</a>

           <form style="display: inline-block" method="post" action="delete.php">
              <input type="hidden" name="id" value="<?php echo $restaurant['id']?>">
              <button type="submit" class="btn btn-outline-danger"> Supprimer</button>
            </form>
          </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
  </body>
</html>
