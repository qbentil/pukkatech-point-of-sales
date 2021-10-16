<div class="row">
    <div class="card col-md-12">
        <div class="card-title my-1  mx-auto">
            <h5 class = "mx-auto font-weight-bold text-dark text-uppercase my-3">Manage Brands</h5>
        </div>
        <div class="card-body">
        <?php addBrand(); toggleStatus("brands"); updateBrand(); deleteItem(); ?>
        <button type="button" class="btn btn-dark" data-toggle='modal' data-target='#brandModal'>
            <i class="fa fa-plus"></i>New Brand
        </button>
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
                                <th class = "text-center">Actions</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                        <?php displayBrands(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal" data-keyboard="false" data-backdrop="static" id="brandModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Adding New Brand</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method = "post" class="needs-validation" novalidate autocomplete = "off">
            <div class="form-group">
                <label for="uname">Brand Name:</label>
                <input type="text" class="form-control" id="bName" placeholder="Enter brand name" name="bName"pattern = "^[a-zA-Z ]{4,30}" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <button type="submit" class="btn btn-primary" name = "btn_addBrand"><i class="fa fa-plus-circle mx-2"></i>Add Brand</button>
            </form>

      </div>

    </div>
  </div>
</div>


<!-- edit category -->
<div class="modal" data-keyboard="false" data-backdrop="static" id="editCate">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Updating  <span class="e"></span></h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method = "post" class="needs-validation" novalidate autocomplete = "off">
            <div class="form-group">
                <label for="category_name"><span class="e"></span> Name:</label>
                <input type="text" class="form-control" id="category_name" placeholder="Enter category name" name="bName"pattern = "^[a-zA-Z ]{4,30}" required>
                <input type="hidden" class="form-control" id="category_id"  name="cid" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <button type="submit" class="btn btn-dark" name = "btn_editBrand"><i class="fa fa-plus-circle mx-2"></i>Edit Brand</button>
            <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times mx-2"></i>Cancel</button>
            </form>

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>

<!-- delete cateogry -->
<div class="modal" data-keyboard="false" data-backdrop="static" id="delCat">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-danger text-white">
            <h4 class="modal-title text-center mx-auto font-weight-bold">Confirm Delete</h4>
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
            <div class="modal-body">
            <div class="form-group">
            <h2 class="">Do you want to delete Brand?</h2>
            <div><small class="text-danger">This action cannot be undone.</small></div>
            </div>
            <form method = "post" >
                <input type="hidden" class="form-control" id="table" name = "tb"  required>
                <input type="hidden" class="form-control" id="cid" name = "id"   required>
              <div class="pull-right">
                <button type = "button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" name = "btn_delete">Delete</button>
              </div>
            </form>

        </div>

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