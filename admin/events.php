<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 16;
include "adminfunction.php";

if(isset($_GET['delete_id']))
{
 $query_delete="DELETE FROM event WHERE eventID='".$_GET['delete_id']."'";
 $p = mysqli_query($con, $query_delete);
 echo "<script>alert('Deleted Successfully');</script>
 <script>window.location.href = 'events.php'</script>";
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
<h4 class="card-title"><i class="fi fi-rr-calendar-star"></i> Library Event List</h4>
<div class="line"></div><br>
<div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
     <a href="add-events.php"><button type="button" class="btn btn-block btn-outline-dark">  Add Events</button></a>
</div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>Event Banner</th>
<th>Event Name</th>
<th>Event Date</th>
<th>Event Description</th>
<th>Action</th>
</tr>
</thead>
<tbody> <?php
while ($events = mysqli_fetch_array($dtz)) { 	
			?> 
				  <tr>
                  <td><img src="../assets/images/events/<?php echo $events["eventPic"]; ?>" alt="<?php echo $events["eventPic"]?>" width="50px" height="50px"></td>
                  <td><?php echo $events["eventName"]?></td>
                  <td><?php echo $events["eventDate"]?></td>
                  <td><?php $dec = $events["eventDesc"];
								$removetag = strip_tags($dec);
								$trim = $string = substr($removetag,0,600);
								echo $trim ; ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                      <a href="add-events.php?edit=<?php echo $events["eventID"]; ?>" onclick="return confirm('Are you sure?')"  class="btn "> <i class="fi fi-rr-edit" style="font-size: 20px;"></i></a>  
                      <a href="events.php?delete_id=<?php echo $events["eventID"]; ?>" onclick="return confirm('Are you sure?')" class="btn "> <i class="fi fi-rr-trash" style="font-size: 20px;"></i></a>
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