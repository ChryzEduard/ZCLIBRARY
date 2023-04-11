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
        $editbooks = mysqli_query($con,"select * from books join section on books.sectionID = section.sectionID where bookId =".$editq."");
        $boook = mysqli_fetch_array($editbooks);
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
                                        <br><br><br>
                                    <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                                         <a href="booklist.php"><button type="button" class="btn btn-block btn-outline-dark">Back</button></a>
                                     </div>
                                    
                                </div>
                                 <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Book Profile</label>
                                                        <div class="col-lg-9">
                                                            <img src="../assets/images/books/<?php echo $boook['bookprofile']?>" alt="<?php echo $boook['bookprofile']?>" height="200px" width="200px">
                                                            
                                                        </div>
                                                 </div>
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">ISBN</label>
                                                        <div class="col-lg-9">
                                                            <input class="form-control" value="<?php echo $boook['isbn']?>" disabled>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Title</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" value="<?php echo $boook['bookTitle']?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Subject</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" value="<?php echo $boook['bookSubject']?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Book Description</label>
                                                    <div class="col-lg-9">
                                                        <textarea class="form-control"  cols="20" rows="5" disabled><?php echo $boook['bookDescription']?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Author</label>
                                                    <div class="col-lg-9">
                                                        <textarea  class="form-control" cols="20" rows="10" disabled><?php echo $boook['bookAuthors']?></textarea>
                                                    </div>
                                                </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Section </label>
                                                    <div class="col-lg-9">
                                                        <select  class="form-control" name="section" value="<?php echo $boook['sectionID']?>" disabled>
                                                             <?php while( $sections = mysqli_fetch_array($allsection)){?>
                                                                <option value="<?php echo $sections['sectionID']?>"><?php echo $sections['sectionID']." ".$sections['Section_Name']?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Source</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control"  value="<?php echo $boook['bookSource']?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Dewey Decimal</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control"  value="<?php echo $boook['Deweydecimal']?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Publisher</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control"  value="<?php echo $boook['bookPublisher']?>" disabled>
                                                </div> 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Place of Publisher</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control"   value="<?php echo $boook['bookPlacePublisher']?>" disabled>
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