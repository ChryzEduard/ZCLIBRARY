<?php

include "adminfunction.php";
if (isset($_POST['clear'])) {
    $query_delete = "DELETE FROM notification;";
    $p = mysqli_query($con, $query_delete);
    echo "<script>alert('Deleted Successfully');window.location.href = '".$_SERVER['PHP_SELF']."'</script>";
    

}
if(isset($_GET['Deletall']))
{
 $logout = mysqli_query($con, "update libraryuser set availabiltyONOFF = 'offline' where libraryUserId = $id");
 echo "<script>alert('Logout successfully.');</script>
    <script>window.location.href = 'logout-user.php'</script>";
}
?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<div class="header" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
<div class="header-left">
    <a class="logo"><img src="assets/img/logo.png" alt="Logo" ></a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn"><i class="fe fe-bar" style="color:white;"></i></a>
 
    <a class="mobile_btn" id="mobile_btn">
    <i class="fa fa-bars"></i></a>
    <ul class="nav user-menu">
        <li class="nav-item dropdown noti-dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown"><i class="fa fa-bell"></i><?php if($notificatcounts['countnotif'] > 0){ ?>
                <span class="badge badge-pill"><?php echo $notificatcounts['countnotif']?></span>
           <?php }?> </a>
        <div class="dropdown-menu notifications">
            <div class="topnav-dropdown-header">
                <span class="notification-title">Notifications</span>
                <form action="" method="post">
                    <button name="clear" class="clear-noti" style="border: none;">Clear All </button>
                </form>
            </div>
        <div class="noti-content">
            <ul class="notification-list">
               
                    <?php while ($notif = mysqli_fetch_array($notificationdes)) { ?>
                        <li class="notification-message">
                        <a href="#">
                        <div class="media d-flex">
                            <span class="avatar avatar-sm flex-shrink-0">
                            <i class="fa fa-bell" style="font-size: 20px;"></i>
                            </span>
                        <div class="media-body flex-grow-1">
                            <p class="noti-details"><span class="noti-title"><?php echo $notif['noficationDetails']?></p>
                            <p class="noti-time"><span class="notification-time"><?php 
                            
                                $timestamp = $notif['time'];
                                    $seconds_since_timestamp = time() - $timestamp;
                                if ($seconds_since_timestamp < 60) {
                                echo round($seconds_since_timestamp)." seconds ago";
                                } else if ($seconds_since_timestamp < 3600) {
                                $minutes_since_timestamp = $seconds_since_timestamp / 60;
                                echo round($minutes_since_timestamp)." minutes ago";
                                } else if ($seconds_since_timestamp < 86400) {
                                $hours_since_timestamp = $seconds_since_timestamp / 3600;
                                echo round($hours_since_timestamp). " hours ago";
                                } else if ($seconds_since_timestamp < 31536000) {
                                $days_since_timestamp = $seconds_since_timestamp / 86400;
                                echo round($days_since_timestamp)." days ago";
                                } else {
                                $years_since_timestamp = $seconds_since_timestamp / 31536000;
                                echo round($years_since_timestamp)." years ago";
                                } ?></span></p>
                        </div>
                    </div>
                    </a >
                </li>
                <?php }?>
            </ul>
        </div>
    <div class="topnav-dropdown-footer">
</div>
</div>
</li>


<ul class="nav user-menu" >
    <li class="nav-item dropdown noti-dropdown" ><?php $ttl = $resserve_coun['reserve_count'] + $borrow_coun['borrow_count'] ?>
        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown" >
            <i class="fa fa-book" style="color: <?php if($resserve_coun['reserve_count'] > 0 || $borrow_coun['borrow_count'] > 0 ){ echo 'red';}?>;"></i> <?php if($resserve_coun['reserve_count'] > 0 || $borrow_coun['borrow_count'] > 0 ){ ?>
                <span class="badge badge-pill"><?php echo $ttl?></span>
                <?php } ?>
        </a>
        <div class="dropdown-menu ">
            <div class="topnav-dropdown-header">
                <span class="notification-title"><?php echo  $ttl?> Book Reservation</span>
            </div>
            <div class="noti-content">
                <ul class="notification-list" >
                    <li class="notification-message">
                        <a href="borrow-req.php">
                            <div class="media d-flex"  style="margin: 30px;">
                                <span class="avatar avatar-sm flex-shrink-0">
                                    <i class="fa fa-institution" style="font-size: 34px;"></i>
                                </span>
                                    <div class="media-body flex-grow-1">
                                        <p class="noti-details"><span class="noti-title"><?php echo "( ".$resserve_coun['reserve_count']." )"?>Off-site Book Reserve Request</span> </p>
                                    </div>
                            </div>
                        </a>
                    </li>
                    <li class="notification-message">
                        <a href="borrow-req-onsite.php">
                            <div class="media d-flex"  style="margin: 30px;">
                                <span class="avatar avatar-sm flex-shrink-0">
                                    <i class="fas fa-book-reader" style="font-size: 34px;"></i>
                                </span>
                                <div class="media-body flex-grow-1">
                                    <p class="noti-details"><span class="noti-title"><?php echo "( ".$borrow_coun['borrow_count']." )"?> On Site Book Reserve Request</span> </p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
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
                        <a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF'].'?Deletall=all'; ?>" onclick="return confirm('Are you sure you want to logout?')">Logout</a></div>
           </div>
            </li>

</ul>

</div>