<?php require_once "./controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php $extinfquerry = mysqli_query($con,"select * from external_info where externalID = '1';");
$external_info = mysqli_fetch_assoc($extinfquerry);
$gal = mysqli_query($con,"select * from gallery order by galleryID desc limit 6;");
$gals = mysqli_query($con,"select * from gallery;");
$cr = mysqli_query($con," select * from system_core;");
$core = mysqli_fetch_array($cr);
$blgs = mysqli_query($con,"select * from contents where contType = 'blogs';");
$blgsindex = mysqli_query($con,"select * from contents where contType = 'blogs' order by contID Desc limit 3;");
$ancmnt = mysqli_query($con,"select * from contents where contType = 'announcement';");
$date = date("l, F jS Y");
$time = time();
?>
<head>
    <meta charset="utf-8">
    <title><?php echo $external_info['siteTitle']?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="assets/images/external/logo.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>