
<?php
    require('config.php');
    $req = strval(file_get_contents('php://input'));
    $req = json_decode($req, true);
    extract($req);

    $unique = "SELECT * FROM `users` WHERE `email` ='$email' OR `student_id_num` = '$student_id_num'";
    $unq = $mysqli->prepare($unique);
    $unq->execute();
    $res=$unq->get_result();

    $password = md5($password);

    if($res->num_rows == 0){

        $stmt = "INSERT INTO `users` (`fname`, `mname`, `lname`, `email`, `phone`, `student_id_num`, `password`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($stmt);
        $stmt->bind_param('sssssss', $fname, $mname, $lname, $email, $phone, $student_id_num, $password);
        $stmt->execute();
    
        if($stmt){
            echo '{"message": "Successfully sent", "code": 200}';
        } else {
            echo '
                {"message": "Something went wrong.", "code": 500}';
        }
    } else {
        echo '{"message": "Duplicate error.", "code": 400}';
    }


    // $res = '{ "name":"John", "age":30, "city":"New York", "message": "Good job!" }';

    //echo $res;
?>