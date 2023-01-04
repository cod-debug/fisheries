
<?php
    require('config.php');
    session_start();
    $req = strval(file_get_contents('php://input'));
    $req = json_decode($req, true);
    extract($req);
    $password=md5($password);
    $unique = "SELECT * FROM `users` WHERE `password` ='$password' AND `email`='$email'";
    $unq = $mysqli->prepare($unique);
    $unq->execute();
    $res=$unq->get_result();

    if($res->num_rows == 1){
        
        while($row = $res->fetch_object()):
            $_SESSION['c_id'] = $row->user_id;
            $_SESSION['c_type'] = $row->user_type;
        endwhile;
        if($_SESSION['c_type'] == 'admin'){
            echo '{"message": "Successfully logged in.", "code": 200, "usertype": "admin"}';
        } else {
            echo '{"message": "Successfully logged in.", "code": 200, "usertype": "student"}';
        }
    } else {
        echo '{"message": "No such user found.", "code": 400}';
    }