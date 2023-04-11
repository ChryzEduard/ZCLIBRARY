<?php $soc = mysqli_query($con,"select * from social_media;");

if($fetch_info['libraryUserFirtsName'] ==  'update data' || $fetch_info['libraryUserLastName'] ==  'update data' || $fetch_info['libraryUseAge'] ==  0 || $fetch_info['librarylocation'] ==  'update data' ){
    echo "<script>alert('Please Update your Account');window.location.href='profile.php'</script>";
    
    
}
if(isset($_GET['Deletall']))
{
 $logout = mysqli_query($con, "update libraryuser set availabiltyONOFF = 'offline' where libraryUserId = $id");
 echo "<script>alert('Log-out Successfully');</script>
    <script>window.location.href = 'logout-user.php'</script>";
}
?>
<div class="container-fluid px-5 d-none d-lg-block" style="background-color: #292929; ">
        <div class="row gx-0">
            <div class="col-lg-4 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="text-light"><i class="fa fa-user-circle-o" style="font-size:20px"></i> <?php echo $fetch_info['libraryUserFirtsName']." ".$fetch_info['libraryUserLastName']?></small>
               </div>
            </div>
            <div class="col-lg-8 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fa fa-location-arrow" style="font-size:20px"></i> <?php echo $fetch_info['librarylocation']?></small>
                    <small class="me-3 text-light"><i class="fa fa-address-card-o" ></i> <a href="tel:+"><?php echo $fetch_info['contactNumber']?></a></small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i><a href="mailto:"><?php echo $fetch_info['email']?></a></small>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
            <img src="../assets/images/alluserprofiles/<?php echo $fetch_info['libraryUserpicture']?>" alt="<?php echo $fetch_info['libraryUserpicture']?>" width="70px" height="70px" style="border-radius: 50%; overflow: hidden;">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars" ></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="home.php" class="nav-item nav-link <?php if($a==1){ echo 'active'; }?>">Home </a>
                    <a href="bookslist.php" class="nav-item nav-link <?php if($a==3){ echo 'active'; }?>">Books</a>
                    <a href="announcements.php" class="nav-item nav-link <?php if($a==5){ echo 'active'; }?>" >Announcements</a>
                    <a href="profile.php" class="nav-item nav-link <?php if($a==2){ echo 'active'; }?>">Account</a>
                </div>
                 <a href="<?php echo $_SERVER['PHP_SELF'].'?Deletall=all'; ?>" onclick="return confirm('Are you sure to Logout?')"><butaton type="button" class="btn text-danger ms-3"><i class="fa fa-sign-out" style="font-size:24px"></i></butaton></a>
            
               
            </div>
        </nav>


