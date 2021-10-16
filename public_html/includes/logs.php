<div class="row">
    <div class="card col-md-12">
        <div class="card-title my-1  mx-auto">
            <h5 class = "mx-auto font-weight-bold text-dark text-uppercase my-3">Manage Logs</h5>
        </div>
        <div class="card-body">
        <!-- <button type="button" class="btn btn-dark" onclick="showModal('LOGS MODAL')">
            <i class="fa fa-plus"></i>New Brand
        </button> -->
        </div>
        <div class="px-1">
            <div class="row">
                <div class="table-responsive">
                    <table id="myTable" class="display table" width="100%" >  
                        <thead class = "bg-dark text-white"> 

                            <tr>  
                                <th class = "text-center">ENO</th>  
                                <th class = "text-center">Description</th>  
                                <th class = "text-center">Date</th>  
                                <th class = "text-center">Actions</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                        <?php displayLogs(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal" data-keyboard="false" data-backdrop="static" id="logsModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Log Info</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="row">
            <div class="col-lg-12">
            <div class="form-group focused">
            <label for="sPrice">Description:</label>
                <p class = "font-weight-bold " id="desc"></p>
            </div>
            </div>
            <div class="col-lg-12">
            <div class="form-group focused">
            <label for="sPrice">Date:</label>
                <p class = "font-weight-bold " id="date"></p>
            </div>
            </div>
        </div>
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