<?php

include "adminfunction.php";
if($fetch_info['flagsuspendedz'] ==  1){
    echo "<script>alert('Your Account is Temporary Lockup');window.location.href='logout-user.php'</script>";
}


if(isset($_GET['Deletall']))
{
 $logout = mysqli_query($con, "update libraryuser set availabiltyONOFF = 'offline' where libraryUserId = $id");
 echo "<script>alert('Log-out Successfull');</script>
    <script>window.location.href = 'logout-user.php'</script>";
}
?>

<div class="header">
<div class="header-left">
    <a href="home.php" class="logo"><img src="assets/img/logo.png" alt="Logo"></a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn"><i class="fe fe-bar" style="color:white;"></i></a>
    <a class="mobile_btn" id="mobile_btn">
    <i class="fa fa-bars"></i></a>

<ul class="nav user-menu">
    


<li class="nav-item dropdown has-arrow">
<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<span class="user-img"><img class="rounded-circle" src="../assets/images/alluserprofiles/<?php echo $fetch_info['libraryUserpicture']?>" width="31" alt="<?php echo $fetch_info['libraryUserFirtsName']." ".$fetch_info['libraryUserLastName']?>"></span>
</a>
<div class="dropdown-menu">
<div class="user-header">
<div class="avatar avatar-sm">
<img src="../assets/images/alluserprofiles/<?php echo $fetch_info['libraryUserpicture']?>" alt="<?php echo $fetch_info['libraryUserpicture']?>" class="avatar-img rounded-circle">
</div>
<div class="user-text">
<h6><?php echo $fetch_info['libraryUserFirtsName']." ".$fetch_info['libraryUserLastName']?></h6>
<p class="text-muted mb-0"><?php echo $Roletitle?></p>
</div>
</div>
<a class="dropdown-item" href="profile.php">My Profile</a>
<a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF'].'?Deletall=all'; ?>" onclick="return confirm('Are you sure to Logout?')">Logout</a>

</div>
</li>

</ul>

</div>