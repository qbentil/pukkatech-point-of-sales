
<form  method = "post" id = "orderData" class="needs-validation" novalidate >
<!-- <div class="container"> -->
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <b>Create Invoice</b>
        </div>
        <?php  processOrder(); ?>
        <div class="card-body">
        <div class="pl-lg-4">
                 <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Vendor: </label>
                        <input type="text" class="form-control py-2" id="pName" placeholder=""  value = "<?php echo $_SESSION['username'] ?>" name = "vendor_name"  required readonly disabled>
                        <input type="hidden"   value = "<?php echo $_SESSION['userid'] ?>" name="vendor">
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter vendor name</div>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Date: </label>
                        <input type="date" name="orderDate" id = "orderDate" class = "form-control py-2" value = "<?php echo  Date("Y-m-d"); ?>"  placeholder=""  required readonly > 
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Customer name: </label>
                        <input type="text" name="customerName" id = "customerName" class = "form-control py-2"   placeholder="Enter Customer name" pattern = "^[a-zA-Z ]{4,30}" autocomplete = "off"  required> 
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter Customer name</div>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Customer Phone: </label>
                        <input type="text" name="customerPhone" id = "customer_phone" class = "form-control py-2"   placeholder="Enter Customer mobile" minlength = "10" maxlength = "10" pattern = "^[0-9-+\s()]{10}" autocomplete = "off"  required> 
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter Customer phone</div>
                      </div>
                    </div>
                  </div>
          </div>
        </div>
    </div>
<!-- </div> -->



<!-- <div class="container clearfix"> -->
    <!-- Shopping cart table -->
    <div class="card">
    <div class="card-header">
            <b>Items List</b>
        </div>
        <div class="card-body">
        
            <div class="table-responsive">
              <table id="" class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th>#</th>
                    <th class="text-center " style="min-width: 350px;">Item Name</th>
                    <th class="text-right " style="width: 120;">Unit Price (GHC)</th>
                    <th class="text-center " style="width: 110;">Total Quantity</th>
                    <th class="text-right " style="width: 100px;">Quantity</th>
                    <th>Total Price </th>
                    <th><button type = "button" id = "add" class = "btn btn-success text-white font-weight-bold"><i class="fa fa-plus-circle"></i></button></th>
                  </tr>
                </thead>
                <tbody id = "tb">
                    <!-- <tr>
                    <td>1</td>
                        <td>
                            <select name="pid[]" id="" class = "form-control">
                                <option value="">Product 1</option>
                            </select>
                        </td>
                        <td><input type="text" name = "uPrice[]"class = "form-control" readonly ></td>
                        <td><input type="text" name = "tQty[]"class = "form-control" readonly ></td>
                        <td><input type="number" min = "1" value = "1" name = "qty[]"class = "form-control"  ></td>
                        <td>500</td>
                    </tr> -->
                </tbody>
              </table>
            </div>
            <div align="right" class = "m-2">
              <!-- <button type = "button" id = "remove" class="btn btn-danger"><i class="fa fa-trash"></i></button> -->
              <!-- <button type = "button" id = "add" class = "btn btn-warning text-white font-weight-bold">+</button> -->
            </div>
          </div>
      </div>
  <!-- </div> -->
  <!-- <div class="container"> -->
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <b>Review & Summary</b>
        </div>
        <div class="card-body">
        <div class="pl-lg-4">
                 <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Sub Total</label>
                        <input type="text" class="form-control py-2" id="sub_total" name = "sub_total" placeholder=""  value = "" name="sub_total"  readonly required >
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Discount (%): </label>
                        <input type="" name="discount" id = "discount" class = "form-control py-2" autocomplete = "off"   placeholder=""  required > 
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Net total: </label>
                        <input type="text" name="net_total" class = "form-control py-2" id = "net_total"   placeholder=""  readonly  required> 
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Payment Method: </label>
                        <!-- <input type="text" name="net_total" class = "form-control py-2" id = "net_total"  placeholder=""  required>  -->
                        <select name="payment_method" id="payment_method" class = "form-control">
                          <option value="cash">Cash</option>
                          <option value="momo">Momo</option>
                          <option value="cheque">Cheque</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div align = "right"  class = " m-2">
              <!-- <button type = "button" id = "remove" class="btn btn-danger"><i class="fa fa-trash"></i></button> -->
              <button type = "submit" id = "gInvoice" name = "getInvoice" class = "btn btn-success text-white font-weight-bold py-2">Generate Invoice</button>
            </div>
          </div>
        </div>
    </div>
<!-- </div> -->
</form>

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


