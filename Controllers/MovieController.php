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
    $movie = new Movie();
    $movie->title = $request['title'];
    $movie->cover = $request['cover'];
    $movie->length = $request['length'];
    $movie->save();

    header("location:./index.php");
}

function destroy($request)
{
    # code...
}

?>