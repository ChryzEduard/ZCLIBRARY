<!DOCTYPE html>
<html lang="en">
<?php include "head.php"?>

<body>

<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinners">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div><br><br><br>
        <p style="display: flex; position: relative; right : 55px; width:200px"><?php echo $external_info['siteTitle']?></p>
    </div>
    </div>

    <?php 
    $a = 5;
    include "topbar.php";
    $id = $_GET['id'];
    $contdet = mysqli_query($con, "select * from contents where contID = $id");
    $content = mysqli_fetch_array($contdet);
    ?>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn" style="font-family: var(--bs-font-time)"><?php echo  $content['contTitle']?></h1>
                    <a href="index.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"> </i><a href="announcements.php" class="h5 text-white">Announcements</a>
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
                        <img class="img-fluid w-100 rounded mb-5" src="assets/images/blogsAndAnnouncement/<?php echo  $content['contProfile']?>" alt="">
                        <h1 class="mb-4"><?php echo  $content['contTitle']?></h1>
                        <div><?php echo  $content['contDesc']?></div>
                    </div>
                </div>
                <div class="col-lg-4">
                <div class="wow slideInUp" data-wow-delay="0.1s">
                        
                    </div>
                    <br><br>
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0" style="font-family: var(--bs-font-time)">List of Announcement</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                        <?php $i = 1; while ($blogs = mysqli_fetch_array( $ancmnt)) { $i++ ; ?>
                            <a class="h5 fw-semi-bold bg-primary text-white rounded py-2 px-3 mb-2" href="anccdetails.php?id=<?php echo $blogs['contID']; ?>"><i class="bi bi-arrow-right me-2"></i><?php echo $blogs['contTitle']?></a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"?>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top" style="background-color: var(--dark)"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>