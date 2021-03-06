<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=restaurinaux','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$errors = [];
$adress = '';
$note = '';
$type='';
$image='';
$price='';

//requête post attribuant la donnée rentré au variable
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $adress = $_POST['adress'];
  $note = $_POST['note'];
  $type = $_POST['first_name'];
  $image = $_POST['image'];
  $price = $_POST['price'];

  //affichage d'erreur en front si les champs ne sont pas remplies
  if (!$adress){
    $errors[] = 'L\'adresse est requise';
  }
  
  if (!$note){
    $errors[] = 'La note est requise';
  }
  if (!$type){
    $errors[] = 'Le type est requis';
  }
  if (!$image){
    $errors[] = 'L\'image est requise';
  }
  if (!$price){
    $errors[] = 'Le prix est requis';
  }
  
  //si il n'y a pas d'erreurs on prepare puis execute la requete
  if (empty($errors)){

  $statement = $pdo->prepare("INSERT INTO restaurant (adress, note, type, image, price)
              VALUES(:adress, :note, :type, :image, :price)
            ");
    

  $statement ->bindValue(':adress', $adress);
  $statement ->bindValue(':note', $note);
  $statement ->bindValue(':type', $type);
  $statement ->bindValue(':image', $image);
  $statement ->bindValue(':price', $price);
  $statement ->execute();
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
    <title>Création de Restaurant</title>
  </head>

  <body>
    <section class="container-fluid bg">
      <div class="form-container">
        <h1>Création de Restaurant</h1>
        <?php if (!empty($errors)): ?>
        <div class= "alert alert-danger">
          <?php foreach ($errors as $error): ?> 
            <div> <?php echo $error; ?> <div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?> 
        <form method="post">
          <div mb-3>
            <div class="form-group">
              <label>Image du restaurant</label>
              <input type="file" name="image"> <br>
            </div>
            <label class="form-label">Adresse</label>
            <input class="form-control" type="text" name="adress" value="<?php echo $adress ?>" placeholder="adresse">
          </div>
          <div mb-3>
            <label class="form-label">Note</label>
            <input type="text" class="form-control" name="note" value="<?php echo $note ?>" placeholder="note">
          </div>
          <div mb-3>  
            <label class="form-label">Prix</label>
            <input class="form-control" type="text" name="price" value="<?php echo $price ?>" placeholder="prix">
          </div>
          
          <div mb-3>  
            <label for="type">Type</label><br>
              <input name="type" value="brasserie" checked="" type="radio">Brasserie
              <input name="type" value="traditionel" type="radio">Traditionel 
              <input name="type" value="cuisine du monde"  type="radio">Cuisine du monde 
              <input name="type" value="bistrot" type="radio">Bistrot
              <input name="type" value="gastronomique" type="radio">Gastronomique<br><br>
          </div>
          <div mb-3>  
           
        </br>
          <button type="submit" class="btn btn-primary ">Soumettre</button>
        </form>
      </div>
    </section>
  </body>
</html>