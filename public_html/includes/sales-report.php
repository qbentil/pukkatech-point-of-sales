<?php
    $year = isset($_GET['year'])? $_GET['year']: date("Y");
?>

<div class="row">
    <div class="card col-md-12">
        <div class="card-title my-1  mx-auto">
            <h5 class = "mx-auto font-weight-bold text-dark text-uppercase my-3">Sales Report for <?php echo $year ?></h5>
        </div>
        <div class="card-body">
            <button type="button" onclick="window.history.back()" class="btn btn-dark pull-left mr-2" data-toggle="modal">
                <i class="fa fa-arrow-circle-o-left mr-2"></i>Back
            </button>
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                --Select Year--
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php $cur_yr = date("Y"); ?>
                <a class="dropdown-item" href="./dashboard.php?reports&year=<?php echo $cur_yr ?>" disabled><?php echo $cur_yr ?></a>
                <a class="dropdown-item" href="./dashboard.php?reports&year=<?php echo ($cur_yr-1) ?>"><?php echo $cur_yr-1 ?></a>
                <a class="dropdown-item" href="./dashboard.php?reports&year=<?php echo ($cur_yr-2) ?>"><?php echo $cur_yr-2 ?></a>
                <a class="dropdown-item" href="./dashboard.php?reports&year=<?php echo ($cur_yr-3) ?>"><?php echo $cur_yr-3 ?></a>
                <a class="dropdown-item" href="./dashboard.php?reports&year=<?php echo ($cur_yr-4) ?>"><?php echo $cur_yr-4 ?></a>
                <!-- <a class="dropdown-item" href="./dashboard.php?reports&year=<?php echo ($cur_yr-5) ?>"><?php echo $cur_yr-5 ?></a> -->

            </div>
            </div>
        </div>
        <div class="px-1">
            <div class="row ">
                <div class="table-responsive">
                    <table id="reportTable" class="display table " width="100%">  
                        <thead class = "bg-dark text-white"> 

                            <tr>  
                                <!-- <th class = "text-center">ENO</th>   -->
                                <th class = "text-center">Month</th>  
                                <th class = "text-center">Sales (GH¢)</th>  
                                <th class = "text-center">Profit (GH¢)</th>  
                                <!-- <th class = "text-center"></th>   -->
                            </tr>  
                        </thead>  
                        <tbody>  
                            
                        <?php 
                        displayReports($year); 
                        ?>
                        
                        </tbody>
                        <tr>  
                            <!-- <th class = "text-center">ENO</th>   -->
                            <td class = "text-center"><pre>Totals</pre></td>  
                            <th class = "text-center" id="tsales">  </th>  
                            <th class = "text-center" id="tprofits">  </th>  
                            <!-- <th class = "text-center"></th>   -->
                        </tr>  
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div id="chart">

                    </div>
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