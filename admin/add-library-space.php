<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 14;
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
        $editgal = mysqli_query($con,"SELECT * FROM libraryspace where libraryspaceId=".$editq."");
        $sp= mysqli_fetch_array($editgal);
    }
    
    
    if(isset($_POST['submit'])){
    
       

      if($_FILES['lis_img0']['name']!=''){
        $lis_img0 = $_FILES['lis_img0']['name'];
        }
        else{
          $lis_img0 = $sp["libraryspacePic"];
        }
        $tempname = $_FILES['lis_img0']['tmp_name'];
        $folder = "../assets/images/libraryspace/".$lis_img0;


        $name = $_POST['name'];
     
       
    if($editq==''){
        
    
         if(empty($lis_img0)){
            $errors['lis_img0'] = "Please Proved a Image to upload";
        }
        if(empty($name)){
            $errors['name'] = "Please Provide a Name ";
        }
       
        if(empty($limit)){
            $errors['limit'] = "Please Provide A limit";
        }
        
        if(count($errors) === 0){

        move_uploaded_file($tempname, $folder);
        $insertdata = mysqli_query($con,"INSERT INTO libraryspace(libraryspacePic, libraryspaceName)VALUES('$lis_img0','$name')");
        echo "<script>alert('Uploaded Successfully');</script>
            <script>window.location.href = 'library-space.php'</script>";
        }
   
    }
    else{
    $insertdata = mysqli_query($con,"UPDATE libraryspace SET libraryspaceName='$name', libraryspacePic='$lis_img0' where libraryspaceId=".$editq."");
    echo "<script>alert('Updated Successfully');</script>
        <script>window.location.href = 'library-space.php'</script>";
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
                                                <h4 class="card-title"><i class="fe fe-table"></i> Add Library Space</h4>
                                                <div class="line"></div><br><br>
                                                <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                                                    <a href="library-space.php"><button type="button" class="btn btn-block btn-outline-dark">Back</button></a>
                                                </div>
                                            </div>
                                        <div class="card-body">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Photo of the Library</label>
                                                                <div class="col-lg-9">
                                                                    <?php if(isset($sp['libraryspacePic'])){?> <img src="../assets/images/libraryspace/<?php echo $sp['libraryspacePic']?>" class="imgreserve"> <?php }?>
                                                                    
                                                                    <input type="file" class="form-control" name="lis_img0">
                                                                </div>
                                                        </div>
                                                        
                                                        </div>
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                        <div class="form-group row">
                                                            <label class="col-lg-3 col-form-label">Part of The Library</label>
                                                                <div class="col-lg-9">
                                                                    <input type="text" class="form-control" name="name" value="<?php echo $sp['libraryspaceName']?>">
                                                                </div>
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
<script src="assets/js/script.js"></script>
</body>
</html>