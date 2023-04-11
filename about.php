<!DOCTYPE html>
<html lang="en">
<?php include "head.php";
$faqquerry = mysqli_query($con,"select * from faq;");?>

<body>

    <?php
    $a =2 ;
    include "topbar.php"?>
 <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinners">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div><br><br><br>
        <p style="display: flex; position: relative; right : 55px; width:200px"><?php echo $external_info['siteTitle']?></p>
    </div>
    </div>
<style>
    #faq {
  max-width: 90%;
  margin: auto;
  padding: 0 15px;
  text-align: center;
}

section.faq {
  padding-top: 2em;
  padding-bottom: 3em;
}

#faq ul {
  text-align: left;
}
.transition, p, ul li i:before, ul li i:after {
  transition: all 0.3s;
}

#faq .no-select, #faq h2 {
  -webkit-tap-highlight-color: transparent;
  -webkit-touch-callout: none;
  user-select: none;
}

#faq h1 {
  color: #000;
  margin-bottom: 30px;
  margin-top: 0;
}

#faq h2 {
  color: #cc071e;
  font-family: 'hm_light', sans-serif;
  font-size: 20px;
  line-height: 34px;
  text-align: left;
  padding: 15px 15px 0;
  text-transform: none;
  font-weight: 300;
  letter-spacing: 1px;
  display: block;
  margin: 0;
  cursor: pointer;
  transition: .2s;
}

#faq p {
  color: #333;
  text-align: left;
  font-family: 'hm_light', sans-serif;
  font-size: 14px;
  line-height: 1.45;
  position: relative;
  overflow: hidden;
  max-height: 250px;
  will-change: max-height;
  contain: layout;
  display: inline-block;
  opacity: 1;
  transform: translate(0, 0);
  margin-top: 5px;
  margin-bottom: 15px;
  padding: 0 50px 0 15px;
  transition: .3s opacity, .6s max-height;
  hyphens: auto;
  z-index: 2;
}

#faq ul {
  list-style: none;
  perspective: 900;
  padding: 0;
  margin: 0;
}
#faq ul li {
  position: relative;
  overflow: hidden;
  padding: 0;
  margin: 0;
  background: #fff;
  box-shadow: 0 3px 10px -2px rgba(0,0,0,0.1);
  -webkit-tap-highlight-color: transparent;
}
#faq ul li + li {
  margin-top: 15px;
}
#faq ul li:last-of-type {
  padding-bottom: 0;
}
#faq ul li i {
  position: absolute;
  transform: translate(-6px, 0);
  margin-top: 28px;
  right: 15px;
}
#faq ul li i:before, ul li i:after {
  content: "";
  position: absolute;
  background-color: #cc071e;
  width: 3px;
  height: 9px;
}
#faq ul li i:before {
  transform: translate(-2px, 0) rotate(45deg);
}
#faq ul li i:after {
  transform: translate(2px, 0) rotate(-45deg);
}
#faq ul li input[type=checkbox] {
  position: absolute;
  cursor: pointer;
  width: 100%;
  height: 100%;
  z-index: 1;
  opacity: 0;
  touch-action: manipulation;
}
#faq ul li input[type=checkbox]:checked ~ h2 {
  color: #000;
}
#faq ul li input[type=checkbox]:checked ~ p {
  /*margin-top: 0;*/
  max-height: 0;
  transition: .3s;
  opacity: 0;
}
#faq ul li input[type=checkbox]:checked ~ i:before {
  transform: translate(2px, 0) rotate(45deg);
}
#faq ul li input[type=checkbox]:checked ~ i:after {
  transform: translate(-2px, 0) rotate(-45deg);
}


#faq a,
#faq a:visited,
#faq a:focus,
#faq a:active,
#faq a:link {
  text-decoration: none;
  outline: 0;
}

#faq a {
  color: currentColor;
  transition: .2s ease-in-out;
}

#faq h1,#faq  h2,#faq  h3,#faq  h4 {
  margin: .3em 0;
}

#faq ul {
  padding: 0;
  list-style: none;
}

#faq img {
  vertical-align: middle;
  height: auto;
  width: 100%;
}


  
</style>
        <div class="container-fluid bg-primary py-5 bg-header" >
            <div class="row py-5" >
                <div class="col-12 pt-lg-5 mt-lg-5 text-center" >
                    <h1 class="display-4 text-white animated zoomIn" style="font-family: var(--bs-font-time);">About Us</h1>
                    <a href="index.php" class="h5 text-white">Home</a> <i class="fi fi-rr-circle-book-open" style="color: white;"> </i><a href="about.php" class="h5 text-white">About Us</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7"><br><br>
                <h1 class="text-uppercase" > Mission</h1>
                    <p style="font-family: var(--bs-font-time);text-align: justify;"><?php echo $external_info['mission']?></p>
                    <br><br><h1 class="text-uppercase" > Vision</h1>
                    <p style="font-family: var(--bs-font-time);text-align: justify;"><?php echo $external_info['vision']?></p>
                  </div>
                <div class="col-lg-5" style="min-height: 500px;">
                <div >
                    <div class="position-relative h-100">
                    <img class="position-absolute rounded wow zoomIn" id="imgabts" data-wow-delay="0.9s" src="assets/images/external/logo.png" style="object-fit: contain;">
                    </div>
                </div>    
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="accordion">
        <div class="container py-5">
            <div class="text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h1 style="font-family: var(--bs-font-time);">Frequency Ask Question</h1>
            </div>
            <div id="faq">
                   <ul >
                     <?php while ($faq = mysqli_fetch_array($faqquerry)) {?>
                        <li class="animated zoomIn" data-wow-delay="0.2s">
                        <input type="checkbox" checked>
                     <i></i>
                        <h2  style="font-family: var(--bs-font-time)"><?php echo $faq['title']?></h2>
                           <p  style="font-family: var(--bs-font-time)"><?php echo $faq['description']?></p>
                        </li>
                     <li>

                        <?php } ?>
                     
                  </ul>
            </div>
        </div>
    </div>



    
    

    <?php include "footer.php";?>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top" style="background-color: var(--dark)"><i class="bi bi-arrow-up"></i></a>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>