<?php

function card($movie, $user){
    echo "  <div  class='col-md-2' style='border: 1px solid purple;'>
    <tr>
    <div>".$movie->title."</div>
    <div>";
    if(strpos($movie->cover,".jpg") ){
   echo '<img src="../../uploads/'.$movie->cover.'" alt="movie_cover"  height="100">';
   }    
    echo
    "</div>
    <div>".$movie->length." </div>";
    if($user->isAdmin()){
      echo '<div><a href="'.views.'/movies/edit.php?id='.$movie->id.'">edit</a></div>';
      echo '<div>
      <form action="#" method="post">
          <input type="hidden" name="id" value="'.$movie->id.'">
          <button type="submit">trinti filmą</button>
      </form>
      </div>';
    }
    echo  '</tr>  </div>';
 }

 ?>