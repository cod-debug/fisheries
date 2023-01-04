
<?php
    require('config.php');
    $req = strval(file_get_contents('php://input'));
    $req = json_decode($req, true);
    extract($req);
    
    $stmt = "INSERT INTO `chats` (`message`, `user_from`, `user_to`) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($stmt);
    $stmt->bind_param('sss', $message, $from, $to);
    $stmt->execute();

    if($stmt){
        echo '{"message": "Successfully sent", "code": 200}';
    } else {
        echo '
            {"message": "Something went wrong.", "code": 500}';
    }


    // $res = '{ "name":"John", "age":30, "city":"New York", "message": "Good job!" }';

    //echo $res;
?>