<?php require('register.php'); ?>
<?php require('chats.php'); ?>
<?php require('login.php'); ?>
<?php require("./requests/config.php"); ?>
<div class="container-fluid" style="margin-top: 30px;">
    <!-- <div class="page-header" style="background: url('./assets/images/background/gradient.png') no-repeat;"> -->
    <div class="reviewer-header" style="">
        <div class="container-fluid">
        <?php 
                $cat="SELECT * FROM `categories`"; 
                $c= $mysqli->prepare($cat) ;
                $c->execute() ;//ok
                $c_res=$c->get_result(); 
                while($cate = $c_res->fetch_object()):
        ?>
        <div class="card shadow-2">
            <div class="card-header"  data-toggle="collapse" data-target="#<?php echo 'cat'.$cate->cat_id?>" aria-expanded="false" aria-controls="multiCollapseExample2" style="cursor: pointer;">
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
                        <div class="form-group">
                            <input type="radio" name="q<?php echo $row->qs_id ?>" id="a<?php echo $a->ans_id ?>" value="<?php echo $a->ans_id ?>" />
                            <label for="a<?php echo $a->ans_id ?>">
                                <!-- <?php echo $cnt.") ".$a->ans_title; ?> -->
                                <?php echo $a->ans_title; ?>
                            </label>
                        </div>
                        <!-- <p><?php echo $cnt.") ".$a->ans_title; ?></p> -->
                    <?php $cnt++; endwhile; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php endwhile; ?>
        </div>
    </div>
</div>