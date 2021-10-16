<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<style>
    .imagePreview {
        width: 100%;
        height: 250px;
        background-position: center center;
        /* background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg); */
        background-color:#fff;
            background-size: cover;
        background-repeat:no-repeat;
            display: inline-block;
            border-radius:3px;
        box-shadow:0px -3px 6px 2px rgba(0,0,0,0.1);
    }
    .btn-primary
    {
    display:block;
    border-radius:0px;
    box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
    margin-top:-5px;
    width: 100%;
    }
    .imgUp
    {
    /* margin-bottom:15px; */
    width: 65%;
    }
    .del
    {
    position:absolute;
    top:0px;
    right:15px;
    width:30px;
    height:30px;
    text-align:center;
    line-height:30px;
    background-color:rgba(255,255,255,0.6);
    cursor:pointer;
    }
    .file {
  visibility: hidden;
  position: absolute;
}
</style>
<?php
    $obj = new DBoperation();
    $userId = $_SESSION['userid'];
    // $currentUser = $obj->getUser($userId);
    $rows = $obj->getShopData();
    foreach ($rows as $row) {
    
?>
  <div class="main-content">
    <!-- Page content -->
        <div class="col-xl-12 order-xl-1">
          <div class="card shadow">
            <div class="card-body">
            <?php //editProfile(); ?>
              <form method = "Post" autcomplete = "off" class = "needs-validation" novalidate>
                  <div class="row">
                    <div class="col-md-4">
                    <h6 class="heading-small text-muted mb-4">Logo</h6>
                      <div class="pl-lg-4">
                          <div class="row">
                          <div class="">
                        <img src="" id="preview" class="img-thumbnail imagePreview" alt="Logo">
                      </div>
                        <div class="">
                        <!-- <div id="msg"></div> -->
                        <form method="post" id="image-form">
                          <!-- <input type="file" name="logo" class="file" accept="image/png image/jpg"> -->
                          <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                            <label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;"></label>
                          </div>
                        </form>
                      </div>
                              <!-- col-2 -->
                              <!-- <i class="fa fa-plus imgAdd"></i> -->
                          </div>
                      </div>
                      <hr>
                    </div>
                    <div class="col-md-8">
                      <h6 class="heading-small text-muted mb-4">Shop information</h6>
                      <div class="pl-lg-4">
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group focused">
                              <label class="form-control-label" for="input-first-name">Shop Name</label>
                              <input type="text" name="fName" class = "form-control py-4" placeholder="First Name" minlength = "4" pattern = "^[A-Za-z ]{4,25}" value = "<?php echo $row['name'] ?>" required>
                              <div class="valid-feedback"></div>
                              <div class="invalid-feedback">Enter your shop name</div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group focused">
                              <label class="form-control-label" for="input-last-name">Package</label>
                              <input type="text"name="lName" class = "form-control py-4"  value = "<?php echo $row['package'] ?>" disabled>
                              <div class="valid-feedback"></div>
                              <!-- <div class="invalid-feedback">Enter your last name</div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- <hr class="my-4"> -->
                      <!-- Address -->
                      <!-- <h6 class="heading-small text-muted mb-4">Contact information</h6> -->
                      <div class="pl-lg-4">
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-phone">Phone</label>
                              <input type="phone" name = "phone" id="input-phone" class="form-control form-control-alternative py-4" placeholder="Phone number" minlength = "10" maxlength = "10" value = "<?php echo $row['phone'] ?>" required>
                              <div class="valid-feedback"></div>
                              <div class="invalid-feedback">Enter a valid phone number</div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                          <div class="form-group focused">
                              <label class="form-control-label" for="input-address">Address</label>
                              <input id="input-address" class="form-control form-control-alternative py-4" name = "address" placeholder="Home Address" value="<?php echo $row['address'] ?>" type="text" required>
                              <div class="valid-feedback"></div>
                              <div class="invalid-feedback">Enter your address</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="">
                      <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group focused">
                            <button type="submit" class="btn btn-success btn-block  py-2" name = "update_profile"><i class="fa fa-refresh mx-2"></i>Save Changes</button>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group focused">
                            <button type="reset" class="btn btn-secondary btn-block  py-2" name = ""><i class="fa fa-times mx-2"></i>Reset</button>
                            </div>
                          </div>
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
