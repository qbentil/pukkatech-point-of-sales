<div class="row">
    <div class="card col-md-12">
        <div class="card-title my-1  mx-auto">
            <h5 class = "mx-auto font-weight-bold text-info text-uppercase my-3">Manage Sales</h5>
        </div>
        <div class="card-body">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ordersModal">
            <i class="fa fa-plus"></i>New Order
        </button>
        </div>
        <div class="px-1">
            <div class="row">
                <div class="table-responsive">
                    <table id="myTable" class="display table" width="100%" >  
                        <thead class = "bg-info text-white">  
                            <tr>  
                                <th class = "text-center">E-NO</th>  
                                <th class = "text-center">First Name</th>  
                                <th class = "text-center">Last Name</th>  
                                <th class = "text-center">Phone</th>  
                                <th class = "text-center">Address</th>  
                                <th class = "text-center">Actions</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                        <?php displayEmployees(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?php require "./public_html/templates/modal.php" ?>
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