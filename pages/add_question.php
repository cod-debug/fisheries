<?php require("./requests/config.php"); ?>
<div class="container-fluid">
  <form class="form" method="POST" id="addQues">
    <div class="right mb-2">
      <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
      <a class="btn btn-outline-danger" href=""><i class="fa fa-times-circle"></i> Cancel</a>
    </div>
    <div class="card shadow-2">
      <div class="card-header">
        <i class="fa fa-question-circle"></i> QUESTION
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>QUESTION: </label>
          <textarea class="form-control" name="qs_title"></textarea>
        </div>
        <div class="form-group">
          <label>TYPE OF TEST: </label>
          <select name="type_of_test" required class="form-select">
            <option value="" selected disabled>- SELECT TYPE OF TEST -</option>
            <option value="pre">PRE TEST</option>
            <option value="review">FINAL TEST</option>
            <option value="post">POST TEST</option>
          </select>
        </div>
        <div class="form-group">
          <label>CATEGORY: </label>
          <select name="qs_category" required class="form-select">
            <option value="" selected disabled>- SELECT CATEGORY -</option>
            <?php
              $cat="SELECT * FROM `categories` WHERE `cat_status` != 'deleted'"; 
              $c= $mysqli->prepare($cat) ;
              $c->execute() ;//ok
              $c_res=$c->get_result(); 
              while($cate = $c_res->fetch_object()):
            ?>
              <option value="<?php echo $cate->cat_id ?>"><?php echo $cate->cat_name ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <label>ADDITIONAL COMMENT (HINT): </label>
          <textarea class="form-control" name="qs_subtitle"></textarea>
        </div>
      </div>
    </div>
    <div class="card shadow-2">
      <div class="card-header">
        <i class="fa fa-check-circle"></i> CHOICES
      </div>
      <div class="card-body">
        <div class="row">
          <div class="form-group col-md-6">
            <label>#1</label>
            <input type="text" name="choice_1" class="form-control" />
            <div class="form-group mt-2">
              <input type="radio" name="correct_ans" value="1" id="c1" />
              <label for="c1">Set as correct answer</label>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label>#2</label>
            <input type="text" name="choice_2" class="form-control" />
            <div class="form-group mt-2">
              <input type="radio" name="correct_ans" value="2" id="c2" />
              <label for="c2">Set as correct answer</label>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label>#3</label>
            <input type="text" name="choice_2" class="form-control" />
            <div class="form-group mt-2">
              <input type="radio" name="correct_ans" value="3" id="c3" />
              <label for="c3">Set as correct answer</label>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label>#4</label>
            <input type="text" name="choice_2" class="form-control" />
            <div class="form-group mt-2">
              <input type="radio" name="correct_ans" value="4" id="c4" />
              <label for="c4">Set as correct answer</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>



