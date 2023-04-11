<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 14;
include "adminfunction.php";

if(isset($_GET['delete_id'])){
 $lib = mysqli_query($con,"select libraryspaceId from borrowbook where libraryspaceId ='".$_GET['delete_id']."'");
 if(mysqli_num_rows($lib)){
    echo "<script>alert('you cannot delete it because there are users occupying the space');window.location.href = 'library-space.php'</script>";
 }else{
  $query_delete="DELETE FROM libraryspace WHERE libraryspaceId='".$_GET['delete_id']."'";
  $p = mysqli_query($con, $query_delete);
  echo "<script>alert('Deleted Successfully');</script>
     <script>window.location.href = 'library-space.php'</script>";
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
<h4 class="card-title"><i class="fi fi-rr-distribute-spacing-vertical"></i> Library Space</h4>
<div class="line"></div><br>
<div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
     <a href="add-library-space.php"><button type="button" class="btn btn-block btn-outline-dark">Add Library Space</button></a>
</div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>Uploaded Photo</th>
<th>Name Space</th>
<th>Action</th>
</tr>
</thead>
<tbody> <?php
while ($libspace = mysqli_fetch_array($space)) { 	
			?> 
				  <tr>
                  <td><img src="../assets/images/libraryspace/<?php echo $libspace["libraryspacePic"]; ?>" alt="<?php echo $libspace["libraryspacePic"]?>" width="50px" height="50px"></td>
                  <td><?php echo $libspace["libraryspaceName"]?></td>
                   <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                      <a href="add-library-space.php?edit=<?php echo $libspace["libraryspaceId"]; ?>" onclick="return confirm('Are you sure?')"  class="btn"><i class="fi fi-rr-edit" style="font-size: 20px;"></i></a>  
                      <a href="library-space.php?delete_id=<?php echo $libspace["libraryspaceId"]; ?>" onclick="return confirm('Are you sure?')" class="btn "><i class="fi fi-rr-trash" style="font-size: 20px;"></i></a>
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