

<!DOCTYPE html>
<html lang="en">
<?php include "head.php";
$a = 5;?>

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
    </div>
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-12">
                    <div class="row g-5">
                   
                    <?php $i = 1; while ($blogs = mysqli_fetch_array($ancmnt)) { $i++ ; ?>
                    
                        <div class="col-md-4 wow slideInUp" data-wow-delay="0.<?php echo $i?>s">
                            <div class="blog-item bg-primary rounded overflow-hidden text-white">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="../assets/images/blogsAndAnnouncement/<?php echo $blogs['contProfile']?>" alt="<?php echo $blogs['contProfile']?>">
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small><i class="far fa-calendar-alt text-primary me-2"></i><?php echo $blogs['date']?></small>
                                    </div>
                                    <h4 class="mb-3"><?php echo $blogs['contTitle']?></h4>
                                    <a class="text-uppercase" href="anccdetails.php?id=<?php echo $blogs['contID']; ?>">Read More <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <!-- Blog list End -->
    
                <!-- Sidebar Start -->
               
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