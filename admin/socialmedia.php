<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 7;
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include "adminfunction.php";
include "head.php";

if(isset($_GET['delete_id']))
    {
     $query_delete="DELETE FROM social_media WHERE socialMediaID='".$_GET['delete_id']."'";
     $p = mysqli_query($con, $query_delete);
     echo "<script>alert('Deleted Successfully');</script>
        <script>window.location.href = 'socialmedia.php'</script>";
    }

    if(isset($_POST['addsoc'])){

    $icons = $_POST['icons'];
    $link = $_POST['link'];
   
    if($edit==''){
        $logo_checkss = "SELECT * FROM social_media WHERE iconLogo = '$icons'";
        $logo = mysqli_query($con, $logo_checkss);
        if(mysqli_num_rows($logo) > 0){
            $errors['logo'] = "<b>$icons </b> Already in the list ";
        }
        if(count($errors) === 0){
            $insertdata = mysqli_query($con,"INSERT INTO social_media(iconLogo, iconLink)VALUES('$icons','$link')");
            echo "<script>alert('Add Successfully');</script>
                <script>window.location.href = 'socialmedia.php'</script>";
    }
    }
    }

?>
<body>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<div class="main-wrapper">
    <?php include "header.php"?>
    <?php include "sidebar.php"?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                    <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                    <h4 class="card-title"><i class="fi fi-rr-gears"></i> Setting Social Media </h4>
                    <div class="line">
                    </div>
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
                    <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-xl-7">
                    <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Icons / Logo</label>
                    <div class="col-lg-9">
                    <select name="icons" class="form-control"  >
                        <option value="fa-facebook-f">facebook</option>
                        <option value="fa-twitter">twitter</option>
                        <option value="fa-youtube">youtube</option>
                        <option value="fa-dribbble">dribble</option>
                        <option value="fa-pinterest">pinterest</option>
                        <option value="fa-instagram">Instagram</option>
                    </select>
                    
                    </div>
                    </div>
                    
                    <div class="form-group row">
                    <label class="col-lg-3 col-form-label">link</label>
                    <div class="col-lg-9">
                    <input type="text" class="form-control" placeholder="Enter Title of FAQ" name="link" >
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="addsoc"><i class="fi fi-rr-square-plus"></i> Add Social Media</button>
                    
                    </form>
                    </div>

                    <div class="col-xl-4">
                    <h4 class="card-title">Social Media(s)</h4>
                    <div class="row">
                    <div class="card-body">
                <div class="table-responsive no-radius">
                <table class="table table-hover table-center">
                <thead>
                <tr>
                <th>Icon</th>
                <th class="text-end">Action</th>
                </tr>
                </thead>
                <tbody>

                    <?php  while($soclist = mysqli_fetch_array($soc)){?>
                        <tr>
                        <td class="text-nowrap"><a style ="font-size: 30px;"href="<?php echo $soclist['iconLink']?>" class="fab <?php echo $soclist['iconLogo']?>  "></a></td>
                       <td class="text-end py-0 align-middle">
                      <div class="btn-group btn-group-sm">
						 <a href="socialmedia.php?delete_id=<?php echo $soclist["socialMediaID"]; ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm bg-danger-light"><i class="fi fi-rr-trash"></i></a>
                      </div>
                    </td> </tr>
                    <?php } ?>
                </tbody>
                </table>
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