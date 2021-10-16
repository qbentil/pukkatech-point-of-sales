<div class="row">
    <div class="card col-md-12">
        <div class="card-title my-1  mx-auto">
            <h5 class = "mx-auto font-weight-bold text-dark text-uppercase my-3">View Categories</h5>
        </div>
        <div class="px-1">
            <div class="row">
                <div class="table-responsive">
                    <table id="myTable" class="display table" width="100%" >  
                        <thead class = "bg-dark text-white">  
                            <tr>  
                                <th class = "text-center">ENO</th>  
                                <th class = "text-center">Category Name</th>  
                                <th class = "text-center">Status</th>  
                                <!-- <th class = "text-center">Actions</th>   -->
                            </tr>  
                        </thead>  
                        <tbody>  
                        <?php e_displayCategories(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- The Modal -->
<div class="modal" data-keyboard="false" data-backdrop="static" id="categoryModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Adding Category</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method = "POST" class="needs-validation" novalidate autocomplete = "off">
            <div class="form-group">
                <label for="uname">Category Name:</label>
                <input type="text" class="form-control" id="cName" placeholder="Enter Category name" pattern = "^[a-zA-Z ]{4,30}" name="cName" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter category name</div>
            </div>
            <button type="submit" class="btn btn-success" name = "btn_addCategory"><i class="fa fa-plus-circle mx-2"></i>Add Category</button>
            </form>

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

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