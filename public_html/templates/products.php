<div class="px-1">
    <div class="row">
        <div class="table-responsive">
            <table id="myTable" class="display table" width="100%" >  
                <thead class = "bg-dark text-white">  
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
<div class="modal" data-keyboard="false" data-backdrop="static" id="viewProduct">
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
