

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
    $editbo = mysqli_query($con,"select * from books join borrowbook on borrowbook.bookId = books.bookId where borrowID =".$editre."");
    $editres = mysqli_fetch_array($editbo);
    
   
}


$bookfktilte = $editboooks['bookTitle'];
$bookfkid = $editboooks['bookId'];
if(isset($_POST['borrow'])){

   


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
    $space = $_POST['space'];
    
    
   
if($editre==''){
    $book_checkss = "SELECT * FROM reserve WHERE bookId = '$bookfkid' ";
    $ress = mysqli_query($con, $book_checkss);
    $book_checkssz = "SELECT * FROM borrowbook WHERE bookId = '$bookfkid' ";
    $ressz = mysqli_query($con, $book_checkssz);
    if(mysqli_num_rows($ress) > 0 || mysqli_num_rows($ressz) > 0 ){
        $errors['bookfktilte'] = "The Book $bookfktilte Already in Borrowed ";
    }
        

     if(empty($lis_img0)){
        $errors['lis_img0'] = "Please Submit You Face picture";
    }
    if(empty($space)){
        $errors['space'] = "Please Choose where you want to study";
    }
   
    if(empty($reasons)){
        $errors['reasons'] = "Please state your Reasons to Borrow the Books";
    }
    
    if(count($errors) === 0){

    move_uploaded_file($tempname, $folder);
    $noficationDetails = "You have new On-site Book Request to Borrow from <b>".$namez."</b> Book Title  <b>". $editboooks['bookTitle']."</b>";
    $legend = "you have request book from $namez, check it now";
    $subject = "Book Request to Borrow :". $editboooks['bookTitle']."";
    $mz = mysqli_query($con, "SHOW TABLE STATUS LIKE 'borrowbook'");
    $mx = mysqli_fetch_assoc($mz);
    $maximun = $mx['Auto_increment'];
    $destination = "borrow-overview-req-onsite.php?overview=$maximun";    
    bookres($subject, $reasons, $legend);
    $insertdata = mysqli_query($con,"INSERT INTO borrowbook(libraryUserId, libraryspaceId, bookId, BorrowPicture, reason, date)VALUES('$id','$space','$bookfkid','$lis_img0','$reasons','$datestart')");
    $insertdata2 = mysqli_query($con,"INSERT INTO notification(noficationDetails,destination, time)VALUES('$noficationDetails','$destination','$time')");
    
    echo "<script>window.location.href = 'home.php'</script>";
    }

}
else{
    if ($datestart > $dateend) {
        $errors['datebackward'] = "You Can't set late date ";
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
    <style>
        
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
    </style>
        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn"><i class="fi fi-ts-books"></i> Reserve Book</h1>
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
                                                 <label class="col-lg-3 col-form-label">Picture Your Self </label>
                                                    <div class="col-lg-9">
                                                         <input type="file" class="form-control" name="lis_img0">
                                                     </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-12 "><center>
                                                         <p><br>Click the image to view large image<br> </p></center>
                                                     </div>
                                                </div>
                                                
                                                <label class="col-lg-3 col-form-label">Choose Library Space </label>
                                                    <div class="col-lg-9">
                                                    <?php $i = 1 ; while (  $space =mysqli_fetch_array($libspaces)) { ?>
                                                         <label for="<?php echo $space['libraryspaceId']?>">  <img src="../assets/images/libraryspace/<?php echo $space['libraryspacePic']?>" id="myImg<?php echo $i++?>" width="50px" height="50px" style="border: 1px solid var(--dark);" alt="<?php echo $space['libraryspaceName']?>"> <?php echo $space['libraryspaceName']?></label>
                                                        <input type="radio" name="space" id="<?php echo $space['libraryspaceId']?>" value="<?php echo $space['libraryspaceId']?>">
                                                        <?php }?>
                                                     </div>
                                                </div>
                                                <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
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
                                                <button type="submit" class="btn btn-primary" name="borrow" onclick="return confirm(' Once your book reservation has been approved by the library, you will not be able to edit the reservation details. Please ensure that you have selected the correct book and wait for confirmation - thank you.')">Reserve</button>
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
    <script>

        
var modal = document.getElementById("myModal");
var img = document.getElementById("myImg1");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}



var modal = document.getElementById("myModal");
var img2 = document.getElementById("myImg2");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img2.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}


var modal = document.getElementById("myModal");
var img3 = document.getElementById("myImg3");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img3.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}


var modal = document.getElementById("myModal");
var img4 = document.getElementById("myImg4");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img4.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}




var span = document.getElementsByClassName("close")[0];

span.onclick = function() { 
  modal.style.display = "none";
}
</script>

    <script src="../js/main.js"></script>
</body>

</html>