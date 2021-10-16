
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
<!-- orders -->
<div class="modal" data-keyboard="false" data-backdrop="static" id="ordersModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Adding New Order</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" class="needs-validation" novalidate autocomplete = "off">
            <div class="form-group">
                <label for="uname">Username:</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Check this checkbox to continue.</div>
                </label>
            </div>
            <button type="submit" class="btn btn-info"><i class="fa fa-plus-circle mx-2"></i>Add Order</button>
            </form>

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>
<!-- products -->
<div class="modal" data-keyboard="false" data-backdrop="static" id="productsModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-danger text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Adding New Product</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" class="needs-validation" method="POST" novalidate autocomplete = "off">
            <div class="form-group">
                <label for="pname">Item Name:</label>
                <input type="text" class="form-control" id="pname" placeholder="Enter Item Name" pattern = "^[a-zA-Z0-9 ]{4,30}" name="pname" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter category name</div>
            </div>
            <div class="form-group">
                <label for="pcategory">Parent Category</label>
                <select class="form-control" id="pcategory" name="pcategory" required>
                  <?php getPCategories("categories"); ?>
                </select>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Please select a parent category</div>
            </div>
            <div class="form-group">
                <label for="scategory">Sub-category</label>
                <select class="form-control" id="scategory" name="scategory" required>
                  <?php getPCategories("subcategories"); ?>
                </select>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Please select a sub category</div>
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <select class="form-control" id="brand" name="brand" required>
                  <?php getBrands(); ?>
                </select>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Please select a brand</div>
            </div>
            <div class="form-group">
                <label for="price">Price (GHS):</label>
                <input type="text" class="form-control" id="price" placeholder="Enter price"  pattern = "[0-9]+([\.,][0-9]+)?" name="price" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter price (Decimal)</div>
            </div>
            <div class="form-group">
                <label for="stock">No. in Stock:</label>
                <input type="text" class="form-control" id="stock" placeholder="Enter stock" pattern = "[0-9]{1,}" name="stock" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter stock</div>
            </div>
            <button type="submit" class="btn btn-danger" name = "btn_addPro"><i class="fa fa-plus-circle mx-2"></i>Add Product</button>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- brands -->
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

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>
<div class="modal" data-keyboard="false" data-backdrop="static" id="subCategoryModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-dark text-white">
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
            <div class="form-group">
                <label for="pwd">Parent Category</label>
                <select class="form-control" id="pCategory" name="pCategory" required>
                  <?php getPCategories("categories"); ?>
                </select>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Please select a parent category</div>
            </div>
            <button type="submit" class="btn btn-dark" name = "btn_addSubcategory"><i class="fa fa-plus-circle mx-2"></i>Add sub-category</button>
            </form>

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>
