
<div class="row">
    <div class="card col-md-12">
        <div class="card-title my-1  mx-auto">
            <h5 class = "mx-auto font-weight-bold text-dark text-uppercase my-3">Invoice list</h5>
        </div>
        <div class="px-1">
          <?php deleteItem(); ?>
            <div class="row">
                <div class="table-responsive">
                    <table id="myTable" class="display table" width="100%" >  
                        <thead class = "bg-dark text-white">  
                            <tr>  
                                <th class = "text-center">ENO</th>  
                                <th class = "text-center">Vendor Name</th>  
                                <th class = "text-center">Customer Name</th>  
                                <th class = "text-center">Total Payment</th>  
                                <!-- <th class = "text-center">Status</th>  
                                <th class = "text-center">User Type</th>   -->
                                <th class = "text-center">Actions</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                        <?php displayInvoice(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal" data-keyboard="false" data-backdrop="static" id="employeeModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Adding Employee</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method = "POST" class="needs-validation" novalidate autocomplete = "off">
            <div class="form-group">
                <label for="uname">First Name:</label>
                <input type="text" class="form-control" id="cName" placeholder="Enter first name" pattern = "^[a-zA-Z ]{4,30}" name="fName" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter first name</div>
            </div>
            <div class="form-group">
                <label for="uname">Last Name:</label>
                <input type="text" class="form-control" id="cName" placeholder="Enter last name" pattern = "^[a-zA-Z ]{4,30}" name="lName" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter last name</div>
            </div>
            <div class="form-group">
                <label for="uname">Email:</label>
                <input type="email" name="email" class = "form-control py-4" placeholder="Email" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required> 
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter email</div>
            </div>
            <div class="form-group">
                <label for="uname">Phone:</label>
                <input type="email" class="form-control" id="cName" placeholder="Enter phone" pattern = "^[0-9-+\s()]{10}" name="phone" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter phone</div>
            </div>
            <div class="form-group">
                <label for="uname">Address:</label>
                <textarea name="address" id="address" class="form-control" placeholder="Enter employee address" required></textarea>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter Address</div>
            </div>
            <div class="form-group">
                <label for="uname">User Type:</label>
                <select name="user" id="user" class="form-control">
                  <option value="employee">Employee</option>
                  <option value="employee">Admin</option>
                </select>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter phone</div>
            </div>
            <button type="submit" class="btn btn-dark" name = "btn_addEmployee"><i class="fa fa-plus-circle mx-2"></i>Add Employee</button>
            </form>

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>
<!-- delete cateogry -->
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
            <h2 class="">Do you want to delete Invoice?</h2>
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