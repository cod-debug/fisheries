<!DOCTYPE html>
<html dir="ltr" lang="en">
 
  <?php include("head.php"); ?>

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
              }else if($page == "add_question"){
                 include("pages/add_question.php");
              }
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
    
    <?php include("script.php"); ?>

  </body>
</html>
