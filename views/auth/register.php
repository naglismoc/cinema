<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
</head>
<body>
<?php include("../layout/header.php");


include(Controllers."/UserController.php");



if($_SERVER['REQUEST_METHOD']=='POST'){
    register($_POST);
   }

   if(isset($_SESSION['user']['id'])){
    header("location:./index.php");
 }
?>




<form action="" method="POST">
  <label for="email">pastas:</label><br>
  <input type="text" id="email" name="email" placeholder="pastas" ><br>
  <label for="password">slaptazodis:</label><br>
  <input type="text" id="password" name="password"  placeholder="slaptazodis"><br>
   <label for="password">slaptazodis:</label><br>
  <input type="text" id="password" name="password2"  placeholder="pakartokite"><br><br>
  <input type="submit" value="Registruotis">
</form>
<?php include("../layout/footer.php");?>
</body>
</html>