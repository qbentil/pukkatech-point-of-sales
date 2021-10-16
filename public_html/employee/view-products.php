<style>
    .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 2rem 1rem;
    background-color: #fff;
    height: 14rem;
    border-radius: 5px;
    transition: .3s linear all;
  }
  /* .card-counter:hover{
    box-shadow: 0 0.4rem 1.4rem 0 rgba(0, 0, 255, 0.5);
  } */

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  
  .card-counter.dark{
    background-color: #191919;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 9em;
    opacity: 0.3;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 2.5rem;
    font-weight: bold;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.8;
    display: block;
    font-size: 2rem;
  }
</style>

<div class="row">
  <div class="card-body">
  <?php addProduct(); ?>
  </div>
</div>
<div class="row">
    <div class="card-body pull-right">
      <a href = "?all_products" class="btn btn-success pull-left">
          <i class="fa fa-eye"></i>View all Products
      </a>
    </div>
</div>
<div class="row">
  <?php 
    if(isset($_GET['view_products']))
    {
      $obj = new DBoperation();
      $rows = $obj->getAllRecord("categories");
      $bg = array("primary", "secondary", "success", "dark", "info", "danger");
      $i = 0;
      foreach ($rows as $row) {
        ?>
      <div class="col-md-6" title = "">
        <a href="?filterproducts&category=<?php echo $row['category_name'] ?>&id=<?php echo base64_encode($row['id']) ?>">
          <div class="card-counter <?php echo $bg[$i]; ?>">
          <i class="fa fa-list-alt" aria-hidden="true"></i>
            <span class="count-numbers"><?php echo getProCount($row['category_name']) ?></span>
            <span class="count-name"><?php echo $row['category_name'] ?></span>
          </div>
        </a>
      </div>
        <?php
          $i++;
          if($i >= count($bg))
          {
            $i = 0;
          }
      }
    }
  ?>

  </div>



<div class="modal" data-keyboard="false" data-backdrop="static" id="productsModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Adding Product</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method = "POST" class="needs-validation" novalidate autocomplete = "off">
            <div class="form-group">
                <label for="brand">Manufacturer:</label>
                <select name="brand" id="brand" class="form-control py-2">
                  <!-- <option value='employee'>--</option> -->
                  <?php getBrands() ?>
                </select>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Select brand</div>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" class="form-control py-2">
                <?php getCategories() ?>
                </select>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Select Category</div>
            </div>
            <div class="form-group">
                <label for="pName">Name / Model:</label>
                <input type="text" class="form-control py-2" id="pName" placeholder="Enter Item Name/model" pattern = "^{4,250}" name="pName" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter name / model</div>
            </div>
            <div class="form-group">
                <label for="stock">Quantity</label>
                <input type="stock" name="stock" class = "form-control py-2" placeholder="Enter number in stock"  required> 
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter quantity</div>
            </div>
            <div class="form-group">
                <label for="uname">Cost Price:</label>
                <input type="text" name="cPrice" class = "form-control py-2" placeholder="Cost Price"  required> 
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter cost price</div>
            </div>
            <div class="form-group">
                <label for="sPrice">Selling Price:</label>
                <input type="text" class="form-control py-2" id="sPrice" placeholder="Selling Price"  name="sPrice" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter selling price</div>
            </div>
            <button type="submit" class="btn btn-primary" name = "btn_addProduct"><i class="fa fa-plus-circle mx-2"></i>Add Product</button>
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