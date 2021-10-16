<?php

/**
* 
*/
class DBOperation
{
	
	private $con;

	function __construct()
	{
		include_once("../database/db.php");
		$db = new Database();
		$this->con = $db->connect();
    }
    private function brandExists($br)
    {
        $stmt = $this->con->prepare("SELECT id FROM  brands WHERE brand_name = ? LIMIT 1");
        $stmt->bind_param("s", $br);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();;
        if($result->num_rows >0){
            return true;
        }else{
            return false;
        }
    }
    private function categoryExists($cat)
    {
        $stmt = $this->con->prepare("SELECT ID FROM  categories WHERE category_name = ? LIMIT 1");
        $stmt->bind_param("s", $cat);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();;
        if($result->num_rows >0){
            return true;
        }else{
            return false;
        }
    }
    private function EmployeeExists($phone)
    {
        $stmt = $this->con->prepare("SELECT ID FROM  users WHERE phone = ? LIMIT 1");
        $stmt->bind_param("s", $phone);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();;
        if($result->num_rows >0){
            return true;
        }else{
            return false;
        }
    }
    private function subcategoryExists($parent,$cat)
    {
        $stmt = $this->con->prepare("SELECT cid FROM  subcategories WHERE category_name = ? AND parent_cat = ?");
        $stmt->bind_param("si", $cat, $parent);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();;
        if($result->num_rows >0){
            return true;
        }else{
            return false;
        }
    }
    private function productExists($pro)
    {
        $stmt = $this->con->prepare("SELECT id FROM  products WHERE product_name = ?");
        $stmt->bind_param("s", $pro);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();;
        if($result->num_rows >0){
            return true;
        }else{
            return false;
        }
    }
    public function addSubCategory($parent,$cat)
    {
        if($this->subcategoryExists($parent, $cat))
        {
            return "SUB_CATEGORY_EXIST";
        }
        else{
            $pre_stmt = $this->con->prepare("INSERT INTO `subcategories`(`parent_cat`, `category_name`, `status`)
            VALUES (?,?,?)");
           $status = 1;
           $pre_stmt->bind_param("isi",$parent,$cat,$status);
           $result = $pre_stmt->execute() or die($this->con->error);
           if ($result) {
               return true;
           }else{
               return false;
           }
        }

    }
    public function addCategory($cat)
    {
        if($this->categoryExists($cat))
        {
            return "CATEGORY_EXIST";
        }else
        {
            $pre_stmt = $this->con->prepare("INSERT INTO `categories`(`category_name`, `status`)
            VALUES (?,?)");
           $status = 1;
           $pre_stmt->bind_param("ss",$cat,$status);
           $result = $pre_stmt->execute() or die($this->con->error);
           if ($result) {
               return 1;
           }else{
               return 0;
           }
        }

    }
    private function generatePassword($length = 10){
        $x = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
        return substr(str_shuffle(str_repeat($x, ceil($length/strlen($x)))), 1, $length);
    }
    public function addEmployee($first_name, $last_name, $email, $phone, $address, $user){
        if($this->EmployeeExists($phone))
        {
            return "EMPLOYEE_EXIST";
        }else
        {
            $pre_stmt = $this->con->prepare("INSERT INTO `users`(`first_name`, `last_name`, `email`,`phone`, `address`, `password`, `status`, `date_added`, `user_type`) VALUES (?,?,?,?,?,?,?,?)");
           $status = 1;
           $date = date("Y-m-d");
           $password = $this->generatePassword();
           $pre_stmt->bind_param("sssssssss",$first_name,$last_name,$email, $phone, $address, $password, $status, $date, $user);
           $result = $pre_stmt->execute() or die($this->con->error);
           if ($result) {
               
               return 1;
           }else{
               return 0;
           }
        }

	}
	public function addBrand($brand_name){
        if($this->brandExists($brand_name))
        {
            return "BRAND_EXIST";
        }
        else
        {
            $pre_stmt = $this->con->prepare("INSERT INTO `brands`(`brand_name`, `status`)
            VALUES (?,?)");
           $status = "1";
           $pre_stmt->bind_param("ss",$brand_name,$status);
           $result = $pre_stmt->execute() or die($this->con->error);
           if ($result) {
               return 1;
           }else{
               return 0;
           }
        }
	}

	public function addProduct($bid, $cid, $name, $sprice, $cprice, $stock){
        if($this->productExists($name))
        {
            return "PRODUCT_EXIST";
        } 
        else
        {
            $pre_stmt = $this->con->prepare("INSERT INTO `products`
			(`bid`,`cid`,`product_name`, `selling_price`,`cost_price`,
			 `stock`, `date_added`)
			 VALUES (?,?,?,?,?,?,?)");
            $status = 1;
            $date = date("Y-m-d");
            $pre_stmt->bind_param("iisddis",$bid,$cid,$name,$sprice,$cprice, $stock,$date);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                return 1;
            }else{
                return 0;
            }
        }
	}
    public function updateBrand($brand,$id){
        $pre_stmt = $this->con->prepare("UPDATE `brands` SET `brand_name`=? WHERE `brands`.`id` = ?");
        //    $pre_stmt->bind_param("ssssss",$first_name,$last_name,$email, $phone, $address, $user);
           $pre_stmt->bind_param("si",$brand,$id);
           $result = $pre_stmt->execute() or die($this->con->error);
           if ($result) {
               
               return 1;
           }else{
               return 0;
           }
    }
    public function updateProduct($cid,$bid, $name, $stock, $selling_price, $cost_price, $id){
        $pre_stmt = $this->con->prepare("UPDATE `products` SET `cid`=?,`bid`=?,`product_name`=?,`stock`=?,`selling_price`=?,`cost_price`=?, `date_added` = ? WHERE `id` =? ");
        $date = date("Y-m-d");
        $pre_stmt->bind_param("iisiddsi",$cid,$bid,$name,$stock,$selling_price,$cost_price,$date,$id);
        //    $pre_stmt->bind_param("si",$category,$id);
           $result = $pre_stmt->execute() or die($this->con->error);
           if ($result) {
               
               return 1;
           }else{
               return 0;
           }
    }
    public function updateEmpoyee($first_name, $last_name, $email, $phone, $address, $user, $id){
        $pre_stmt = $this->con->prepare("UPDATE `users` SET `first_name`=?,`last_name`=?,`email`=?,`phone`=?,`address`=?, `user_type`=? WHERE `id` = ?");
        $pre_stmt->bind_param("ssssssi",$first_name,$last_name,$email, $phone, $address, $user, $id);
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            
            return 1;
        }else{
            return 0;
        }
    }
    public function changePassword($newPassword,$id){
        $pre_stmt = $this->con->prepare("UPDATE `users` SET `password`=? WHERE `users`.`id` = ?");
        //    $pre_stmt->bind_param("ssssss",$first_name,$last_name,$email, $phone, $address, $user);
           $pre_stmt->bind_param("si",$newPassword,$user);
           $result = $pre_stmt->execute() or die($this->con->error);
           if ($result) {
               
               return 1;
           }else{
               return 0;
           }
    }
	public function getAllRecord($table){
		$pre_stmt = $this->con->prepare("SELECT * FROM $table");
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
    public function getUserData($table, $id){
		$pre_stmt = $this->con->prepare("SELECT * FROM $table where id = $id LIMIT 1");
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
    public function getShopData($id = 1){
		$pre_stmt = $this->con->prepare("SELECT * FROM shop where id = $id LIMIT 1");
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
    public function getSingleProduct($id){
		$pre_stmt = $this->con->prepare("SELECT * FROM `products` where id = $id LIMIT 1");
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
    public function getEmployees($user = "employee"){
        $pre_stmt = $this->con->prepare("SELECT * FROM `users` WHERE `user_type` = \"Employee\"");
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
    public function getTotal($table){
		$pre_stmt = $this->con->prepare("SELECT COUNT(*) FROM ".$table);
		// $pre_stmt->execute() or die($this->con->error);
        $count = $pre_stmt->fetchColumn();
		return $count;
    }
    public function getCategoryById($id){
        $stmt = $this->con->prepare("SELECT category_name FROM  categories WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value['category_name'];
    }
    public function getItemById($tb, $id){
        $stmt = $this->con->prepare("SELECT * FROM  $tb WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value;
    }
    public function getUserPassword($id){
        $stmt = $this->con->prepare("SELECT password FROM  users WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value['password'];
    }
    public function getBrandById($id){
        $stmt = $this->con->prepare("SELECT brand_name FROM  brands WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value['brand_name'];
    }
    public function getStatus($tb, $id){
        $stmt = $this->con->prepare("SELECT status FROM  $tb WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value["status"];
    }
    public function toggleStatus($tb, $id){
        $inStatus = $this->getStatus($tb, $id) == 0? 1:0;
        $stmt = $this->con->prepare("UPDATE $tb set status = ? where id = ?");
        $stmt->bind_param("si", $inStatus,$id);
        $stmt->execute() or die($this->con->error);
        return "STATUS_UPDATED";
    }
    public function updateProfile($first_name, $last_name, $email, $phone, $address, $user){
            $pre_stmt = $this->con->prepare("UPDATE `users` SET `first_name`= '$first_name',`last_name`= '$last_name', `email` = '$email', `phone` = '$phone', `address` = '$address' WHERE id = ?");
        //    $pre_stmt->bind_param("ssssss",$first_name,$last_name,$email, $phone, $address, $user);
           $pre_stmt->bind_param("i",$user);
           $result = $pre_stmt->execute() or die($this->con->error);
           if ($result) {
               
               return 1;
           }else{
               return 0;
           }

    }
    
    // Manage Orders
    public function addOrder(){
        $insertOrder = $this->con->prepare("INSERT INTO `orders`(`iid`, `pid`, `qty`) VALUES (?,?,?)");
        $insertOrder->bind_param("iii", $iid,$pid, $qty);
        $insertOrder->execute() or die($this->con->error);
        return 1;;
    }
    public function addInvoice($vendor, $customer_name,$customer_phone, $sub_total,$discount,  $net_total, $payment_method, $orderDate, $ar_pid, $ar_qty, $ar_tqty){
        $stmt = $this->con->prepare("INSERT INTO `invoice`( `vendor`, `customer_name`, `customer_phone`, `subtotal`, `discount`, `net_total`, `payment_method`, `order_date`) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("isdddss", $vendor,$customer_name,$customer_phone, $sub_total, $discount, $net_total, $payment_method, $orderDate);
        $stmt->execute() or die($this->con->error);
        $invoice_no = $stmt->insert_id;
        if($invoice_no != null){
            for ($i=0; $i <count($ar_pid) ; $i++) { 
                $rem_qty = $ar_tqty[$i] - $ar_qty[$i];
                if($rem_qty < 0){
                    return "ORDER_FAILED";
                }else{
                    $pre_stmt = $this->con->prepare("UPDATE `products` SET `stock`=? WHERE `id` =? ");
                    $pre_stmt->bind_param("si", $rem_qty, $ar_pid[$i]);
                    $pre_stmt->execute() or die($this->con->error);
                }
                $insertOrder = $this->con->prepare("INSERT INTO `orders`(`iid`, `pid`, `qty`) VALUES (?,?,?)");
                $insertOrder->bind_param("iii", $invoice_no,$ar_pid[$i], $ar_qty[$i]);
                $insertOrder->execute() or die($this->con->error);
            }
            return $this->calculateProfit($invoice_no);
            // return $invoice_no;
        }else{
            return "NO_INVOICE_ID";
        }
    }
	private function getOrderItems($invoiceId){
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
    private function getIProductById($id){
        $stmt = $this->con->prepare("SELECT * FROM  products WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value;
    }
    private function calculateProfit($iid)
    {
        $invoice = $this->getItemById("invoice", $iid);
        $orders = $this->getOrderItems($iid);
        $profit = 0;
        $cost_price = 0;
        foreach ($orders as $order) {
            $pid = $order['pid'];
            $qty = $order['qty'];
            $product = $this->getIProductById($pid);
            $total_cost = $product['cost_price'] * $qty;
            $cost_price += $total_cost;
        }
        $payedAmt = $invoice['net_total'];
        $profit = $payedAmt - $cost_price;
        // return $profit;
        $stmt = $this->con->prepare("UPDATE invoice SET profit = ? WHERE id = ?");
        $stmt->bind_param("di",$profit, $iid);
        $result = $stmt->execute() or die($this->con->error);
        if($result)
        {
            return $iid;
        }else{
            return "error";
        }

    }
    public function addSalesReport($iid)
    {
        $invoice = $this->getItemById("invoice", $iid);
        $stmt = $this->con->prepare("INSERT INTO `sales_report`(`date`, `sales`, `profit`) VALUES (?,?,?)");
        $stmt->bind_param("sdd",$invoice['order_date'], $invoice['net_total'], $invoice['profit']);
        $stmt->execute() or die($this->con->error);   
    }
    public function getSalesReport($month, $year){
		$pre_stmt = $this->con->prepare("SELECT  SUM(profit) as PROFIT, SUM(net_total) as SALES FROM invoice where MONTH(order_date) = ? and YEAR(order_date) = ?");
        $pre_stmt->bind_param("ii",$month, $year);
        $pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
        $value = $result->fetch_assoc();
        return $value;
    }
}


// ./public_html
// $opr = new DBOperation();

// echo ;
// echo $opr->addSalesReport(18);
// echo $opr->addSalesReport(20);
// echo $opr->addSalesReport(22);
// echo $opr->addSalesReport(23);
// echo $opr->addSalesReport(30);
// echo $opr->addSalesReport(31);
// echo $opr->addSalesReport(32);
// echo $opr->addSalesReport(33);

// echo "<pre>";
// print_r($opr->getSalesReport(11, 2020));
// echo $opr->updateProfile("Admin", "Bentil", "admin@test.com", "0123456789", "Mayera- Pokuase", 2);
?>