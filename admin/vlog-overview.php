<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
$a = 9;
?>
<!DOCTYPE html>
<html lang="en">
<?php 
include "adminfunction.php";
include "head.php";

error_reporting(0);

   
    if(isset($_GET['overview']))
    {
        $editq = $_GET['overview'];
        $ovb = mysqli_query($con,"SELECT * FROM contents where contID=".$editq."");
        $blogovw = mysqli_fetch_array($ovb);
        $cmnt = mysqli_query($con,"select * from commentoncontents where contID = $editq  ;");
        $cmtz = mysqli_query($con, "select count(*) as commentsz from commentoncontents where contID = $editq ;");
        $commenttotal = mysqli_fetch_array($cmtz);
    }
    if(isset($_GET['delete_id'])){
        $delet = $_GET['delete_id'];
        $query_delete="DELETE FROM commentoncontents WHERE commentID='".$delet."'";
        $p = mysqli_query($con, $query_delete);
        echo "<script>alert('Deleted Successfully');</script>
        <script>window.location.href = 'blogs.php'</script>";
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
                                <h4 class="card-title">Book Overview/Details</h4>
                                    <div class="line"></div>
                                        <br>
                                    <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                                         <a href="booklist.php"><button type="button" class="btn btn-block btn-outline-dark">Back</button></a>
                                     </div>
                                    
                                </div>
                                 <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                 <div class="form-group row">
                                                        <div class="col-lg-9">
                                                            <img src="../assets/images/blogsAndAnnouncement/<?php echo $blogovw['contProfile']?>" alt="<?php echo $blogovw['contProfile']?>" height="210px" width="210px">
                                                            
                                                        </div>
                                                 </div>
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Blog Title</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" value="<?php echo $blogovw['contTitle']?>" disabled>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Blog Description</label>
                                                    <div class="col-lg-9">
                                                        <textarea class="form-control"  cols="20" rows="5" disabled><?php 
                                                        $dec = $blogovw['contDesc'];
                                                            $removetag = strip_tags($dec);
                                                            $trim = $string = substr($removetag,0,600);
                                                            echo $trim ; ?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-6">
                    <h4 class="card-title"><?php echo $commenttotal['commentsz']?> Comments</h4>
                    <div class="row">
                    <div class="card-body">
                <div class="table-responsive no-radius">
                <table class="table table-hover table-center">
                <thead>
                <tr>
                <th>Name Details</th>
                <th class="text-middle">Comments</th>
                </tr>
                </thead>
                <tbody>

                    <?php  while($comment = mysqli_fetch_array($cmnt)){?>
                        <tr>
                        <td class="text-nowrap"><?php echo $comment['commentName']?><br><?php echo $comment['commentEmail']?></td>
                        <td class="text-nowrap"><?php echo $comment['comment']?></td>
                       <td class="text-end py-0 align-middle">
                      <div class="btn-group btn-group-sm">
						 <a href="vlog-overview.php?delete_id=<?php echo $comment["commentID"]; ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm bg-danger-light"><i class="fe fe-trash"></i></a>
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