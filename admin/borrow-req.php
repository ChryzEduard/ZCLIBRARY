<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 13;
include "adminfunction.php";


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
<h4 class="card-title">Request Books Off-Site</h4>
<div class="line"></div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>Book Title</th>
<th>Borrower Name</th>
<th>Date Start</th>
<th>Date End</th>
<th>Action</th>
</tr>
</thead>
<tbody> <?php
while ($borrowbooks = mysqli_fetch_array($borrowreq)) { 	
			?> 
				  <tr>
                  <td><?php echo $borrowbooks["bookTitle"]?></td>
                  <td><?php echo $borrowbooks["libraryUserFirtsName"] ." ".$borrowbooks["libraryUserLastName"] ?></td>
                  <td><?php echo $borrowbooks["datestart"]?></td>
                  <td><?php echo $borrowbooks["dateend"]?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="borrow-overview-req.php?overview=<?php echo $borrowbooks["resereID"]; ?>" onclick="return confirm(' Book Overview')"  class="btn "><i class="fi fi-rr-eye" style="font-size: 20px;"></i></a>
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