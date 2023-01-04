<?php include('../requests/config.php'); ?>
<div class="p-3">
    <?php
        $user_id = $_GET['user_id'];
        $ret="SELECT * FROM `chats` WHERE `user_from` = $user_id OR `user_to` = $user_id"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->execute() ;//ok
        $res=$stmt->get_result();
        
        while($row = $res->fetch_object()):
        $float = "left";
        $color = "dark";

        if($row->user_from != $user_id){
            $float = "right";
            $color = "secondary";
        }
    ?>
    <div class="alert bg-<?php echo $color;?> text-white" style="width: 80%; display: inline-block; float: <?php echo $float ?>; text-align: <?php echo $float ?>;">
        <?php echo $row->message ?>
    </div>
    <?php endwhile; ?>
</div>