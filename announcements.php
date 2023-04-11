<!DOCTYPE html>
<html lang="en">

<?php include "head.php"?>

<body >
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
    $a =5;
    include "topbar.php"?>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn" style="font-family: var(--bs-font-time)">Announcements</h1>
                    <a href="index.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"> </i><a href="announcements.php" class="h5 text-white">Announcements</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-1 wow fadeInUp" data-wow-delay="0.1s" >
        <div class="container py-2">
            <div class="row">
                <!-- Blog list Start -->
                <div class="col-lg-12">
                    <div class="row">
                   
                    <?php $i = 1; while ($blogs = mysqli_fetch_array( $ancmnt)) { $i++ ; ?>
                    
                        <div class="col-md-6 wow slideInUp mt-3" data-wow-delay="0.<?php echo $i?>s">
                            <div class="blog-item bg-primary rounded overflow-hidden" style="border: 1px solid var(--dark)">
                               
                                <div class="p-4" style="font-family: var(--bs-font-time)">
                                    <div class="d-flex mb-8 text-light">
                                        <small><i class="far fa-calendar-alt text-light me-2"></i><?php echo $blogs['date']?></small>
                                    </div>
                                    <h4 class="mb-3 text-light" ><?php echo $blogs['contTitle']?></h4>
                                    <a class="text-uppercase text-light" href="anccdetails.php?id=<?php echo $blogs['contID']; ?>">Read More <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
               
        </div>
    </div>
   
    </div> <?php include "footer.php";?><a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top" style="background-color: var(--dark)"><i class="bi bi-arrow-up"></i></a>

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