<?php 
  $obj = new DBoperation();
  $row = $obj->getItemById("users", base64_decode($_GET['id']));
  $priviledge = $_SESSION['user_type'] != "Admin"? "disabled": "";
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
                <h6 class="heading-small text-muted mb-4">Update Employee</h6>
                <hr class="my-4">
                <div class="pl-lg-4">
                 <?php updateEmployee(); ?>
                 <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">First Name:</label>
                        <input type="text" class="form-control py-2" id="cName" placeholder="Enter first name" pattern = "^[a-zA-Z ]{4,30}" value = "<?php echo $row['first_name'] ?>" name="fName" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter first name</div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Last Name:</label>
                        <input type="text" class="form-control py-2" id="cName" placeholder="Enter last name" pattern = "^[a-zA-Z ]{3,30}"  value = "<?php echo $row['last_name'] ?>" name="lName" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter last name</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                        <label for="uname">Email:</label>
                        <input type="email" name="email" class = "form-control py-2" placeholder="Email" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value = "<?php echo $row['email'] ?>" required> 
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter email</div>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                        <label for="sPrice">Phone:</label>
                        <input type="text" class="form-control py-2" id="cName" placeholder="Enter phone" pattern = "^[0-9-+\s()]{10}" value = "<?php echo $row['phone'] ?>" name="phone" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter phone</div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="password">User Type:</label>
                            <select name="user_type" id="user_type" <?php echo $priviledge; ?> class = "form-control py-2">
                            <?php 
                            echo $row['user_type'] == "Admin"? 
                            "<option value = '".$row['user_type']."'>".$row['user_type']."</option>
                            <option value = 'Employee'>Employee</option>":
                            "<option value = '".$row['user_type']."'>".$row['user_type']."</option>
                            <option value = 'Admin'>Admin</option>";
                            ?>
                            </select>
                          <!-- <input type="text" class="form-control py-2" id="cName" placeholder="Enter phone" value = "<?php echo $row['user_type'] ?>" name="user_type" required readonly> -->
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="confirm_password">Address</label>
                            <input type = "text" name="address" id="address" class="form-control py-2" placeholder="Enter employee address" value = "<?php echo $row['address']  ?>" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Enter Address</div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div align="right" class = "m-3">
                <a href = "?manage_employees" class="btn btn-dark py-2" name = "cancel"><i class="fa fa-times mx-2"></i>Cancel</a>
                <button type="submit" class="btn btn-success py-2" name = "updateEmployee"><i class="fa fa-lock mx-2 "></i>Update Record</button>
                <!-- <button type="reset" class="btn btn-dark" name = ""><i class="fa fa-time mx-2"></i>Reset</button> -->
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