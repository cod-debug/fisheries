<?php require("./requests/config.php"); ?>
<div class="container-fluid">
    
<?php
    if(isset($_GET['id'])){
        $q_id = $_GET['id'];
        $select_question = "SELECT * FROM `questions` WHERE `qs_id` = $q_id";
        $q= $mysqli->prepare($select_question) ;
        $q->execute();
        $q_res = $q->get_result();
        $question = $q_res->fetch_object();
    }
?>
  <form class="form" method="POST" id="updateQues">
    <div class="right mb-2">
      <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
      <a class="btn btn-outline-danger" href="index.php?link=listquestion"><i class="fa fa-times-circle"></i> Cancel</a>
    </div>
    <div class="card shadow-2">
      <div class="card-header">
        <i class="fa fa-question-circle"></i> QUESTION
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>QUESTION: </label>
          <textarea class="form-control" name="qs_title"><?php echo $question->qs_title?></textarea>
        </div>
        <div class="form-group">
          <label>TYPE OF TEST: </label>
          <select name="type_of_test" required class="form-select">
            <option value="" selected disabled>- SELECT TYPE OF TEST -</option>
            <option value="pre" <?php echo $question->type_of_test == 'pre' ? 'selected' : '' ?>>PRE TEST</option>
            <option value="post" <?php echo $question->type_of_test == 'post' ? 'selected' : '' ?>>POST TEST</option>
          </select>
        </div>
        <div class="form-group">
          <label>CATEGORY: </label>
          <select name="qs_category" required class="form-select">
            <option value="" selected disabled>- SELECT CATEGORY -</option>
            <?php
              $cat="SELECT * FROM `categories`"; 
              $c= $mysqli->prepare($cat) ;
              $c->execute() ;//ok
              $c_res=$c->get_result(); 
              while($cate = $c_res->fetch_object()):
            ?>
              <option value="<?php echo $cate->cat_id ?>"  <?php echo $question->qs_category == $cate->cat_id ? 'selected' : '' ?>><?php echo $cate->cat_name ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group">
          <label>ADDITIONAL COMMENT (HINT): </label>
          <textarea class="form-control" name="qs_subtitle"><?php echo $question->qs_subtitle ?></textarea>
        </div>
      </div>
    </div>
    <div class="card shadow-2">
      <div class="card-header">
        <i class="fa fa-check-circle"></i> CHOICES
      </div>
      <div class="card-body">
        <div class="row">
          <?php
            $select_choices = "SELECT * FROM `answers` WHERE `qs_id` = $q_id";
            $sc = $mysqli->prepare($select_choices);
            $sc->execute();
            $sc_res = $sc->get_result();
            $counter = 1;
            while($choice = $sc_res->fetch_object()):
          ?>
            <div class="form-group col-md-6">
                <label>#<?php echo $counter ?></label>
                <input type="text" name="choice_<?php echo $counter ?>" value="<?php echo $choice->ans_title ?>" class="form-control" />
                <div class="form-group mt-2">
                <input type="radio" name="correct_ans" <?php echo $choice->ans_is_correct ? 'checked' : '' ?> value="1"  id="c<?php echo $counter ?>"  data-ans-id="<?php echo $choice->ans_id ?>" />
                <label for="c<?php echo $counter ?>">Set as correct answer</label>
                </div>
            </div>
        <?php 
            $counter++;
            endwhile; 
        ?>
        </div>
      </div>
    </div>
    <input type="text" value="<?php echo $q_id ?>" name="q_id" hidden />
  </form>
</div>



