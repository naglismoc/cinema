<?php 
  include("../layout/header.php");
  include("../layout/card.php");
  include_once(Controllers."/MovieController.php");

  if($_SERVER['REQUEST_METHOD']=='POST'){
      destroy($_POST);    
      header("location:".views."/movies");
  }

  $movies = findAll();
?>
<h2>Filmai</h2> 
  <div class="row">
  <?php 
    foreach ($movies as  $movie) {  
      card($movie, $user);
    }
?>
</div>
<?php include("../layout/footer.php");?>