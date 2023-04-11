<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 0;
include "adminfunction.php";

if(isset($_GET['delete']))
{
 $query_delete="DELETE FROM contactusmessage WHERE cntmID = '".$_GET['delete']."'";
 $p = mysqli_query($con, $query_delete);
 echo "<script>alert('Deleted Successfully');</script>
    <script>window.location.href = 'externalmessage.php'</script>";
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
<h4 class="card-title">External Messages</h4>
<div class="line"></div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Send Date</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody> <?php
while ($exmessage = mysqli_fetch_array($msgs)) { 	
			?> 
				  <tr>
                  <td><?php echo $exmessage["cntmFname"]?></td>
                  <td><?php echo $exmessage["cntmEmail"] ?></td>
                  <td><?php echo $exmessage["date"]?></td>
                  <td><?php echo $exmessage["status"]?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="messagedetail.php?overview=<?php echo $exmessage["cntmID"]; ?>" onclick="return confirm('View Overall Details')"  class="btn  "><i class="fi fi-rr-eye" style="font-size: 20px;"></i></a>
                        <a href="externalmessage.php?delete=<?php echo $exmessage["cntmID"]; ?>"  class="btn "><i class="fi fi-rr-trash" style="font-size: 20px;"></i></a>  
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