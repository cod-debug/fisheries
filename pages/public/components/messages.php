
<?php 
    session_start(); 
    require('config.php');
?>

<div>
    <?php
        $user_id = $_SESSION['c_id'];
        $ret="SELECT * FROM `chats` WHERE `user_from` = $user_id OR `user_to` = $user_id"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->execute() ;//ok
        $res=$stmt->get_result();
        
        while($row = $res->fetch_object()):
        $float = "right";
        $color = "";

        if($row->user_from != $user_id){
            $float = "left";
        }
    ?>
    <div class="alert bg-light text-dark" style="width: 80%; display: inline-block; float: <?php echo $float ?>; text-align: <?php echo $float ?>;">
        <?php echo $row->message ?>
    </div>
    <?php endwhile; ?>
</div>