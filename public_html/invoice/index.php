	<?php
	// return to basket if no invoice is made
	include_once "actions.php";
	if(!isset($_GET['inum'])){
		header("location: ../../dashboard.php?make_sales");
	}
	// if(!isset($_GET['def'])){
	// 	$burl = "../../dashboard.php?manage_invoice";
	// }else if(isset($_GET['em'])){
	// 	$burl = "../../e_dashboard.php?manage_invoice";
	// }else{
	// 	$burl = "../../dashboard.php?make_sales";
	// }
	?>
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/all.js'></script>
	<link href="./public_html/images/favicon.png"  sizes="180x180" rel="icon">

</head>

<body>

	<div id="page-wrap">
		<div class="options">
			<!-- <a href = "<?php echo $burl; ?>"><i class="	fas fa-arrow-circle-left"></i> Back</a> -->
			<button onClick = "window.history.back()"><i class="fas fa-arrow-circle-left"></i> Back</button>
			<!-- <div id="cmd"> -->
			<!-- <button>Save</button> -->
			<button onClick="window.print()"><i class="	fas fa-print"></i> Print</button>
			<!-- </div> -->
		</div>
		<p id="header">Pukka Web Services</p>
<?php 
// get Invoice
$obj = new DBoperation();
$row = $obj->getItemById("invoice",base64_decode($_GET['inum']));
$vendor = $obj->getItemById("users",$row['vendor']);
$shop = $obj->getShop(1);

?>		
		<div id="identity">
		
            <p id="address">
<b>Vendor</b>: <?php echo $vendor['first_name']." ".$vendor['last_name']; ?><br><br>
<?php echo $shop['address']; ?><br>
<strong>Phone: </strong><?php echo $shop['phone']; ?>

			</p>

            <div id="logo">
              <!-- <img id="image" src="images/<?php echo $shop['logo'] ?>" alt="logo" /> -->
			  <img id="image" src="./../images/<?php echo $shop['logo'] ?>" alt="logo" />
			  <!-- <div id="image" style="background-image: url('./../images/<?php echo $logo ?>');"></div> -->
            </div>
		
		</div>
		<p id=""><b>Customer Details</b></p><br>
            <p id="address">
<b>Name</b>: <?php echo $row['customer_name'] ?><br>
<b>Phone</b>: <?php echo $row['customer_phone'] ?>
			</p>		
		<div style="clear:both"></div>
		
		<div id="customer">

            <p id="customer-title"><?php echo $shop['name'] ?></p>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><p>PRS-<?php echo $row['id'] ?></p></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><p id="date"><?php echo $row['order_date'] ?></p></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">GHC<?php echo $row['net_total'] ?></div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>#</th>
		      <th>Item</th>
		      <th>Unit Price (GHC)</th>
		      <th>Qty</th>
		      <th>Total (GHC)</th>
		  </tr>
		  <?php getInvoiceItems(base64_decode($_GET['inum'])); ?>
		  <tr>

		      <td colspan="" class="blank"> </td>
		      <td colspan="" class="blank"> </td>
		      <td colspan="" class="blank"> </td>
		      <td colspan="" class="total-line">Discount</td>
		      <td class="total-value"><div id="total"><?php echo $row['discount'] ?>%</div></td>
		  </tr>
		  <tr>
		      <td colspan="" class="blank"> </td>
		      <td colspan="" class="blank"> </td>
		      <td colspan="" class="blank"> </td>
		      <td colspan="" class="total-line">Amount Paid</td>

		      <td class="total-value"><p id="paid"><?php echo $row['net_total'] ?></p></td>
		  </tr>
		  <tr>
		      <td colspan="" class="blank"> </td>
		      <td colspan="" class="blank"> </td>
		      <td colspan="" class="blank"> </td>
		      <td colspan="" class="total-line balance">Payment Method</td>
		      <td class="total-value balance"><div class="due"><?php echo $row['payment_method'] ?></div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <div class="container text-center align-items-center justify-content-center">
        <span class="text-muted text-center">&COPY; <script>document.write(new Date().getFullYear())</script>, Pukka Web Services</span>
    </div>
		</div>
	
	</div>
	
</body>

</html>
