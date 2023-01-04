
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" id="loginForm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mx-auto"  id="exampleModalLabel">Login Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body row">
          <div class="col-sm-12 text-center py-3">
              <img src="./assets/images/logo-icon.png" class="w-50" /> 
          </div>
          <div class="form-group col-md-12">
              <label class="sr-only" for="email">Email Address</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <div class="input-group-text"><span><i class="fa fa-envelope"></i></span></div>
                  </div>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
              </div>
          </div>

          <div class="form-group col-md-12">
              <label class="sr-only" for="password">Password</label>
              <div class="input-group">
                  <div class="input-group-prepend">
                      <div class="input-group-text"><span><i class="fa fa-key"></i></span></div>
                  </div>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              </div>
          </div>
        </div>
        <div class="modal-footer" style="justify-content: center;">
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </div>
      </div>
    </form>
  </div>
</div>