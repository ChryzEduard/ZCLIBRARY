<div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
            <?php echo $core['chatbotmsg']?>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class=" section-title-sm position-relative pb-3 mb-4">
                            <img  src="../assets/images/external/logo.png" alt="<?php echo $external_info['siteTitle']?>" width="100px" height="100px">
                                <h3 class="text-light mb-0"><?php echo $external_info['siteTitle']?></h3>
                            </div>
                            <div class="d-flex mb-2">
                            <?php echo $date;?>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0"><?php echo $external_info['siteAddress']?></p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0"><a href="mailto:"><?php echo $external_info['siteEmail']?></a></p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0"><a href="tel:+"><?php echo $external_info['siteContact']?></a></p>
                            </div>
                            
                            
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5" id="mennues">
                            <div class="section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Menus</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="home.php"><i class="bi bi-book text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="bookslist.php"><i class="bi bi-book  text-primary me-2"></i>Book Sections</a>
                                <a class="text-light mb-2" href="profile.php"><i class="bi bi-book  text-primary me-2"></i>Account Sections</a>
                                <a class="text-light mb-2" href="logout-user.php"><i class="bi bi-book  text-primary me-2"></i>Log Out</a>
                               </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5" id="map">
                            <div class="section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Visit Us Hear <i class="bi bi-geo-alt text-primary me-2"></i></h3>
                            </div>
                           <iframe class="position-relative rounded w-100 h-50"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2098.1796611942464!2d122.06223580252266!3d6.910195884718355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x325041e0aacf09db%3A0xa29d5b22e8cf28f2!2sCity%20Library!5e0!3m2!1sen!2sph!4v1677247281470!5m2!1sen!2sph"
                        frameborder="0" style="min-height: 200px; min-width: 500px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    