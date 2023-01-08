
<?php
    require('config.php');
    $req = strval(file_get_contents('php://input'));
    $req = json_decode($req, true);
    extract($req);

    $unique = "SELECT * FROM `categories` WHERE `cat_name` ='$cat_name'";
    $unq = $mysqli->prepare($unique);
    $unq->execute();
    $res=$unq->get_result();

    if($res->num_rows == 0){

        $stmt = "UPDATE `categories` 
        SET `cat_name` = ?,
        `cat_aka` = ?,
        `cat_desc` = ?
        WHERE `cat_id` = ?";
        $stmt = $mysqli->prepare($stmt);
        $stmt->bind_param('sssi', $cat_name, $cat_aka, $cat_desc, $cat_id);
        $stmt->execute();
    
        if($stmt){
            echo '{"message": "Successfully updated", "code": 200}';
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