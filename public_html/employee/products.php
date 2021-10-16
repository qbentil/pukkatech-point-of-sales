<div class="row">
    <div class="card col-md-12">
        <div class="card-title my-1  mx-auto">
            <h5 class = "mx-auto font-weight-bold text-dark text-uppercase my-3"><?php echo $_GET['product']; $cat = $_GET['cat'] ?></h5>
        </div>
        <div class="card-body">
        <button type="button" onclick="window.history.back()" class="btn btn-dark pull-left" data-toggle="modal">
            <i class="fa fa-arrow-circle-o-left mr-2"></i>Back
        </button>
        </div>
        <div class="px-1">
            <div class="row">
                <div class="table-responsive">
                <?php addProduct(); deleteItem(); updateProduct();?>
                    <table id="myTable" class="display table" width="100%" >  
                        <thead class = "bg-dark text-white">  
                            <tr>  
                                <th class = "text-center">E-NO</th>  
                                <?php 
                                    $odd = "";
                                    if($cat == 2 || $cat ==3)
                                    {
                                        $odd = "Chasis Number";
                                    }
                                    elseif($cat == 4 )
                                    {
                                        $odd = "Part Number";
                                    }
                                    else{
                                        $odd = "Item Name";
                                    }
                                ?>
                                <th class = "text-center"><?php echo $odd; ?></th>  
                                <th class = "text-center">Selling Price (GHC)</th>  
                                <th class = "text-center">Cost Price (GHC)</th>  
                                <th class = "text-center">No. in Stock</th>  
                                <th class = "text-center">Actions</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                        <?php e_displayProducts($_GET['product'], $_GET['cat']); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal" data-keyboard="false" data-backdrop="static" id="viewProduct">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">View Product</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
      </div>

    </div>
  </div>
</div>
<!-- edit pro -->
<div class="modal" data-keyboard="false" data-backdrop="static" id="viewProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Product Info</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method = "post" class="needs-validation" novalidate autocomplete = "off">
        <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group focused">
                            <label class="form-control-label" for="brand">Manufacturer</label>
                            <input type="text" class="form-control py-3" id="b" disabled>
                        </div>
                        </div>
                        <div class="col-lg-12">
                        <div class="form-group focused">
                            <label class="form-control-label" for="category">Category</label>
                            <input type="text" class="form-control py-3" id="cate" disabled>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="pl-lg-4">
                 <?php //changePassword(); ?>
                 <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="name">Item Name/Model</label>
                        <input type="text" class="form-control py-3" id="pname" disabled>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group focused">
                      <label class="form-control-label" for="name">Number in Stock:</label>
                      <input type="text" class="form-control py-3" id="stock" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                        <label for="cp">Cost Price:</label>
                        <input type="text" class="form-control py-3" id="cost" disabled>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                        <label for="sp">Selling Price:</label>
                        <input type="text" class="form-control py-3" id="sell" disabled>
                        </div>
                        </div>
                    </div>
                    </div>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group focused">
                        <label for="cp">Date Added:</label>
                        <input type="text" class="form-control py-3" id="date" disabled>
                        </div>
                        </div>
                    </div>
                    </div>
            <!-- <button type="submit" class="btn btn-dark" name = "btn_editProduct"><i class="fa fa-plus-circle mx-2"></i>Edit Product</button> -->
            <button class="btn btn-dark pull-right" data-dismiss="modal"><i class="fa fa-times-circle-o mx-2"></i>Close</button>
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