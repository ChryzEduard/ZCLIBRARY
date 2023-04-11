<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 11;
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include "adminfunction.php";
include "head.php";

error_reporting(0);


if(isset($_GET['delete_id']))
    {
     $query_delete="DELETE FROM faq WHERE faqID='".$_GET['delete_id']."'";
     $p = mysqli_query($con, $query_delete);
     echo "<script>alert('Deleted Successfully');</script>
        <script>window.location.href = 'faq.php'</script>";
    }
    

    if(isset($_GET['edit']))
    {
        $editq = $_GET['edit'];
        $editgal = mysqli_query($con,"SELECT * FROM gallery where galleryID=".$editq."");
        $gallery= mysqli_fetch_array($editgal);
    }
    
    
    if(isset($_POST['addsection'])){
    
       

      if($_FILES['lis_img0']['name']!=''){
        $lis_img0 = $_FILES['lis_img0']['name'];
        }
        else{
          $lis_img0 = $showfaq["sectionProfile"];
        }
        $tempname = $_FILES['lis_img0']['tmp_name'];
        $folder = "../assets/images/gallery/".$lis_img0;


        $title = $_POST['title'];
        $desc = $_POST['desc'];
     
       
    if($editq==''){
        $email_checkss = "SELECT * FROM gallery WHERE galleryPic = '$lis_img0'";
        $ress = mysqli_query($con, $email_checkss);
        if(mysqli_num_rows($ress) > 0){
            $errors['pic'] = "image is already in list or just rename your files before upload";
        }
         if(empty($lis_img0)){
            $errors['lis_img0'] = "Please Proved a Image to upload";
        }
        if(empty($title)){
            $errors['title'] = "Please Proved a Title for Image";
        }
       
        if(empty($desc)){
            $errors['desc'] = "Please Proved a Image Description";
        }
        
        if(count($errors) === 0){

        move_uploaded_file($tempname, $folder);
        $insertdata = mysqli_query($con,"INSERT INTO gallery(galleryPic, galleryTitle, galleryDesc )VALUES('$lis_img0','$title','$desc')");
        echo "<script>alert('Uploaded Successfully');</script>
            <script>window.location.href = 'gallery.php'</script>";
        }
   
    }
    else{
    $insertdata = mysqli_query($con,"UPDATE section SET Section_Name='$section_name', Section_Desc='$section_desc', sectionProfile='$lis_img0' where sectionID=".$editq."");
    echo "<script>alert('Updated Successfully');</script>
        <script>window.location.href = 'Sections.php'</script>";
    }
}


?>

<body>

<div class="main-wrapper">
    <?php include "header.php"?>
    <?php include "sidebar.php"?>
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
                                    <h4 class="card-title"><i class="fe fe-picture"></i> Add Gallery</h4>
                                    <div class="line"></div><br><br>
                                    <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                                         <a href="Sections.php"><button type="button" class="btn btn-block btn-outline-dark">Back</button></a>
                                     </div>
                                 </div>
                             <div class="card-body">
                                 <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-6">
                                             <div class="form-group row">
                                                 <label class="col-lg-3 col-form-label">Upload Photo</label>
                                                    <div class="col-lg-9">
                                                        <img src="../gallery/<?php echo $gallery['galleryPic']?>" alt="">
                                                         <input type="file" class="form-control" name="lis_img0">
                                                     </div>
                                            </div>
                                             <div class="form-group row">
                                                 <label class="col-lg-3 col-form-label">Title of The photos</label>
                                                    <div class="col-lg-9">
                                                         <input type="text" class="form-control" name="title" value="<?php echo $showfaq['Section_Name']?>">
                                                    </div>
                                             </div>
                   
                                            </div>
                                        <div class="col-xl-6">
                                            <div class="row">
                                                 <label class="col-lg-3 col-form-label">Photo Description</label>
                                                    <div class="col-lg-10">
                                                        <div class="row">
                                                             <div class="form-group row">
                                                                <div class="col-lg-15">
                                                                    <textarea name="desc" id="" cols="30" rows="05" class="form-control" ><?php echo $showfaq['Section_Desc']?></textarea>
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                <button type="submit" class="btn btn-primary" name="addsection">Submit</button>
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
<script src="assets/js/script.js"></script>
</body>
</html>