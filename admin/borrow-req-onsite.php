<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 13;
include "adminfunction.php";

if(isset($_GET['delete_id']))
{
 $query_delete="DELETE FROM borrowbook WHERE borrowID = '".$_GET['delete_id']."'";
 $p = mysqli_query($con, $query_delete);
 echo "<script>alert('Deleted Successfully');</script>
    <script>window.location.href = 'borrow-req-onsite.php'</script>";
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
<h4 class="card-title">Request Books On-Site</h4>
<div class="line"></div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>Book Title</th>
<th>Borrower Name</th>
<th>Date Borrowed</th>
<th>Date End</th>
<th>Action</th>
</tr>
</thead>
<tbody> <?php
while ($borrowonsite = mysqli_fetch_array($requestborrow)) { 	
			?> 
				  <tr>
                  <td><?php echo $borrowonsite["bookTitle"]?></td>
                  <td><?php echo $borrowonsite["libraryUserFirtsName"] ." ".$borrowonsite["libraryUserLastName"] ?></td>
                  <td><?php echo $borrowonsite["date"]?></td>
                  <td><?php echo $borrowonsite["isbn"]?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="borrow-overview-req-onsite.php?overview=<?php echo $borrowonsite["borrowID"]; ?>" onclick="return confirm(' Book Overview')"  class="btn "><i class="fi fi-rr-eye" style="font-size: 20px;"></i></a>
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