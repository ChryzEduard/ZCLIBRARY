

<!DOCTYPE html>
<html lang="en">
<?php include "head.php";
$a = 3;

if(isset($_GET['sec'])){
    $qry = mysqli_query($con,"select * from books where sectionID ='".$_GET['sec']."'");
    $qry2 = mysqli_query($con,"select Section_Name from section where sectionID ='".$_GET['sec']."'");
    $nm = mysqli_fetch_assoc($qry2);
}



?>

<body>

<?php 
    include "topbar.php"?>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn"><?php echo $nm['Section_Name']?></h1>
                </div>
            </div>
        </div>
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
<th>Action</th>
</tr>
</thead>
<tbody><?php
while ($books = mysqli_fetch_array($qry)) { 	
			?> 
				  <tr>
                  <td><img src="../assets/images/books/<?php echo $books["bookprofile"]; ?>" alt="<?php echo $books["bookprofile"]?>" width="50px" height="50px"></td>
                  <td><?php echo $books["isbn"]?></td>
                  <td><?php echo $books["bookTitle"]?></td>
                  <td><?php echo $books["bookAuthors"]?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="bookoverview.php?overview=<?php echo $books["bookId"]; ?>" onclick="return confirm(' Book Overview')"  class="btn btn-sm bg-success-light me-2btn btn-sm bg-success-light me-2"><i class="fe fe-eye"></i> see content</a>
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