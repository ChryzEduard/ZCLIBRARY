

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
                    <h1 class="display-4 text-white animated zoomIn">Library Portal</h1>
                    <a class="h5 text-white">user portal</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-1 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-1">
        <h2 class="fw-bold text-uppercase" style="color : var(--primary)">Library Sections</h2>
            <div class=" text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
          </div>
<div class="row">

<?php while ($section = mysqli_fetch_assoc($sec)) { ?>
  <div class="column">
  <a href="secbooks.php?sec=<?php echo $section["sectionID"]; ?>"><div class="cards">
   <img id="imagesection" src="../assets/images/sectionimg/<?php echo $section['sectionProfile']?>" alt="<?php echo $section['Section_Name']?>">
        <h2><?php echo $section['Section_Name']?></h2>
    </div></a>
  </div>
  <?php } ?>
  
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