

<!DOCTYPE html>
<html lang="en">
<?php include "head.php";

$a = 1;

?>

<body>
    
<?php 
    include "topbar.php"?>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn"><i class="fi fi-rr-bank"></i> Library Portal</h1>
                    <a href="home.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"></i>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid py-1 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-1">
        <h2 class="fw-bold text-uppercase" style="color : var(--primary)">Personal Widgets</h2>
            <div class=" text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4" >
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s" >
                    <a href="bookslist.php"><div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                         <i class="fa fa-book" style="font-size:24px; color: white;"></i>
                        </div></a><div class="ps-4">
                            <h5 class="mb-2">Resources / Collections</h5>
                            <h4 class="mb-0" style="color : var(--primary)"><?php echo $countBooks['cntbooks']?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                    <a href="sections.php"> <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-tasks" style="font-size:24px; color: white;"></i>
                        </div></a>
                       <div class="ps-4">
                            <h5 class="mb-2">Sections</h5>
                            <h4 class="mb-0" style="color : var(--primary)"><?php echo $countsection['cntsection']?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                    <a href="borrowmain.php"><div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-book" style="font-size:24px; color: red;"></i></a>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Borrowed Books</h5>
                            <h4 class="mb-0" style="color : var(--primary)"><?php echo $bookcountz['userreserve'] + $borrowcont['userborrow']?></h4>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

    <?php include "footer.php";?>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>