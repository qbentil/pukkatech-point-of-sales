<?php
    if(isset($_GET['delete_item'])){
        $tb = $_GET['tb'];
        if($tb == "users"){
          $prev = "employees";
        }
        $obj = new DBoperation();
        $user = $obj->getUser($_SESSION['userid']);
        $userPassword = $user['password'];

?>
        <div class="" id="brandModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-danger text-white">
                    <h4 class="modal-title text-center mx-auto font-weight-bold">Confirm Delete</h4>
                    <!-- <button type="button" class="close text-white" data-dismiss="modal">&times;</button> -->
                </div>
                    <?php echo deleteItem($tb, base64_decode($_GET['id'])) ?>
                <!-- Modal body -->
                    <div class="modal-body">
                    <div class="form-group">
                    <label for="uname">
                      <?php 
                        $title = "";
                        switch ($tb) {
                          case 'users':
                            $title = "Employee Name";
                            break;
                          case 'brands':
                            $title = "Brand Name";
                            break;
                          case 'categories':
                            $title = "Cateory Name";
                            break;
                          case 'products':
                            $title = "Item Name";
                            break;
                          
                          default:
                            $title = "Invoice Number:";
                            break;
                        }
                        echo $title;
                      ?></label>
                    <input type="text" class="form-control" id="bName" value = "<?php echo $_GET['name'] ?>"pattern = "^[a-zA-Z ]{4,30}" disabled required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <form method = "post" class="needs-validation" novalidate autocomplete = "off"
                    oninput='password.setCustomValidity(password.value != userPassword.value ? "Inccorect Password" : "")'>
                        <div class="form-group">
                            <label for="uname">Enter your password to confirm delete:</label>
                            <input type="hidden" class="form-control" id="userPassword" value = "<?php echo $userPassword; ?>" name="userPassword" required>
                            <input type="password" class="form-control" id="password"  name="password" required>
                            <!-- <div class="valid-feedback">Valid.</div> -->
                            <div class="invalid-feedback">Inccorect Password.</div>
                        </div>
                        <button type = "button"onClick = "window.history.back()" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                        <!-- <a href = "?manage_<?php //echo isset($prev)? $prev:$tb ?>" type="button" class="btn btn-dark" data-dismiss="modal">Cancel</a> -->
                        <button type="submit" class="btn btn-danger" name = "btn_delete">Delete</button>
                        </form>

                </div>

                </div>
            </div>
            </div>

             <?php
    }
    ?>

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
    