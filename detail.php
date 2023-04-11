<!DOCTYPE html>
<html lang="en">
<?php include "head.php";

error_reporting(0);
$id = $_GET['id'];
$contdet = mysqli_query($con, "select * from contents where contID = $id");
$content = mysqli_fetch_array($contdet);
$cmts = mysqli_query($con, "select * from commentOnContents where contID = $id;");
$cmtz = mysqli_query($con, "select count(*) as commentsz from commentoncontents where contID = $id ;");
$commenttotal = mysqli_fetch_array($cmtz);


if(isset($_POST['comments'])){
    


      $name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];
   
     
  if($editq==''){
       if(empty($name)){
          $errors['name'] = "Please Input your Name to comment";
      }
      if(empty($email)){
          $errors['email'] = "Please Input your email to comment";
      }
     
      if(empty($comment)){
          $errors['comment'] = "Please Input your comment to comment";
      }
      
      if(count($errors) === 0){
        $mz = mysqli_query($con, "SHOW TABLE STATUS LIKE 'commentOnContents'");
        $mx = mysqli_fetch_assoc($mz);
        $maximun = $mx['Auto_increment'];
    
        $destination = "vlog-overview.php?overview=$id";    
        $noficationDetails = "You have new Comments from <b>".$name."</b> commented to Blog Title  <b>".$content['contTitle']."</b>";
      $insertdata = mysqli_query($con,"INSERT INTO commentOnContents(commentName, commentEmail, comment, contID, date )VALUES('$name','$email','$comment','$id','$date')");
      $insertdata2 = mysqli_query($con,"INSERT INTO notification(noficationDetails,destination, time)VALUES('$noficationDetails','$destination','$time')");
        echo "<script>alert('Comment Added Successfully');</script>";
        echo " <script>window.location.href = 'detail.php?id=$id'</script>";
      }
 
  }
}?>

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
    $a = 4;
    include "topbar.php";
    ?>
   

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn" ><?php echo  $content['contTitle']?></h1>
                    <a href="index.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"> </i><a href="blog.php" class="h5 text-white">blogs</a>    
                
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
                        <img class="img-fluid w-100 rounded mb-5" src="assets/images/blogsAndAnnouncement/<?php echo  $content['contProfile']?>" alt="<?php echo  $content['contProfile']?>">
                        <h1 class="mb-4"><?php echo  $content['contTitle']?></h1>
                        <div><?php echo  $content['contDesc']?></div>
                    </div>
                    <div class="mb-5">
                        <div class="section-title-sm position-relative pb-3 mb-4">
                            <h5 class="mb-0" ><?php echo $commenttotal['commentsz']?> Comments</h5>
                        </div>
                        <?php while ($commentx = mysqli_fetch_array($cmts)) { ?>

                            <div class="d-flex mb-4">
                            <img src="assets/images/alluserprofiles/user.png" class="img-fluid rounded" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6><b><?php echo $commentx['commentName']?></b> <small><i><?php echo $commentx['date']?></i></small></h6>
                                <p><?php echo $commentx['comment']?></p>
                            </div>
                        </div>
                        <?php }?>
                      

                    </div>
                    <div class="rounded p-4 bg-primary" >
                        <div class=" section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0 text-white" >Leave A Comment</h3>
                        </div> <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                        <form action="" method="post" enctype="multipart/form-data">
                          
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0" name="name" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-white border-0" name="email" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0" name="comment" rows="5" placeholder="Comment"></textarea>
                                </div>
                                <div class="col-12">
                               <button class="btn bg-success w-100 py-3 text-white" type="submit" name="comments">Send your Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->
                </div>
    
                <div class="col-lg-4">
                    <div class="mb-5 wow slideInUp " data-wow-delay="0.1s">
                        <div class="section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Recent Blogs</h3>
                        </div>
                        <?php $i = 1; while ($blogs = mysqli_fetch_array( $blgs)) { $i++ ; ?>
                        <div class="d-flex rounded overflow-hidden mb-3 border-1" style="max-width: 1000px">
                            <img class="img-fluid" src="assets/images/blogsAndAnnouncement/<?php echo $blogs['contProfile']?>" style="width: 100px; height: 100px; object-fit: cover;" alt="<?php echo $blogs['contProfile']?>">
                            <a href="detail.php?id=<?php echo $blogs['contID']?>" class="h5 fw-semi-bold d-flex align-items-center  px-3 mb-0 text-white" style="background-color: var(--dark)" ><?php echo $blogs['contTitle']?></a>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
   <?php include "footer.php"?>
   <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top" style="background-color: var(--dark)"><i class="bi bi-arrow-up"></i></a>
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