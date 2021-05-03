<?php

include_once(Models."/Theatre.php");
include_once(Models."/Movie.php");

    function allTheatreMovies($request){
       return Movie::allTheatreMovies($request);
    }
    function addMovie($request)
    {
        Theatre::addMovie($request);
        header("location:./addMovie.php?id=".$request['id']);
    }
    function allMovies()
    {
        return Movie::findAll();
    }
    function findAll()
    {
        return Theatre::findAll();
    }

    function findById($id)
    {
        return Theatre::findById($id);
    }

    function store($request)
    {

    
        $theatre = new Theatre();
        $theatre->id = isset($request['id']) ? $request['id'] : 0;
        $theatre->name = $request['name'];
        $theatre->city = ucwords(strtolower($request['city']));
        $theatre->save();
    
        header("location:./index.php");
    }

    function destroy($request)
    {
        Theatre::destroy($request);
    }

?>