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
    addMovie($_POST);
  }


$movies = allMovies();
$theatre = findById($_GET['id']);

$movies2 = allTheatreMovies($_GET['id']);



?>
<style>
h2{
    display: inline-block; 
}
.title-container{
    display: inline-block;
    width:80%;
    margin-left:10%;
}
.left{
    float:left;
}
.right{
    float:right;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
    </style>
    <div class="title-container">
        <div class="left">
            <h2>Kino teatro pavadinimas: </h2>
            <h2 name="name" value=""> <?=$theatre->name ?></h2>
        </div>
        <div class="right">
            <h2>Miestas:</h2>
            <h2 name="value"> <?=$theatre->city ?></h2><br><br>
        </div>
    </div>
  

<form action="" method="POST">
<input type="hidden" name="id" value="<?=$_GET['id']?>">

  <select name="movie">
  <?php 
  foreach ($movies as $movie) {
    echo '<option value="'.$movie->id. '">'.$movie->title. '</option>';
  }
 
 ?>
</select>
  <input type="submit" value="Įtraukti į repertuarą">
</form> 
<h2>Šio kino teatro repertuaras</h2>
<table>
  <tr>
    <th>Title</th>
    <th>cover</th>
    <th>length</th>
    <th>start</th>
    <th>end</th>
    <?php if($user->isAdmin()){?>
    <th>edit</th>
    <th>delete</th>
    <?php
     } 
    ?>
  </tr>
  <?php 
  if($movies2!=0){
  foreach ($movies2 as  $movie2) {  
    
    // $author = author($movie2->author_id);
      echo "
      <tr>
      <td>".$movie2->title."</td>
      <td>";
      if(strpos($movie2->cover,".jpg") ){
        // echo $movie2->cover;
     echo '<img src="../../uploads/'.$movie2->cover.'" alt="movie2_cover"  height="100">';
     }
      
      
      echo
      "</td>
      <td>".$movie2->length." </td>
      <td>".$movie2->start_date." </td>
      <td>".$movie2->end_date." </td>";
      if($user->isAdmin()){
        echo '<td><a href="'.views.'/movies/edit.php?id='.$movie2->id.'">edit</a></td>';
        echo '<td>
        <form action="#" method="post">
            <input type="hidden" name="id" value="'.$movie2->id.'">
            <button type="submit">trinti filmą</button>
        </form>
        </td>';
      }
      
      echo  '</tr>';
    }
}

?>
</table>