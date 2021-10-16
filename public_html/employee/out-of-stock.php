<div class="row">
    <div class="card col-md-12">
        <div class="card-title my-1  mx-auto">
            <h5 class = "mx-auto font-weight-bold text-dark text-uppercase my-3">Out Of Stock Products</h5>
        </div>
        <div class="card-body">
        </div>
        <div class="px-1">
            <div class="row">
                <div class="table-responsive">
                <?php addProduct(); ?>
                    <table id="myTable" class="display table" width="100%" >  
                        <thead class = "bg-dark text-white">  
                            <tr>  
                                <th class = "text-center">E-NO</th>  
                                <th class = "text-center">Category</th>  
                                <th class = "text-center">Item Name</th>  
                                <th class = "text-center">Selling Price (GHC)</th>  
                                <th class = "text-center">Cost Price (GHC)</th>  
                                <th class = "text-center">Actions</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                        <?php displayProducts_o(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>
<?php //require "./public_html/templates/modals.php" ?>
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