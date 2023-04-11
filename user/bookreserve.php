

<!DOCTYPE html>
<html lang="en">
<?php include "head.php";
include "adminfunction.php";
error_reporting(0);
$a = 3;
$datestart = date('Y-m-d');
if(isset($_GET['reserve']))
{
    $editb = $_GET['reserve'];
    $editbo = mysqli_query($con,"SELECT * FROM books where bookId=".$editb."");
    $editboooks = mysqli_fetch_array($editbo);
   
}


if(isset($_GET['res']))
{
    $editre = $_GET['res'];
    $editbo = mysqli_query($con,"select * from books join reserve on reserve.bookId = books.bookId where resereID =".$editre."");
    $editres = mysqli_fetch_array($editbo);
    
   
}


$bookfktilte = $editboooks['bookTitle'];
$bookfkid = $editboooks['bookId'];
if(isset($_POST['reservesssss'])){

   


  if($_FILES['lis_img0']['name']!=''){
    $lis_img0 = $_FILES['lis_img0']['name'];
    }
    else{
      $lis_img0 = $editres["validID"];
    }
    $tempname = $_FILES['lis_img0']['tmp_name'];
    $folder = "../assets/images/validIDs/".$lis_img0;

    
    $dateend = $_POST['dateend'];
    $reasons = $_POST['reasons'];
    
    
   
if($editre==''){
    $book_checkss = "SELECT * FROM reserve WHERE bookId = '$bookfkid' ";
    $ress = mysqli_query($con, $book_checkss);
    $onsitez = "SELECT * FROM borrowbook WHERE bookId = '$bookfkid'";
    $ons = mysqli_query($con, $onsitez);
    if(mysqli_num_rows($ress) > 0 || mysqli_num_rows($ons) > 0){
        $errors['bookfktilte'] = "The Book $bookfktilte Already in Borrowed ";
    }
        if ($datestart > $dateend) {
            $errors['datebackward'] = "You Can't set late date ";
        }
        $start_timestamp = strtotime($datestart);
        $end_timestamp = strtotime($dateend);
        $duration_in_days = abs($end_timestamp - $start_timestamp) / (60 * 60 * 24);
        if ($duration_in_days > 30) {
            $errors['morethan'] = "Error: you cant borrow book more than a month";
        
        }

     if(empty($lis_img0)){
        $errors['lis_img0'] = "Please Proved a Valid ID";
    }
    if(empty($dateend)){
        $errors['dateend'] = "Please Select end Date";
    }
    if ($datestart == $dateend) {
        $errors['ssss'] = "Reserve Date Atleast 1 day Pass";
    }
   
    if(empty($reasons)){
        $errors['reasons'] = "Please Provide a Reasons to Borrow the Books";
    }
    
    if(count($errors) === 0){

    move_uploaded_file($tempname, $folder);
    $noficationDetails = "You have new Reserve Book Request from <b>".$namez."</b> Book Title  <b>". $editboooks['bookTitle']."</b>";
    $legend = "You have Request OFF Site Borrower <br>Named : $namez";
    $subject = "Book Request :". $editboooks['bookTitle']."";
    $mz = mysqli_query($con, "SHOW TABLE STATUS LIKE 'reserve'");
    $mx = mysqli_fetch_assoc($mz);
    $maximun = $mx['Auto_increment'];

    $destination = "borrow-overview-req.php?overview=$maximun";                           
    bookres($subject, $reasons, $legend);
    $insertdata = mysqli_query($con,"INSERT INTO reserve(libraryUserId, bookId, validID, reason, datestart, dateend)VALUES('$id','$bookfkid','$lis_img0','$reasons','$datestart','$dateend')");
    $insertdata2 = mysqli_query($con,"INSERT INTO notification(noficationDetails,destination, time)VALUES('$noficationDetails','$destination','$time')");
    
    echo "<script>window.location.href = 'borrowbooklist.php'</script>";
    }

}
else{
    if ($datestart > $dateend) {
        $errors['datebackward'] = "You Can't set late date ";
    }
    if ($datestart == $dateend) {
        $errors['ssss'] = "Reserve Date Atleast 1 day Pass";
    }
    $start_timestamp = strtotime($datestart);
    $end_timestamp = strtotime($dateend);
    $duration_in_days = abs($end_timestamp - $start_timestamp) / (60 * 60 * 24);
    if ($duration_in_days > 30) {
        $errors['morethan'] = "Error: you cant borrow book more than a month";

    }
    if(empty($dateend)){
        $errors['dateend'] = "Please Select end Date";
    }

    if(empty($reasons)){
        $errors['reasons'] = "Please Provide a Reasons to Borrow the Books";
    }
    if(count($errors) === 0){
$insertdata = mysqli_query($con,"UPDATE reserve SET validID='$lis_img0', reason='$reasons', dateend='$dateend' where resereID=".$editre."");
echo "<script>alert('Updated Successfully');</script>
    <script>window.location.href = 'borrowbooklist.php'</script>";
}
}
}



?>

<body>
   
<?php 
    include "topbar.php"?>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn"><i class="fi fi-rr-home-location-alt"></i> Borrow Book</h1>
                    <a href="home.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"> </i><a href="bookslist.php" class="h5 text-white">Book List</a> 
                </div>
            </div>
        </div>
    </div>
        <div class="container-fluid py-1 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-2">
            <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"> <?php
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
                    <h4 class="card-title">Reserve Book : <?php echo $editboooks['bookTitle']?></h4>
                        </div>
                            <div class="card-body">
                                 <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        
                                        <div class="col-xl-6">
                                            <div class="col-md-4 mb-3">
                                                <?php if(empty($editboooks['bookprofile'])){ ?>
                                                    <img class="imgreserve" src="../assets/images/books/<?php echo $editres['bookprofile']?>" alt="<?php echo $editboooks['bookprofile']?>" >
                                                <?php } else { ?>
                                                    <img class="imgreserve" src="../assets/images/books/<?php echo $editboooks['bookprofile']?>" alt="<?php echo $editboooks['bookprofile']?>" >
                                                    <?php }?>
                                            </div>
                                        <div class="form-group row">
                                                 <label class="col-lg-3 col-form-label">Barrower's Name</label>
                                                    <div class="col-lg-9">
                                                         <input class="form-control" value="<?php echo $fetch_info['libraryUserFirtsName']." ".$fetch_info['libraryUserLastName']?>" disabled>
                                                    </div>
                                             </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="row">
                                             <div class="form-group row">
                                                 <label class="col-lg-3 col-form-label">Add Valid ID</label>
                                                    <div class="col-lg-9">
                                                         <input type="file" class="form-control" name="lis_img0">
                                                     </div>
                                                </div>
                                            <div class="form-group row">
                                                 <label class="col-lg-3 col-form-label">End Date</label>
                                                    <div class="col-lg-9">
                                                         <input type="date" class="form-control" name="dateend" value="<?php echo $editres['dateend']?>">
                                                    </div>
                                            </div>
                                                 <label class="col-lg-3 col-form-label">Reasons To Borrow</label>
                                                    <div class="col-lg-10">
                                                        <div class="row">
                                                             <div class="form-group row">
                                                                <div class="col-lg-15">
                                                                    <textarea name="reasons" id="" cols="30" rows="05" class="form-control" placeholder="Enter your reasons..."><?php echo $editres['reason']?></textarea>
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                <button type="submit" class="btn btn-primary" name="reservesssss" onclick="return confirm(' Once your book reservation has been approved by the library, you will not be able to edit the reservation details. Please ensure that you have selected the correct book and wait for confirmation - thank you.')">Reserve</button>
                                                 </div>
                                            </div>
                                         </div>
                                    </div>
                                 </form>
                            </div>
                        </div>
                    </div>
            </div>
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

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>