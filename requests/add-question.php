
<?php
    require('config.php');
    $req = strval(file_get_contents('php://input'));
    $req = json_decode($req, true);
    extract($req);

    $unique = "SELECT * FROM `questions` WHERE `qs_title` ='$qs_title'";
    $unq = $mysqli->prepare($unique);
    $unq->execute();
    $res=$unq->get_result();

    if($res->num_rows == 0){
        $stmt = "INSERT INTO `questions` (`qs_title`, `qs_subtitle`, `qs_category`, `type_of_test`) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($stmt);
        $stmt->bind_param('ssis', $qs_title, $qs_subtitle, $qs_category, $type_of_test);
        $stmt->execute();

        $qs_id = $stmt->insert_id;

        foreach ($choices as $item) {
            $val = $item['value'];
            $is_correct = $item['is_correct'];

            $ans = "INSERT INTO `answers` (qs_id, ans_title, ans_is_correct) VALUES (?, ?, ?)";
            $ans = $mysqli->prepare($ans);
            $ans->bind_param('iss', $qs_id, $val, $is_correct);
            $ans->execute();
        }

        if($stmt){
            // $inserted_id = $stmt->inserted_id;
            echo '{"message": "Successfully saved", "code": 200}';
        } else {
            echo '{"message": "Something went wrong.", "code": 500}';
        }
    } else {
        echo '{"message": "Duplicate error.", "code": 400}';
    }


    // $res = '{ "name":"John", "age":30, "city":"New York", "message": "Good job!" }';

    //echo $res;
?>