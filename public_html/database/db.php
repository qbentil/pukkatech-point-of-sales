<?php
class Database
{
   private $con;
   public function connect(){
       include_once "cons.php";
       $this->con = new Mysqli(HOST, USER, PASS, DB_NAME);
       if($this->con){
            // echo "CONNECTED";
            return $this->con;
       }else{
            return "DATABASE CONNECTION FAILED";
       }
   } 
}

// $db = new Database();
// $db->connect();
