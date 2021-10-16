<?php

/**
* 
*/
class DBOperation
{
	
	private $con;

	function __construct()
	{
		include_once("./public_html/database/db.php");
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
    private function addLog($msg)
    {
        $stmt = $this->con->prepare("INSERT INTO `logs`(`description`, `date`) VALUES ( ?,?)");
        $date =date("Y-m-d");
        $stmt->bind_param("ss",$msg, $date);
        $stmt->execute() or die($this->con->error);
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
    private function productExists($col, $val)
    {
        $stmt = $this->con->prepare("SELECT id FROM  products WHERE $col = ? LIMIT 1");
        $stmt->bind_param("s", $val);
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
               $this->addLog("New Subategory Added");
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
            $this->addLog("New Category Added");
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
            $pre_stmt = $this->con->prepare("INSERT INTO `users`(`first_name`, `last_name`, `email`,`phone`, `address`, `password`, `status`, `date_added`, `user_type`) VALUES (?,?,?,?,?,?,?,?,?)");
           $status = 1;
           $date = date("Y-m-d");
           $password = $this->generatePassword();
           $pre_stmt->bind_param("sssssssss",$first_name,$last_name,$email, $phone, $address, $password, $status, $date, $user);
           $result = $pre_stmt->execute() or die($this->con->error);
           if ($result) {
                $this->addLog("New User Added");
               return $password;
           }else{
               return "DB_ERROR";
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
            $this->addLog("New Brand Added");
               return 1;
           }else{
               return 0;
           }
        }
	}

	public function addProduct($bid, $cid, $name, $sprice, $cprice, $stock, $chasisNo, $partNo){
        if(isset($chasisNo) && !$this->productExists("chasis_number", $chasisNo))
        {
            
            $pre_stmt = $this->con->prepare("INSERT INTO `products`
            (`bid`,`cid`,`product_name`, `selling_price`,`cost_price`,
                `stock`, `date_added`, `chasis_number`)
                VALUES (?,?,?,?,?,?,?,?)");
            $status = 1;
            $date = date("Y-m-d");
            $pre_stmt->bind_param("iisddiss",$bid,$cid,$name,$sprice,$cprice, $stock,$date, $chasisNo);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                $this->addLog("New Product $name Added");
                return 1;
            }else{
                return 0;
            }
        } 
        if(isset($partNo) && !$this->productExists("part_number", $partNo))
        {
            $pre_stmt = $this->con->prepare("INSERT INTO `products`
            (`bid`,`cid`,`product_name`, `selling_price`,`cost_price`,
                `stock`, `date_added`, `part_number`)
                VALUES (?,?,?,?,?,?,?,?)");
            $status = 1;
            $date = date("Y-m-d");
            $pre_stmt->bind_param("iisddiss",$bid,$cid,$name,$sprice,$cprice, $stock,$date, $partNo);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                $this->addLog("New Product $name Added");
                return 1;
            }else{
                return 0;
            }
        } 

        if(!isset($partNo) || !isset($chasisNo))
        {
            $pre_stmt = $this->con->prepare("INSERT INTO `products`
            (`bid`,`cid`,`product_name`, `selling_price`,`cost_price`,
                `stock`, `date_added`,)
                VALUES (?,?,?,?,?,?,?)");
            $status = 1;
            $date = date("Y-m-d");
            $pre_stmt->bind_param("iisddis",$bid,$cid,$name,$sprice,$cprice, $stock,$date);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                $this->addLog("New Product $name Added");
                return 1;
            }else{
                return 0;
            }
        }
        return "PRODUCT_EXIST";

	}
    public function updateBrand($brand,$id){
        $pre_stmt = $this->con->prepare("UPDATE `brands` SET `brand_name`=? WHERE `brands`.`id` = ?");
        //    $pre_stmt->bind_param("ssssss",$first_name,$last_name,$email, $phone, $address, $user);
           $pre_stmt->bind_param("si",$brand,$id);
           $result = $pre_stmt->execute() or die($this->con->error);
           if ($result) {
            $this->addLog("Brand $brand Updated");
               return 1;
           }else{
               return 0;
           }
    }
    public function updateCategory($cat,$id){
        $pre_stmt = $this->con->prepare("UPDATE `categories` SET `category_name`=? WHERE `categories`.`id` = ?");
        //    $pre_stmt->bind_param("ssssss",$first_name,$last_name,$email, $phone, $address, $user);
           $pre_stmt->bind_param("si",$cat,$id);
           $result = $pre_stmt->execute() or die($this->con->error);
           if ($result) {
            $this->addLog("Category $cat Updated");
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
            $this->addLog("Product $name Updated");
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
            $this->addLog("User $id Updated");
            return 1;
        }else{
            return 0;
        }
    }
    public function changePassword($newPassword,$id){
        $pre_stmt = $this->con->prepare("UPDATE `users` SET `password`=? WHERE `users`.`id` = ?");
           $pre_stmt->bind_param("si",$newPassword,$id);
           $result = $pre_stmt->execute() or die($this->con->error);
           if ($result) {
            $this->addLog("User $id Changed Password");
               return 1;
           }else{
               return 0;
           }
    }
    public function deleteRecord($tb, $id){
        if($tb == "users"){
            $pre_stmt = $this->con->prepare("DELETE FROM $tb WHERE `id` = ?");
            $pre_stmt->bind_param("i",$id);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                $this->addLog("Record $id deleted from '$tb'");
                return 1;
            }else{
                return 0;
            }
        }else if($tb == "invoice"){
            $pre_stmt = $this->con->prepare("DELETE FROM $tb WHERE `id` = ?");
            $pre_stmt->bind_param("i",$id);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                $stmt = $this->con->prepare("DELETE FROM `orders` WHERE `iid` = ?");
                $stmt->bind_param("i",$id);
                $result = $stmt->execute() or die($this->con->error);
                $this->addLog("Record $id deleted from '$tb'");
                return 1;
            }else{
                return 0;
            }

        }else if( $tb == "products"){
            $stmt = $this->con->prepare("SELECT `pid` FROM `orders` WHERE  pid = ? LIMIT 1" );
            $stmt->bind_param("i",$id);
            $stmt->execute() or die($this->con->error);
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return "DEPENDENT_RECORD";
            }else{
                $pre_stmt = $this->con->prepare("DELETE FROM $tb WHERE `id` = ?");
                $pre_stmt->bind_param("i",$id);
                $result = $pre_stmt->execute() or die($this->con->error);
                if ($result) {
                    $this->addLog("Record $id deleted from '$tb'");
                    return 1;
                }else{
                    return 0;
                }
            }
        }else{
            $fk = '';
            if($tb == "brands"){
                $fk = "bid";
            }else{
                $fk = "cid";
            }
            $stmt = $this->con->prepare("SELECT `id` FROM `products` WHERE  $fk = ?");
            $stmt->bind_param("i",$id);
            $stmt->execute() or die($this->con->error);
            $result = $stmt->get_result();
            if($result->num_rows > 0){
                return "DEPENDENT_RECORD";
            }else{
                $pre_stmt = $this->con->prepare("DELETE FROM $tb WHERE `id` = ?");
                $pre_stmt->bind_param("i",$id);
                $result = $pre_stmt->execute() or die($this->con->error);
                if ($result) {
                    $this->addLog("Record $id deleted from $tb");
                    return 1;
                }else{
                    return 0;
                }
            }
            // return 1;
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
	public function getProducts($product){
        $pre_stmt = $this->con->prepare("SELECT * FROM products WHERE product_name = ?");
        $pre_stmt->bind_param("s",$product);
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
	public function getAllOrderRecord($table, $order){
		$pre_stmt = $this->con->prepare("SELECT * FROM $table ORDER BY $order DESC");
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
	public function getAllProducts(){
		$pre_stmt = $this->con->prepare("SELECT DISTINCT product_name as product, cid from products");
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
	public function filterAllProducts($cat){
        $pre_stmt = $this->con->prepare("SELECT DISTINCT product_name as product, cid from products where cid = ?");
        $pre_stmt->bind_param("i",$cat);
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
	public function filterProducts(){
        $pre_stmt = $this->con->prepare("SELECT DISTINCT product_name as product, cid from products");
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
    
	public function getSalesReport($month, $year){
        $pre_stmt = $this->con->prepare("SELECT  SUM(profit) as PROFIT, SUM(net_total) as SALES FROM invoice where MONTH(order_date) = ? and YEAR(order_date) = ?");
        $pre_stmt->bind_param("ii",$month, $year);
        $pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
        $value = $result->fetch_assoc();
        return $value;
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
    public function countProduct($product){
        $pre_stmt = $this->con->prepare("SELECT * FROM products WHERE product_name = ?");
        $pre_stmt->bind_param("s",$product);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        return $result->num_rows;
		// return $count;
    }
    public function getCategoryById($id){
        $stmt = $this->con->prepare("SELECT category_name FROM  categories WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value['category_name'];
    }
    
    public function getCategoryByName($name){
        $stmt = $this->con->prepare("SELECT * FROM  categories WHERE category_name = ? LIMIT 1");
        $stmt->bind_param("s", $name);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value;
    }
    public function getItemById($tb, $id){
        $stmt = $this->con->prepare("SELECT * FROM  $tb WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value;
    }
    public function getProductByName($product){
        $stmt = $this->con->prepare("SELECT * FROM  products WHERE product_name = ? LIMIT 1");
        $stmt->bind_param("s", $product);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value;
    }
    public function getProductByCategory($cid){
        $stmt = $this->con->prepare("SELECT * FROM  `products` WHERE cid = ? ");
        $stmt->bind_param("i", $cid);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
		$rows = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
		return "NO_DATA";
    }
    public function getUser($id){
        $stmt = $this->con->prepare("SELECT * FROM  users WHERE id = ? LIMIT 1");
        $stmt->bind_param("i", $id);
        $stmt->execute() or die($this->con->error);
        $result = $stmt->get_result();
        $value = $result->fetch_assoc();
        return $value;
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
            $_SESSION["username"] = $first_name." ".$last_name;
            // $_SESSION["last_login"] = $row["last_login"];
            // $_SESSION['user_type'] = $row["user_type"];
            $this->addLog("User $user updated profile");
               return 1;
           }else{
               return 0;
           }

    }
    public function getOOSP(){
        $pre_stmt = $this->con->prepare("SELECT * FROM `products` WHERE stock =0");
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

    public function getRecordCount($tb)
    {
        $pre_stmt = $this->con->prepare("SELECT * FROM $tb");
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        return $result->num_rows;
    }
    public function getProCount($cid)
    {
        $pre_stmt = $this->con->prepare("SELECT * FROM `products` WHERE `cid` = ?");
        $pre_stmt->bind_param("i", $cid);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        return $result->num_rows;
    }
    public function getStock($product)
    {
        $pre_stmt = $this->con->prepare("SELECT SUM(stock) as stock FROM `products` WHERE `product_name` = ?");
        $pre_stmt->bind_param("s", $product);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $value = $result->fetch_assoc();
        return $value['stock'];
    }
    public function getTOOSP(){
        $pre_stmt = $this->con->prepare("SELECT * FROM `products` WHERE stock =0");
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
        return $result->num_rows;
    }

        // Manage Orders
        public function addOrder(){
            $insertOrder = $this->con->prepare("INSERT INTO `orders`(`iid`, `pid`, `qty`) VALUES (?,?,?)");
            $insertOrder->bind_param("iii", $iid,$pid, $qty);
            $insertOrder->execute() or die($this->con->error);
            return 1;
        }
        public function addInvoice($vendor, $customer_name,$customer_phone, $sub_total,$discount,  $net_total, $payment_method, $orderDate, $ar_pid, $ar_qty, $ar_tqty){
            $stmt = $this->con->prepare("INSERT INTO `invoice`( `vendor`, `customer_name`, `customer_phone`, `subtotal`, `discount`, `net_total`, `payment_method`, `order_date`) VALUES (?,?,?,?,?,?,?,?)");
            $stmt->bind_param("issdddss", $vendor,$customer_name,$customer_phone, $sub_total, $discount, $net_total, $payment_method, $orderDate);
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
                // calc and update profit
                $this->calculateProfit($invoice_no);
                // create log
                $this->addLog("User $vendor made sales");
                // generate report
                // $this-> addSalesReport($invoice_no);

                return $invoice_no;
            }else{
                return "NO_INVOICE_ID";
            }
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
            $stmt->execute() or die($this->con->error);    
        }
        // private function addSalesReport($iid)
        // {
        //     $invoice = $this->getItemById("invoice", $iid);
        //     $stmt = $this->con->prepare("INSERT INTO `sales_report`(`date`, `sales`, `profit`) VALUES (?,?,?)");
        //     $stmt->bind_param("sdd",$invoice['order_date'], $invoice['net_total'], $invoice['profit']);
        //     $stmt->execute() or die($this->con->error);   
        // }
}

// ./public_html
// $opr = new DBOperation();
// echo $opr->getCategoryById(2);
// echo $opr->getTotal("subcategories");
// echo "<pre>";
// print_r($opr->getStatus("brands", "bid", 1));
// echo $opr->updateProfile("Admin", "Bentil", "admin@test.com", "0123456789", "Mayera- Pokuase", 2);
?>