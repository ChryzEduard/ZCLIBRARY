<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 16;
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include "adminfunction.php";
include "head.php";

error_reporting(0);


    

    if(isset($_GET['edit']))
    {
        $editq = $_GET['edit'];
        $editgal = mysqli_query($con,"SELECT * FROM event where eventID=".$editq."");
        $sp= mysqli_fetch_array($editgal);
    }
    
    
    if(isset($_POST['submit'])){
    
       

      if($_FILES['lis_img0']['name']!=''){
        $lis_img0 = $_FILES['lis_img0']['name'];
        }
        else{
          $lis_img0 = $sp["eventPic"];
        }
        $tempname = $_FILES['lis_img0']['tmp_name'];
        $folder = "../assets/images/events/".$lis_img0;


        $name = $_POST['name'];
        $date = $_POST['date'];
        $desc = $_POST['desc'];
     
       
    if($editq==''){
        
    
         if(empty($lis_img0)){
            $errors['lis_img0'] = "Please Proved a Image to upload";
        }
        if(empty($name)){
            $errors['name'] = "Please Provide a Name ";
        }
       
        if(empty($date)){
            $errors['date'] = "Please Provide A Date of the events";
        }

        if(empty($desc)){
            $errors['desc'] = "Please Provide A Description of the events";
        }
        
        if(count($errors) === 0){

        move_uploaded_file($tempname, $folder);
        $insertdata = mysqli_query($con,"INSERT INTO  event(eventPic, eventName, eventDesc , eventDate)VALUES('$lis_img0','$name','$desc','$date')");
        echo "<script>alert('Event $name Successfully Created');</script>
            <script>window.location.href = 'events.php'</script>";
        }
   
    }
    else{
    $insertdata = mysqli_query($con,"UPDATE event SET eventPic='$lis_img0', eventName='$name', eventDesc='$desc', eventDate='$date' where eventID=".$editq."");
    echo "<script>alert('Event $name Successfully Updates');</script>
        <script>window.location.href = 'events.php'</script>";
    }
}


?>

<body>
<link rel="stylesheet" href="../plugin/summernote/summernote-bs4.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="main-wrapper">
    <?php include "header.php"?>
    <?php include "sidebar.php"?>
    <style>
        .imgreserve{
    width: 325px;
    height: 300px;
  }
  @media only screen and (max-width: 767px) {
   
   .imgreserve{
       width: 282px;
       height: 200px;
   }
   
  }
    </style>
    <div class="page-wrapper">

        <div class="content container-fluid">
        <?php
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title"><i class="fi fi-rr-calendar-star"></i> Add Library Events</h4>
                                                <div class="line"></div><br><br>
                                                <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                                                    <a href="events.php"><button type="button" class="btn btn-block btn-outline-dark">Back</button></a>
                                                </div>
                                            </div>
                                        <div class="card-body">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Event Banner</label>
                                                                <div class="col-lg-9">
                                                                    <?php if(isset($sp['eventPic'])){?>
                                                                         <img class="imgreserve" src="../assets/images/events/<?php echo $sp['eventPic']?>"> 
                                                                         <?php }?>
                                                                    
                                                                    <input type="file" class="form-control" name="lis_img0">
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Event Name</label>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" name="name" value="<?php echo $sp['eventName']?>">
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Event Date</label>
                                                                <div class="col-lg-9">
                                                                    <input type="date" class="form-control" name="date" value="<?php echo $sp['eventDate']?>">
                                                                </div>
                                                        </div>
                                                        
                                                        </div>
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Event Description</label>
                                                                <div class="col-lg-9">
                                                                   <textarea name="desc" class="form-control" id="textarea" cols="30" rows="10"><?php echo $sp['eventDesc']?></textarea>
                                                                </div>
                                                        </div>
                                                        
                                                            </div>
                                                            <div class="text-end">
                                                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
    </div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../plugin/summernote/summernote-bs4.min.js"></script>
<script src="assets/js/script.js"></script>
<script>
  $(function () {
    // Summernote
    $('#textarea').summernote()
  })
</script>
</body>
</html>