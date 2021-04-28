<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoriai</title>
</head>
<body>
<?php include_once("../header.php");

include_once(Controllers."/MovieController.php");


      $movie = findById($_GET['id']);
      
      if($_SERVER['REQUEST_METHOD']=='POST'){
        store($_POST);
       }

?>
<img src="../../uploads/<?=$movie->cover?>" alt="Girl in a jacket"  height="100">
<form action="" method="POST" enctype="multipart/form-data">
  <label for="title">Filmo pavadinimas: </label>
  <input type="text" id="title" name="title" value="<?=$movie->title?>"><br><br>
  <label for="length">filmo trukmė: </label>
  <input type="text" id="length" name="length" value="<?=$movie->length?>"><br><br>
 <input type="hidden" name="id" value="<?=$_GET['id']?>">
  <input type="file" id="img" name="img" >
  <input type="submit" value="Submit">
</form>