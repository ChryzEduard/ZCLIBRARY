

<!DOCTYPE html>
<html lang="en">
<?php include "head.php";
$a = 5;

$id = $_GET['id'];
$contdet = mysqli_query($con, "select * from contents where contID = $id");
$content = mysqli_fetch_array($contdet);


?>

<body>
<?php 
    include "topbar.php"?>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn"><i class="fi fi-rr-bullhorn"></i> Announcement</h1>
                    <a href="home.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"> </i><a href="bookslist.php" class="h5 text-white">Book List</a> 
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="../assets/images/blogsAndAnnouncement/<?php echo  $content['contProfile']?>" alt="">
                        <h1 class="mb-4"><?php echo  $content['contTitle']?></h1>
                        <div><?php echo  $content['contDesc']?></div>
                    </div>
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                <div class="wow slideInUp" data-wow-delay="0.1s">
                        
                    </div>
                    <br><br>
                    <!-- Search Form End -->
    
                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">List of Announcement</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                        <?php $i = 1; while ($blogs = mysqli_fetch_array( $ancmnt)) { $i++ ; ?>
                            <a class="h5 fw-semi-bold bg-primary text-white rounded py-2 px-3 mb-2" href="anccdetails.php?id=<?php echo $blogs['contID']; ?>"><i class="fi fi-ts-bullhorn"></i> <?php echo $blogs['contTitle']?></a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
        $('#search_announce input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("search.php", {announ: inputVal}).done(function(data){
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