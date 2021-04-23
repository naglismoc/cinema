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
    $_SESSION['logged'] = 0;
    $email = $_POST['email'];
    if($user->password == sha1($request['password'])){
        // echo "prisijungiau";die;
       // $_SESSION['user'] = 1;
        $_SESSION['logged'] = 1;
        $_SESSION['user'] = [];
        $_SESSION['user']["id"] = $user->id;
        $_SESSION['user']["email"] = $user->email;
        $_SESSION['user']["permission_lvl"] = $user->permission_lvl;
        // print_r( $_SESSION['user']);die;
    }
}

    function logout(){
        $_SESSION['user'] =0;
    }

    function register($request){
        if($request['password'] == $request['password2']){
            
            $user = new User();
            $user->email($request['email']);
            $user->password(sha1($request['password']));
            $user->save();
            $_SESSION['user'] = 1;
        }
    }








?>