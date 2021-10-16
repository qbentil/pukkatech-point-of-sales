<?php

/**
* 
*/
class DBOperation
{
	
	private $con;

	function __construct()
	{
		include_once("./database/db.php");
		$db = new Database();
		$this->con = $db->connect();
    }
	public function getOrderItems($invoiceId){
        $pre_stmt = $this->con->prepare("SELECT * FROM `orders` WHERE `iid` = ?");
        $pre_stmt->bind_param("i",$invoiceId);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		$rows = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
		return "NO_DATA";
    }
    public function getItemById($tb, $id){
        $stmt = $this->con->prepare("SELECT * FROM  $tb WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value;
    }
    public function getShop($id){
        $stmt = $this->con->prepare("SELECT * FROM  shop WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value;
    }
}

// ./public_html
// $opr = new DBOperation();
// echo $opr->getCategoryById(2);
// echo $opr->getTotal("subcategories");
// echo "<pre>";
// print_r($opr->getStatus("brands", "bid", 1));
// echo $opr->updateProfile("Admin", "Bentil", "admin@test.com", "0123456789", "Mayera- Pokuase", 2);
?>