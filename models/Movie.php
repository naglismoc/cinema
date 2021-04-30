<?php

include_once("Dbh.php");

class Movie{

    public static function allTheatreMovies($id)
    {
        $dbh = new Dbh();

        $sql ="SELECT m.id as id, title, cover, length, start_date, end_date
        from movies as m
        INNER JOIN `movies_theatres` as mt
        on m.id = mt.movie_id 
        where theatre_id = ".$id;
         $result = $dbh->connect()->query($sql);
        
         $movies;
         $check  = false;
         while ($row = $result->fetch_assoc()) {
             $check = true;
            $movie = new movie();
            $movie->id = $row['id'];
            $movie->title = $row['title'];
            $movie->cover = $row['cover'];
            $movie->length = $row['length'];
            $movie->start_date = $row['start_date'];
            $movie->end_date = $row['end_date'];
            $movies[] = $movie;
        
           }
           if($check){
            return $movies;
           }
           return 0;
    }
   public static function findAll()
    {
        $dbh = new Dbh();
   $sql ="SELECT * from `movies` ORDER BY `title`";
   $result = $dbh->connect()->query($sql);
    $movies;
   while ($row = $result->fetch_assoc()) {
    $movie = new movie();
    $movie->id = $row['id'];
    $movie->title = $row['title'];
    $movie->cover = $row['cover'];
    $movie->length = $row['length'];
    $movies[] = $movie;

   }
    return $movies;
    }
    
    public static function findById($id)
    {
        $dbh = new Dbh();
        $sql ="SELECT * from `movies` where `id` = '".$id."' ";
        $result = $dbh->connect()->query($sql);
        $movie = new Movie();
        $movie->id = 0;
        $movie->title = "";
        $movie->cover = "";
        $movie->length = "";
        while ($row = $result->fetch_assoc()) {
            $movie = new movie();
            $movie->id = $row['id'];
            $movie->title = $row['title'];
            $movie->cover = $row['cover'];
            $movie->length = $row['length'];

        }
        return $movie;
    }
    
    public function save()
    {
        $dbh = new Dbh();
        
        
        if($this->id == 0){
            $cover =  $this->cover ? $this->cover : 0;

           
            $sql = "INSERT INTO `movies` (`id`, `title`, `cover`, `length`) 
            VALUES (NULL, '".$this->title."', '". $cover ."', '".$this->length."');";
        }else{
            if($this->cover != false){
                Movie::deletePhoto(findById($this->id));
                $sql = "UPDATE `movies` 
                SET `title` = '".$this->title."', `cover` = '".$this->cover."', `length` = '".$this->length."' 
                WHERE `movies`.`id` = '".$this->id."';";
            }else{
                $sql = "UPDATE `movies` 
                SET `title` = '".$this->title."', `length` = '".$this->length."' 
                WHERE `movies`.`id` = '".$this->id."';"; 
            }
        }
        $dbh->connect()->query($sql);
    }
    
    public static function destroy($request)
    {
       
        Movie::deletePhoto(findById($request['id']));
        $dbh = new Dbh();
        $sql = "DELETE FROM `movies`
        WHERE `movies`.`id` = ".$request['id'];
        $dbh->connect()->query($sql);

    }

    public static function deletePhoto($movie)
    {
        unlink("../../uploads/".$movie->cover);
    }

}
?>