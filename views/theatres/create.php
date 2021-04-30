<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoriai</title>
</head>
<body>
<?php include("../header.php");

include(Controllers."/TheatreController.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    store($_POST);
}


?>

<form action="" method="POST">
  <label for="name">Kino teatro pavadinimas: </label>
  <input type="text" id="name" name="name"><br><br>
  <label for="length">Miestas: </label>
  <input type="text" id="city" name="city"><br><br>
  <!-- <label for="cover">filmo nuotrauka: </label>
  <input type="text" id="cover" name="cover"><br><br> -->

  <input type="submit" value="Submit">
</form> 