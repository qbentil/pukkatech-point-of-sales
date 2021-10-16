
<style>
  body {
    font-family: "Lato", sans-serif;
        }


        .main-head{
            height: 150px;
            background: #FFF;
        
        }

        .sidenav {
            height: 100%;
            background-color: #fff;
            overflow-x: hidden;
            padding-top: 20px;
        }


        .main {
            padding: 0px 10px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
        }

        @media screen and (max-width: 450px) {
            .login-form{
                margin-top: 10%;
            }

            .register-form{
                margin-top: 10%;
            }
        }

        @media screen and (min-width: 768px){
            .main{
                margin-left: 40%; 
            }

            .sidenav{
                width: 40%;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
            }

            .login-form{
                margin-top: 80%;
            }

            .register-form{
                margin-top: 20%;
            }
        }


        .login-main-text{
            margin-top: 20%;
            padding: 60px;
            color: #fff;
        }

        .login-main-text h2{
            font-weight: 300;
        }

        .btn-black{
            background: #100d93 !important;
            color: #fff;
        }
        .disabled{
            cursor: not-allowed;
        }
</style>
<div class="sidenav">
         <div class="login-main-text text-center">
            <!-- <h2>Application <br> <br> Login Page</h2> -->
            <img src="./public_html/images/pukka-login.png" alt="" style = "width: 350px" class="img-fluid">
            <!-- <p>Login from here to access.</p> -->
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
              <?php echo login() ?>
            <form class="login-box  needs-validation" method = "post" novalidate autocomplete = "off">
                    <div class="form-group">
                        <input type="text" name="email" class = "form-control py-4" placeholder="Email" pattern = "[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  required> 
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter Email</div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class = "form-control py-4" placeholder="Password"  required> 
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Enter Password</div>
                    </div>
                  <button type="submit" name = "btn_login" class="btn btn-black text-white"><i class="fa fa-sign-out mr-2"></i>Sign In</button>
                  <button type="submit" class="btn btn-secondary disabled" disabled><i class="fa fa-lock mr-2"></i>Register</button>
                  <!-- <button type="submit" class="btn btn-success disabled" onclick="window.open('Calculator:\/\/\/');" ><i class="fa fa-calculator mr-2"></i>Calculator</button> -->
               </form>
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