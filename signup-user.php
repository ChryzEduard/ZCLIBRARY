<?php require_once "./controllerUserData.php"; ?>
<?php require_once "./plugin/vendor/autoload.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php $extinfquerry = mysqli_query($con,"select * from external_info where externalID = '1';");
$external_info = mysqli_fetch_assoc($extinfquerry);
include "head.php";
include "topbar.php";
?>
<style>
    
        body {
          margin:0;
          padding:0;
          font-family: sans-serif;
          background-color: #141e30;
        }
        
        .notamember{
            text-align: center;
        }
        .login-box a ,.notamember{
        color: white;
        }
        .login-box {
          position: fixed;
          top: 60%;
          left: 50%;
          width: 65%;
          padding: 40px;
          transform: translate(-50%, -50%);
          background: rgba(0,0,0,.5);
          box-sizing: border-box;
          box-shadow: 0 15px 25px rgba(0,0,0,.6);
          border-radius: 10px;
          z-index: -100;
        }

        .login-box h2 {
          margin: 0 0 30px;
          padding: 0;
          color: #fff;
          text-align: center;
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
          font-size: 14px;
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
          font-size: 14px;
          text-decoration: none;
          border: none;
          text-transform: uppercase;
          overflow: hidden;
          transition: .5s;
          margin-top: 40px;
          letter-spacing: 4px
        }

        .login-box button:hover {
          background: #03e9f4;
          border: none;
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
      <!-- header section start -->
     
      <div class="login-box">
  <h2>Create an Account</h2>
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
  <form action="signup-user.php" method="POST" autocomplete="">
    <div class="user-box">
      <input type="text" name="email" required value="<?php echo $email ?>">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required>
      <label>Password</label>
    </div>
    <div class="user-box">
      <input type="password"  name="cpassword" required>
      <label>Confirm Password</label>
    </div>
    <div style="color: white;"><a href="forgot-password.php">Forgot password?</a></div>
    <button type="submit" name="signup">
      <!-- <span></span>
      <span></span>
      <span></span>
      <span></span> -->
      create account
    </button>
    <div class="notamember">Already have an <a href="login-user.php">Account?</a></div>
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