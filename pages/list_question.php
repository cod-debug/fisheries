<?php require("./requests/config.php"); ?>
<div class="container-fluid">
  <?php 
          $cat="SELECT * FROM `categories`"; 
          $c= $mysqli->prepare($cat) ;
          $c->execute() ;//ok
          $c_res=$c->get_result(); 
          while($cate = $c_res->fetch_object()):
  ?>
  <div class="card shadow-2">
    <div class="card-header"  data-toggle="collapse" data-target="#<?php echo 'cat'.$cate->cat_id?>" aria-expanded="false" aria-controls="multiCollapseExample2">
      <h3 class="text-center"><?php echo $cate->cat_name ?></h3>
    </div>
    <div class="card-body collapse multi-collapse" id="<?php echo 'cat'.$cate->cat_id?>">
      <?php
          $ret="SELECT * FROM `questions` WHERE `qs_category` = '$cate->cat_id'"; 
          $stmt= $mysqli->prepare($ret) ;
          $stmt->execute() ;//ok
          $res=$stmt->get_result();
          
          while($row = $res->fetch_object()):
        ?>
        <div class="card shadow-5">
            <div class="card-header">
              <h3><?php echo $row->qs_title;  ?></h3>
            </div>
            <div class="card-body">
              <?php
                $select_ans = "SELECT * FROM `answers` WHERE `qs_id` = $row->qs_id ORDER BY RAND()";
                $select_ans = $mysqli->prepare($select_ans);
                $select_ans->execute();
                $ans = $select_ans->get_result();

                $cnt = "A";
                while($a = $ans->fetch_object()):
              ?>
                <p><?php echo $cnt.") ".$a->ans_title; ?></p>
              <?php $cnt++; endwhile; ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
  </div>
  <?php endwhile; ?>
</div>