<?php require('register.php'); ?>
<?php require('login.php'); ?>
<?php require('chats.php'); ?>
<?php require("./requests/config.php"); ?>
<div class="container-fluid" style="margin-top: 30px;">
    <!-- <div class="page-header" style="background: url('./assets/images/background/gradient.png') no-repeat;"> -->
    <div class="reviewer-header" style="">
        <div class="container-fluid">
        <?php 
                $cat="SELECT * FROM `categories`"; 
                $c= $mysqli->prepare($cat) ;
                $c->execute() ;//ok
                $c_res=$c->get_result(); 
                while($cate = $c_res->fetch_object()):
        ?>
        <?php require("./requests/config.php"); ?>
        <div class="container-fluid">
        <?php 
                $cat="SELECT * FROM `categories`"; 
                $c= $mysqli->prepare($cat) ;
                $c->execute() ;//ok
                $c_res=$c->get_result(); 
                while($cate = $c_res->fetch_object()):
        ?>
            <div class="row">
            <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
            </div>
            </div>
            <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
            </div>
            </div>
        </div>
        <?php endwhile; ?>
        </div>
        <?php endwhile; ?>
        </div>
    </div>
</div>