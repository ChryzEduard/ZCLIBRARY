
<div class="container-fluid px-5 d-none d-lg-block" style="background-color : #292929">
        <div class="row gx-0">
          
            <div class="col-lg-1 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                <?php  while($soclist = mysqli_fetch_array($soc)){?>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?php echo $soclist['iconLink']?>"><i class="fab <?php echo $soclist['iconLogo']?> fw-normal"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid position-relative p-0">
        <nav class="navbar  navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <img  src="assets/images/external/logo.png" alt="<?php echo $external_info['siteTitle']?>" width="70px" height="70px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link <?php if($a==1){ echo 'active'; }?>">Home </a>
                    <a href="about.php" class="nav-item nav-link <?php if($a==2){ echo 'active'; }?>">About</a>
                    <a href="announcements.php" class="nav-item nav-link <?php if($a==5){ echo 'active'; }?>" >Announcements</a>
                    <a href="blog.php" class="nav-item nav-link <?php if($a==4){ echo 'active'; }?>" >Blogs</a>
                    <a href="contact.php" class="nav-item nav-link <?php if($a==3){ echo 'active'; }?>">Contact</a>
                    <a href="login-user.php" class="nav-item nav-link <?php if($a==5){ echo 'active'; }?>">| Sign in |</a>
                </div>
                
               
            </div>
        </nav>
       


