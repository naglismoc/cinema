<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include("./header.php");?>

<?php


include(Controllers."/UserController.php");

if(isset($_GET["logout"])){
    logout(); 
    header("location:".views);
    die;
}
var_dump($user);
?>



    <h1>homepage</h1>
</body>
</html>