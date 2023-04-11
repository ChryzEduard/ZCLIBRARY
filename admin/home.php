<?php require "../controllerUserData.php"; ?>
<?php require_once "../connection.php"; 
include "adminfunction.php"; ?>


<?php 
$a = 1;
if(isset($_GET['send'])){
    echo "<script>alert('Sending Email Notification, Please wait');</script>
    <script>window.location.href = 'send.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php";?>
<body>

<div class="main-wrapper">
    <?php include "header.php"?>
    <?php include "sidebar.php"?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title"><?php echo $Roletitle?> Dashboard</h3>
                        <div class="line"></div>
                    </div>
                </div>
            </div>          
                    <div class="row">
                        <div class="col-xl-4 col-sm-4 col-12">
                            <div class="card">
                                 <div class="card-body">
                                     <div class="dash-widget-header">
                                     <i class="fi fi-rr-circle-user display-5" style="color: var(--dark)"></i>
                                    <div class="dash-count">
                                        <a class="count-title">Total User Count</a>
                                         <a class="count"> <?php echo $count['user_count'];?></a>
                                    </div>
                                 </div>
                            </div>
                    </div>
            </div>
            <div class="col-xl-4 col-sm-4 col-12">
                <div class="card" onclick="window.location.href='booklist.php'; return false;">
                    <div class="card-body">
                        <div class="dash-widget-header">
                        <a  ><i class="fi fi-rr-circle-book-open display-5" style="color: var(--dark)"></i>
                        <div class="dash-count">
                            <a  class="count-title">Total Books</a>
                            <a  class="count"> <?php echo $countbook['book_count'];?></a>
                         </div>
                     </div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-4 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                        <i class="fi fi-rr-circle-book-open display-5" style="color: var(--primary)"></i>
                        <div class="dash-count">
                            <a  class="count-title">Total Borrowed Books</a>
                            <a  class="count"> <?php echo $countboroow ;?></a>
                         </div>
                     </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-4 col-12">
                <div class="card" onclick="window.location.href='externalmessage.php'; return false;">
                    <div class="card-body">
                        <div class="dash-widget-header">
                        <i class="fi fi-rr-envelope display-5" style="color: var(--dark)"></i>
                        <div class="dash-count">
                            <a class="count-title">External Message</a>
                            <a  class="count"><?php echo $messages['ex_message']?>
                        </div>
                    </div>
                </div>
            </div></a>
            
            </div>
            
            <div class="col-xl-4 col-sm-4 col-12">
                <div class="card" data-bs-toggle="modal" data-bs-target="#exampleModalLong" data-original-title="" title="">
                    <div class="card-body">
                        <div class="dash-widget-header">
                        <i class="fi fi-rr-time-past display-5" style="color: var(--primary)"></i>
                        <div class="dash-count">
                            <a  class="count-title">Return Books
                            </a>
                            <a class="count"> <?php echo $return?></a>
                        </div>
                    </div>
                </div>
            </div>

            <!--Modal For Return Books-->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">List OF Returns Book </h5>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close" data-original-title="" title=""><span aria-hidden="true">×</span></button>
                        </div>
                                <div class="modal-body">
                                <div class="table-responsive">
                                <table class="datatable table table-stripped">
                                
                                    <thead>
                                        
                                    <tr>
                                        <th>Name</th>
                                        <th>Book</th>
                                        <th>Schedule</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($retne = mysqli_fetch_assoc($retde)) { ?>
                                            <tr>
                                            <td><?php echo $retne['libraryUserFirtsName']." ".$retne['libraryUserLastName']?></td>
                                            <td><?php echo $retne['bookTitle']?></td>
                                            <?php if($retne['dateend'] == $datenow){ $color ="bg-danger";}else{$color =""; }?>
                                            <td class="<?php echo $color?>"><?php echo $retne['dateend']?></td>
                                        </tr>
                                            <?php  }?>
                                     
                                    </tbody>
                                </table>
                                </div>



                                
                                </div>
                                <div class="modal-footer">
                                <a href="home.php?send='yes'" onclick="return confirm('Would you like to inform the users?')" class="btn btn-danger ">Send Notification</a><a href="borrow.php" class="btn btn-primary">View All List</a>
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-original-title="" title="">Close</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-4 col-12">
                <div class="card" onclick="window.location.href='userlist.php'; return false;">
                    <div class="card-body">
                        <div class="dash-widget-header">
                        <i class="fi fi-rr-user-time display-5" style="color: var(--dark)"></i>
                        <div class="dash-count">
                            <a  class="count-title">Online User</a>
                            <a class="count"><?php echo $onlinez['Onlinez']?></a>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>


            <div class="col-sm-10"><br><br>
                       
                    </div>
                <div class="card">
                <div class="card-head"><br><br>
                <h5 class="page-title"><?php   if(mysqli_num_rows($newreg) > 0){
                            echo "Newly Registered Users for Today";
                        }else {
                            echo "No New Registered User";
                        }?></h5>
                        <div class="line"></div>
                </div>
                <div class="card-body">
                <div class="table-responsive no-radius">
                <table class="table table-hover table-center">
                <thead>
                <tr>
                <th>Profile</th>
                <th class="text-center">First Name</th>
                <th class="text-center">Last Name</th>
                <th class="text-center">Email</th>
                <th class="text-end">Account Status</th>
                </tr>
                </thead>
                <tbody>

                    <?php 
                    
                  
                    
                    while($newRegister = mysqli_fetch_array($newreg)){?>
                        <tr>
                        <td class="text-nowrap">
                            <div class="avatar avatar-<?php echo $newRegister["availabiltyONOFF"]; ?>">
                                <img src="../assets/images/alluserprofiles/<?php echo $newRegister["libraryUserpicture"]; ?>" alt="<?php echo $newRegister["libraryUserFirtsName"]?>" width="50px" height="50px">
                            </div>
                        </td>
                        <td class="text-center"><?php echo $newRegister['libraryUserFirtsName']?></td>
                        <td class="text-center"><?php echo $newRegister['libraryUserLastName']?></td>
                        <td class="text-center"><?php echo $newRegister['email']?></td>
                       
                        <td class="text-end"><div class="font-weight-600 text-<?php if($newRegister['libraryUserStatus'] == "verified" ){ echo "success"; }else{ echo "danger";}?>"><?php echo $newRegister['libraryUserStatus']?></div></td>
                        </tr>
                
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
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>