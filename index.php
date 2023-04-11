<!DOCTYPE html>
<html lang="en">
<?php include "head.php"?>
<style>


</style>
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
    $a =1;
    include "topbar.php"?>
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="assets/images/external/zcl2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn" style="font-family: var(--bs-font-time)"><?php echo $external_info['siteTitle']?></h1>
                            <a href="index.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"> </i><a href="index.php" class="h5 text-white">Home</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="assets/images/external/zcl1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn" style="font-family: var(--bs-font-time)"><?php echo $external_info['siteTitle']?></h1>
                            <a href="index.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"> </i><a href="index.php" class="h5 text-white">Home</a> 
                
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="assets/images/external/pic3.jpeg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn" style="font-family: var(--bs-font-time)"><?php echo $external_info['siteTitle']?></h1>
                            <a href="index.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"> </i><a href="index.php" class="h5 text-white">Home</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                   <h1 class="text-uppercase" style="font-family: var(--bs-font-time);">About US</h1>
                   <p style="font-family: var(--bs-font-time);text-align: justify;"><?php echo $external_info['about_us']?></p>
                   
                    <a href="about.php" class="btn btn-primary bg-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">View More</a>
                </div>
                <div class="col-lg-5" style="max-height: 100px;">
                <div class="aboutusImg">
                    <div class="position-relative h-50">
                        <img class="position-absolute rounded wow zoomIn" data-wow-delay="0.9s" src="assets/images/external/logo.png" style="object-fit: contain;">
                    </div>
                </div>    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-center bg-primary " >
                                <h4 class="card-title text-white">Schedule events</h4>
                            </div>
                            <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                                <li class="nav-item"><a class="nav-link btn-primary text-danger" href="#top-justified-tab1" data-bs-toggle="tab">All Events</a></li>
                                <li class="nav-item"><a class="nav-link btn-primary text-danger active" href="#top-justified-tab2" data-bs-toggle="tab">Today's Event</a></li>
                                <li class="nav-item"><a class="nav-link btn-primary  text-danger" href="#top-justified-tab3" data-bs-toggle="tab">Tommorows Event</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane " id="top-justified-tab1">
                                    <br><br>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr >
                                                        <th><i class="fi fi-rr-calendar-clock"></i> Event Name</th>
                                                        <th><i class="fi fi-rr-calendar-clock"></i> Year - Month - Date </th>
                                                        <th><i class="fi fi-rr-calendar-clock"></i> Actions</th>
                                                    </tr>
                                                </thead>
                                            <tbody>
                                                    <?php while( $allevent = mysqli_fetch_array($allm)){ ?>
                                                        <tr><td><?php echo $allevent['eventName']?></td>
                                                            <td><?php echo $allevent['eventDate']?></td>
                                                            <td> <a href="event-details.php?id=<?php echo $allevent["eventID"]; ?>" onclick="return confirm('Are you sure?')"  class="btn btn-sm bg-primary text-white"><i class="fi fi-rr-bullseye-pointer"></i> View this Event</a>  </td>
                                                         </tr>
                                                    <?php }?>
                            
                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <div class="tab-pane show active" id="top-justified-tab2">
                        <br><br>
                    <div class="table-responsive">
                        <table class="table">
                                <thead>
                                    <tr >
                                        <th><i class="fi fi-rr-calendar-clock"></i> Event Name</th>
                                        <th><i class="fi fi-rr-calendar-clock"></i> Year - Month - Date </th>
                                        <th><i class="fi fi-rr-calendar-clock"></i> Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                                if(mysqli_num_rows($todayevent) == 0) {
                                                    echo "<tr><td colspan='3'>No Event for this Day</td></tr>";
                                                } else {
                                                    while($today = mysqli_fetch_array($todayevent)) {
                                            ?>
                                    <tr>
                                        <td><?php echo $today['eventName']?></td>
                                        <td><?php echo $today['eventDate']?></td>
                                        <td> <a href="event-details.php?id=<?php echo $today["eventID"]; ?>" onclick="return confirm('Are you sure?')"  class="btn btn-sm bg-primary text-white"><i class="fi fi-rr-bullseye-pointer"></i> View this Event
                                            </a>  
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                        } ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                        <div class="tab-pane" id="top-justified-tab3">
                            <br><br>
                                <div class="table-responsive">
                                    <table class="table">
                                    <thead>
                                        <tr >
                                            <th><i class="fi fi-rr-calendar-clock"></i> Event Name</th>
                                            <th><i class="fi fi-rr-calendar-clock"></i> Year - Month - Date </th>
                                            <th><i class="fi fi-rr-calendar-clock"></i> Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                    if(mysqli_num_rows($tomorrow_events) == 0) {
                                                        echo "<tr><td colspan='3'>No Event for Tommorrow</td></tr>";
                                                    } else {
                                                        while($today = mysqli_fetch_array($tomorrow_events)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $today['eventName']?></td>
                                                    <td><?php echo $today['eventDate']?></td>
                                                    <td> <a href="event-details.php?id=<?php echo $today["eventID"]; ?>" onclick="return confirm('Are you sure?')"  class="btn btn-sm bg-primary text-white"><i class="fi fi-rr-bullseye-pointer"></i> View this Event
                                                        </a>  
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            } ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div></div>
</div>
</div>
</div><div class="container-fluid wow zoomIn" data-wow-delay="0.1s">
        <div class="container ">
            <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
               <div class="container py-5">
                    <div class=" text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 1000px;">
                        <h2 class="fw-bold text-uppercase" ><?php echo $external_info['siteTitle']?>'s Gallery</h2>
                    </div>
                    <div class="row g-2 justify-content-center">
                        <?php while ($galleries = mysqli_fetch_array($gal)) { ?>
                            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                                <div class="team-item bg-light rounded overflow-hidden">
                                    <div class="team-img position-relative overflow-hidden">
                                        <img class="img-fluid w-100" src="assets/images/gallery/<?php echo $galleries['galleryPic']?>" alt="">
                                    </div>
                                <div class="text-center py-4 bg-primary" >
                                    <h4 class="text-white" ><?php echo $galleries['galleryTitle']?></h4>
                                    <p class="text-uppercase m-0 text-white"><?php echo $galleries['galleryDesc']?></p>
                                </div>
                            </div>
                        </div>
                <?php } ?>
                <center><a href="gallery.php" class="btn btn-primary wow zoomIn mt-5" style="background-color : var(--dark)" data-wow-delay="0.9s"> View More</a></center>
            </div>
        </div>
    </div>



    </div>
   
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-uppercase" style="font-family: var(--bs-font-time)">Latest Blog</h5>
                <h1 class="mb-0"  style="font-family: var(--bs-font-time)">Read The Latest Articles from Our Blog Post</h1>
            </div>
            <div class="row g-5">
            <?php $i = 1; while ($blogs = mysqli_fetch_array( $blgsindex)) { $i++ ; ?>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-primary text-white rounded overflow-hidden " >
                        
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small><i class="far fa-calendar-alt text-white me-2"></i><?php echo $blogs['date']?></small>
                            </div>
                            <h4 class="mb-3 text-white"><?php echo $blogs['contTitle']?></h4>
                            <a class="text-uppercase" href="detail.php?id=<?php echo $blogs['contID']; ?>">Read More <i class="bi bi-arrow-right text-white"></i></a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
  
   <?php include "footer.php";?>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top" style="background-color: var(--dark)"><i class="bi bi-arrow-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>