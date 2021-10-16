<?php 
  $obj = new DBoperation();
  $row = $obj->getItemById("brands", base64_decode($_GET['id']));
?>

<div class="" id="brandModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php updateBrand(); ?>
      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Updating  Brand</h4>
        <!-- <button type="button" class="close text-white" data-dismiss="modal">&times;</button> -->
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method = "post" class="needs-validation" novalidate autocomplete = "off">
            <div class="form-group">
                <label for="uname">Brand Name:</label>
                <input type="text" class="form-control" id="bName" placeholder="Enter brand name" name="bName"pattern = "^[a-zA-Z ]{4,30}" value = "<?php echo $row['brand_name']; ?>" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <button type="submit" class="btn btn-dark" name = "btn_editBrand"><i class="fa fa-plus-circle mx-2"></i>Edit Brand</button>
            <a href = "?manage_brands" class="btn btn-danger" name = "btn_editBrand"><i class="fa fa-times mx-2"></i>Cancel</a>
            </form>

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

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