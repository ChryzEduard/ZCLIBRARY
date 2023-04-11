<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 15;
include "adminfunction.php";

if(isset($_GET['delete_id']))
{
 $query_delete="DELETE FROM reserve WHERE resereID = '".$_GET['delete_id']."'";
 $p = mysqli_query($con, $query_delete);
 echo "<script>alert('Deleted Successfully');</script>
    <script>window.location.href = 'borrow.php'</script>";
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
<h4 class="card-title">ON-Site borrowers</h4>
<div class="line"></div>
</div>
<div class="card-body">
<div style=" position : inherit">
<div class="search-box mb-5" id="onsite" >
        <input type="text" autocomplete="off" placeholder="Search Borrower..." />
        <div class="result"></div>
    </div>
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>Book Title</th>
<th>Borrower Name</th>
<th>Date</th>
<th>Occupied Space</th>
<th>Action</th>
</tr>
</thead>
<tbody> <?php
while ($borrowonsite = mysqli_fetch_array($borrow_onsite)) { 	
			?> 
				  <tr>
                  <td><?php echo $borrowonsite["bookTitle"]?></td>
                  <td><?php echo $borrowonsite["libraryUserFirtsName"] ." ".$borrowonsite["libraryUserLastName"] ?></td>
                  <td><?php echo $borrowonsite["date"]?></td>
                  <td><?php echo $borrowonsite["libraryspaceName"]?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="borrow-overview-onsite.php?overview=<?php echo $borrowonsite["borrowID"]; ?>" onclick="return confirm('Borrower Overview')"  class="btn "><i class="fi fi-rr-eye" style="font-size: 20px;"></i></a>
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
<script>
    $(document).ready(function(){
        $('#onsite input[type="text"]').on("keyup input", function(){
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("search.php", {borrowonsite: inputVal}).done(function(data){
                    resultDropdown.html(data);
                });
            } else{
                resultDropdown.empty();
            }
        });
        
        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
    </script>
<script src="assets/js/script.js"></script>
</body>
</html>