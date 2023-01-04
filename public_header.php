<?php session_start(); ?>
<style>
    #navbarSupportedContent{
        background-color: transparent!important;
    }
</style>
  <nav class="navbar sticky-top navbar-expand-lg shadow-3" id="publicNav">
    <div class="container">
      <a class="navbar-brand" href="/fisheries/public.php?link=home" class="text-dark">
        <img src="./assets/images/logo-icon.png" id="publicLogo" /> Fisheries Pre-Board Reviewer
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <i class="fas fa-bars"></i>
  </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <?php if(isset($_SESSION['c_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="public.php?link=reviewer">Reviewer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="public.php?link=modules">Modules</a>
                </li>
            <?php endif; ?>
            <?php if(!isset($_SESSION['c_id'])): ?>
                <li class="nav-item active">
                    <a class="nav-link" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Register</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Login</a>
                </li>
            <?php else :?>
              <li class="nav-item" id="logoutBtn">
                <a href="#" class="nav-link"><i class="fa fa-power-off"></i><span class="hide-menu"> Logout </span></a>
              </li>
            <?php endif; ?>
            <!-- <li class="nav-item">
                <a class="nav-link" href="http://localhost/fisheries/public.php?link=about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/fisheries/public.php?link=contact">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/fisheries/public.php?link=services">Services</a>
            </li> -->
        </ul>
      </div>
    </div>
  </nav>