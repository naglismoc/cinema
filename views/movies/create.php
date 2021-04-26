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

include(Controllers."/MovieController.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    store($_POST);
}


?>

<form action="" method="POST" enctype="multipart/form-data">
  <label for="title">Filmo pavadinimas: </label>
  <input type="text" id="title" name="title"><br><br>
  <label for="length">filmo trukmė: </label>
  <input type="text" id="length" name="length"><br><br>
  <!-- <label for="cover">filmo nuotrauka: </label>
  <input type="text" id="cover" name="cover"><br><br> -->
  <input type="file" id="img" name="img" >
  <input type="submit" value="Submit">
</form> 