

<!DOCTYPE html>
<html lang="en">
<?php include "head.php";
$a = 3;


if(isset($_GET['overview']))
{
    $editq = $_GET['overview'];
    $editbooks = mysqli_query($con,"SELECT * FROM books where bookId=".$editq."");
    $boook = mysqli_fetch_array($editbooks);
    $sec = mysqli_query($con,"select sectionID from books where bookTitle = '".$boook['bookTitle']."';");
    $section = mysqli_fetch_array($sec);
    $sort = mysqli_query($con,"select * from books where sectionID = '".$section['sectionID']."';");
   
    
}
$bookfkid = $boook['bookId'];
?>

<body>
 
<?php 
    include "topbar.php"?>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn"><?php echo $boook['bookTitle']?></h1>
                    <a href="home.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"> </i><a href="bookslist.php" class="h5 text-white">Book List</a> 
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-1">
            
            <div class="row g-1">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="../assets/images/books/<?php echo $boook["bookprofile"]; ?>" alt="<?php echo $boook["bookprofile"]; ?>" ">
                        <?php
                             $book_checkss = "SELECT * FROM reserve WHERE bookId = '$bookfkid' AND status IN ('Approved', 'wait for approval','RETURN BOOK')";
                             $ress = mysqli_query($con, $book_checkss );
                             $reserved = mysqli_num_rows($ress);
                             $book_checkz = "SELECT * FROM borrowbook WHERE bookId = '$bookfkid' and status IN ('Approved', 'wait for approval','RETURN BOOK')";
                             $resz = mysqli_query($con, $book_checkz );
                             $borreowed = mysqli_num_rows($resz);
                             if($reserved > 0 || $borreowed > 0 ){ ?>
                                         <h4 class="mb-4"> <a onclick="return confirm(' The Book is Already Reserved')"  ><button class="btn btn-secondary" >Can't Reserve Book</button> </a> </h4>
                                 <?php }else{ ?>
                                    <h4 class="mb-4"> <a href="bookborrow.php?reserve=<?php echo $boook["bookId"]; ?>" onclick="return confirm(' Book Overview')"  ><button class="btn btn-primary" ><i class="fi fi-ts-books"></i> Reserve Book</button> </a> <a href="bookreserve.php?reserve=<?php echo $boook["bookId"]; ?>" onclick="return confirm(' Book Overview')"  ><button class="btn btn-primary" ><i class="fi fi-rr-home-location-alt"></i> Borrow Book</button> </a></h4>
                                    <?php } ?>
                        <br><h5> ISBN : <?php echo $boook["isbn"] ?> / Dewey Decimal : <?php echo $boook["Deweydecimal"] ?></h5>
                        <p style="font-size: 20px;">Content : <?php echo $boook["bookDescription"]; ?></p>
                        <p>Source : <?php echo $boook["bookSource"]; ?></p>
                        <p>Publisher : <?php echo $boook["bookPublisher"]; ?></p>
                        <p>Place Publised : <?php echo $boook["bookPlacePublisher"]; ?></p>
                    </div>
                </div>
    
                <div class="col-lg-4">
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Similar Books</h3>
                        </div>
                        <?php
                            while ($books = mysqli_fetch_array($sort)) { 	
			            ?> 
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="../assets/images/books/<?php echo $books["bookprofile"]; ?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="bookoverview.php?overview=<?php echo $books["bookId"]; ?>" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0"><?php echo $books["bookTitle"]; ?>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include "footer.php";?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
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
    <!-- Template Javascript-->
    <script src="../js/main.js"></script>
</body>

</html>