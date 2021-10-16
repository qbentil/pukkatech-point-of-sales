<div class="row">
    <div class="card col-md-12">
        <div class="card-title my-1  mx-auto">
            <h5 class = "mx-auto font-weight-bold text-danger text-uppercase my-3">Manage Products</h5>
        </div>
        <div class="card-body">
        <?php addProduct(); ?>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#productsModal">
            <i class="fa fa-plus"></i>New Product
        </button>
        </div>
        <div class="px-1">
          <div class="row">
                <div class="table-responsive">
                    <table id="myTable" class="display table" width="100%" >  
                        <thead class = "bg-danger text-white">  
                            <tr>  
                                <th class = "text-center">ENO</th>  
                                <!-- <th>Parent Category</th>  
                                <th>Subcategory</th>  
                                <th>Brand</th>   -->
                                <th>Item Name</th>  
                                <th>Price (GHC)</th>  
                                <th>Stock</th>  
                                <th>Status</th>  
                                <th class = "text-center">Actions</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                        <?php displayProducts(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?php require "./public_html/templates/modals.php" ?>
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