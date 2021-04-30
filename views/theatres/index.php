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

include_once(Controllers."/TheatreController.php");


if($_SERVER['REQUEST_METHOD']=='POST'){

    destroy($_POST);    
    header("location:".views."/theatres");

}



$theatres = findAll();







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
    <th>City</th>
    <th>name</th>
    <?php if($user->isAdmin()){?>
    
    <th>movies</th>
    <th>edit</th>
    <th>delete</th>
    <?php
     } 
    ?>
  </tr>
  <?php 
  foreach ($theatres as  $theatre) {  
    
    // $author = author($theatre->author_id);
      echo "
      <tr>
      <td>".$theatre->city."</td>

      <td>".$theatre->name." </td>";
      if($user->isAdmin()){
        echo '<td><a href="'.views.'/theatres/addMovie.php?id='.$theatre->id.'">Repertuaras</a></td>';
        echo '<td><a href="'.views.'/theatres/edit.php?id='.$theatre->id.'">edit</a></td>';
        echo '<td>
        <form action="#" method="post">
            <input type="hidden" name="id" value="'.$theatre->id.'">
            <button type="submit">trinti filmą</button>
        </form>
        </td>';
      }
      
      echo  '</tr>';
 
}

?>
</table>

</body>
</html>