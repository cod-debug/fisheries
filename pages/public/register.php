
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    
  <form method="POST" id="registerForm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body row">
        <div class="col-sm-12">
            <h3>Personal Information</h3>
        </div>
        <div class="form-group col-md-12">
            <label class="sr-only" for="studentId">Student ID Number</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><span><i class="fa fa-address-card"></i></span></div>
                </div>
                <input type="text" class="form-control" name="student_id_num" id="studentId" placeholder="Student ID">
            </div>
        </div>

        <div class="form-group col-md-4">
            <label class="sr-only" for="firstName">First Name</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><span><i class="fa fa-user"></i></span></div>
                </div>
                <input type="text" class="form-control" name="fname" id="firstName" placeholder="Given Name">
            </div>
        </div>

        <div class="form-group col-md-4">
            <label class="sr-only" for="middleName">Middle Name</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><span><i class="fa fa-user"></i></span></div>
                </div>
                <input type="text" class="form-control" name="mname" id="middleName" placeholder="Middle Name">
            </div>
        </div>

        <div class="form-group col-md-4">
            <label class="sr-only" for="middleName">Last Name</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><span><i class="fa fa-user"></i></span></div>
                </div>
                <input type="text" class="form-control" name="lname" id="lastName" placeholder="Surname">
            </div>
        </div>
        
        <div class="col-sm-12">
            <h3 class="pt-3">Contact Information</h3>
        </div>
        <div class="form-group col-md-12">
            <label class="sr-only" for="phone">Phone</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><span><i class="fa fa-phone"></i></span></div>
                </div>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
            </div>
        </div>

        <div class="form-group col-md-6">
            <label class="sr-only" for="email">Email Address</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><span><i class="fa fa-user"></i></span></div>
                </div>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
            </div>
        </div>

        <div class="form-group col-md-6">
            <label class="sr-only" for="password">Password</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><span><i class="fa fa-lock"></i></span></div>
                </div>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit_register"><i class="fa fa-check-circle"></i> Register</button>
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
      </div>
    </div>
    
    </form>
  </div>
</div>