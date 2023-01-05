<?php require('register.php'); ?>
<?php require('login.php'); ?>
<?php require('chats.php'); ?>
<?php require("./requests/config.php"); ?>

<style>
    .footer {
        position: fixed;
        width: 100%;
        bottom: 0;
    }
</style>
<?php
    if(isset($_POST['submit_review'])):
        $batch_type_of_test = $_POST['batch_type_of_test'];

        $qs="SELECT * FROM `questions` WHERE `type_of_test` = '$batch_type_of_test'"; 
        $q= $mysqli->prepare($qs) ;
        $q->execute() ;//ok
        $qu=$q->get_result();

        $ref_num = $_POST['ref_num'];
        $user_id = $_SESSION['c_id'];
        
        $insert_batch = "INSERT INTO `batch` (`batch_name`, `user_id`, `batch_type_of_test`) VALUES ('$ref_num', $user_id, '$batch_type_of_test')";
        $ib = $mysqli->prepare($insert_batch);

        if($ib->execute()){
            while($quest = $qu->fetch_object()){
                $question_answer = explode(",", $_POST['question'.$quest->qs_id]);
                $q_id = $question_answer[0];
                $ans_id = $question_answer[1];
                $qa_answer_is_correct = $question_answer[2];

                $insert_qa = "INSERT INTO `qa` (`qa_batch`, `qa_question`, `qa_answer`, `qa_user`, `qa_answer_is_correct`) VALUES ('$ref_num', '$q_id', '$ans_id', '$user_id', '$qa_answer_is_correct')";
                $qa= $mysqli->prepare($insert_qa);
                if($qa->execute()){
                    $succ = "SUCCESSFULLY SUBMITTED.";
                } else {
                    $err = "SOMETHING WENT WRONG.";
                }

            }
        }
        
?>

<?php endif;?>

<?php if(isset($succ)): ?>
    <script>
        Swal.fire("Success", "SUCCESSFULLY SUBMITTED. PROCEED", "success").then(() => {
            if(<?php echo $batch_type_of_test?> != 'post'){
                window.location.href="public.php?link=reviewer&next=1";
            } else {
                window.location.href="public.php?link=reviewer";
            }
        });
    </script>
<?php endif; ?>

<?php if(isset($err)): ?>
    <script>
        Swal.fire("Error", $err, "error");
    </script>
    <?php endif; ?>
<?php
    $count_taken = "SELECT COUNT(`batch_id`) AS number_of_test_taken FROM `batch` WHERE `user_id` = '$_SESSION[c_id]'";
    $count_test_taken= $mysqli->prepare($count_taken) ;
    $count_test_taken->execute() ;//ok
    $qu=$count_test_taken->get_result();

    $number_of_test_taken = $qu->fetch_object()->number_of_test_taken;
    if($number_of_test_taken % 2 == 0){
        $type_of_test = "pre";
        $parsed_type = "pre-test";
    } else {
        $type_of_test = "post";
        $parsed_type = "post test";
    }

    $take_next_test = isset($_POST['take_review']) || isset($_GET['next']);
?>

<?php
    if($take_next_test){
        $n=10;
        function getName($n) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
        
            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
        
            return strtoupper($randomString);
        }
        
        $ref_num =  getName($n);
    }
?>
<div class="container-fluid" style="margin-top: 30px; margin-bottom: 40px">
    <!-- <div class="page-header" style="background: url('./assets/images/background/gradient.png') no-repeat;"> -->
    <div class="reviewer-header" style="">
        
        <div class="container-fluid">
            <div>
                <br />
                <h3 class="text-uppercase text-center">Student Reviewer (<?php echo $type_of_test; ?>)</h3>
            </div>
            <?php if(!isset($ref_num)): ?>
            <div class="text-center" >
                <br />
                <form method="POST">
                    <button type="submit" class="btn btn-primary btn-bg text-uppercase" name="take_review">TAKE REVIEW <br>(<?php echo $parsed_type ?>)</button>
                </form>
            </div>
            <?php endif; ?>
            <?php if(isset($ref_num)):?>

            <div>
            </div>
            <form method="POST">
                <input type="text" name="batch_type_of_test" value="<?php echo $type_of_test ?>" hidden />
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
                                <a class="nav-link" id="v-pills-<?php echo $cate->cat_id ?>-tab" data-toggle="pill" href="#v-<?php echo $cate->cat_id ?>-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                    <?php echo $cate->cat_name; ?>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <input type="text" name="ref_num" hidden value="<?php echo 'REV-'.$ref_num?>"/>
                        <?php 
                            $catc="SELECT * FROM `categories`"; 
                            $cc= $mysqli->prepare($catc) ;
                            $cc->execute() ;//ok
                            $c_ress=$cc->get_result(); 
                        ?>
                        <div class="tab-content" id="v-pills-tabContent">
                            <?php while($ca = $c_ress->fetch_object()): ?>
                                <div class="tab-pane fade" id="v-<?php echo $ca->cat_id ?>-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <h3><?php echo $ca->cat_name ?></h3>
                                    <hr>
                                    <?php
                                        $ret="SELECT * FROM `questions` WHERE `qs_category` = '$ca->cat_id' AND `type_of_test` = '$type_of_test' ORDER BY RAND()"; 
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
                                            <div>
                                            <input type="radio" required value="<?php echo $row->qs_id.",".$a->ans_id.",".$a->ans_is_correct ?>" name="question<?php echo $row->qs_id ?>" id="question<?php echo $a->ans_id ?>">
                                                <label for="question<?php echo $a->ans_id ?>"><?php echo $cnt.") ".$a->ans_title; ?></label>
                                                </div>
                                            <?php $cnt++; endwhile; ?>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="col-3">                        
                        <div class="card shadow-2">
                            <div class="card-header bg-success text-white">
                                <p>
                                    REFERENCE CODE: <b class="text-light"><?php echo $ref_num; ?></b>
                                </p>
                            </div>
                            <div class="card-body text-center">
                                <p class="text-muted">(click submit button or press "ENTER" key to submit review)</p>
                                <button type="submit" class="btn btn-primary w-100" name="submit_review">SUBMIT</button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>    
                </div>
            </form>
            
            <div class="card-body">
                    <?php
                        extract($_POST);
                        $user_id = $_SESSION['c_id'];

                        $select_batch_q = "SELECT  * FROM `batch`
                        LEFT JOIN `users`
                        ON `users`.`user_id` = `batch`.`user_id`
                        WHERE `batch`.`user_id` = $user_id";
                        $selected_batch = $mysqli->prepare($select_batch_q);

                        $selected_batch->execute();
                        $selected_batch_result = $selected_batch->get_result();
                        $batch_num_rows = $selected_batch_result->num_rows;
                    ?>
                    <div class="table-responsive">
                        <table class="table table-border table-hovered table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Batch Reference Code</th>
                                    <th class="bg-primary text-white">Date Taken</th>
                                    <th class="bg-primary text-white">Student</th>
                                    <th class="bg-primary text-white">Type of Test</th>
                                    <th class="bg-primary text-white">Correct Answers</th>
                                    <th class="bg-primary text-white">Average</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // INITIALIZE VARIABLES FOR ANALYTICS
                                    $test_taken_count = 0;
                                    $total_passed = 0;
                                    $total_failed = 0;

                                    $pretest_count = 0;
                                    $pretest_passers = 0;
                                    $pretest_failed = 0;

                                    $final_review_count = 0;
                                    $final_review_passers = 0;
                                    $final_review_failed = 0;

                                    $post_test_count = 0;
                                    $post_test_passers = 0;
                                    $post_test_failed = 0;
                                ?>
                                <?php while($row = $selected_batch_result->fetch_object()): ?>
                                    <?php
                                        // COUNT TOTAL ANSWERED QUESTIONS
                                        $select_ans = "SELECT COUNT(qa_id) AS ans_count FROM `qa` WHERE `qa_batch` = '$row->batch_name'";   
                                        $num_of_answers = $mysqli->prepare($select_ans);
                                        $num_of_answers->execute();
                                        $num_of_ans_result = $num_of_answers->get_result();
                                        $ans_count = $num_of_ans_result->fetch_object()->ans_count;

                                        // COUNT CORRECT ANSWERS
                                        $select_correct_ans = "SELECT COUNT(qa_id) AS correct_count FROM `qa` WHERE `qa_answer_is_correct` = 1 AND `qa_batch` = '$row->batch_name'";   
                                        $num_of_correct = $mysqli->prepare($select_correct_ans);
                                        $num_of_correct->execute();
                                        $num_of_correct_result = $num_of_correct->get_result();
                                        $correct_count = $num_of_correct_result->fetch_object()->correct_count;

                                        $average = ($correct_count / $ans_count) * 100;

                                        if($average >= $passing_average){
                                            $rating = "passed";
                                            $badge_color = "success";
                                            $total_passed++;
                                        } else {
                                            $rating = "failed";
                                            $badge_color = "danger";
                                            $total_failed++;
                                        }

                                        switch($row->batch_type_of_test){
                                            case "pre":
                                                $parsed_type_of_test = "Pretest";
                                                $pretest_count++;
                                                
                                                if($average >= $passing_average){
                                                    $pretest_passers++;
                                                } else {
                                                    $pretest_failed++;
                                                }

                                                break;
                                            case "review":
                                                $parsed_type_of_test = "Final Test";
                                                $final_review_count++;
                                                if($average >= $passing_average){
                                                    $final_review_passers++;
                                                } else {
                                                    $final_review_failed++;
                                                }

                                                break;
                                            case "post":
                                                $parsed_type_of_test = "Posttest";
                                                
                                                if($average >= $passing_average){
                                                    $post_test_passers++;
                                                } else {
                                                    $post_test_failed++;
                                                }

                                                break;
                                        }   

                                        $test_taken_count++;

                                    ?>
                                <tr  class="text-uppercase">
                                    <td>
                                        <?php echo $row->batch_name ?>
                                    </td>
                                    <td>
                                        <?php echo date_format(date_create($row->batch_created_at), "M d, Y h:i A") ?>
                                    </td> 
                                    <td>
                                        <?php echo $row->fname." ".$row->lname ?>
                                    </td>
                                    <td>
                                        <?php echo $parsed_type_of_test ?>
                                    </td>
                                    <td>
                                        <strong>
                                            <?php print_r($correct_count) ?>
                                            / 
                                            <?php print_r($ans_count) ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            <?php print_r($average > 0 ? number_format($average, 0) : 0) ?>%
                                        </strong>
                                        
                                        <i class="text-<?php echo $badge_color ?>">(<?php echo $rating ?>)</i>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>