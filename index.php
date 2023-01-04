<!DOCTYPE html>
<html dir="ltr" lang="en">
 
  <?php include("head.php"); ?>
  
  <?php session_start() ?>
  <?php if(!isset($_SESSION['c_id'])){
      if($_SESSION['c_type'] != 'admin'){
        header("location: public.php");
      }
      
      header("location: public.php");
    } 
  ?>
  
  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full">
     
      <?php include("header.php"); ?>

      <?php include("sidebar.php"); ?>
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
          
          <?php 
           if(!empty($_GET["link"])){
              $page = $_GET["link"];
              if($page == "dashboard"){
                 include("pages/dasboard.php");
              }else if($page == "addcategory"){
                 include("pages/add_category.php");
              }else if($page == "listcategory"){
                 include("pages/list_category.php");
              }else if($page == "listsubject"){
                 include("pages/list_subject.php");
              }else if($page == "addsubject"){
                 include("pages/add_subject.php");
              }else if($page == "addmodule"){
                 include("pages/add_module.php");
              }else if($page == "listmodule"){
                 include("pages/list_module.php");
              }else if($page == "addquestion"){
                 include("pages/add_question.php");
              }else if($page == "listquestion"){
                 include("pages/list_question.php");
              }else if($page == "chats"){
               include("pages/chats.php");
              }else if($page == "analytics"){
                include("pages/generate_analytics.php");
              }
          }else{
               include("pages/dasboard.php");
           }

          ?>
        

         <?php include("footer.php"); ?>

      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    
<!-- Messenger Chat Plugin Code -->
<!-- <div id="fb-root"></div> -->

<!-- Your Chat Plugin code -->
<!-- <div id="fb-customer-chat" class="fb-customerchat">
</div>
<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "117504663209264");
  chatbox.setAttribute("attribution", "biz_inbox");
</script> -->

<!-- Your SDK code -->
<!-- <script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v15.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script> -->
  </body>
</html>

<?php include("script.php"); ?>
<script>
  $("#logoutBtn").on('click', () => {
    Swal.fire({
      title: "Logout",
      text: "Are you sure you want to logout?",
      icon: "question",
      theme: "modern",
      showCancelButton: true, 
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href ="logout.php";
      }
    })
  });
  $("#datatable").DataTable();
</script>