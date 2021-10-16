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
              class="needs-validation" novalidate 
              method = "POST" 
              autcomplete = "off" 
              >
                <h6 class="heading-small text-muted mb-4">Update Product</h6>
                <?php updateProduct(); ?>
                <hr class="my-4">
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="password">Manufacturer</label>
                            <select name="brand" id="brand" class="form-control py-2">
                            <option value="<?php echo $row['bid']?>"><?php echo $obj->getBrandById($row['bid']) ?></option>
                            <?php getBrands() ?>
                            </select>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Select Brand</div>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="confirm_password">Category</label>
                            <select name="category" id="category" class="form-control py-2">
                            <option value = "<?php echo $row['cid']?>"><?php echo $obj->getCategoryById($row['cid']) ?></option>
                            <?php getCategories() ?>
                            </select>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Select Category</div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="pl-lg-4">
                 <?php //changePassword(); ?>
                 <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Item Name/Model</label>
                        <input type="text" class="form-control py-3" id="pName" placeholder="Enter Item Name/model" pattern = "^{4,250}" value = "<?php echo $row['product_name'] ?>" name="pName" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter name / model</div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Quantity</label>
                        <input type="stock" name="stock" class = "form-control py-3" value = "<?php echo $row['stock'] ?>"  placeholder="Enter number in stock"  required> 
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter quantity</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                        <label for="uname">Cost Price:</label>
                            <input type="text" name="cPrice" class = "form-control py-3" value = "<?php echo $row['cost_price'] ?>"  placeholder="Cost Price"  required> 
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Enter cost price</div>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                        <label for="sPrice">Selling Price:</label>
                            <input type="text" class="form-control py-3" id="sPrice" value = "<?php echo $row['selling_price'] ?>"  placeholder="Selling Price"  name="sPrice" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Enter selling price</div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div align="right" class = "m-3">
                <a href = "?all_products" class="btn btn-danger py-2" name = "cancel"><i class="fa fa-times mx-2"></i>Cancel</a>
                <button type="submit" class="btn btn-success py-2" name = "btn_editProduct"><i class="fa fa-lock mx-2 "></i>Update Record</button>
                <!-- <button type="reset" class="btn btn-dark" name = ""><i class="fa fa-time mx-2"></i>Reset</button> -->
                </div>
                </div>
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