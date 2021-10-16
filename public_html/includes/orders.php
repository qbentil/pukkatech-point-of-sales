<?php

include_once "../includes/user.php";
include_once "../includes/DBoperation.php";
if(isset($_POST['getNewOrderItem'])){
    $obj = new DBoperation();
    $rows = $obj->getAllRecord("products");
?>
    <tr>
    <td class = "num">1</td>
        <td>
            <select name="pid[]" id="selProduct" class = "form-control pid">
            <option value="Default" selected disabled>--Select Item--</option>
            <?php 
             foreach ($rows as $row) {
                 if(isset($row['chasis_number']))
                 {
                    echo "<option value='".$row['id']."'>".$row['chasis_number']." - ".$row['product_name']."</option>";
                 }
                 elseif(isset($row['part_number']))
                 {
                    echo "<option value='".$row['id']."'>".$row['part_number']." - ".$row['product_name']."</option>";
                 }
                 else{
                    echo "<option value='".$row['id']."'>".$row['product_name']."</option>";
                 }
             }
            
            ?>
            </select>
        </td>
        <td><input type="text" name = "uPrice[]"class = "form-control uprice" readonly ></td>
        <td><input type="text" name = "tQty[]"class = "form-control tqty" readonly ></td>
        <td>
        <input type="number" min = "1" step = "1"  name = "qty[]"class = "form-control qty"  >
        <input type="hidden" name = "pro_names[]"class = "form-control pro_names"  >
        </td>
        <td>GHC <span class="totalPrice"> </span></td>
        <td><button type = "button" id = "" class="btn btn-danger remove"><i class="fa fa-trash"></i></button></td>
    </tr>

<?php
}

// get qty and price of one item
if(isset($_POST['getPriceAndQty'])){
    $obj = new DBoperation();
    $rows = $obj->getSingleProduct($_POST['id']);
    echo json_encode($rows);
    exit();
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
    }
?>