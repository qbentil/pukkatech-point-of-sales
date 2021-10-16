<?php 
  $obj = new DBoperation();
  $row = $obj->getItemById("invoice", base64_decode($_GET['id']));
?>

<div class="main-content ">
    <!-- Page content -->
        <div class="col-xl-12 order-xl-1">
          <div class="card shadow">
            <div class="card-body">
              <form 
              class="needs-validation" 
              method = "POST" 
              autcomplete = "off" 
              novalidate 
              >
                <h6 class="heading-small text-muted mb-4"> Invoice Details</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label font" for="password">Customer Name:</label>
                            <p class = "font-weight-bold text-uppercase"><?php echo $row['customer_name'] ?></p>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="confirm_password">Vendor:</label>
                            <?php
                              $vendor = $obj->getUser($row['vendor']);
                            ?>
                            <p class = "font-weight-bold text-uppercase"><?php echo $vendor['last_name']." ".$vendor['first_name']?></p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- <hr class="my-2"> -->
                <div class="container">         
                <!-- <h6 class="heading-small text-muted mb-4">Items</h6>   -->
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>Item Name</th>
                      <th>Quantity</th>
                      <th>Unit Price (GHC)</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $orders = $obj->getOrderItems($row['id']);
                  foreach ($orders as $order ) {
                    $product = $obj->getItemById("products", $order['pid']);
                  ?> 
                      <tr>
                        <td><?php echo $product['product_name'] ?></td>
                        <td><?php echo $order['qty'] ?></td>
                        <td><?php echo $product['selling_price'] ?></td>
                      </tr>
                      <tr>
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
                <hr class="my-4">
                    <div class="pl-lg-4">
                 <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Sub Total:</label>
                        <p class = "font-weight-bold ">GHC<?php echo $row['subtotal'] ?></p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Discount:</label>
                        <p class = "font-weight-bold text-uppercase"><?php echo $row['discount'] ?>%</p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group focused">
                        <label for="uname">Net Total:</label>
                            <p class = "font-weight-bold ">GHC<?php echo $row['net_total'] ?></p>
                        </div>
                        </div>
                  </div>
                </div>
                <hr class="my-4">
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-4">
                        <div class="form-group focused">
                        <label for="sPrice">Payment Method:</label>
                            <p class = "font-weight-bold "><?php echo $row['payment_method'] ?></p>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group focused">
                        <!-- <label for="uname">Date:</label> -->
                            <p class = "font-weight-bold "><?php //echo $row['status'] == 1? "Active": "Disabled" ?></p>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group focused">
                        <label for="sPrice">Date:</label>
                            <p class = "font-weight-bold text-uppercase"><?php echo $row['order_date'] ?></p>
                        </div>
                        </div>
                    </div>
                </div>
              </div>
                <div align="right" class = "m-3">
                <button type="button" onclick="window.history.back()"  class="btn btn-dark py-2" name = "cancel"><i class="fa fa-times mx-2"></i>Back</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>