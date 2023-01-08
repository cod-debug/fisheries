<?php require("./requests/config.php"); ?>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<?php $passing_average = 80; ?>
<div class="container-fluid">
    <form method="POST">
        <div class="card shadow-2">
            <div class="card-header">
                <i class="mdi mdi-chart-areaspline"></i> GENERATE ANALYTICS
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- <div class="col-md-4">
                        <label for="toInp">Type of Test: </label>
                        <select name="type_of_test" class="form-control">
                            <option value="">All</option>
                            <option value="pre">PRE TEST</option>
                            <option value="review">REVIEW</option>
                            <option value="post">POST TEST</option>
                        </select>
                    </div> -->
                    <div class="col-md-6">
                        <label for="fromInp">From: </label>
                        <input type="date" id="fromInp" class="form-control" name="from" required />
                    </div>
                    <div class="col-md-6">
                        <label for="toInp">To: </label>
                        <input type="date" id="toInp" class="form-control" name="to" required />
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div style="text-align: right;"> 
                    <button type="submit" name="generate_analytics" class="btn btn-primary"><i class="fa fa-check-circle"></i> Generate</button>
                </div>
            </div>
        </div>
    </form> 
    <?php if(isset($_POST['generate_analytics'])): ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    RESULTS BY CATEGORY
                </div>
                <div class="card-body">
                    <canvas id="oilChart" width="600" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    RESULTS BY CATEGORY
                </div>
                <div class="card-body">
                    <canvas id="lineChart" width="600" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    RESULTS BY REFERENCE CODE
                </div>
                <div class="card-body">
                    <?php
                        extract($_POST);

                        $select_batch_q = "SELECT * FROM `batch`
                        LEFT JOIN `users`
                        ON `users`.`user_id` = `batch`.`user_id`
                        WHERE DATE(`batch`.`batch_created_at`) 
                        BETWEEN DATE('$from') AND DATE('$to')";
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
                                        
                                        if($correct_count > 0){
                                            $average = ($correct_count / $ans_count) * 100;
                                        } else {
                                            $average = 0;
                                        }

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
                                                $post_test_count++;
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
        <?php
            //INITIALIZE AVERAGE
            $total_test_passer_average = $test_taken_count > 0 ? ($total_passed / $test_taken_count) * 100 : 0;
            $pretest_passer_average = $pretest_count > 0 ? ($pretest_passers / $pretest_count) * 100 : 0;
            $final_review_passer_average = $final_review_count > 0 ? ($final_review_passers / $final_review_count) * 100 : 0;
            $posttest_passer_average = $post_test_count > 0 ? ($post_test_passers / $post_test_count) * 100 : 0;

            extract($_POST);
        ?>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    RESULT SUMMARY:
                    <br />
                    <?php if($from != $to): ?>
                    <small class="text-muted">
                        <b><?php echo date_format(date_create($from), "M d, Y") ?>
                        - 
                        <b><?php echo date_format(date_create($to), "M d, Y") ?></b>
                    </small>
                    <?php else: ?>
                        
                    <small class="text-muted">
                        <b><?php echo date_format(date_create($from), "M d, Y") ?>
                    </small>
                    <?php endif; ?>
                </div>
                <?php if($test_taken_count > 0): ?>
                <div class="card-body">
                    <h3>OVERALL</h3>
                    <table class="w-100">
                        <tr>
                            <td>Total Test Taken: </td>
                            <th><?php echo $test_taken_count ?></th>
                        </tr>
                        <tr>
                            <td>Total Passers: </td>
                            <th class="text-success"><?php echo $total_passed ?></th>
                        </tr>
                        <tr>
                            <td>Total Failed: </td>
                            <th class="text-danger"><?php echo $total_failed ?></th>
                        </tr>
                    </table>
                    <hr>
                        AVERAGE: <b class="text-primary"><?php echo number_format($total_test_passer_average, 0) ?>% PASSED</b>
                    <hr>

                    <h3>PRETEST</h3>
                    <table class="w-100">
                        <tr>
                            <td>Total Test Taken: </td>
                            <th><?php echo $pretest_count ?></th>
                        </tr>
                        <tr>
                            <td>Total Passers: </td>
                            <th class="text-success"><?php echo $pretest_passers ?></th>
                        </tr>
                        <tr>
                            <td>Total Failed: </td>
                            <th class="text-danger"><?php echo $pretest_failed ?></th>
                        </tr>
                    </table>

                    <hr>
                        AVERAGE: <b class="text-primary"><?php echo number_format($pretest_passer_average, 0) ?>% PASSED</b>
                    <hr>
                    <!-- 
                    <h3>FINAL REVIEW</h3>
                    <table class="w-100">
                        <tr>
                            <td>Total Test Taken: </td>
                            <th><?php echo $final_review_count ?></th>
                        </tr>
                        <tr>
                            <td>Total Passers: </td>
                            <th class="text-success"><?php echo $final_review_passers ?></th>
                        </tr>
                        <tr>
                            <td>Total Failed: </td>
                            <th class="text-danger"><?php echo $final_review_failed ?></th>
                        </tr>
                    </table> -->
<!-- 
                    <hr>
                        AVERAGE: <b class="text-primary"><?php echo number_format($final_review_passer_average, 0) ?>% PASSED</b>
                    <hr> -->

                    <h3>POSTTEST</h3>
                    <table class="w-100">
                        <tr>
                            <td>Total Test Taken: </td>
                            <th><?php echo $post_test_count ?></th>
                        </tr>
                        <tr>
                            <td>Total Passers: </td>
                            <th class="text-success"><?php echo $post_test_passers ?></th>
                        </tr>
                        <tr>
                            <td>Total Failed: </td>
                            <th class="text-danger"><?php echo $post_test_failed ?></th>
                        </tr>
                    </table>

                    <hr>
                        AVERAGE: <b class="text-primary"><?php echo number_format($posttest_passer_average, 0) ?>% PASSED</b>
                    <hr>
                </div>
                <?php else: ?>
                <div class="card-body">
                    <p class="alert alert-warning">No records found.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php if(isset($_POST['generate_analytics'])):?>
<?php 
    $select_all_category_query = "SELECT * FROM `categories`";
    $selected = $mysqli->prepare($select_all_category_query);
    $selected->execute();
    $res = $selected->get_result();
    
    $category_names = array();
    $category_correct_counts = array();
    $questions_counts = array();

    while($cat = $res->fetch_object()){

        $select_qa_results_by_categories_correct = "SELECT * FROM `qa` 
        LEFT JOIN `questions` ON `questions`.`qs_id` = `qa`.`qa_question` 
        WHERE `questions`.`qs_category` = $cat->cat_id
        AND DATE(`qa`.`qa_created_at`) BETWEEN DATE('$from') AND DATE('$to')";
        $selected_category_results_correct = $mysqli->prepare($select_qa_results_by_categories_correct);
        $selected_category_results_correct->execute();

        $cat_results_correct = $selected_category_results_correct->get_result();
        // initialize counter variables
        $correct_count = 0;
        $questions_count = 0;

        // loop all question and answers to check if it is correct
        while($qs = $cat_results_correct->fetch_object()){
            // this lines of codes are to check if answer is correct then store the count per category;
            if($qs->qa_answer_is_correct){
                $correct_count++;
            };

            // counter of all questions under this category;
            $questions_count++;
        }

        $count_cat_res = $cat_results_correct->num_rows;

        array_push($category_names, $cat->cat_name);
        array_push($category_correct_counts, $correct_count);
        array_push($questions_counts, $questions_count);
    }
?>
<?php endif; ?>
<script>
    var oilCanvas = document.getElementById("oilChart");
    var lineChart = document.getElementById("lineChart");

    Chart.defaults.global.defaultFontFamily = "Century Gothic";
    Chart.defaults.global.defaultFontSize = 11;

    var oilData = {
        labels: [<?php echo '"'.implode('","', $category_names).'"' ?>],
        datasets: [
            {
                
                label: 'Correct counts per category',
                data: [<?php echo '"'.implode('","', $category_correct_counts).'"' ?>],
                backgroundColor: [
                    "#FF6384",
                    "#63FF84",
                    "#84FF63",
                    "#8463FF",
                    "#6384FF",
                    "#808000",
                    "#7FFFD4",
                    "#98AFC7",
                    "#123456",
                    "#4169E1"
                ]
            }]
    };

    var lineData = {
        labels: [<?php echo '"'.implode('","', $category_names).'"' ?>],
        datasets: [
            {
                label: 'Correct counts per category',
                data: [<?php echo '"'.implode('","', $category_correct_counts).'"' ?>],
                backgroundColor: "#808000"
            },
            {
                label: 'Total answered questions per category',
                data: [<?php echo '"'.implode('","', $questions_counts).'"' ?>],
                backgroundColor: "#123456"
            }
        ]
    };


    var pieChart = new Chart(oilCanvas, {
        type: 'pie',
        data: oilData,
    });

    var lineChart = new Chart(lineChart, {
        type: 'bar',
        data: lineData,
    });
</script>