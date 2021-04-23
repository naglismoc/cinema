<?php

include_once("Dbh.php");

class Movie{


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
        # code...
    }
    
    public function save()
    {
        $dbh = new Dbh();
        if($this->id == 0){
            $sql = "INSERT INTO `movies` (`id`, `title`, `cover`, `length`) 
            VALUES (NULL, '".$this->title."', '".$this->cover."', '".$this->length."');";
        }else{
            $sql = "UPDATE `movies` 
            SET `title` = '".$this->title."', `cover` = '".$this->cover."', `length` = '".$this->length."' 
            WHERE `movies`.`id` = '".$this->id."';";
        }
        $dbh->connect()->query($sql);
    }
    
    public static function destroy($request)
    {
        # code...
    }



}
?>