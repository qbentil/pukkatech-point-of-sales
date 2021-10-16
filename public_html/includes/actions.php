<?php
include_once "./public_html/includes/user.php";
include_once "./public_html/includes/backup.php";
include_once "./public_html/includes/DBoperations.php";

function userSignup()
{
    if(isset($_POST["sign_up"])){
        $user = new User();
        $result = $user->createUserAccount($_POST["fName"],$_POST["email"],$_POST["password"],$_POST["accountType"]);
        if($result != "EMAIL_ALREADY_EXISTS" && $result != "SOMETHING_WENT_WRONG" ){
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Account Registered Successfully. you can login</strong>
            </div>
            ";
        }
        if($result == "EMAIL_ALREADY_EXISTS"){
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>Email already in use.</strong>
            </div>
            ";  
        }
        // exit();
    }
}
function login()
{
    session_start();
    if (isset($_POST["btn_login"])) {
        $user = new User();
        $result = $user->userLogin($_POST["email"],$_POST["password"]);
        // echo $result;
        if($result && isset($_SESSION['user_type'])){
            $_SESSION['user_type'] == "Admin"? header("location: ./dashboard.php"):header("location: e_dashboard.php");
        }
        // {
        //     echo "
        //     <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
        //     <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
        //     <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>Invalid user email or password</strong>
        //     </div>
        //     ";  
        // }
        if($result == "ACCOUNT_NOT_REGISTERD"){
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>Account not Registered</strong>
            </div>
            ";  
        }else if($result == "INVALID_USER_PASSWORD"){
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>Invalid email or password</strong>
            </div>
            ";  
        }
        else if($result == "INVALID_USER"){
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>Your Accound has been disabled. Contact Admin</strong>
            </div>
            ";  
        }
        // exit();
    }
}
function logout()
{
    if(isset($_GET['logout']) && $_GET['logout'] == true){
        session_start();
        ob_start();
        session_unset();
        session_destroy();
        header('location: index.php');
    }
}
// getters
function getPCategories($tb)
{
    $obj = new DBoperation();
    $rows = $obj->getAllRecord($tb);
    foreach ($rows as $row) {
        $id = $row['id'];
        $name = $row['category_name'];
        echo "<option value = '".$row["id"]."' class = 'py-2'>".$row["category_name"]."</option>";
        // echo "<option value = \"$id\">$name</option>";
    }
}
function getBrands()
{
    $obj = new DBoperation();
    $rows = $obj->getAllRecord("brands");
    foreach ($rows as $row) {
        if($row['status'] == 1){
            echo "<option value = '".$row["id"]."' class = 'py-2'>".$row["brand_name"]."</option>";
        }
    }
}
// adding category
function addCategory()
{
    if(isset($_POST['btn_addCategory'])){
        $obj = new DBoperation();
        $result = $obj->addCategory($_POST["cName"]);
        if($result == 1){
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Category Added successfully</strong>
            </div>
            ";
        }
        if($result == "CATEGORY_EXIST"){
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>Category already exists</strong>
            </div>
            ";  
        }

    }
}
function addEmployee()
{
    if(isset($_POST['btn_addEmployee'])){
        $obj = new DBoperation();
        $fName = htmlspecialchars(strip_tags($_POST["fName"]));
        $lName = htmlspecialchars(strip_tags($_POST["lName"]));
        $email = htmlspecialchars(strip_tags($_POST["email"]));
        $phone = htmlspecialchars(strip_tags($_POST["phone"]));
        $address = htmlspecialchars(strip_tags($_POST["address"]));
        $user = htmlspecialchars(strip_tags($_POST["user"]));
        $result = $obj->addEmployee($fName, $lName,$email, $phone, $address,$user);
        // if($result == 1){
        //     echo "
        //     <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
        //     <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
        //     <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Employee Added successfully</strong>
        //     </div>
        //     ";
        // }
        if($result == "EMPLOYEE_EXIST" || $result == "DB_ERROR"){
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>Employee already exists</strong>
            </div>
            ";  
        }else{
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Employee Added successfully. Employee Password is <i>'$result'</i></strong>
            </div>
            ";
        }

    }
}
function displayCategories()
{
    $obj = new DBoperation();
    $rows = $obj->getAllRecord("categories");
    if($rows != "NO_DATA"){
    $enum = 00;
    foreach ($rows as $row) {
        echo "
        <tr>  
            <td class = \"text-center\">".++$enum."</td>  
            <td >".$row['category_name']."</td>
            <form method = \"POST\">
            <input type = \"hidden\" name = 'id' value = '".$row["id"]."'>";
            echo $row['status'] == 1? "<td class = \"text-center\"><button name = 'toggleStatus' class=\"btn btn-success\" >Active</button></td>": "<td class = \"text-center\"><button name = 'toggleStatus' class=\"btn btn-secondary\" >Disabled</button></td>";
            echo "</form>
            <td class = \"text-center\">
            <button id = 'edit_category' data-e = 'Category' data-cat ='".$row['category_name']."' data-id ='".$row['id']."' class=\"btn btn-primary\" name = 'btn_editCategory' onclick = 'showeCatModal(this)'><i class=\"fa fa-edit\"></i></button>
            <button   onclick = 'delCatModal(this)'  data-tb ='Categories' data-id ='".$row['id']."'  class=\"btn btn-danger\"> <i class=\"fa fa-trash\"></i> </button>               
            </td>  
       </tr>  
        ";
    }
}
// function displayCategories()
// {
//     $obj = new DBoperation();
//     $rows = $obj->getAllRecord("categories");
//     if($rows != "NO_DATA"){
//     $enum = 00;
//     foreach ($rows as $row) {
//         echo "
//         <tr>  
//             <td class = \"text-center\">".++$enum."</td>  
//             <td >".$row['category_name']."</td>
//             <form method = \"POST\">
//             <input type = \"hidden\" name = 'id' value = '".$row["id"]."'>";
//             echo $row['status'] == 1? "<td class = \"text-center\"><button name = 'toggleStatus' class=\"btn btn-success\" >Active</button></td>": "<td class = \"text-center\"><button name = 'toggleStatus' class=\"btn btn-secondary\" >Disabled</button></td>";
//             echo "</form>
//             <td class = \"text-center\">
//             <a href = '?edit_category&id=".base64_encode($row["id"])."' class=\"btn btn-primary\" name = 'btn_editCategory'><i class=\"fa fa-edit\"></i></a>
//             <a href = '?delete_item&tb=categories&name=".$row['category_name']."&id=".base64_encode($row["id"])."' class=\"btn btn-danger\"><i class=\"fa fa-trash\"></i></a>               
//             </td>  
//        </tr>  
//         ";
//     }
// }
}
function e_displayCategories()
{
    $obj = new DBoperation();
    $rows = $obj->getAllRecord("categories");
    if($rows != "NO_DATA"){
    $enum = 001;
    foreach ($rows as $row) {
        echo "
        <tr>  
            <td class = \"text-center\">".$enum++."</td>  
            <td class = \"text-center\">".$row['category_name']."</td>";
            echo $row['status'] == 1? "<td class = \"text-center\"><button class=\"btn btn-success\" >Active</button></td>": "<td class = \"text-center\"><button class=\"btn btn-secondary\" disabled>Disabled</button></td> 
       </tr>  
        ";
    }
}
}
function displayEmployees()
{
    $obj = new DBoperation();
    $rows = $obj->getAllRecord("users");
    // $rows = $obj->getEmployees("employee");
    if($rows != "NO_DATA"){
    $enum = 001;
    foreach ($rows as $row) {
        if($row['id'] != $_SESSION['userid']){
            $name = $row['first_name']." ".$row['last_name'];
            echo "
            <tr>  
                <td class = \"text-center\">".$enum++."</td>  
                <td class = \"text-center\">".$row['first_name']."</td>
                <td class = \"text-center\">".$row['last_name']."</td>
                <td class = \"text-center\">".$row['phone']."</td>
                <form method = 'post'>            
                <input type = \"hidden\" name = 'id' value = '".$row["id"]."'>";
                echo $row['status'] == 1? "<td class = \"text-center\"><button name = 'toggleStatus' class=\"btn btn-success\" >Active</button></td>": "<td class = \"text-center\"><button name = 'toggleStatus' class=\"btn btn-secondary\" >Disabled</button></td>";
                echo "</form>
                <td class = \"text-center\">".$row['user_type']."</td>
                <td class = \"text-center\">
                <button  title = 'view' onclick = ' viewEmployee(this)' 
                data-fname ='".$row['first_name']."' 
                data-lname ='".$row['last_name']."' 
                data-phone ='".$row['phone']."' 
                data-email ='".$row['email']."'  
                data-address ='".$row['address']."'  
                data-user ='".$row['user_type']."'  
                data-date ='".$row['date_added']."'
                class=\"btn btn-dark\"> <i class=\"fa fa-eye\"></i> </button>  

                <button   onclick = ' editEmployee(this)' 
                data-id ='".$row['id']."' 
                data-fname ='".$row['first_name']."' 
                data-lname ='".$row['last_name']."' 
                data-phone ='".$row['phone']."' 
                data-email ='".$row['email']."'  
                data-address ='".$row['address']."'  
                data-user ='".$row['user_type']."'  
                class=\"btn btn-primary\"> <i class=\"fa fa-edit\"></i> </button> 


                <button   onclick = 'delCatModal(this)' data-id ='".$row['id']."' data-tb ='users'  class=\"btn btn-danger\"> <i class=\"fa fa-trash\"></i> </button>        
                </td>  
           </tr>  
            "; 
        }
    }
}
}
function getCategoryById()
{
    if(isset($_GET['update_category'])){
        $id = base64_decode($_GET['id']);
        $obj = new DBoperation();
        return $obj->getCategoryById($id);
    }
}
function getCategories()
{
    $obj = new DBoperation();
    $rows =  $obj->getAllRecord("categories");
    foreach($rows as $row){
        if($row['status'] == 1){
            echo "
            <option value='".$row['id']."'>".$row['category_name']."</option>
            ";
        }
    }
}
// adding sub-cat
function addSubCategory()
{
    if(isset($_POST['btn_addSubcategory'])){
        $obj = new DBoperation();
        $result = $obj->addSubCategory($_POST["pCategory"], $_POST['cName']);
        if($result == 1){
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Sub Category Added successfully</strong>
            </div>
            ";
        }
        elseif($result == "SUB_CATEGORY_EXIST"){
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>Sub Category already exists</strong>
            </div>
            ";  
        }

    }
}
function displaySubcategories()
{
    $obj = new DBoperation();
    $rows = $obj->getAllRecord("subcategories");
    if($rows != "NO_DATA"){
    $enum = 001;
    foreach ($rows as $row) {
        echo "
        <tr>  
            <td class = \"text-center\">".$enum++."</td>  
            <td>".$obj->getCategoryById("categories",$row['parent_cat'])."</td>  
            <td>".$row['category_name']."</td>";
            echo $row['status'] == 1? "<td class = \"text-center\"><button class=\"btn btn-success\" >Active</button></td>": "<td class = \"text-center\"><button class=\"btn btn-secondary\" disabled>Disabled</button></td>";
            echo "
            <td class = \"text-center\">
            <button class=\"btn btn-primary\"><i class=\"fa fa-edit\"></i></button>
            <button class=\"btn btn-danger\"><i class=\"fa fa-trash\"></i></button>            
            </td>  
       </tr>  
        ";
    }
}
}
function changePassword()
{
    if(isset($_POST['change_password'])){
        $obj = new DBoperation();
        $user = $_SESSION['userid'];
        $new_password = htmlspecialchars(strip_tags($_POST["new_password"]));
        $result = $obj->changePassword($new_password, $user);
        if($result == 1){
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Password Updated successfully</strong>
            </div>
            ";
        }else{
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>>Password Update failed</strong>
            </div>
            ";  
        }
    }
}
function updateBrand()
{
    if(isset($_POST['btn_editBrand'])){
        $obj = new DBoperation();
        $id = htmlspecialchars(strip_tags($_POST["cid"]));
        $category = htmlspecialchars(strip_tags($_POST["bName"]));
        $result = $obj->updateBrand($category, $id);
        if($result == 1){
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Brand Updated successfully</strong>
            </div>
            ";
        }else{
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>>Password Update failed</strong>
            </div>
            ";  
        }
    }
}
function updateCategory()
{
    if(isset($_POST['btn_editCategory'])){
        $obj = new DBoperation();
        // $id = base64_decode($_GET['id']);
        $id= htmlspecialchars(strip_tags($_POST["cid"]));
        $category = htmlspecialchars(strip_tags($_POST["cName"]));
        $result = $obj->updateCategory($category, $id);
        if($result == 1){
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Category Updated successfully </strong> 
            </div>
            ";
        }else{
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>>Category Update failed</strong>
            </div>
            ";  
        }
    }
}
function updateProduct()
{
    if(isset($_POST['btn_editProduct'])){
        $obj = new DBoperation();
        $id = $_POST['id'];
        // echo $_POST["brand"];
        // echo $_POST["category"];
        $result = $obj->updateProduct($_POST["category"],$_POST["brand"],$_POST["pName"],$_POST["stock"],$_POST["sPrice"], $_POST["cPrice"],$id);
        if($result == 1){
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Product Updated successfully  </strong></a>
            </div>
            ";
        }else{
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>>Product Update failed</strong>
            </div>
            ";  
        }
    }
}
function updateEmployee(){
    if(isset($_POST['updateEmployee'])){
        $obj = new DBoperation();
        $id = htmlspecialchars(strip_tags($_POST["id"]));
        $fName = htmlspecialchars(strip_tags($_POST["fName"]));
        $lName = htmlspecialchars(strip_tags($_POST["lName"]));
        $email = htmlspecialchars(strip_tags($_POST["email"]));
        $phone = htmlspecialchars(strip_tags($_POST["phone"]));
        $address = htmlspecialchars(strip_tags($_POST["address"]));
        $user = htmlspecialchars(strip_tags($_POST["user_type"]));
        $result = $obj->updateEmpoyee($fName, $lName, $email, $phone, $address, $user, $id);
        if($result == 1){
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Employee record Updated successfully  </strong> </a>
            </div>
            ";
        }else{
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>>Employee record Update failed</strong>
            </div>
            ";  
        }
    }
}
// adding product
function addProduct()
{

    if(isset($_POST['btn_addProduct'])){
        $obj = new DBoperation();
        $chasisNo = isset($_POST['chasisNumber'])? $_POST['chasisNumber']: NULL;
        $partNo = isset($_POST['partNumber'])? $_POST['partNumber']: NULL;
        $result = $obj->addProduct($_POST["brand"], $_POST["category"],$_POST["pName"],$_POST["sPrice"], $_POST["cPrice"],$_POST["stock"], $chasisNo, $partNo);
        if($result == 1){
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Product Added successfully</strong>
            </div>
            ";
        }
        if($result == "PRODUCT_EXIST"){
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>Product already exists</strong>
            </div>
            ";  
        }

    }
}
function displayProducts($product,$cat)
{
    $odd = "";
    if($cat == 2 || $cat ==3)
    {
        $odd = "chasis_number";
    }
    elseif($cat == 4 )
    {
        $odd = "part_number";
    }
    else{
        $odd = "product_name";
    }
    $obj = new DBoperation();
    $rows = $obj->getProducts($product);
        if($rows != "NO_DATA"){
        $enum = 0;
        foreach ($rows as $row) {
            
            echo "
            <tr>  
                <td class = \"text-center\">".++$enum."</td>  
                <td class = \"\">".$row[$odd]."</td>
                <td class = \"text-center\">".$row['selling_price']."</td>
                <td class = \"text-center\">".$row['cost_price']."</td>
                <td class = \"text-center\">".$row['stock']."</td>
                <td class = \"text-center\">
                    <button  title = 'view' onclick = ' viewProduct(this)' 
                    data-name ='".$row['product_name']."' 
                    data-sp ='".$row['selling_price']."' 
                    data-cp ='".$row['cost_price']."' 
                    data-qty ='".$row['stock']."'  
                    data-chasis ='".$row['chasis_number']."' 
                    data-part ='".$row['part_number']."' 
                    data-brand ='".$obj->getBrandById($row['bid'])."' 
                    data-date ='".$row['date_added']."' 
                    data-cat ='".$obj->getCategoryById($row['cid'])."' 
                    class=\"btn btn-dark\"> <i class=\"fa fa-eye\"></i> </button> 

                    <button   onclick = ' editProduct(this)' 
                    data-id ='".$row['id']."' 
                    data-chasis ='".$row['chasis_number']."' 
                    data-part ='".$row['part_number']."' 
                    data-name ='".$row['product_name']."' 
                    data-sp ='".$row['selling_price']."' 
                    data-cp ='".$row['cost_price']."' 
                    data-qty ='".$row['stock']."' 
                    data-bid ='".$row['bid']."' 
                    data-brand ='".$obj->getBrandById($row['bid'])."' 
                    data-cid ='".$row['cid']."' 
                    data-cat ='".$obj->getCategoryById($row['cid'])."' 
                    class=\"btn btn-primary\"> <i class=\"fa fa-edit\"></i> </button>               
                    <button   onclick = ' delCatModal(this)' data-id ='".$row['id']."' data-tb ='Products'  class=\"btn btn-danger\"> <i class=\"fa fa-trash\"></i> </button>               
                </td>  
        </tr>  
            ";

            // <td class = \"text-center\">".$obj->getBrandById($row['bid'])."</td>  
            // <td class = \"text-center\">".$obj->getCategoryById($row['cid'])."</td>  
            // <td>".$obj->getCategoryById("categories",$row['cid'])."</td>  
            // <td>".$obj->getCategoryById("subcategories",$row['sid'])."</td>  
            // <td>".$obj->getBrandById($row['bid'])."</td>  
        }
    }
}

function displayAllProducts()
{
    $obj = new DBoperation();
    $rows = $obj->getAllProducts();
        if($rows != "NO_DATA"){
        $enum = 0;
        foreach ($rows as $row) {
            echo "
            <tr>  
                <td class = \"text-center\">".++$enum."</td>  
                <td class = \"\">".$row['product']."</td>
                <td class = \"text-center\">".$obj->getCategoryById($row['cid'])."</td>
                <td class = \"text-center\">".$obj->getStock($row['product'])."</td>
                <td class = \"text-center\">
                <a href = \"?view-products&product=".$row['product']."&cat=".$row['cid']."\"  class=\"btn btn-dark\"> <i class=\"fa fa-eye\"></i> </a>  
                </td>  
        </tr>  
            ";

        }
    }
}
function AllProducts()
{
    $obj = new DBoperation();
    $rows = $obj->filterProducts();
        if($rows != "NO_DATA"){
        $enum = 0;
        foreach ($rows as $row) {
            echo "
            <tr>  
                <td class = \"text-center\">".++$enum."</td>  
                <td class = \"\">".$row['product']."</td>
                <td class = \"\">".$obj->getCategoryById($row['cid'])."</td>
                <td class = \"text-center\">".$obj->getStock($row['product'])."</td>
                ";
                if($obj->countProduct($row['product']) > 1)
                {
                    echo "
                <td class = \"text-center\">
                    <a href = \"?view-products&product=".$row['product']."&cat=".$row['cid']."\"  class=\"btn btn-dark\"> <i class=\"fa fa-eye\"></i> </a>            
                </td> </tr>";
                }else
                {
                    $pro = $obj->getProductByName($row['product']);
                    echo "
                    <td class = \"text-center\">
                    <button  title = 'view' onclick = ' viewProduct(this)' 
                    data-name ='".$pro['product_name']."' 
                    data-sp ='".$pro['selling_price']."' 
                    data-cp ='".$pro['cost_price']."' 
                    data-qty ='".$pro['stock']."'  
                    data-chasis ='".$pro['chasis_number']."' 
                    data-part ='".$pro['part_number']."' 
                    data-brand ='".$obj->getBrandById($pro['bid'])."' 
                    data-date ='".$pro['date_added']."' 
                    data-cat ='".$obj->getCategoryById($pro['cid'])."' 
                    class=\"btn btn-dark\"> <i class=\"fa fa-eye\"></i> </button> 

                    <button   onclick = ' editProduct(this)' 
                    data-id ='".$pro['id']."' 
                    data-chasis ='".$pro['chasis_number']."' 
                    data-part ='".$pro['part_number']."' 
                    data-name ='".$pro['product_name']."' 
                    data-sp ='".$pro['selling_price']."' 
                    data-cp ='".$pro['cost_price']."' 
                    data-qty ='".$pro['stock']."' 
                    data-bid ='".$pro['bid']."' 
                    data-brand ='".$obj->getBrandById($pro['bid'])."' 
                    data-cid ='".$pro['cid']."' 
                    data-cat ='".$obj->getCategoryById($pro['cid'])."' 
                    class=\"btn btn-primary\"> <i class=\"fa fa-edit\"></i> </button>               
                    <button   onclick = ' delCatModal(this)' data-id ='".$pro['id']."' data-tb ='Products'  class=\"btn btn-danger\"> <i class=\"fa fa-trash\"></i> </button> 
                    </td> </tr>";
                }



        }
    }
}
function filterAllProducts($cat)
{
    $obj = new DBoperation();
    $rows = $obj->filterAllProducts($cat);
        if($rows != "NO_DATA"){
        $enum = 0;
        foreach ($rows as $row) {
            echo "
            <tr>  
                <td class = \"text-center\">".++$enum."</td>  
                <td class = \"\">".$row['product']."</td>
                <td class = \"text-center\">".$obj->getStock($row['product'])."</td>
                ";
                if($obj->countProduct($row['product']) > 1)
                {
                    echo "
                <td class = \"text-center\">
                    <a href = \"?view-products&product=".$row['product']."&cat=".$row['cid']."\"  class=\"btn btn-dark\"> <i class=\"fa fa-eye\"></i> </a>            
                </td> </tr>";
                }else
                {
                    $pro = $obj->getProductByName($row['product']);
                    echo "
                    <td class = \"text-center\">
                    <button  title = 'view' onclick = ' viewProduct(this)' 
                    data-name ='".$pro['product_name']."' 
                    data-sp ='".$pro['selling_price']."' 
                    data-cp ='".$pro['cost_price']."' 
                    data-qty ='".$pro['stock']."'  
                    data-chasis ='".$pro['chasis_number']."' 
                    data-part ='".$pro['part_number']."' 
                    data-brand ='".$obj->getBrandById($pro['bid'])."' 
                    data-date ='".$pro['date_added']."' 
                    data-cat ='".$obj->getCategoryById($pro['cid'])."' 
                    class=\"btn btn-dark\"> <i class=\"fa fa-eye\"></i> </button> 

                    <button   onclick = ' editProduct(this)' 
                    data-id ='".$pro['id']."' 
                    data-chasis ='".$pro['chasis_number']."' 
                    data-part ='".$pro['part_number']."' 
                    data-name ='".$pro['product_name']."' 
                    data-sp ='".$pro['selling_price']."' 
                    data-cp ='".$pro['cost_price']."' 
                    data-qty ='".$pro['stock']."' 
                    data-bid ='".$pro['bid']."' 
                    data-brand ='".$obj->getBrandById($pro['bid'])."' 
                    data-cid ='".$pro['cid']."' 
                    data-cat ='".$obj->getCategoryById($pro['cid'])."' 
                    class=\"btn btn-primary\"> <i class=\"fa fa-edit\"></i> </button>               
                    <button   onclick = ' delCatModal(this)' data-id ='".$pro['id']."' data-tb ='Products'  class=\"btn btn-danger\"> <i class=\"fa fa-trash\"></i> </button> 
                    </td> </tr>";
                }



        }
    }
}
function displayProducts_o()
{
    $obj = new DBoperation();
    $rows = $obj->getOOSP();
    if($rows != "NO_DATA"){
        $enum = 0;
        foreach ($rows as $row) {
            echo "
            <tr>  
                <td class = \"text-center\">".++$enum."</td>  
                <td class = \"\">".$obj->getCategoryById($row['cid'])."</td>
                <td class = \"\">".$row['product_name']."</td>
                <td class = \"text-center\">".$row['selling_price']."</td>
                <td class = \"text-center\">".$row['cost_price']."</td>
                <td class = \"text-center\">
                <button  title = 'view' onclick = ' viewProduct(this)' 
                data-name ='".$row['product_name']."' 
                data-sp ='".$row['selling_price']."' 
                data-cp ='".$row['cost_price']."' 
                data-qty ='".$row['stock']."'  
                data-brand ='".$obj->getBrandById($row['bid'])."' 
                data-date ='".$row['date_added']."' 
                data-cat ='".$obj->getCategoryById($row['cid'])."' 
                class=\"btn btn-dark\"> <i class=\"fa fa-eye\"></i> </button> 

                <button   onclick = ' editProduct(this)' 
                data-id ='".$row['id']."' 
                data-name ='".$row['product_name']."' 
                data-sp ='".$row['selling_price']."' 
                data-cp ='".$row['cost_price']."' 
                data-qty ='".$row['stock']."' 
                data-bid ='".$row['bid']."' 
                data-brand ='".$obj->getBrandById($row['bid'])."' 
                data-cid ='".$row['cid']."' 
                data-cat ='".$obj->getCategoryById($row['cid'])."' 
                class=\"btn btn-primary\"> <i class=\"fa fa-edit\"></i> </button>               
                <button   onclick = ' delCatModal(this)' data-id ='".$row['id']."' data-tb ='Products'  class=\"btn btn-danger\"> <i class=\"fa fa-trash\"></i> </button>        
                </td>  
           </tr>  
            ";
            // <td class = \"text-center\">".$obj->getBrandById($row['bid'])."</td>  
            // <td class = \"text-center\">".$obj->getCategoryById($row['cid'])."</td>  
            // <td>".$obj->getCategoryById("categories",$row['cid'])."</td>  
            // <td>".$obj->getCategoryById("subcategories",$row['sid'])."</td>  
            // <td>".$obj->getBrandById($row['bid'])."</td>  
        }
    }
}
function getProCount($cat){
    $obj = new DBoperation();
    $category = $obj->getCategoryByName($cat);
    $cid  = $category['id'];
    return $obj->getProCount($cid);
}
function filterProducts($sort)
{
    $obj = new DBoperation();
    $cat = $obj->getCategoryByName($sort);
    $cid  = $cat['id'];
    $rows = $obj->getProductByCategory($cid);
    if($rows != "NO_DATA"){
        $enum = 0;
        foreach ($rows as $row) {
            echo "
            <tr>  
                <td class = \"text-center\">".++$enum."</td>  
                <td class = \"\">".$row['product_name']."</td>
                <td class = \"text-center\">GH¢".$row['selling_price']."</td>
                <td class = \"text-center\">GH¢".$row['cost_price']."</td>
                <td class = \"text-center\">".$row['stock']."</td>
                <td class = \"text-center\">
                <button  title = 'view' onclick = ' viewProduct(this)' 
                data-name ='".$row['product_name']."' 
                data-sp ='".$row['selling_price']."' 
                data-cp ='".$row['cost_price']."' 
                data-qty ='".$row['stock']."'  
                data-brand ='".$obj->getBrandById($row['bid'])."' 
                data-date ='".$row['date_added']."' 
                data-cat ='".$obj->getCategoryById($row['cid'])."' 
                class=\"btn btn-dark\"> <i class=\"fa fa-eye\"></i> </button> 

                    <button   onclick = ' editProduct(this)' 
                    data-id ='".$row['id']."' 
                    data-name ='".$row['product_name']."' 
                    data-sp ='".$row['selling_price']."' 
                    data-cp ='".$row['cost_price']."' 
                    data-qty ='".$row['stock']."' 
                    data-bid ='".$row['bid']."' 
                    data-brand ='".$obj->getBrandById($row['bid'])."' 
                    data-cid ='".$row['cid']."' 
                    data-cat ='".$obj->getCategoryById($row['cid'])."' 
                    class=\"btn btn-primary\"> <i class=\"fa fa-edit\"></i> </button>  
                    <button   onclick = ' delCatModal(this)' data-id ='".$row['id']."' data-tb ='Products'  class=\"btn btn-danger\"> <i class=\"fa fa-trash\"></i> </button>               
                </td>  
        </tr>  
            ";
            // <td class = \"text-center\">".$obj->getBrandById($row['bid'])."</td>  
            // <td class = \"text-center\">".$obj->getCategoryById($row['cid'])."</td>  
            // <td>".$obj->getCategoryById("categories",$row['cid'])."</td>  
            // <td>".$obj->getCategoryById("subcategories",$row['sid'])."</td>  
            // <td>".$obj->getBrandById($row['bid'])."</td>  
        }
    }
}
function e_filterProducts($sort)
{
    $obj = new DBoperation();
    $cat = $obj->getCategoryByName($sort);
    $cid  = $cat['id'];
    $rows = $obj->getProductByCategory($cid);
    if($rows != "NO_DATA"){
        $enum = 0;
        foreach ($rows as $row) {
            echo "
            <tr>  
                <td class = \"text-center\">".++$enum."</td>  
                <td class = \"text-center\">".$row['product_name']."</td>
                <td class = \"text-center\">GH¢".$row['selling_price']."</td>
                <td class = \"text-center\">GH¢".$row['cost_price']."</td>
                <td class = \"text-center\">".$row['stock']."</td>
                <td class = \"text-center\">
                    <button  title = 'view' onclick = ' viewProduct(this)' 
                    data-name ='".$row['product_name']."' 
                    data-sp ='".$row['selling_price']."' 
                    data-cp ='".$row['cost_price']."' 
                    data-qty ='".$row['stock']."'  
                    data-brand ='".$obj->getBrandById($row['bid'])."' 
                    data-date ='".$row['date_added']."' 
                    data-cat ='".$obj->getCategoryById($row['cid'])."' 
                    class=\"btn btn-dark\"> <i class=\"fa fa-eye\"></i> </button>        
                </td>  
        </tr>  
            ";
            // <td class = \"text-center\">".$obj->getBrandById($row['bid'])."</td>  
            // <td class = \"text-center\">".$obj->getCategoryById($row['cid'])."</td>  
            // <td class = \"text-center\">".$obj->getBrandById($row['bid'])."</td>  
            // <td class = \"text-center\">".$obj->getCategoryById($row['cid'])."</td>  
            // <td>".$obj->getCategoryById("categories",$row['cid'])."</td>  
            // <td>".$obj->getCategoryById("subcategories",$row['sid'])."</td>  
            // <td>".$obj->getBrandById($row['bid'])."</td>  
        }
    }
}
function e_displayProducts($product, $cat)
{
    $odd = "";
    if($cat == 2 || $cat ==3)
    {
        $odd = "chasis_number";
    }
    elseif($cat == 4 )
    {
        $odd = "part_number";
    }
    else{
        $odd = "product_name";
    }
    $obj = new DBoperation();
    $rows = $obj->getProducts($product);
        if($rows != "NO_DATA"){
        $enum = 0;
        foreach ($rows as $row) {
            
            echo "
            <tr>  
                <td class = \"text-center\">".++$enum."</td>  
                <td class = \"\">".$row[$odd]."</td>
                <td class = \"text-center\">".$row['selling_price']."</td>
                <td class = \"text-center\">".$row['cost_price']."</td>
                <td class = \"text-center\">".$row['stock']."</td>
                <td class = \"text-center\">
                    <button  title = 'view' onclick = ' viewProduct(this)' 
                    data-name ='".$row['product_name']."' 
                    data-sp ='".$row['selling_price']."' 
                    data-cp ='".$row['cost_price']."' 
                    data-qty ='".$row['stock']."'  
                    data-chasis ='".$row['chasis_number']."' 
                    data-part ='".$row['part_number']."' 
                    data-brand ='".$obj->getBrandById($row['bid'])."' 
                    data-date ='".$row['date_added']."' 
                    data-cat ='".$obj->getCategoryById($row['cid'])."' 
                    class=\"btn btn-dark\"> <i class=\"fa fa-eye\"></i> </button>           
                </td>  
        </tr>  
            ";

            // <td class = \"text-center\">".$obj->getBrandById($row['bid'])."</td>  
            // <td class = \"text-center\">".$obj->getCategoryById($row['cid'])."</td>  
            // <td>".$obj->getCategoryById("categories",$row['cid'])."</td>  
            // <td>".$obj->getCategoryById("subcategories",$row['sid'])."</td>  
            // <td>".$obj->getBrandById($row['bid'])."</td>  
        }
    }
}
// add brand
function addBrand()
{
    if(isset($_POST['btn_addBrand'])){
        $obj = new DBoperation();
        $result = $obj->addBrand($_POST["bName"]);
        if($result == 1){
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Brand Added successfully</strong>
            </div>
            ";
        }
        if($result == "BRAND_EXIST"){
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>Brabd already exists</strong>
            </div>
            ";  
        }

    }
}
function displayBrands()
{
    $obj = new DBoperation();
    $rows = $obj->getAllRecord("brands");
    if($rows != "NO_DATA"){
        $enum = 001;
        foreach ($rows as $row) {
            if($row['id'] > 0){
                echo "
                <tr>  
                    <td class = \"text-center\">".$enum++."</td>  
                    <td >".$row['brand_name']."</td>
                    <form method = \"POST\">
                    <input type = \"hidden\" name = 'id' value = '".$row["id"]."'>";
                    echo $row['status'] == 1? "<td class = \"text-center\"><button name = 'toggleStatus' class=\"btn btn-success\" >Active</button></td>": "<td class = \"text-center\"><button name = 'toggleStatus' class=\"btn btn-secondary\" >Disabled</button></td>";
                    echo "</form>
                    <td class = \"text-center\">
                    <button data-e = 'Brand' data-cat ='".$row['brand_name']."' data-id ='".$row['id']."' class=\"btn btn-primary\" name = 'btn_editCategory' onclick = 'showeCatModal(this)'><i class=\"fa fa-edit\"></i></button>
                    <button   onclick = 'delCatModal(this)' data-id ='".$row['id']."' data-tb ='Brands'  class=\"btn btn-danger\"> <i class=\"fa fa-trash\"></i> </button>               
                    </td>  
            </tr>  
                ";
            }
        }
    }
}
function displayLogs()
{
    $obj = new DBoperation();
    $rows = $obj->getAllOrderRecord("logs", "date");
    if($rows != "NO_DATA"){
        $enum = 001;
        foreach ($rows as $row) {
            $data = array($row['description'], $row['date']);
            echo "
            <tr>  
                <td class = \"text-center\">".$enum++."</td>  
                <td class = \"\">".$row['description']."</td>
                <td class = \"text-center\">".$row['date']."</td>
                <td class = \"text-center\">
                <button  class=\"btn btn-primary view\" name = 'view' data-desc ='".$row['description']."' data-date = '".$row['date']."' onclick = 'showLogModal(this)'><i class=\"fa fa-eye\"></i></button>        
                </td> </form> 
        </tr>  
            ";
        }
    }
}
function displayReports($year)
{
    $obj = new DBoperation();
    $months = array("January","February","March","April","May","June","July","August","September","October","November","December");
            for($i = 1; $i <= count($months); $i++)
            {
                $row = $obj->getSalesReport($i, $year);
                if($row['SALES'] != NULL)
                {
                    echo "
                    <tr>  
                        <td class = \"text-center\">".$months[($i-1)]."</td>
                        <td class = \"text-center tsales\" >".$row['SALES']."</td>
                        <td class = \"text-center tprofits\" >".$row['PROFIT']."</td>
                    </tr>  
                    ";
                }
            }
            // $data = array($row['description'], $row['date']);
}
function deleteItem(){
    if(isset($_POST['btn_delete'])){
        $id= htmlspecialchars(strip_tags($_POST["id"]));
        $tb= htmlspecialchars(strip_tags($_POST["tb"]));
        $obj = new DBoperation();
        $result = $obj->deleteRecord($tb, $id);
        if($result == 1){
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" onClick = \"window.history.back()\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Record Deleted successfully</strong>
            </div>
            ";
        }else{
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>Dependent records cannot be deleted</strong>
            </div>
            ";  
        }
    }
}
function displayInvoice()
{
    $obj = new DBoperation();
    $rows = $obj->getAllOrderRecord("invoice", "order_date");
    if($rows != "NO_DATA"){
        $enum = 001;
        foreach ($rows as $row) {
            $vendor = $obj->getUser($row['vendor']);
            $vendor_name = $vendor['first_name']." ".$vendor['last_name'];
            echo "
            <tr>  
                <td class = \"text-center\">".$enum++."</td>  
                <td class = \"text-center\">".$vendor_name."</td>
                <td class = \"text-center\">".$row['customer_name']."</td>
                <td class = \"text-center\">GHC".$row['net_total']."</td>
                <td class = \"text-center\">
                <a href = '?view_Invoice&id=".base64_encode($row["id"])."' class=\"btn btn-primary\" name = 'btn_editbrand'><i class=\"fa fa-eye\"></i></a>
                <button   onclick = 'delCatModal(this)'  data-tb ='invoice' data-id ='".$row['id']."'  class=\"btn btn-danger\"> <i class=\"fa fa-trash\"></i> </button>           
                <a href = '../ppos/public_html/invoice/?inum=".base64_encode($row["id"])."' class=\"btn btn-success \"><i class=\"fa fa-file-pdf-o\"></i></a>                   
                </td>  
        </tr>  
            ";
        }
    }
}
function e_displayInvoice()
{
    $obj = new DBoperation();
    $rows = $obj->getAllOrderRecord("invoice", "order_date");
    if($rows != "NO_DATA"){
        $enum = 001;
        foreach ($rows as $row) {
            $vendor = $obj->getUser($row['vendor']);
            $vendor_name = $vendor['first_name']." ".$vendor['last_name'];
            echo "
            <tr>  
                <td class = \"text-center\">".$enum++."</td>  
                <td class = \"text-center\">".$vendor_name."</td>
                <td class = \"text-center\">".$row['customer_name']."</td>
                <td class = \"text-center\">GHC".$row['net_total']."</td>
                <td class = \"text-center\">
                <a href = '?view_Invoice&id=".base64_encode($row["id"])."' class=\"btn btn-primary\" name = 'btn_editbrand'><i class=\"fa fa-eye\"></i></a>  
                <a href = '../ppos/public_html/invoice/?inum=".base64_encode($row["id"])."' class=\"btn btn-danger\"><i class=\"fa fa-file-pdf-o\"></i></a>                     
                </td>  
        </tr>  
            ";
        }
    }
}
function toggleStatus($tb)
{
    if(isset($_POST['toggleStatus'])){
        $id = $_POST['id'];
        // echo  "<script>alert($id)</script>";
        // $to = "disable";
        $obj = new DBoperation();
        $result = $obj->toggleStatus($tb, $id);
    }
}
function e_displayBrands()
{
    $obj = new DBoperation();
    $rows = $obj->getAllRecord("brands");
    if($rows != "NO_DATA"){
        $enum = 001;
        foreach ($rows as $row) {
            echo "
            <tr>  
                <td class = \"text-center\">".$enum++."</td>  
                <td class= \"text-center\">".$row['brand_name']."</td>";
                echo $row['status'] == 1? "<td class = \"text-center\"><button class=\"btn btn-success\" >Active</button></td>": "<td class = \"text-center\"><button class=\"btn btn-secondary\" disabled>Disabled</button></td> 
        </tr>  
            ";
        }
    }
}
function populateBrand()
{
    $obj = new DBoperation();
    if(isset($_POST['btn_editbrand']))
    {
        $bid = $_POST['bid'];
        if($row = $obj->getBrandById($bid)){
            echo "
            <div class='form-group'>
            <label for='uname'>Brand Name:</label>
            <input type='text' class='form-control' id='bName' placeholder='Enter brand name' value = '".$row["brand_name"]."' name='bName'pattern = '^[a-zA-Z ]{4,30}' required>
            <div class='valid-feedback'>Valid.</div>
            <div class='invalid-feedback'>Please fill out this field.</div>
            </div>
            <div class='form-group'>
            <label for='uname'>Status:</label>
            <select class='form-control' id='status' name='status' required>";
            if($row['status'] == 1){
                echo
                "
                <option value='1'>Active</option>
                <option value='0'>Disabled</option>
                ";
            }else{
                echo
                "
                <option value='0'>Disabled</option>
                <option value='1'>Active</option>
                ";
            }
            echo "</select>
            <div class='valid-feedback'>Valid.</div>
            <div class='invalid-feedback'>Please fill out this field.</div>
            </div>
            ";
        }
        
    }
}
function editProfile()
{
    if(isset($_GET['manage_edit_profile']) && isset($_POST['update_profile'])){
        $obj = new DBoperation();
        $user = $_SESSION['userid'];
        $fName = htmlspecialchars(strip_tags($_POST["fName"]));
        $lName = htmlspecialchars(strip_tags($_POST["lName"]));
        $phone = htmlspecialchars(strip_tags($_POST["phone"]));
        $address = htmlspecialchars(strip_tags($_POST["address"]));
        $email = htmlspecialchars(strip_tags($_POST["email"]));
        $result = $obj->updateProfile($fName, $lName,$email, $phone, $address,$user);
        if($result == 1){
            echo "
            <div class=\"alert alert-success text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa fa-check fa-2x\" aria-hidden=\"true\"></i>Profile Updated successfully</strong>
            </div>
            ";
        }
        if($result == "EMPLOYEE_EXIST"){
            echo "
            <div class=\"alert alert-danger text-center alert-dismissible fade show\" role = \"alert\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
            <strong><i class=\"fa-times-circle-o fa-2x\" aria-hidden=\"true\"></i>>Profile Update successfully</strong>
            </div>
            ";  
        }
    }
}
function getTotalRecords($tb){
    $obj = new DBoperation();
    return  $obj->getRecordCount($tb);
}
function getTOOSP(){
    $obj = new DBoperation();
    return  $obj->getTOOSP();
}

// -------------------------Orders Processing------------------//

function processOrder(){
    
    if(isset($_POST['getInvoice'])){
        // echo "okay";
        $orderDate = $_POST['orderDate'];
        $customer_name = $_POST['customerName'];
        $customer_phone = $_POST['customerPhone'];
        $discount = $_POST['discount'];
        $sub_total = round($_POST['sub_total'], 2);
        $net_total = round($_POST['net_total'], 2);
        $payment_method = $_POST['payment_method'];
        $vendor = $_POST['vendor'];
    
        // get array for orders
        $ar_qty = $_POST['qty'];
        $ar_price = $_POST['uPrice'];
        $ar_pid = $_POST['pid'];
        $ar_proname = $_POST['pro_names'];
        $ar_tqty = $_POST['tQty'];
        $obj = new DBOperation();
        $result = $obj->addInvoice($vendor, $customer_name,$customer_phone, $sub_total,$discount,  $net_total, $payment_method, $orderDate, $ar_pid, $ar_qty, $ar_tqty);
        if($result !="NO_INVOICE_ID" ||  $result !="ORDER_FAILED")
        {
            echo '<script>window.location.replace("../ppos/public_html/invoice/?def&inum='.base64_encode($result).'")</script>';
        }
        else{
            echo "<script>alert('$result')</script>";
        }
    }
}
function insertInvoice()
{

    if(isset($_POST['getInvoice'])){
        $orderDate = $_POST['orderDate'];
        $customer_name = $_POST['customerName'];
        $customer_phone = $_POST['customer_phone'];
        $discount = $_POST['discount'];
        $sub_total = round($_POST['sub_total'], 2);
        $net_total = round($_POST['net_total'], 2);
        $payment_method = $_POST['payment_method'];
        $vendor = $_POST['vendor'];
    
        // get array for orders
        $ar_qty = $_POST['qty'];
        $ar_price = $_POST['uPrice'];
        $ar_pid = $_POST['pid'];
        $ar_proname = $_POST['pro_names'];
        $ar_tqty = $_POST['tQty'];
        $obj = new DBoperation();
        $result = $obj->addInvoice($vendor, $customer_name,$customer_phone, $sub_total,$discount,  $net_total, $payment_method, $orderDate, $ar_pid, $ar_qty, $ar_tqty);
        echo $result;
    }

    // receipt
    function getInvoiceItems($iid)
    {
        $obj = new DBoperation();
        $rows = $obj->getOrderItems($iid);
        if($rows != "NO_DATA"){
            $enum = 000;
            foreach ($rows as $row) {
                echo "
                <tr class=\"item-row\">
                <td class=\"cost\"><p>".++$enum."</p></td>";
                $product = $obj->getSingleProduct($row['pid']);
                echo "<td class=\"description\"><p>".$product['']."</p></td>
                <td class=\"qty\"><p >".$product['']."</p></td>
                <td class=\"price\"><span>".$row['qty']."</span></td>
                
                <td ><span>".($row['qty'] * $product['selling_price'])."</span></td>
            </tr>	
                ";
            }
        }
    }
}

// Database backup
function backup()
{
    if(isset($_POST['dbbackup']))
    {
        dbbackup("localhost", "root", "", "ppos" );
    }
    
}