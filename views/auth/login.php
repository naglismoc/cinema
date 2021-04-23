<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginas</title>
</head>
<body>
<?php include("../header.php");



include(Controllers."/UserController.php");


if(!isset($_SESSION['user'])){
    $_SESSION['user'] = 0;
}
if($_SESSION['user'] == 1){
    header("location:./index.php");
 }
 $_SESSION['logged']  = -1;
 $_SESSION['email']  = "";



if($_SERVER['REQUEST_METHOD']=='POST'){
    $_SESSION['email']  = $_POST['email'];
    login($_POST);
}






if($_SESSION['logged'] == -1){
    echo '<h1 style="color:blue;">Prašome prisijungti.</h1>';
}
if($_SESSION['logged'] == 0){
    echo '<h1 style="color:red;">Neteisingas slaptažodis ar pašto adresas!</h1>';
}
if($_SESSION['logged'] == 1){
    echo '<h1 style="color:green;">Sveikinu, prisijungėte!</h1>';
}
?>
<form action="" method="POST">
  <label for="email">pastas:</label><br>
  <input type="text" id="email" name="email" placeholder="pastas"  value="<?=$_SESSION['email']?>" ><br>
  <label for="password">slaptazodis:</label><br>
  <input type="password" id="password" name="password"  placeholder="slaptazodis"><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>