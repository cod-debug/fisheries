<?php require('register.php'); ?>
<?php require('login.php'); ?>
<?php require('chats.php'); ?>
<?php require("./requests/config.php"); ?>
<div class="container-fluid" style="margin-top: 30px;">
    <!-- <div class="page-header" style="background: url('./assets/images/background/gradient.png') no-repeat;"> -->
    <div class="reviewer-header" style="">
        
        <div class="container-fluid">
            <div>
                <h3>Student Reviewer</h3>
            </div>
            <div class="row" style="min-height: 70vh;">
                <?php 
                        $cat="SELECT * FROM `categories`"; 
                        $c= $mysqli->prepare($cat) ;
                        $c->execute() ;//ok
                        $c_res=$c->get_result(); 
                ?>
                <div class="col-3">
                    <div class="nav flex-column nav-pills shadow-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <?php while($cate = $c_res->fetch_object()): ?>
                            <a class="nav-link" id="v-pills-<?php echo $cate->cat_name ?>-tab" data-toggle="pill" href="#v-<?php echo $cate->cat_name ?>-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <?php echo $cate->cat_name; ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="col-9">
                    <?php 
                        $catc="SELECT * FROM `categories`"; 
                        $cc= $mysqli->prepare($catc) ;
                        $cc->execute() ;//ok
                        $c_ress=$cc->get_result(); 
                    ?>
                    <div class="tab-content" id="v-pills-tabContent">
                        <?php while($ca = $c_ress->fetch_object()): ?>
                            <div class="tab-pane fade" id="v-<?php echo $ca->cat_name ?>-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <h3><?php echo $ca->cat_name ?></h3>
                                <hr>
                                <?php
                                    $ret="SELECT * FROM `questions` WHERE `qs_category` = '$ca->cat_id'"; 
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
                        <?php endwhile; ?>
                    </div>
                </div>
        </div>

        </div>
    </div>
</div>