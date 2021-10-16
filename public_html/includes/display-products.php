<div class="row">
    <div class="card col-md-12">
        <div class="card-title my-1  mx-auto">
            <h5 class = "mx-auto font-weight-bold text-dark text-uppercase my-3"><?php echo $_GET['product']; $cat = $_GET['cat'] ?></h5>
        </div>
        <div class="card-body">
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#productModal">
            <i class="fa fa-plus"></i>New Product
        </button>
        </div>
        <div class="px-1">
            <div class="row">
                <div class="table-responsive">
                <?php addProduct(); deleteItem(); updateProduct();?>
                    <table id="myTable" class="display table" width="100%" >  
                        <thead class = "bg-dark text-white">  
                            <tr>  
                                <th class = "text-center">E-NO</th>  
                                <?php 
                                    $odd = "";
                                    if($cat == 2 || $cat ==3)
                                    {
                                        $odd = "Chasis Number";
                                    }
                                    elseif($cat == 4 )
                                    {
                                        $odd = "Part Number";
                                    }
                                    else{
                                        $odd = "Item Name";
                                    }
                                ?>
                                <th class = "text-center"><?php echo $odd; ?></th>  
                                <th class = "text-center">Selling Price (GHC)</th>  
                                <th class = "text-center">Cost Price (GHC)</th>  
                                <th class = "text-center">No. in Stock</th>  
                                <th class = "text-center">Actions</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                        <?php displayProducts($_GET['product'], $_GET['cat']); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal" data-keyboard="false" data-backdrop="static" id="productModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Adding Product</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method = "POST" class="needs-validation" novalidate autocomplete = "off">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" id="category" class="form-control py-2">
                    <?php getCategories() ?>
                    </select>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Select Category</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="brand">Manufacturer:</label>
                    <select name="brand" id="brand" class="form-control py-2">
                      <!-- <option value='employee'>--</option> -->
                      <?php getBrands() ?>
                    </select>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Select brand</div>
                </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="pName">Name / Model:<span class="text-danger">*</span></label>
                      <input type="text" class="form-control py-2" id="pName" placeholder="Enter Item Name/model" pattern = "^{4,250}" name="pName" required>
                      <div class="valid-feedback"></div>
                      <div class="invalid-feedback">Enter name / model</div>
                  </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                      <label for="stock">Quantity <span class="cr text-danger">*</span></label>
                      <input type="stock" name="stock" class = "form-control py-2" placeholder="Enter number in stock"  required> 
                      <div class="valid-feedback"></div>
                      <div class="invalid-feedback">Enter quantity</div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="chasisNumber">Chasis Number:<span class="text-danger" id="cr"></span></label>
                    <input type="text" class="form-control py-2" id="chasisNumber" placeholder="Enter product chasis number"  name="chasisNumber">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Enter Chasis Number</div>
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                    <label for="partNumber">Part Number:<span class="text-danger" id="pr"></span></label>
                    <input type="text" class="form-control py-2" id="partNumber" placeholder="Enter product part number"  name="partNumber">
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Enter part Number</div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cp">Cost Price:<span class="text-danger">*</span></label>
                    <input type="text" name="cPrice" class = "form-control py-2" placeholder="Cost Price"  required> 
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Enter cost price</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                      <label for="sPrice">Selling Price: <span class="text-danger">*</span></label>
                      <input type="text" class="form-control py-2" id="sPrice" placeholder="Selling Price"  name="sPrice" required>
                      <div class="valid-feedback"></div>
                      <div class="invalid-feedback">Enter selling price</div>
                  </div>
              </div>
            </div>
            <button type="submit" class="btn btn-dark" name = "btn_addProduct"><i class="fa fa-plus-circle mx-2"></i>Add Product</button>
            </form>

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>
<!-- view pro -->
<div class="modal" data-keyboard="false" data-backdrop="static" id="viewProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Product Info</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method = "post" class="needs-validation" novalidate autocomplete = "off">
        <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="brand">Manufacturer</label>
                            <input type="text" class="form-control py-3" id="b" disabled>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="category">Category</label>
                            <input type="text" class="form-control py-3" id="cate" disabled>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="pl-lg-4">
                 <?php //changePassword(); ?>
                 <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="name">Item Name/Model</label>
                        <input type="text" class="form-control py-3" id="pname" disabled>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                        <label for="cp">Cost Price:</label>
                        <input type="text" class="form-control py-3" id="cost" disabled>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                        <label for="sp">Selling Price:</label>
                        <input type="text" class="form-control py-3" id="sell" disabled>
                        </div>
                        </div>
                    </div>
                  </div>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                        <label for="cp">Chasis Number:</label>
                        <input type="text" class="form-control py-3" id="chasis" disabled>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                        <label for="sp">Part Number:</label>
                        <input type="text" class="form-control py-3" id="part" disabled>
                        </div>
                        </div>
                    </div>
                  </div>
                <div class="pl-lg-4">
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                      <label class="form-control-label" for="name">Number in Stock:</label>
                      <input type="text" class="form-control py-3" id="stock" disabled>
                      </div>
                    </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                        <label for="cp">Date Added:</label>
                        <input type="text" class="form-control py-3" id="date" disabled>
                        </div>
                        </div>
                    </div>
                    </div>
            <!-- <button type="submit" class="btn btn-dark" name = "btn_editProduct"><i class="fa fa-plus-circle mx-2"></i>Edit Product</button> -->
            <button class="btn btn-dark pull-right" data-dismiss="modal"><i class="fa fa-times-circle-o mx-2"></i>Close</button>
            </form>

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>
<!-- edit pro -->

<div class="modal" data-keyboard="false" data-backdrop="static" id="editProductModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Updating  Product</h4>
        <form method="post"><button class="close text-white" >&times;</button></form>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method = "post" class="needs-validation" novalidate autocomplete = "off">
          <input type="hidden" name = "id" id="id">
        <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="brand">Manufacturer</label>
                            <select name="brand" id="bb" class="form-control py-2">
                            <?php getBrands() ?>
                            </select>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Select Brand</div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="category">Category</label>
                            <select name="category" id="cat" class="form-control py-2">
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
                    <div class="col-md-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="name">Item Name/Model</label>
                        <input type="text" class="form-control py-3" id="name" placeholder="Enter Item Name/model" pattern = "^{4,250}"  name="pName" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter name / model</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="qty">Quantity</label>
                        <input type="stock" name="stock" id="qty" class = "form-control py-3"  placeholder="Enter number in stock"  required> 
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter quantity</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="chasisNumber">Chasis Number:<span class="text-danger" id="cr"></span></label>
                          <input type="text" class="form-control py-2" id="echasis" placeholder="Enter product chasis number"  name="chasisNumber">
                          <div class="valid-feedback"></div>
                          <div class="invalid-feedback">Enter Chasis Number</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                          <label for="partNumber">Part Number:<span class="text-danger" id="pr"></span></label>
                          <input type="text" class="form-control py-2" id="epart" placeholder="Enter product part number"  name="partNumber">
                          <div class="valid-feedback"></div>
                          <div class="invalid-feedback">Enter part Number</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group focused">
                        <label for="cp">Cost Price:</label>
                            <input type="text" name="cPrice" id="cp" class = "form-control py-3"  placeholder="Cost Price"  required> 
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Enter cost price</div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group focused">
                        <label for="sp">Selling Price:</label>
                            <input type="text" class="form-control py-3" id="sp"   placeholder="Selling Price"  name="sPrice" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Enter selling price</div>
                        </div>
                        </div>
                    </div>
                    </div>
            <button type="submit" class="btn btn-dark" name = "btn_editProduct"><i class="fa fa-plus-circle mx-2"></i>Edit Product</button>
            </form>
            <!-- <button class="close btn btn-danger"><i class="fa fa-times mx-2"></i>Cancel</button> -->

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- Delete Products -->
<div class="modal" data-keyboard="false" data-backdrop="static" id="delCat">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-danger text-white">
            <h4 class="modal-title text-center mx-auto font-weight-bold">Confirm Delete</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
            <div class="modal-body">
            <div class="form-group">
            <h2 class="">Do you want to delete Product?</h2>
            <div><small class="text-danger">This action cannot be undone.</small></div>
            </div>
            <form method = "post" >
                <input type="hidden" class="form-control" id="table" name = "tb"  required>
                <input type="hidden" class="form-control" id="cid" name = "id"   required>
              <div class="pull-right">
                <button type = "button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" name = "btn_delete">Delete</button>
              </div>
            </form>

        </div>

        </div>
    </div>
</div>
<?php //require "./public_html/templates/modal.php" ?>
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