<?php
include($_SERVER['DOCUMENT_ROOT']."/cinema/views/bootstrap.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href=<?=css?>/main.css>
    <title>Knygos</title>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="menu">
            <a href="<?=views?>">home</a> 
            <a href="<?=views?>/movies">movies</a>
            <a href="<?=views?>/movies/create.php">new movie</a> 
            <a href="<?=views?>/theatres">theatres</a>
            <a href="<?=views?>/theatres/create.php">new theatre</a> 
            <?php
            if(isset($_SESSION['user'])){?>
                <a href="<?=views?>/index.php?logout=1">logout</a>
                <!-- <a href="<?=views?>/index.php">admin</a> -->
                <?php }
            else{?>
                <a href="<?=views?>/auth/login.php">login</a>
                <a href="<?=views?>/auth/register.php">register</a>
            <?php } 
            ?>

        </div>
    </div>

