<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 6;
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
        $editfaq = mysqli_query($con,"SELECT * FROM faq where faqID=".$editq."");
        $showfaq = mysqli_fetch_array($editfaq);
    }
   

    if(isset($_POST['addFAQ'])){
    




    $faq = $_POST['faq'];
    $desc = $_POST['desc'];
   
    if($editq==''){
    $insertdata = mysqli_query($con,"INSERT INTO faq(libraryUserId, title, description, date )VALUES('$id','$faq','$desc','$date')");
    echo "<script>alert('Posted Successfully');</script>
        <script>window.location.href = 'faq.php'</script>";
    }
    else{
    $insertdata = mysqli_query($con,"UPDATE faq SET title='$faq', description='$desc' where faqID=".$editq."");
    echo "<script>alert('Updated Successfully');</script>
        <script>window.location.href = 'faq.php'</script>";
    }
    }

?>
<body>

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
                    <h4 class="card-title"><i class="fi fi-rr-gears"></i> Frequently Asked Questions</h4>
                    <div class="line"></div>
                    </div>
                    <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-xl-6">
                    <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Title</label>
                    <div class="col-lg-9">
                    <input type="text" class="form-control" placeholder="Enter Title of FAQ" name="faq" value="<?php echo $showfaq['title']?>">
                    </div>
                    </div>
                    
                    <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Description</label>
                    <div class="col-lg-9">
                    <textarea rows="4" cols="5" class="form-control" placeholder="Enter Description" name="desc" ><?php echo $showfaq['description']?></textarea>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="addFAQ"> <i class="fi fi-rr-square-plus"></i> Add FAQ</button>
                    
                    </form>
                    </div>

                    <div class="col-xl-6">

                    <br><br>
                    
                    <h4 class="card-title">List inputs </h4>
                    <div class="row">
                    <div class="card-body">
                <div class="table-responsive no-radius">
                <table class="table table-hover table-center">
                <thead>
                <tr>
                <th>Title</th>
                <th class="text-center">created by</th>
                <th class="text-center">date</th>
                <th class="text-end">Action</th>
                </tr>
                </thead>
                <tbody>

                    <?php 
                    
                  
                    
                    while($faqlist = mysqli_fetch_array($faq)){?>
                        <tr>
                        <td class="text-nowrap"><?php echo $faqlist['title']?></td>
                        <td class="text-center"><?php echo $faqlist['libraryUserFirtsName']." ".$faqlist['libraryUserLastName']?></td>
                        <td class="text-center"><?php echo $faqlist['date']?></td>
                        <td class="text-end py-0 align-middle">
                      <div class="btn-group btn-group-sm">
						<a href="faq.php?edit=<?php echo $faqlist["faqID"]; ?>" onclick="return confirm('Are you sure?')"  class="btn btn-lg "><i class="fi fi-rr-edit"></i></a>
                        <a href="faq.php?delete_id=<?php echo $faqlist["faqID"]; ?>" onclick="return confirm('Are you sure?')" class="btn btn-lg"><i class="fi fi-rr-trash"></i></a>
                      </div>
                    </td> </tr>
                
                        <?php }
                        
                        
                        ?>
                
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