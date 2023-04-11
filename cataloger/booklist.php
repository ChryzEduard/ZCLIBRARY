<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 9;
include "adminfunction.php";

if(isset($_GET['delete_id']))
{
 $query_delete="DELETE FROM section WHERE sectionID='".$_GET['delete_id']."'";
 $p = mysqli_query($con, $query_delete);
 echo "<script>alert('Deleted Successfully');</script>
    <script>window.location.href = 'Sections.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php";?>
<style>
  
.search-box{
    width: 300px;
    position: relative;
    display: inline-block;
    font-size: 14px;
}
.search-box input[type="text"]{
    height: 52px;
    padding: 5px 10px;
    border: 1px solid #CCCCCC;
    font-size: 14px;
}
.result{
    position: absolute;        
    z-index: 999;
    background-color: gray;
    color: white;
    top: 100%;
    left: 0;
}
.search-box input[type="text"], .result{
    width: 100%;
    box-sizing: border-box;
}
</style>
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
<h4 class="card-title">List of Book </h4>
<div class="line"></div><br><br>
<div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
<a href="add-books.php"><button type="button" class="btn btn-block btn-outline-dark">Add Books</button></a>
</div>
<div class="search-box mb-3 mt-3" id="seacr">
        <input type="text" autocomplete="off" placeholder="Search Title..." />
        <div class="result"></div>
</div>
<div class="card-body">
  
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>Profile</th>
<th>ISBN</th>
<th>Book Title</th>
<th>Book Section</th>
<th>Authors</th>
<th>Added by</th>
<th>Action</th>
</tr>
</thead>
<tbody> <?php
while ($books = mysqli_fetch_array($booklist)) { 	
			?> 
				  <tr>
                  <td><img src="../assets/images/books/<?php echo $books["bookprofile"]; ?>" alt="<?php echo $books["bookprofile"]?>" width="50px" height="50px"></td>
                  <td><?php echo $books["isbn"]?></td>
                  <td><?php echo $books["bookTitle"]?></td>
                  <td><?php echo $books["Section_Name"]?></td>
                  <td><?php echo $books["bookAuthors"]?></td>
                  <td><?php echo $books["libraryUserFirtsName"]." ".$books["libraryUserLastName"]?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="book-overview.php?overview=<?php echo $books["bookId"]; ?>" onclick="return confirm(' Book Overview')"  class="btn "><i class="fi fi-rr-eye" style="font-size: 20px;"></i></a>
                        <a href="add-books.php?edit=<?php echo $books["bookId"]; ?>" onclick="return confirm('Edit Book ')"  class="btn "><i class="fi fi-rr-edit" style="font-size: 20px;"></i></a>
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
<script>
    $(document).ready(function(){
        $('#seacr input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("search.php", {term: inputVal}).done(function(data){
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
</body>
</html>