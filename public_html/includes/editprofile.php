<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<?php
    $obj = new DBoperation();
    $userId = $_SESSION['userid'];
    // $currentUser = $obj->getUser($userId);
    $rows = $obj->getUserData("users", $userId);
    foreach ($rows as $row) {
    
?>
  <div class="main-content">
    <!-- Page content -->
        <div class="col-xl-12 order-xl-1">
          <div class="card shadow">
            <div class="card-body">
            <?php editProfile(); ?>
              <form method = "Post" autcomplete = "off" class = "needs-validation" novalidate>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" name="fName" class = "form-control py-4" placeholder="First Name" minlength = "4" pattern = "^[A-Za-z ]{4,25}" value = "<?php echo $row['first_name'] ?>" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter your first name</div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text"name="lName" class = "form-control py-4" placeholder="Last Name" minlength = "4" pattern = "^[A-Za-z ]{4,25}" value = "<?php echo $row['last_name'] ?>" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter your last name</div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" id="input-email" name = "email" class="form-control form-control-alternative py-4" placeholder="email" value="<?php echo $row['email'] ?>" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter a valid email address</div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-phone">Phone</label>
                        <input type="phone" name = "phone" id="input-phone" class="form-control form-control-alternative py-4" placeholder="Phone number" minlength = "10" maxlength = "10" value = "<?php echo $row['phone'] ?>" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter a valid phone number</div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative py-4" name = "address" placeholder="Home Address" value="<?php echo $row['address'] ?>" type="text" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter your address</div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Security</h6>
                <div class="col-lg-4">
                      <div class="form-group">
                      <a href = "?change_password" type="submit" class="btn btn-danger py-2" name = "change_password"><i class="fa fa-lock mx-2"></i>Change Password</a>
                      </div>
                </div>
                <div class="">
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                      <button type="submit" class="btn btn-success btn-block  py-2" name = "update_profile"><i class="fa fa-refresh mx-2"></i>Update Profile</button>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                      <button type="reset" class="btn btn-secondary btn-block  py-2" name = ""><i class="fa fa-times mx-2"></i>Reset</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div align="right" class = "mx-5">
                <button type="submit" class="btn btn-danger" name = "update_profile"><i class="fa fa-refreshmx-2"></i>Update Profile</button>
                <button type="reset" class="btn btn-dark" name = ""><i class="fa fa-time mx-2"></i>Reset</button>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <script>
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