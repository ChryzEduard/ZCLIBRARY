<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 5;
include "adminfunction.php";
$catlist = mysqli_query($con,"select * FROM libraryuser where libraryUserRole = '2'");
if(isset($_GET['delete_id']))
{
 $query_delete="DELETE FROM libraryuser WHERE libraryUserId='".$_GET['delete_id']."'";
 $p = mysqli_query($con, $query_delete);
 echo "<script>alert('Deleted Successfully');</script>
    <script>window.location.href = 'catallist.php'</script>";
}


if(isset($_GET['lock'])){
    $qry = mysqli_query($con,"select flagsuspendedz from libraryuser where libraryUserId ='".$_GET['lock']."' ");
    $lk = mysqli_fetch_assoc($qry );
    if($lk['flagsuspendedz'] == 1){
        $lo = mysqli_query($con, "UPDATE libraryuser SET flagsuspendedz = 0 WHERE  libraryUserId='".$_GET['lock']."'");
        echo "<script>alert('Account UNLOCK Successfully');</script>
        <script>window.location.href = 'catallist.php'</script>";
    }else{
        $lo = mysqli_query($con, "UPDATE libraryuser SET flagsuspendedz = 1 WHERE  libraryUserId='".$_GET['lock']."'");
        echo "<script>alert('Account LOCK Successfully');</script>
        <script>window.location.href = 'catallist.php'</script>";
    }



   
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php";?>
<body>

<div class="main-wrapper">
    <?php include "header.php"?>
    <?php include "sidebar.php"?>
    <div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row">
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">List of Catalogers</h4>Online : <?php echo $onlinec['Onlinec']?><div class="line"></div><br>

<div class="col-2 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
<a href="addcataloger.php"><button type="button" class="btn btn-block btn-outline-dark">Register Cataloger</button></a>
</div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>Picture</th>
<th>Names</th>
<th>Email</th>
<th>Contact Number</th>
<th>Address</th>
<th>Action</th>
</tr>
</thead>
<tbody> <?php
while ($cataloger = mysqli_fetch_array($catlist)) { 	
			?> 
				  <tr>
                  <td><div class="avatar avatar-<?php echo $cataloger["availabiltyONOFF"]; ?>">
                        <img src="../assets/images/alluserprofiles/<?php echo $cataloger["libraryUserpicture"]; ?>" alt="<?php echo $cataloger["libraryUserFirtsName"]?>" width="50px" height="50px">
                      </div>
                  </td>
                  <td><?php echo $cataloger["libraryUserFirtsName"]." ".$cataloger["libraryUserLastName"] ?></td>
                  <td><?php echo $cataloger["email"]?></td>
                  <td><?php echo $cataloger["contactNumber"]?></td>
                  <td><?php echo $cataloger["librarylocation"]?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                      <?php if($fetch_info['email'] == $cataloger["email"]){ ?>
                          <td><a href="profile.php">see your profile </a></td>
                       <?php }else{?>
                        <a href="detailcataloger.php?user=<?php echo $cataloger["libraryUserId"]; ?>" onclick="return confirm('Are you sure?')"  class="btn  btn-lg"><i class="fi fi-rr-user-pen"></i></a>
                        <a href="catallist.php?delete_id=<?php echo $cataloger["libraryUserId"]; ?>" onclick="return confirm('Are you sure?')" class="btn "><i class="fi fi-rr-trash"></i></a>
                        <a href="catallist.php?lock=<?php echo $cataloger["libraryUserId"]; ?>" class="btn btn-sm bg-danger<?php if($cataloger["flagsuspendedz"] == 0 ){ echo "-light" ;}?>" <?php if($cataloger["flagsuspendedz"] == 0 ){ echo "onclick=\"return confirm('You are about to lock this Account')\"";}else{ echo "onclick=\"return confirm('You are about to unlock this Account')\"";}?>><i class="fi fi-rr-lock" style="color:<?php if($cataloger["flagsuspendedz"] == 1 ){ echo "white" ;}?>"></i>
</a>

                       
                            <?php 
                      }
                          ?>
                        </div>
                    </td>
                </tr>
			<?php 
			
			} 
			?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>



<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>