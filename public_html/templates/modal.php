<?php   // include_once "./public_html/includes/actions.php"; ?>
<!-- brands -->
<div class="modal" data-keyboard="false" data-backdrop="static" id="brandModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Confirm Delete</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method = "post" class="needs-validation" novalidate autocomplete = "off">
            <div class="form-group">
                <label for="uname">Are you sure to delete brand?:</label>
                <input type="hiden" class="form-control" id="bName" value = "" name="name" required>
                <!-- <div class="valid-feedback">Valid.</div> -->
                <!-- <div class="invalid-feedback">Please fill out this field.</div> -->
            </div>
            <button type="button" class="close btn btn-primary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger" name = "btn_Delete">Delete</button>
            </form>

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
<div class="modal" data-keyboard="false" data-backdrop="static" id="employeeModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Adding Employee</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method = "POST" class="needs-validation" novalidate autocomplete = "off">
            <div class="form-group">
                <label for="uname">First Name:</label>
                <input type="text" class="form-control" id="cName" placeholder="Enter first name" pattern = "^[a-zA-Z ]{4,30}" name="fName" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter first name</div>
            </div>
            <div class="form-group">
                <label for="uname">Last Name:</label>
                <input type="text" class="form-control" id="cName" placeholder="Enter last name" pattern = "^[a-zA-Z ]{4,30}" name="lName" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter last name</div>
            </div>
            <div class="form-group">
                <label for="uname">Email:</label>
                <input type="email" name="email" class = "form-control py-4" placeholder="Email" pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required> 
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter email</div>
            </div>
            <div class="form-group">
                <label for="uname">Phone:</label>
                <input type="email" class="form-control" id="cName" placeholder="Enter phone" pattern = "^[0-9-+\s()]{10}" name="phone" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter phone</div>
            </div>
            <div class="form-group">
                <label for="uname">Address:</label>
                <textarea name="address" id="address" class="form-control" placeholder="Enter employee address" required></textarea>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter Address</div>
            </div>
            <div class="form-group">
                <label for="uname">User Type:</label>
                <select name="user" id="user" class="form-control">
                  <option value="employee">Employee</option>
                  <option value="employee">Admin</option>
                </select>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter phone</div>
            </div>
            <button type="submit" class="btn btn-success" name = "btn_addEmployee"><i class="fa fa-plus-circle mx-2"></i>Add Employee</button>
            </form>

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>


<!-- UPDATES -->
<div class="modal" data-keyboard="false" data-backdrop="static" id="editCategoryModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success text-white">
        <h4 class="modal-title text-center mx-auto font-weight-bold">Update Category</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method = "POST" class="needs-validation" novalidate autocomplete = "off">
            <div class="form-group">
                <label for="uname">Category Name:</label>
                <input type="text" class="form-control" id="cName" value = "<?php echo getCategory(); ?>" placeholder="Enter Category name" pattern = "^[a-zA-Z ]{4,30}" name="cName" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Enter category name</div>
            </div>
            <button type="submit" class="btn btn-success" name = "btn_editCategory"><i class="fa fa-refresh mx-2"></i>Update Category</button>
            </form>

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>