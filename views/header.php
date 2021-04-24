<?php
include($_SERVER['DOCUMENT_ROOT']."/cinema/views/bootstrap.php");
?>
<div class="header">
<div class="menu">
<a href="<?=views?>">home</a> ||

<a href="<?=views?>/movies">movies</a>
<a href="<?=views?>/movies/create.php">new movie</a> ||
<a href="<?=views?>/theatres">theatres</a>
<a href="<?=views?>/theatres/create.php">new theatre</a> ||
<?php
if(!isset($_SESSION['user'])){
  
 //  $_SESSION['user'] = 0;
}

if(isset($_SESSION['user'])){?>
    <a href="<?=views?>/index.php?logout=1">logout</a>
    
    <?php }
else{?>
    <a href="<?=views?>/auth/login.php">login</a>
    <a href="<?=views?>/auth/register.php">register</a>
<?php } 
 ?>

</div>
</div>

<style>
.header{
    height:80px;
    background-color:#75eba8;
    width:100%;
}
.menu{
    margin:20px;
    float:right;
}
</style>