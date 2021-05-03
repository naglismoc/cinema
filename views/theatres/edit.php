<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoriai</title>
</head>
<body>
<?php include_once("../layout/header.php");

include_once(Controllers."/TheatreController.php");


      $theatre = findById($_GET['id']);
      
      if($_SERVER['REQUEST_METHOD']=='POST'){
        store($_POST);
       }

?>
<form action="" method="POST" enctype="multipart/form-data">
  <label for="title">Filmo pavadinimas: </label>
  <input type="text" id="title" name="name" value="<?=$theatre->name?>"><br><br>
  <label for="length">filmo trukmė: </label>
  <input type="text" id="length" name="city" value="<?=$theatre->city?>"><br><br>
 <input type="hidden" name="id" value="<?=$_GET['id']?>">
  <!-- <input type="file" id="img" name="img" > -->
  <input type="submit" value="Submit">
</form>


<?php include("../layout/footer.php");?>