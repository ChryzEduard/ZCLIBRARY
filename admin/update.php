<?php
$con = mysqli_connect('localhost', 'root', '', 'library');
  $sql = mysqli_query($con,"UPDATE notification SET status= 'read'")
?>
