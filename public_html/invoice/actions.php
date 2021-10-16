<?php
// include_once "../includes/user.php";
include_once "./dboperations.php";
// include_once "./public_html/includes/user.php";
// include_once "./public_html/includes/DBoperations.php";

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
            $product = $obj->getItemById("products",$row['pid']);
            if($product['cid'] == 2 || $product['cid'] == 3)
            {
                echo "<td class=\"description\"><p>".$product['product_name']." - ".$product['chasis_number']."</p></td>";
            }elseif ($product['cid'] == 4) {
                echo "<td class=\"description\"><p>".$product['product_name']." - ".$product['part_number']."</p></td>";
            }
            else{
                echo "<td class=\"description\"><p>".$product['product_name']."</p></td>";
            }
            echo "
            <td class=\"qty\"><p >".$product['selling_price']."</p></td>
            <td class=\"price\"><span>".$row['qty']."</span></td>
            
            <td ><span>".($row['qty'] * $product['selling_price'])."</span></td>
        </tr>	
            ";
        }
    }
}