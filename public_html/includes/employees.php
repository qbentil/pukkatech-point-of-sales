<?php 
if(isset($_POST['btn_edit'])){
  $cid = $_POST['cid'];
  echo "<script>alert($cid)</script>";
}
?>
<div class="row">
    <div class="card col-md-12">
        <div class="card-title my-1  mx-auto">
            <h5 class = "mx-auto font-weight-bold text-dark text-uppercase my-3">Manage Employees</h5>
        </div>
        <div class="card-body">
        <?php addEmployee(); toggleStatus("users"); deleteItem(); updateEmployee();?>
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#employeeModal">
            <i class="fa fa-plus"></i>New Employee
        </button>
        </div>
        <div class="px-1">
            <div class="row">
                <div class="table-responsive">
                    <table id="myTable" class="display table" width="100%" >  
                        <thead class = "bg-dark text-white">  
                            <tr>  
                                <th class = "text-center">ENO</th>  
                                <th class = "text-center">First Name</th>  
                                <th class = "text-center">Last Name</th>  
                                <th class = "text-center">Phone</th>  
                                <th class = "text-center">Status</th>  
                                <th class = "text-center">User Type</th>  
                                <th class = "text-center">Actions</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                        <?php displayEmployees(); ?>
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
                <input type="email" name="email" class = "form-control" placeholder="Email" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required> 
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter email</div>
            </div>
            <div class="form-group">
                <label for="uname">Phone:</label>
                <input type="text" class="form-control" id="cName" placeholder="Enter phone" minlength = "10" maxlength = "10" pattern = "^[0-9-+\s()]{10}" name="phone" required>
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


<!-- edit pro -->
<div class="modal" data-keyboard="false" data-backdrop="static" id="viewEmployeeModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Employee Info</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="brand">First Name</label>
                            <input type="text" class="form-control py-3" id="fname" disabled>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="category">Last Name</label>
                            <input type="text" class="form-control py-3" id="lname" disabled>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="pl-lg-4">
                 <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="name">Email</label>
                        <input type="text" class="form-control py-3" id="email" disabled>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group focused">
                      <label class="form-control-label" for="name">Phone Number</label>
                      <input type="text" class="form-control py-3" id="phone" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group focused">
                        <label for="sp">Address</label>
                        <input type="text" class="form-control py-3" id="addres" disabled>
                        </div>
                        </div>
                    </div>
                    </div>
                <div class="pl-lg-4">
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group focused">
                        <label for="cp">User type</label>
                        <input type="text" class="form-control py-3" id="use" disabled>
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

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>
<!-- edit pro -->
<div class="modal" data-keyboard="false" data-backdrop="static" id="editEmployeeModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Update Employee</h4>
        <form method="post"><button  class="close text-white">&times;</button></form>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form 
              class="needs-validation" 
              method = "POST" 
              autcomplete = "off" 
              novalidate 
              >
              <input type="hidden" id="uid" name="id">
                <div class="pl-lg-4">
                 <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="first_name">First Name:</label>
                        <input type="text" class="form-control py-2" id="first_name" placeholder="Enter first name" pattern = "^[a-zA-Z ]{4,30}"  name="fName" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter first name</div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="last_name">Last Name:</label>
                        <input type="text" class="form-control py-2" id="last_name" placeholder="Enter last name" pattern = "^[a-zA-Z ]{3,30}"  name="lName" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter last name</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group focused">
                        <label for="uemail">Email:</label>
                        <input type="email" name="email" id="uemail" class = "form-control py-2" placeholder="Email" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  required> 
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter email</div>
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="form-group focused">
                        <label for="sPrice">Phone:</label>
                        <input type="text" class="form-control py-2" id="uphone" placeholder="Enter phone" pattern = "^[0-9-+\s()]{10}" name="phone" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter phone</div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group focused">
                            <label class="form-control-label" for="password">User Type:</label>
                            <select name="user_type" id="user_type"class = "form-control py-2">

                            </select>
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="form-group focused">
                            <label class="form-control-label" for="uaddress">Address</label>
                            <input type = "text" name="address" id="uaddress" class="form-control py-2" placeholder="Enter employee address" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Enter Address</div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <button type = "submit" class="btn btn-dark" >Cancel</button>
                    <button type="submit" class="btn btn-success py-2" name = "updateEmployee"><i class="fa fa-lock mx-2 "></i>Update Record</button>
                    <!-- <button type="reset" class="btn btn-dark" name = ""><i class="fa fa-time mx-2"></i>Reset</button> -->
                  </form>
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
                <button  class="btn btn-dark">Cancel</button>
                <!-- <button type = "button" class="btn btn-dark" data-dismiss="modal">Cancel</button> -->
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