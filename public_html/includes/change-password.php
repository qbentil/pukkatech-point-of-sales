<?php 
  $obj = new DBoperation();
  $userId = $_SESSION['userid'];
  $currentUser = $obj->getUser($userId);
  // echo base64_decode($_GET['id']);
  $currentPassword = $currentUser['password']
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
              oninput='input_current_password.setCustomValidity(input_current_password.value != current_password.value ? "Inccorect Password" : ""), confirm_password.setCustomValidity(confirm_password.value != new_password.value ? "Passwords do not match" : "")'
              >
                <h6 class="heading-small text-muted mb-4">Change Password</h6>
                <div class="pl-lg-4">
                <?php changePassword(); ?>
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-current-password">Current Password</label>
                        <input type="hidden" name = "current_password" value = "<?php echo $currentPassword; ?>">
                        <input type="password" id="input_current_password" name = "input_current_password" class="form-control form-control-alternative py-4"  placeholder="Current Password" required>
                        <div class="invalid-feedback">Inccorect Password</div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="password">Choose New Password</label>
                        <input type="password" id="new_password" name = "new_password" class="form-control form-control-alternative py-4" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,25}"  placeholder="new password" required>
                        <small class="invalid-feedback">at least, one lower case, 1 uppercase, 1 number</small>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="confirm_password">Re-type Password</label>
                        <input type="password" id="confirm_password" name = "confirm_password" class="form-control form-control-alternative py-4"  placeholder="re-type password" required>
                        <div class="invalid-feedback">Passwords do not match</div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                <div align="right" class = "m-3">
                <a href = "?manage_edit_profile" class="btn btn-dark py-2" name = "cancel"><i class="fa fa-times mx-2"></i>Cancel</a>
                <button type="submit" class="btn btn-danger py-2" name = "change_password"><i class="fa fa-lock mx-2 "></i>Change Password</button>
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