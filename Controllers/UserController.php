<?php

include_once(Models."/User.php");


 function login($request)
{
 
    $Dbh = new Dbh();
    $sql = "SELECT * from `users` where email ='".$request['email']."'";
    $result =  $Dbh->connect()->query($sql);
    $user = new User();
    while ($row = $result->fetch_assoc()) {
        $user->id = $row['id'];
        $user->email = $row['email'];
        $user->password = $row['password'];
        $user->permission_lvl = $row['permission_lvl'];
        
    }
    $email = $_POST['email'];
    if($user->password == sha1($request['password'])){
        $_SESSION['logged'] = 1;
        $_SESSION['user'] = [];
        $_SESSION['user']["id"] = $user->id;
        $_SESSION['user']["email"] = $user->email;
        $_SESSION['user']["permission_lvl"] = $user->permission_lvl;
        header("location:".views);
    }
}

    function logout(){
       unset($_SESSION['user']);
    }

    function register($request){
        if($request['password'] == $request['password2']){
            
            $user = new User();
            $user->email($request['email']);
            $user->password(sha1($request['password']));
            $user->save();
        }
    }








?>