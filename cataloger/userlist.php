<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 3;
include "adminfunction.php";

if(isset($_GET['delete_id']))
{
 $query_delete="DELETE FROM libraryuser WHERE libraryUserId='".$_GET['delete_id']."'";
 $p = mysqli_query($con, $query_delete);
 echo "<script>alert('Deleted Successfully');</script>
    <script>window.location.href = 'userlist.php'</script>";
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
<h4 class="card-title">List of Users</h4>
<div class="line"></div>

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
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody> <?php
while ($user = mysqli_fetch_array($userlist)) { 	
			?> 
				  <tr>
                  <td><img src="../assets/images/alluserprofiles/<?php echo $user["libraryUserpicture"]; ?>" alt="<?php echo $user["libraryUserFirtsName"]?>" width="50px" height="50px"></td>
                  <td><?php echo $user["libraryUserFirtsName"]." ".$user["libraryUserLastName"] ?></td>
                  <td><?php echo $user["email"]?></td>
                  <td><?php echo $user["contactNumber"]?></td>
                  <td><?php echo $user["librarylocation"]?></td>
                  <td><?php echo $user["libraryUserStatus"]?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="userlist.php?delete_id=<?php echo $user["libraryUserId"]; ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm bg-danger-light"><i class="fe fe-trash"></i></a>
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