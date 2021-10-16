<?php
class User
{
    private $con;
    function __construct()
    {
        include_once "./public_html/database/db.php";
        $db = new Database();
        $this->con = $db->connect();
        if($this->con){
           // echo "Connected";
        }
    }
    private function userExists($email)
    {
        
        $stmt = $this->con->prepare("SELECT id FROM  user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();;
        if($result->num_rows >0){
            return true;
        }else{
            return false;
        }
    }
    private function addLog($msg)
    {
        $stmt = $this->con->prepare("INSERT INTO `logs`(`description`, `date`) VALUES ( ?,?)");
        $date =date("Y-m-d");
        $stmt->bind_param("ss",$msg, $date);
        $stmt->execute() or die($this->con->error);
    }
    public function createUserAccount($username, $email, $password, $userType)
    {
        // check if user exist
        if($this->userExists($email))
        {
            return "EMAIL_ALREADY_EXISTS";
        }else
        {
            $password_hash = password_hash($password, PASSWORD_BCRYPT, ["cost"=>8]);
            $date = date("Y-m-d");
            $notes = "";
            // protect app from sql injection
            $stmt = $this->con->prepare("INSERT INTO `user`(`username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES (?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssss", $username, $email, $password_hash, $userType, $date, $date, $note);
            $result = $stmt->execute() or die($this->con->error);
            if($result)
            {
                $this->addLog("New user account created");
                return $this->con->insert_id;
            }
            else
            {
                return "SOMETHING_WENT_WRONG";
            }
        }
    }
    public function userLogin($email,$password)
    {
        $pre_stmt = $this->con->prepare("SELECT * FROM users WHERE email = '$email' LIMIT 1");
        // $pre_stmt->bind_param("s",$email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();

        if ($result->num_rows == 0) 
        {
            return "ACCOUNT_NOT_REGISTERD";
            // return false;
        }
        else
        {
            $row = $result->fetch_assoc();
            // password_verify($password,$row["password"])
            if ($row["password"] == $password) 
            {
                if($row['status'] == 1){
                    // session_start();
                    $_SESSION['logedIn'] = session_id();
                    $_SESSION["userid"] = $row["id"];
                    $_SESSION["username"] = $row["first_name"]." ".$row["last_name"];
                    // $_SESSION["last_login"] = $row["last_login"];
                    $_SESSION['user_type'] = $row["user_type"];
                    $this->addLog("User Login");
                    return true;
                }else{
                    return "INVALID_USER";
                }

            }
            else
            {
                return "INVALID_USER_PASSWORD";
                // return false;
            }
        }
    }
}

// $user = new User();
// echo $user->createUserAccount("Test", "test@gmail.com", "12345678", "other");
// echo $user->userLogin("test@gmail.com","12345678");

// if(isset($_SESSION["username"])){
//     echo $_SESSION["username"];
// }

