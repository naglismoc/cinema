<?php 
include("../layout/header.php");
include("../layout/card.php");
include(Controllers."/TheatreController.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
    addMovie($_POST);
  }

  $movies = allMovies();
  $theatre = findById($_GET['id']);
  $movies2 = allTheatreMovies($_GET['id']);
?>

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
  <div class="row">

  <?php 
  if($movies2!=0){
  foreach ($movies2 as  $movie2) {  
    card($movie2,$user);
    }
}
?>
</div>
<?php include("../layout/footer.php");?>