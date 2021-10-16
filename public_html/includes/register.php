
<div class="container">
    <div class="row justify-content-center align-items-center my-2">
        <div class="col-md-6">
        <?php userSignup(); ?>
            <div class="card login-card m-auto">
                <form class="login-box  text-center needs-validation" method = "POST" novalidate autocomplete = "off" oninput='confirm_password.setCustomValidity(confirm_password.value != password.value ? "Passwords do not match." : "")'>
                    <!-- <h1>Login</h1> -->
                    <div class="login-img">
                        <img src="./public_html/images/signin.png" alt="Logo" class="img-fluid">
                    </div>
                    <p class="text-muted"> Fill out form completely to sign up</p> 
                    <div class="form-group">
                        <input type="text" name="fName" class = "form-control py-4" placeholder="Full Name" minlength = "4" pattern = "^[A-Za-z ]{4,25}" required> 
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class = "form-control py-4" placeholder="Email" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required> 
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter a valid email address</div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id = "password" class = "form-control py-4" placeholder="Password" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,25}" required> 
                        <small class="text-success">at least, one lower case, 1 uppercase, 1 number</small>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm_password" id = "confirm_password" class = "form-control py-4" placeholder="Confirm Password"  required> 
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Passwords do not match</div>
                        <small class="text-success" id = "err_c"></small>
                    </div>
                    <div class="form-group">
                        <select name="accountType" id="accountType" class="form-control py-4">
                            <option value="default"  disabled>Select account type</option>
                            <option value="admin">Admin</option>
                            <option value="other">Other</option>
                        </select>
                        <!-- <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Passwords do not match</div> -->
                    </div>
                    <a class="forgot text-muted" href="#">Forgot password?</a><br>
                    <button class = "btn rounded-pill  btn-success my-1" name = "sign_up"><i class="fa fa-sign-in mx-2"></i>Sign In</button>
                    <div class="col-md-12">
                    <a class="forgot text-muted" href="?">Login?</a>
                        <ul class="social-network social-circle my-3">
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </form>
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
