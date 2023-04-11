<?php require_once "./controllerUserData.php"; ?>
<?php require_once "./plugin/vendor/autoload.php"; ?>
<?php $extinfquerry = mysqli_query($con,"select * from external_info where externalID = '1';");
$external_info = mysqli_fetch_assoc($extinfquerry);
include "head.php";
include "topbar.php";
?>

<!DOCTYPE html>
<html lang="en">
   
<style>
              
          body {
            margin:0;
            padding:0;
            font-family: sans-serif;
            background-color: #141e30;
          }

          .login-box {
            position: fixed;
            top: 60%;
            left: 50%;
            width: 75%;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgba(0,0,0,.5);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0,0,0,.6);
            border-radius: 10px;
          }

          .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
          }


          .notamember{
              text-align: center;
              color: white;
          }
          .login-box a {
            color: #03e9f4;
          }
          .login-box a:hover {
          color: red;
          }

          .login-box .user-box {
            position: relative;
          }

          .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
          }
          .login-box .user-box label {
            position: absolute;
            top:0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
          }

          .login-box .user-box input:focus ~ label,
          .login-box .user-box input:valid ~ label {
            top: -20px;
            left: 0;
            color: #03e9f4;
            font-size: 12px;
          }

          .login-box form button {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            background: transparent;
            color: #03e9f4;
            font-size: 16px;
            border: none;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            letter-spacing: 4px
          }

          .login-box button:hover {
            background: #03e9f4;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #03e9f4,
                        0 0 25px #03e9f4,
                        0 0 50px #03e9f4,
                        0 0 100px #03e9f4;
          }

          .login-box button span {
            position: absolute;
            display: block;
          }

          .login-box button span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #03e9f4);
            animation: btn-anim1 1s linear infinite;
          }

          @keyframes btn-anim1 {
            0% {
              left: -100%;
            }
            50%,100% {
              left: 100%;
            }
          }

          .login-box button span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #03e9f4);
            animation: btn-anim2 1s linear infinite;
            animation-delay: .25s
          }

          @keyframes btn-anim2 {
            0% {
              top: -100%;
            }
            50%,100% {
              top: 100%;
            }
          }

          .login-box button span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #03e9f4);
            animation: btn-anim3 1s linear infinite;
            animation-delay: .5s
          }

          @keyframes btn-anim3 {
            0% {
              right: -100%;
            }
            50%,100% {
              right: 100%;
            }
          }

          .login-box button span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #03e9f4);
            animation: btn-anim4 1s linear infinite;
            animation-delay: .75s
          }

          @keyframes btn-anim4 {
            0% {
              bottom: -100%;
            }
            50%,100% {
              bottom: 100%;
            }
          }

</style>
   <body style="background-image: url('https://c0.wallpaperflare.com/preview/932/260/985/bible-biblia-book-book-bindings.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">
      <div class="login-box">
  <h2>Enter Your Email <?php echo  $email?></h2>
  <form action="user-otp.php" method="POST" autocomplete="off">

                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
    <div class="user-box">
      <input type="email" name="email" required value="<?php echo $email ?>">
      <label>Enter Email Address..</label>
    </div>
    
    <button type="submit" name="check-email">
     <!--<span></span>
      <span></span>
      <span></span>
      <span></span> -->
      Submit Email
    </button>
   
  </form>
</div>
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>