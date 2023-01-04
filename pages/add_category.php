        <?php require("./requests/config.php"); ?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <form class="form-horizontal" method="POST" id="addCat">
                  <div class="card-body">
                    <h4 class="card-title">ADD SUBJECT CATEGORY</h4> <br><br>
                    <div class="form-group row">
                      <label
                        for="title"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Category Title</label> 
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          name="cat_name"
                          required
                          id="title"/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="aka"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Other Term</label> 
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="aka"
                          name="cat_aka"
                          required
                          placeholder=""/>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label
                        for="cono1"
                        class="col-sm-3 text-end control-label col-form-label">Category Description</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="cat_desc" required></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="border-top"></div>
                    <div class="card-body" style="text-align: right;">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-paper-plane"></i> Submit
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>