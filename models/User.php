<?php
include_once("Dbh.php");

class User {

    public $id;
    public $email;
    public $password;
    public $permission_lvl;

    // function __construct(){
    // }

    public function save(){
        $Dbh = new Dbh();
        $sql = "INSERT 
        INTO `users` (`id`, `email`, `password`,`permission_lvl`) 
        VALUES (NULL, '".$this->email."', '".$this->password."','1000');";


        $Dbh->connect()->query($sql);
 
}
public function isAdmin()
{
	return $this->permission_lvl > 100 ;
	
}

	


}



?>