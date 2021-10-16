<?php 
  $obj = new DBoperation();
  $row = $obj->getItemById("products", base64_decode($_GET['id']));
?>

<div class="main-content " >
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
                <h6 class="heading-small text-muted mb-4"> Product Details</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label font" for="password">Manufacturer:</label>
                            <p class = "font-weight-bold text-uppercase"><?php echo $obj->getBrandById($row['bid']) ?></p>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="confirm_password">Category:</label>
                            <p class = "font-weight-bold text-uppercase"><?php echo $obj->getCategoryById($row['cid']) ?></p>
                        </div>
                        </div>
                    </div>
                    </div>
                    <hr class="my-4">
                    <div class="pl-lg-4">
                 <?php //changePassword(); ?>
                 <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Item Name/Model:</label>
                        <p class = "font-weight-bold text-uppercase"><?php echo $row['product_name'] ?></p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Quantity:</label>
                        <p class = "font-weight-bold text-uppercase"><?php echo $row['stock'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-4">
                        <div class="form-group focused">
                        <label for="uname">Cost Price:</label>
                            <p class = "font-weight-bold text-uppercase">GHC<?php echo $row['cost_price'] ?></p>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group focused">
                        <label for="sPrice">Selling Price:</label>
                            <p class = "font-weight-bold text-uppercase">GHC<?php echo $row['selling_price'] ?></p>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group focused">
                        <label for="sPrice">Date Updated:</label>
                            <p class = "font-weight-bold text-uppercase"><?php echo $row['date_added'] ?></p>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                <div align="right" class = "m-3">
                <a href = "?all_products" class="btn btn-dark py-2" name = "cancel"><i class="fa fa-times mx-2"></i>Back</a>
                <!-- <button onClick = "window.history.back()" class="btn btn-dark py-2" ><i class="fa fa-times mx-2"></i>Back</button> -->
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