<?php
error_reporting(0);
include './premier/conn.php';
$extrn = mysqli_query($con,"SELECT * FROM external_information where ext_id='1'");
    $external = mysqli_fetch_array($extrn);
    $scl = mysqli_query($con,"SELECT * FROM socials where scl_id='1'");
    $social = mysqli_fetch_array($scl);
    $art = mysqli_query($con,"SELECT * FROM posst where posst_cath='article' ORDER BY posst_id DESC");
    $status = mysqli_query($con,"SELECT * FROM stat_avail where stat_id='1'");
    $statuss = mysqli_fetch_array($status);
    $vis = mysqli_query($con,"SELECT * FROM visiblity where v_id='1'");
    $visibliti = mysqli_fetch_array($vis);
    $abt = mysqli_query($con,"SELECT * FROM about_us where a_id='1'");
    $about = mysqli_fetch_array($abt);
    $locationn = mysqli_query($con,"SELECT * FROM sub_business ORDER BY sub_rank ASC");
    $locations = mysqli_query($con,"SELECT * FROM client ORDER BY cl_id ASC");

    $sqlsp= " SELECT COUNT(at_title) AS allart FROM article";
                            $cnt = mysqli_query($con,$sqlsp);
                            $totalart =  mysqli_fetch_assoc($cnt);



        if ($totalart > 3 ){
           $but= '<div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
           <button type="button" class="btn btn-block btn-outline-secondary">View All</button>
           </div>';
        }
        else{
            $but = '';
        }



        if($statuss["avail_stat"] == $social['sclfacebook']){
            header("location: index.php");
         }

$location = mysqli_query($con,"SELECT * FROM posit ORDER BY ps_id ASC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Let's engage in digital world with <?php echo $external["ext_name"]; ?>">
    <meta name="author" content="<?php echo $external["ext_name"]; ?>">
    <title><?php echo $external["ext_name"]; ?> - Articles</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="icon" href="assets/imgs/argon21headsss.png" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/er.css?v=<?php echo time(); ?>">
</head>
    
<body>

    <!-- page Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/imgs/argon21headsss.png" alt="">
            </a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">                     
               
                   
                    <li class="nav-item">
                        <a href="index.php" class="ml-4 nav-link btn btn-primary btn-sm">Back to Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Of Second Navigation -->

    <!-- Page Header -->
    <header class="header" id="title">
        <div class="overlay">
            
            <h1 class="title"><?php echo $external["ext_name"]; ?></h1>  
            <h1 class="subtitle">All Articles</h1>
        </div>  
        <div class="shape">
            <svg viewBox="0 0 1500 200">
                <path d="m 0,240 h 1500.4828 v -71.92164 c 0,0 -286.2763,-81.79324 -743.19024,-81.79324 C 300.37862,86.28512 0,168.07836 0,168.07836 Z"/>
            </svg>
        </div>  
       
    </header>
    <!-- End Of Page Header -->
    <!-- About Section -->
    
    <!-- End of portfolio section -------------------------->

    <!-- Blog Section -->
    <section class="section" id="blog" style="display: <?php echo $visibliti["v_latestarticles"]?>">
        <div class="container">
            <h6 class="section-title mb-0 text-center">Latest Articles</h6>
            <h6 class="section-subtitle mb-5 text-center">Here are some new articles from the Core</h6>

            <div class="row">
                
                <?php
                    while($rowz=mysqli_fetch_array($art)){
                ?>
                
                    <div class="col-md-4">
                    <div class="card border-0 mb-4">
                    <div class="team-row">
                        <img src="premier/post/<?php echo $rowz['posst_pic']; ?>" alt="" class="card-img-top w-100">
                        <div class="card-body">                         
                            <h6 class="card-title"><?php echo $rowz['posst_title']; ?></h5>
                            <br>
                            <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                            <a href="single-articlez.php?id=<?php echo $rowz['posst_id']; ?><button type="button" class="btn btn-block btn-outline-dark">View Details </button></a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                 <?php  } ?>
                 
            </div>
        </div>
    </section>
    <!-- End of Blog Section -->

    
    <!-- End of Testmonial Section -->

    <!-- Contact Section -->
    <section id="contact" class="section has-img-bg pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 my-3">
                    <h6 class="mb-0">Phone</h6>
                    <p class="mb-4"><?php echo $external["ext_num"]; ?></p>

                    <h6 class="mb-0">Address</h6>
                    <p class="mb-4"><?php echo $external["ext_address"]; ?></p>
                    <h6 class="mb-0">Email</h6>
                    <p class="mb-0"><?php echo $external["ext_email"]; ?></p>
                    <hr>
                    <h6 class="mb-0">Social Media</h6>
                    <li><a target="blank" href="<?php echo $social['sclfacebook']; ?>"><i class="fab fa-facebook-f"></i></a> <a target="blank" href="<?php echo $social['scltiktok']; ?>"><i class="fab fa-tiktok"></i></a> <a target="blank" href="<?php echo $social['sclinsta']; ?>"><i class="fab fa-instagram"></i></a> <a target="blank" href="<?php echo $social['sclyout']; ?>"><i class="fab fa-youtube"></i></a></li>
                    
                    <p></p>
                   
                    
                    
                </div>
                <div class="col-md-7">
                    <?php include 'incmsg.php';?> 
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
                        <h4 class="mb-4">Send Message</h4>
                        <div class="form-row">
                        
                            <div class="form-group col-sm-4">
                                <input type="text" class="form-control text-white rounded-0 bg-transparent" name="msg_name" placeholder="Whole Name" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="email" class="form-control text-white rounded-0 bg-transparent" name="msg_email" placeholder="Email" required>
                            </div>
                            <div class="form-group col-sm-4">
                                <input type="number" class="form-control text-white rounded-0 bg-transparent" name="msg_phonenumber" placeholder="Cellphone Number" required>
                            </div>
                            <div class="form-group col-12">
                                <textarea name="msg_message" id="" cols="30" rows="4" class="form-control text-white rounded-0 bg-transparent" placeholder="Message" required></textarea>
                                <input style="display:none;" type="text" name="msg_status" value="unread"  required>
                                <input style="display:none;" type="text" name="data" value="<?php echo $today?>"required>      
                            </div>
                            <div class="form-group col-12 mb-0">
                            <button type="submit" name="submit" class="btn btn-block btn-primary btn-lg">Send </button>
                            </div>                          
                        </div>                          
                    </form>
                </div>
            </div>
            <!-- Page Footer -->
            <footer class="mt-5 py-4 border-top border-secondary">
                <p class="mb-0 small">&copy; <script>document.write(new Date().getFullYear())</script>, <?php echo $external["ext_name"]; ?> -  All rights reserved </p>     
            </footer>
            <!-- End of Page Footer -->  
        </div>
    </section>
	
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
    <script src="assets/vendors/isotope/isotope.pkgd.js"></script>
    <script src="assets/js/er.js"></script>
    

</body>
</html>
