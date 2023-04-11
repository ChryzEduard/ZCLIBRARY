<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 8;
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
        $editfaq = mysqli_query($con,"SELECT * FROM section where sectionID=".$editq."");
        $showfaq = mysqli_fetch_array($editfaq);
    }
    
    
    if(isset($_POST['addsection'])){
    
       

      if($_FILES['lis_img0']['name']!=''){
        $lis_img0 = $_FILES['lis_img0']['name'];
        }
        else{
          $lis_img0 = $showfaq["sectionProfile"];
        }
        $tempname = $_FILES['lis_img0']['tmp_name'];
        $folder = "../assets/images/sectionimg/".$lis_img0;


        $section_name = $_POST['section_name'];
        $section_desc = $_POST['section_desc'];
     
       
    if($editq==''){
        $email_checkss = "SELECT * FROM section WHERE Section_Name = '$section_name'";
        $ress = mysqli_query($con, $email_checkss);
        if(mysqli_num_rows($ress) > 0){
            $errors['checksectionreapeat'] = "<b>$section_name</b> Already in the list ";
        }
         if(empty($lis_img0)){
            $errors['lis_img0'] = "Please Proved a Section Image Profile";
        }
        if(empty($section_name)){
            $errors['section_name'] = "Please Proved a Section Name";
        }
       
       
        if(empty($lis_img0)){
            $errors['lis_img0'] = "Please Proved a Section Image Profile";
        }
        
        if(count($errors) === 0){

        move_uploaded_file($tempname, $folder);
        $insertdata = mysqli_query($con,"INSERT INTO section(libraryUserId, Section_Name, Section_Desc,sectionProfile, date )VALUES('$id','$section_name','$section_desc','$lis_img0','$date')");
        echo "<script>alert('Added Successfully');</script>
            <script>window.location.href = 'Sections.php'</script>";
        }
   
    }
    else{
    $insertdata = mysqli_query($con,"UPDATE section SET Section_Name='$section_name' , Section_Desc='$section_desc', sectionProfile='$lis_img0' where sectionID=".$editq."");
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
                                    <h4 class="card-title">Add Sections</h4>
                                    <div class="line"></div><br><br>
                                    <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                                         <a href="Sections.php" onclick="return confirm('changes you made may not be change')"><button type="button" class="btn btn-block btn-outline-dark">Back</button></a>
                                     </div>
                                 </div>
                             <div class="card-body">
                                 <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-6">
                                             <div class="form-group row">
                                                 <label class="col-lg-3 col-form-label">Section Profile</label>
                                                    <div class="col-lg-9">
                                                         <input type="file" class="form-control" name="lis_img0">
                                                     </div>
                                            </div>
                                             <div class="form-group row">
                                                 <label class="col-lg-3 col-form-label">Section Name</label>
                                                    <div class="col-lg-9">
                                                         <input type="text" class="form-control" name="section_name" value="<?php echo $showfaq['Section_Name']?>">
                                                    </div>
                                             </div>
                                           
                   
                                            </div>
                                        <div class="col-xl-6">
                                            <div class="row">
                                                 <label class="col-lg-3 col-form-label">Section Description</label>
                                                    <div class="col-lg-10">
                                                        <div class="row">
                                                             <div class="form-group row">
                                                                <div class="col-lg-15">
                                                                    <textarea name="section_desc" id="" cols="30" rows="05" class="form-control" ><?php echo $showfaq['Section_Desc']?></textarea>
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