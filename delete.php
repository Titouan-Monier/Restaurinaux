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
 $id= $_POST['id'] ?? null;
if (!$id){
  header('Location: crudfile.php');
  exit;
}

$statement = $pdo->prepare('DELETE FROM restaurant WHERE id= :id');
$statement->bindValue(':id', $id);
$statement->execute();
header('Location: crudfile.php');
 ?>
