<?php
    define("views","http://localhost/cinema/views");
    define("Controllers",$_SERVER['DOCUMENT_ROOT']."/cinema/Controllers");
    define("Models",$_SERVER['DOCUMENT_ROOT']."/cinema/Models");
    define("css","http://localhost/cinema/css");
    include_once(Models."/User.php");
    session_start();
    $user = new User();
 
    if(isset($_SESSION["user"])){
         $user->id = $_SESSION['user']["id"];
         $user->email = $_SESSION['user']["email"];
         $user->permission_lvl = $_SESSION['user']["permission_lvl"];
    }
     
?>