

<!DOCTYPE html>
<html lang="en">
<?php include "head.php";
$a = 3;

if(isset($_GET['delete_id']))
{
 $query_delete="DELETE FROM reserve WHERE resereID='".$_GET['delete_id']."'";
 $p = mysqli_query($con, $query_delete);
 echo "<script>alert('Deleted Successfully');</script>
    <script>window.location.href = 'borrowbooklist.php'</script>";
}

?>

<body>

<?php 
    include "topbar.php"?>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">OFF SITE</h1>
                    <a class="h5 text-white"> Borrowed Books</a>
                </div>
            </div>
        </div>
    </div>
<div style=" position : inherit">
<div class="search-box" id="seacr" style="margin: 3%; ">
        <input type="text" autocomplete="off" placeholder="Search Book..." />
        <div class="result"></div>
    </div>
<div class="main-wrapper" >
<div class="row" style="margin: 2%; ">
<div class="col-sm-12">
<div class="card">
  
<div class="card-body" >
<div class="table-responsive" >
<table class="datatable table table-stripped" >
 
<thead>
<tr>
<th>Profile</th>
<th>ISBN</th>
<th>Book Title</th>
<th>Authors</th>
<th>Date Start</th>
<th>Date End</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody><?php
while ($books = mysqli_fetch_array($listofborrow)) { 	
			?> 
				  <tr>
                  <td><img src="../assets/images/books/<?php echo $books["bookprofile"]; ?>" alt="<?php echo $books["bookprofile"]?>" width="50px" height="50px"></td>
                  <td><?php echo $books["isbn"]?></td>
                  <td> <?php echo $books["bookTitle"]?></td>
                  <td><?php echo $books["bookAuthors"]?></td>
                  <?php if($books["flag"] == 1 && $books["status"] != 'Book Returned'){$cl = 'success';}else{$cl = ''; }?>
                  <td class="bg-<?php echo $cl?>"><?php echo $books["datestart"]?></td>
                  <?php if($books["status"] == "RETURN BOOK"){ $stle = "bg-danger text-white";}else{ $stle = "";};?>
                  <td class="<?php echo $stle?>"><?php echo $books["dateend"]?></td>
                  <td><?php echo $books["status"]?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="bookoverview.php?overview=<?php echo $books["bookId"]; ?>" onclick="return confirm('Book Overview')"  class="btn btn-sm bg-success-light me-2btn btn-sm bg-success-light me-2"><i class="fe fe-eye"></i> see content</a>
                        <?php  if($books["status"] == 'wait for approval' ){  ?>
                            <a href="bookreserve.php?res=<?php echo $books["resereID"]; ?>" onclick="return confirm('Are you sure?')"  class="btn btn-sm bg-success-light me-2btn btn-sm bg-success-light me-2"><i class="fe fe-pencil"></i></a>
                            <a href="borrowbooklist.php?delete_id=<?php echo $books["resereID"]; ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm bg-danger-light"><i class="fe fe-trash"></i></a>
                            <?php } ?>
                            
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
</div></div></div>


<?php include "footer.php";?>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/datatables.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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