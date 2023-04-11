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
if(isset($_GET['delete_id']))
    {
     $query_delete="DELETE FROM books WHERE bookId='".$_GET['delete_id']."'";
     $p = mysqli_query($con, $query_delete);
     echo "<script>alert('Deleted Successfully');</script>
        <script>window.location.href = 'booklist.php'</script>";
    }
    

    if(isset($_GET['edit']))
    {
        $editq = $_GET['edit'];
        $editbooks = mysqli_query($con,"SELECT * FROM books where bookId=".$editq."");
        $boook = mysqli_fetch_array($editbooks);
    }
    
    if(isset($_POST['booksubmit'])){
    
       

      if($_FILES['lis_img0']['name']!=''){
        $lis_img0 = $_FILES['lis_img0']['name'];
        }
        else{
          $lis_img0 = $boook['bookprofile'];
        }
        $tempname = $_FILES['lis_img0']['tmp_name'];
        $folder = "../assets/images/books/".$lis_img0;


        $isbn = $_POST['isbn'];
        $title = $_POST['title'];
        $subject = $_POST['subject'];
        $smalldesc = $_POST['smalldesc'];
        $dewey = $_POST['dewey'];
        $bookauthor = $_POST['bookauthor'];
        $section = $_POST['section'];
        $source = $_POST['source'];
        $publisher = $_POST['publisher'];
        $placepublished = $_POST['placepublished'];
        
       
    if($editq==''){
        $isbn_check = "SELECT * FROM books WHERE isbn = '$isbn'";
        $isbn_check2 = mysqli_query($con, $isbn_check);
        if(mysqli_num_rows($isbn_check2) > 0){
            $errors['isbn_check2'] = "<b>ISBN $isbn</b> Already in the list ";
        }
        if(empty($isbn)){
            $errors['isbn'] = "Please Provide The ISBN ";
        }
         if(empty($lis_img0)){
            $errors['lis_img0'] = "Please Proved a Section Image Profile";
        }
        
        if(empty($dewey)){
            $errors['dewey'] = "Please provide the Book Dewy Decimal";
        }
        if(empty($title)){
            $errors['title'] = "Please provide the Book Title";
        }
        if(empty($subject)){
            $errors['subject'] = "Please provide the Book Subject";
        }
       
        if(empty($smalldesc)){
            $errors['smalldesc'] = "Please provide the Book Description";
        }
        if(empty($bookauthor)){
            $errors['bookauthor'] = "Please provide some Author(s) ";
        }
       
        
        if(empty($section)){
            $errors['section'] = "Please provide Book Section";
        }
        
        if(empty($source)){
            $errors['source'] = "Please provide Book Source";
        }
        
        if(empty($publisher)){
            $errors['publisher'] = "Please provide The Publisher of the Book";
        }
        if(empty($placepublished)){
            $errors['placepublished'] = "Please provide The Place Published";
        }
        if(count($errors) === 0){

        move_uploaded_file($tempname, $folder);
        $insertdata = mysqli_query($con,"INSERT INTO  books(isbn, Deweydecimal, sectionID, libraryUserId, bookprofile, bookTitle, bookAuthors, bookSubject, bookPublisher, bookDescription, bookPlacePublisher, bookSource)
        VALUES('$isbn','$dewey','$section','$id','$lis_img0','$title','$bookauthor','$subject','$publisher','$smalldesc','$placepublished','$source')");
        echo "<script>alert('Added Successfully');</script>
            <script>window.location.href = 'booklist.php'</script>";
        }
   
    }
    else{




        if(empty($isbn)){
            $errors['isbn'] = "Please Provide The ISBN ";
        }
         if(empty($lis_img0)){
            $errors['lis_img0'] = "Please Proved a Section Image Profile";
        }
        
        if(empty($title)){
            $errors['title'] = "Please provide the Book Title";
        }
        if(empty($subject)){
            $errors['subject'] = "Please provide the Book Subject";
        }
       
        if(empty($smalldesc)){
            $errors['smalldesc'] = "Please provide the Book Description";
        }
        if(empty($bookauthor)){
            $errors['bookauthor'] = "Please provide some Author(s) ";
        }
       
        
        if(empty($section)){
            $errors['section'] = "Please provide Book Section";
        }
        
        if(empty($source)){
            $errors['source'] = "Please provide Book Source";
        }
        
        if(empty($publisher)){
            $errors['publisher'] = "Please provide The Publisher of the Book";
        }
        if(empty($placepublished)){
            $errors['placepublished'] = "Please provide The Place Published";
        }
        if(count($errors) === 0){
    $insertdata = mysqli_query($con,"UPDATE books SET isbn='$isbn', sectionID='$section', libraryUserId='$id', bookprofile='$lis_img0',bookTitle='$title',bookAuthors='$bookauthor',bookSubject='$subject',bookPublisher='$publisher',bookDescription='$smalldesc', bookPlacePublisher='$placepublished', bookSource='$source' where bookId=".$editq."");
    echo "<script>alert('Updated Successfully');</script>
        <script>window.location.href = 'booklist.php'</script>";
    }
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
                                <h4 class="card-title">Add Books</h4><br>
                                <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                                    <a href="booklist.php" onclick="return confirm('changes you made may not be change')"><button type="button" class="btn btn-block btn-outline-dark">Back</button></a>
                                </div>
                                    
                                </div>
                                 <div class="card-body">
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
                                     <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                 <h4 class="card-title">Book Details</h4>
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Book Profile</label>
                                                        <div class="col-lg-9">
                                                            <input type="file" class="form-control" name="lis_img0">
                                                        </div>
                                                 </div>
                                                 <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">ISBN</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control" name="isbn" value="<?php echo $boook['isbn']?>">
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Dewey Descimal</label>
                                                        <div class="col-lg-9">
                                                           <select name="dewey" id="" class="form-control"><option value="000">000 - Computer science, knowledge and systems</option>
                                                           <option value="000">000 - Computer science, knowledge & systems</option>
                                                        <option value="010">010 - Bibliographies</option>
                                                        <option value="020">020 - Library & information sciences</option>
                                                        <option value="030">030 - Encyclopedias & books of facts</option>
                                                        <option value="040">040 - [Unassigned]</option>
                                                        <option value="050">050 - Magazines, journals & serials</option>
                                                        <option value="060">060 - Associations, organizations & museums</option>
                                                        <option value="070">070 - News media, journalism & publishing</option>
                                                        <option value="080">080 - Quotations</option>
                                                        <option value="090">090 - Manuscripts & rare books</option>
                                                        <option value="100">100 - Philosophy</option>
                                                        <option value="110">110 - Metaphysics</option>
                                                        <option value="120">120 - Epistemology</option>
                                                        <option value="130">130 - Parapsychology & occultism</option>
                                                        <option value="140">140 - Philosophical schools of thought</option>
                                                        <option value="150">150 - Psychology</option>
                                                        <option value="160">160 - Logic</option>
                                                        <option value="170">170 - Ethics</option>
                                                        <option value="180">180 - Ancient, medieval & eastern philosophy</option>
                                                        <option value="190">190 - Modern western philosophy</option>
                                                        <option value="200">200 - Religion</option>
                                                        <option value="210">210 - Philosophy & theory of religion</option>
                                                        <option value="220">220 - The Bible</option>
                                                        <option value="230">230 - Christianity & Christian theology</option>
                                                        <option value="240">240 - Christian practice & observance</option>
                                                        <option value="250">250 - Christian pastoral practice & religious orders</option>
                                                        <option value="260">260 - Christian organization, social work & worship</option>
                                                        <option value="270">270 - History of Christianity</option>
                                                        <option value="280">280 - Christian denominations</option>
                                                        <option value="290">290 - Other religions</option>
                                                        <option value="300">300 - Social sciences, sociology & anthropology</option>
                                                        <option value="310">310 - Statistics</option>
                                                        <option value="320">320 - Political science</option>
                                                        <option value="330">330 - Economics</option>
                                                        <option value="340">340 - Law</option>
                                                        <option value="350">350 - Public administration & military science</option>
                                                        <option value="360">360 - Social problems & social services</option>
                                                        <option value="370">370 - Education</option>
                                                        <option value="380">380 - Commerce, communications & transportation</option>
                                                        <option value="390">390 - Customs, etiquette & folklore</option>
                                                        <option value="400">400 - Language</option>
                                                        <option value="410">410 - Linguistics</option>
                                                        <option value="420">420 - English & Old English languages</option>
                                                        <option value="430">430 - German & related languages</option>
                                                        <option value="440">440 - French & related languages</option>
                                                        <option value="450">450 - Italian, Romanian & related languages</option>
                                                        <option value="460">460 - Spanish & Portuguese languages</option>
                                                        <option value="470">470 - Latin & Italic languages</option>
                                                        <option value="480">480 - Classical & modern Greek languages</option>
                                                        <option value="490">490 - Other languages</option>
                                                        <option value="500">500 - Science</option>
                                                        <option value="510">510 - Mathematics</option>
                                                        <option value="520">520 - Astronomy</option>
                                                        <option value="530">530 - Physics</option>
                                                        <option value="540">540 - Chemistry</option>
                                                        <option value="550">550 - Earth sciences & geology</option>
                                                        <option value="560">560 - Fossils & prehistoric life</option>
                                                        <option value="570">570 - Life sciences; biology</option>
                                                        <option value="580">580 - Plants (Botany)</option>
                                                        <option value="590">590 - Animals (Zoology)</option>
                                                        <option value="600">600 - Technology</option>
                                                        <option value="610">610 - Medicine & health</option>
                                                        <option value="620">620 - Engineering</option>
                                                        <option value="630">630 - Agriculture</option>
                                                        <option value="640">640 - Home & family management</option>
                                                        <option value="650">650 - Management & public relations</option>
                                                        <option value="660">660 - Chemical engineering</option>
                                                        <option value="670">670 - Manufacturing</option>
                                                        <option value="680">680 - Manufacture for specific uses</option>
                                                        <option value="690">690 - Building & construction</option>
                                                        <option value="700">700 - Arts</option>
                                                        <option value="710">710 - Landscaping & area planning</option>
                                                        <option value="720">720 - Architecture</option>
                                                        <option value="730">730 - Sculpture, ceramics & metalwork</option>
                                                        <option value="740">740 - Graphic arts & decorative arts</option>
                                                        <option value="750">750 - Painting</option>
                                                        <option value="760">760 - Graphic arts</option>
                                                        <option value="770">770 - Photography & computer art</option>
                                                        <option value="780">780 - Music</option>
                                                        <option value="790">790 - Sports, games & entertainment</option>
                                                        <option value="800">800 - Literature, rhetoric & criticism</option>
                                                        <option value="810">810 - American literature in English</option>
                                                        <option value="820">820 - English & Old English literatures</option>
                                                        <option value="830">830 - German & related literatures</option>
                                                        <option value="840">840 - French & related literatures</option>
                                                        <option value="850">850 - Italian, Romanian & related literatures</option>
                                                        <option value="860">860 - Spanish & Portuguese literatures</option>
                                                        <option value="870">870 - Latin & Italic literatures</option>
                                                        <option value="880">880 - Classical & modern Greek literatures</option>
                                                        <option value="890">890 - Other literatures</option>
                                                        <option value="900">900 - History</option>
                                                        <option value="910">910 - Geography & travel</option>
                                                        <option value="920">920 - Biography & genealogy</option>
                                                        <option value="930">930 - History of ancient world (to ca. 499)</option>
                                                        <option value="940">940 - History of Europe</option>
                                                        <option value="950">950 - History of Asia</option>
                                                        <option value="960">960 - History of Africa</option>
                                                        <option value="970">970 - History of North America</option>
                                                        <option value="980">980 - History of other areas</option>
                                                        <option value="990">990 - History of other areas</option>






                                                                        </select>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Title</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="title" value="<?php echo $boook['bookTitle']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Subject</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="subject" value="<?php echo $boook['bookSubject']?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Book Description</label>
                                                    <div class="col-lg-9">
                                                        <textarea class="form-control" name="smalldesc" id="" cols="20" rows="5" ><?php echo $boook['bookDescription']?></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Author</label>
                                                    <div class="col-lg-9">
                                                        <textarea name="bookauthor" id="" cols="55" rows="3"><?php echo $boook['bookAuthors']?></textarea>
                                                    </div>
                                                </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Section </label>
                                                    <div class="col-lg-9">
                                                        <select  class="form-control" name="section" value="<?php echo $boook['sectionID']?>">
                                                             <?php while( $sections = mysqli_fetch_array($allsection)){?>
                                                                <option value="<?php echo $sections['sectionID']?>"><?php echo $sections['sectionID']." ".$sections['Section_Name']?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Source</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="source" value="<?php echo $boook['bookSource']?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Publisher</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="publisher" value="<?php echo $boook['bookPublisher']?>">
                                                </div> 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Place of Publication</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" name="placepublished" value="<?php echo $boook['bookPlacePublisher']?>">
                                            </div>
                                        </div>
                                    <div class="text-end">
                                <button type="submit" class="btn btn-primary" name="booksubmit">Submit</button>
                            </div>
                        </div>
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