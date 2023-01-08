        <?php require("./requests/config.php"); ?>
        <?php
          if(isset($_GET['id'])){
            $id = $_GET['id'];

            $select_category = "SELECT * FROM `categories` WHERE `cat_id` = $id";
            $cat = $mysqli->prepare($select_category);
            $cat->execute();
            $res = $cat->get_result();
            $category = $res->fetch_object();
          }
        ?>
        
        <?php
            if(isset($_POST['confirm_delete'])){
                $id = $_POST['cat_id'];
                $update_status = "UPDATE `categories` SET cat_status = 'deleted' WHERE `cat_id` = $id";
                $stmt = $mysqli->prepare($update_status);

                if($stmt->execute()){
                    $stmt->get_result();
                    $succ = "SUCCESSFULLY DELETED";
                } else {
                    $err = "SOMETHING WENT WRONG.";
                }
            }
        ?>

        <?php if(isset($succ)): ?>
            <script>
                Swal.fire("Success", "SUCCESSFULLY SUBMITTED. PROCEED", "success").then(() => {
                    if(<?php echo $batch_type_of_test?> != 'post'){
                        window.location.href="index.php?link=listquestion";
                    } else {
                        window.location.href="index.php?link=listquestion";
                    }
                });
            </script>
        <?php endif; ?>

        <?php if(isset($err)): ?>
            <script>
                Swal.fire("Error", $err, "error");
            </script>
        <?php endif; ?>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <form method="POST">
                <?php if(isset($_GET['delete'])): ?>
                  <div class="card-body">
                    <p class="alert alert-danger">Are you sure you want to delete this category?</p> 
                    <input type="text" name="cat_id" value=<?php echo $id ?> hidden />
                    <button type="submit" class="btn btn-primary" name="confirm_delete">
                      <i class="fa fa-times-circle"></i> Confirm
                    </button>
                    <a href="index.php?link=listcategory" class="btn btn-outline-danger"><i class="fa fa-arrow-left"></i> Cancel</a>
                  </div>
                <?php endif;?>
              </form>
              <div class="card">
                <form class="form-horizontal" method="POST" id="updateCat">
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
                          value="<?php echo $category->cat_name ?>"
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
                          value="<?php echo $category->cat_aka ?>"
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
                        <textarea class="form-control" name="cat_desc" required><?php echo $category->cat_desc ?></textarea>
                        <input type="text" name="cat_id" value=<?php echo $id ?> hidden />
                      </div>
                    </div>
                  </div>
                  <div class="border-top"></div>
                    <?php if(!isset($_GET['delete'])): ?>
                      <div class="card-body" style="text-align: right;">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-paper-plane"></i> Save Updates
                        </button>
                        <a href="index.php?link=listcategory" class="btn btn-outline-danger"><i class="fa fa-times-circle"></i> Cancel</a>
                      </div>
                    <?php endif;?>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>