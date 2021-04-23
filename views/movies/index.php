<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knygos</title>
</head>
<body>
<?php include("../header.php");

include_once(Controllers."/MovieController.php");


if($_SERVER['REQUEST_METHOD']=='POST'){

 
    destroy($_POST);
    header("location:".views."/movies");

}



$movies = findAll();







?>


<style>
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
</head>
<body>
<?php

?>
<h2>Filmai</h2>

<table>
  <tr>
    <th>Title</th>
    <th>cover</th>
    <th>length</th>
    <?php if($user->isAdmin()){?>
    <th>edit</th>
    <th>delete</th>
    <?php
     } 
    ?>
  </tr>
  <?php 
  foreach ($movies as  $movie) {  
    
    // $author = author($movie->author_id);
      echo "
      <tr>
      <td>".$movie->title."</td>
      <td>".$movie->cover."</td>
      <td>".$movie->length." </td>";
      if($user->isAdmin()){
        echo '<td><a href="'.views.'/movies/edit.php?id='.$movie->id.'">edit</a></td>';
        echo '<td>
        <form action="#" method="post">
            <input type="hidden" name="id" value="'.$movie->id.'">
            <button type="submit">trinti knygą</button>
        </form>
        </td>';
      }
      
      echo  '</tr>';
 
}

?>
</table>

</body>
</html>