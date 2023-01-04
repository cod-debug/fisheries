<!DOCTYPE html>
<html dir="ltr" lang="en">
 
  <?php include("head.php"); ?>
  <script src="assets/libs/swal/swal2.min.js"></script>

  <body>
      <?php include("public_header.php"); ?>
      
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
     
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
          
          <?php 
           if(!empty($_GET["link"])){
              $page = $_GET["link"];
              if($page == "home"){
                 include("pages/public/home.php");
              } else if ($page == "reviewer"){
                 include("pages/public/reviewer.php");
              }else if($page == "modules"){
                include("pages/public/modules.php");
              }else{
                include("pages/public/home.php");
              }
           }else{
               include("pages/public/home.php");
           }

          ?>
        

         <?php include("footer.php"); ?>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
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