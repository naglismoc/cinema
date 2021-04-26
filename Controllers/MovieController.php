<?php
 include_once(Models."/Movie.php");

function findAll()
{
   return Movie::findAll();
}

function findById($id)
{
    # code...
}

function store($request)
{
    $cover = storePhoto();
    $movie = new Movie();
    $movie->title = $request['title'];
    $movie->cover =  $cover;
    $movie->length = $request['length'];
    $movie->save();
   
    header("location:./index.php");
}

function destroy($request)
{
    # code...
}

function storePhoto()
{
    $target_dir = "../../uploads/";
    $photoRndName = substr(bin2hex(openssl_random_pseudo_bytes(10)),0,10).".jpg";
    $target_file = $target_dir . $photoRndName;

    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
    return $photoRndName;
}

?>