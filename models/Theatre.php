<?php

include_once("Dbh.php");

class Theatre{


   public static function findAll()
    {
        $dbh = new Dbh();
        $sql ="SELECT * from `theatres` ORDER BY `city`";
        $result = $dbh->connect()->query($sql);
         $theatres;
        while ($row = $result->fetch_assoc()) {
         $theatre = new Theatre();
         $theatre->id = $row['id'];
         $theatre->name = $row['name'];
         $theatre->city = $row['city'];
         $theatres[] = $theatre;
     
        }
         return $theatres;
    }
    
    public static function findById($id)
    {
        $theatre = new Theatre();
    $dbh = new DBH();
    $sql = "SELECT * from `theatres`
     WHERE `id` = ".$id;
     
//     $local_id = $dbh->connect()->real_escape_string("asdasd");

// $sql = sprintf("SELECT * from `theatres` WHERE `id` = '%s'", $local_id);


    $result = $dbh->connect()->query($sql);
    while ($row = $result->fetch_assoc()) {
        
        $theatre->name = $row['name'];
        $theatre->city = $row['city'];
        $theatre->id = $row['id'];
    }


    return $theatre;
    }
    
    public function save()
    {
        $dbh = new Dbh();
        
        if($this->id == 0){

            $sql = "INSERT INTO `theatres` (`id`, `name`, `city`) 
            VALUES (NULL, '".$this->name."', '".$this->city."');";
        }else{
           
                $sql = "UPDATE `theatres` 
                SET `name` = '".$this->name."', `city` = '" .$this->city. "' 
                WHERE `theatres`.`id` = '".$this->id."';";
         
        }
        $dbh->connect()->query($sql);
    }
    
    public static function destroy($request)
    {
        # code...
    }
    public static function addMovie($request)
    {
        $dbh = new Dbh();
        
        $sql = "INSERT INTO `movies_theatres` (`id`, `movie_id`, `theatre_id`,`start_date`,`end_date`) 
        VALUES (NULL, '". $request['movie'] ."', '".$request['id']."', '2021', '2021' );";
        // echo $sql;die;
        $dbh->connect()->query($sql);
    }


}
?>