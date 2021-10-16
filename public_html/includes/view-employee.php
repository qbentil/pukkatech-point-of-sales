<?php 
  $obj = new DBoperation();
  $row = $obj->getItemById("users", base64_decode($_GET['id']));
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
                <h6 class="heading-small text-muted mb-4"> Employee Details</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label font" for="password">First Name:</label>
                            <p class = "font-weight-bold text-uppercase"><?php echo $row['first_name'] ?></p>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="confirm_password">Last Name:</label>
                            <p class = "font-weight-bold text-uppercase"><?php echo $row['last_name'] ?></p>
                        </div>
                        </div>
                    </div>
                    </div>
                    <hr class="my-4">
                    <div class="pl-lg-4">
                 <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Email:</label>
                        <p class = "font-weight-bold "><?php echo $row['email'] ?></p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Phone:</label>
                        <p class = "font-weight-bold text-uppercase"><?php echo $row['phone'] ?></p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group focused">
                        <label for="uname">Address:</label>
                            <p class = "font-weight-bold "><?php echo $row['address'] ?></p>
                        </div>
                        </div>
                  </div>
                </div>
                <hr class="my-4">
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-4">
                        <div class="form-group focused">
                        <label for="sPrice">User Type:</label>
                            <p class = "font-weight-bold "><?php echo $row['user_type'] ?></p>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group focused">
                        <label for="uname">Status:</label>
                            <p class = "font-weight-bold "><?php echo $row['status'] == 1? "Active": "Disabled" ?></p>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="form-group focused">
                        <label for="sPrice">Date added:</label>
                            <p class = "font-weight-bold text-uppercase"><?php echo $row['date_added'] ?></p>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                <div align="right" class = "m-3">
                <a href = "?manage_employees" class="btn btn-dark py-2" name = "cancel"><i class="fa fa-times mx-2"></i>Back</a>
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