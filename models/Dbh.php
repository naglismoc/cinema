<?php

class Dbh{


    function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cinema";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        if($conn->connect_error){
            echo " connection failed";
            die;
        }
        return $conn;
    }


}


?>