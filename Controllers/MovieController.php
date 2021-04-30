<?php
 include_once(Models."/Movie.php");


function findAll()
{
   return Movie::findAll();
}

function findById($id)
{
    $movie = new Movie();
    $dbh = new DBH();
    $sql = "SELECT * from `movies`
     WHERE `id` = ".$id;
     
//     $local_id = $dbh->connect()->real_escape_string("asdasd");

// $sql = sprintf("SELECT * from `movies` WHERE `id` = '%s'", $local_id);


    $result = $dbh->connect()->query($sql);
    while ($row = $result->fetch_assoc()) {
        
        $movie->title = $row['title'];
        $movie->length = $row['length'];
        $movie->cover = $row['cover'];
    }


    return $movie;
}


function store($request)
{   
    
    $cover = storePhoto();
  
    $movie = new Movie();
    $movie->id = isset($request['id']) ? $request['id'] : 0;
    $movie->title = $request['title'];
    $movie->cover =  $cover;
    $movie->length = $request['length'];
    $movie->save();
   
    header("location:./index.php");
}

function destroy($request)
{
    Movie::destroy($request);
}

function storePhoto()
{
    if(!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name'])) {
      return false;
    }
    $target_dir = "../../uploads/";
    $photoRndName = substr(bin2hex(openssl_random_pseudo_bytes(10)),0,10).".jpg";
    $target_file = $target_dir . $photoRndName;

    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
    return $photoRndName;
}

?>