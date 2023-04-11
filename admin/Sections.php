<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 8;
include "adminfunction.php";

if(isset($_GET['delete_id'])){
$sec = mysqli_query($con," select sectionID from books WHERE sectionID = '".$_GET['delete_id']."';");
if(mysqli_num_rows($sec) > 0){
  echo "<script>alert('You cannot delete this section!');</script>
    <script>window.location.href = 'Sections.php'</script>";
}else{
 $query_delete="DELETE FROM section WHERE sectionID='".$_GET['delete_id']."'";
 $p = mysqli_query($con, $query_delete);
      echo "<script>alert('Section deleted successfully.');</script>
    <script>window.location.href = 'Sections.php'</script>";
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
<h4 class="card-title">List of Book Sections</h4>
<div class="line"></div><br><br>
<div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
<a href="add-sections.php"><button type="button" class="btn btn-block btn-outline-dark"> <i class="fi fi-rr-square-plus"></i> Add Sections</button></a>
</div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>Profile</th>
<th>Title</th>
<th>Description</th>
<th>created By</th>
<th>Date Created</th>
<th>Action</th>
</tr>
</thead>
<tbody> <?php
while ($section = mysqli_fetch_array($sec)) { 	
			?> 
				  <tr>
                  <td><img src="../assets/images/sectionimg/<?php echo $section["sectionProfile"]; ?>" alt="<?php echo $section["sectionProfile"]?>" width="50px" height="50px"></td>
                  <td><?php echo $section["Section_Name"]?></td>
                  <td><?php echo $section["Section_Desc"]?></td>
                  <td><?php echo $section["libraryUserFirtsName"]." ".$section["libraryUserLastName"] ?></td>
                  <td><?php echo $section["date"]?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                      <a href="add-sections.php?edit=<?php echo $section["sectionID"]; ?>" onclick="return confirm('Are you sure?')"  class="btn btn-sm bg-success-light me-2btn btn-sm bg-success-light me-2"><i class="fi fi-rr-edit"></i></a>
                        <a href="Sections.php?delete_id=<?php echo $section["sectionID"]; ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm bg-danger-light"><i class="fi fi-rr-trash"></i></a>
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