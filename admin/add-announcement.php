<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 12;
?>
<!DOCTYPE html>
<html lang="en">
<?php include "adminfunction.php";
include "head.php";



error_reporting(0);


    

    if(isset($_GET['edit']))
    {
        $editq = $_GET['edit'];
        $editblog = mysqli_query($con,"SELECT * FROM contents where contID=".$editq."");
        $editblogs = mysqli_fetch_array($editblog);
    }
    
    
    if(isset($_POST['addblog'])){
    
       

      if($_FILES['lis_img0']['name']!=''){
    $lis_img0 = $_FILES['lis_img0']['name'];
       }
    else{
     $lis_img0 = $editblogs["contProfile"];
    }
    $tempname = $_FILES['lis_img0']['tmp_name'];
    $folder = "../assets/images/blogsAndAnnouncement/".$lis_img0;


        $title = $_POST['title'];
        $cont = $_POST['cont'];
        $contType = "announcement";
     
       
    if($editq==''){
         
        if(empty($title)){
            $errors['title'] = "Please provide a announcement title";
        }
        if(empty($lis_img0)){
            $errors['lis_img0'] = "Please provide a announcement profile";
        }
       
        if(empty($cont)){
            $errors['cont'] = "please provide a announcement description";
        }
        
        if(count($errors) === 0){

        move_uploaded_file($tempname, $folder);
        $insertdata = mysqli_query($con,"INSERT INTO contents(contProfile, contTitle, contDesc, contType, date)VALUES('$lis_img0','$title','$cont','$contType', '$date')");
        echo "<script>alert('Added Successfully');</script>
            <script>window.location.href = 'anouncement.php'</script>";
        }
   
    }
    else{
    $insertdata = mysqli_query($con,"UPDATE contents SET contProfile='$lis_img0', contTitle='$title', contDesc='$cont' where contID=".$editq."");
    echo "<script>alert('Updated Successfully');</script>
        <script>window.location.href = 'anouncement.php'</script>";
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
    <div class="page-wrapper">
        <div class="content container-fluid">
            
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Announcement</h4>
                        <div class="line"></div>
                        <br>
                        

                        <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                            <a href="anouncement.php"><button type="button" class="btn btn-block btn-outline-light" style="border : 1px solid black">Back</button></a>
                        </div>
                        

                    </div>
                    <div class="card-body"> <?php
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
                    <div class="form-group row">
                    <div class="form-group row">
                                <label class="col-form-label col-md-2">Profile</label>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control"  name="lis_img0" value="<?php echo $editblogs['contProfile']?>">
                                    </div>
                                    </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="title" value="<?php echo $editblogs['contTitle']?>">
                                    </div>
                                    </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Description</label>
                                <div class="col-md-10">
                                        <textarea id="textarea" rows="5" cols="5" class="form-control" name="cont"><?php echo $editblogs['contDesc']?></textarea>
                                </div>
                             </div>
                            <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name="addblog">submit</button>
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


<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../plugin/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('#textarea').summernote()
  })
</script>

</body>
</html>