

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
                    <h1 class="display-4 text-white animated zoomIn">Book Sections</h1>
                    <a class="h5 text-white">user portal</a>
                </div>
            </div>
        </div>
    </div><center>
<div class="container ">
<div class="row">
    <div class="col-12" >
        <div class="col-12">
            <div><div class="row">
                <div class="col-6">
                       <a href="borrowbooklist-onsite.php"> <div class="card border">
                            <div class="card-header bg-primary text-white">
                                VIEW ON SITE LIST
                            </div>
                            <div class="card-body">
                            <i class="bi bi-book text-primary me-2 display-6"></i> <h3> Total Books : <?php echo $borrowcont['userborrow']?></h3>
                            </div>
                        </div></a>
                </div>
            <div class="col-6">
            <a href="borrowbooklist.php">  <div class="card border">
                            <div class="card-header bg-primary text-white">
                                VIEW OFF SITE LIST
                            </div>
                            <div class="card-body">
                            <i class="bi bi-book text-primary me-2 display-6"></i>  <h3> Total Books : <?php echo $bookcountz['userreserve']?></h3> 
                            </div>
                        </div>
            </div></a></div></div>
        </div></div>
</div></div></center>


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
    
</body>

</html>