
<div class="sidebar" id="sidebar">

<div class="sidebar-inner slimscroll"  style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
<div id="sidebar-menu" class="sidebar-menu" >
<ul>
    <li class="menu-title"></li>
    <li class="<?php if($a==1){ echo 'active'; }?>"><a href="home.php"><i class="fi fi-rr-dashboard"></i></i> <span>Dashboard</span></a></li>
    
    
    <li class="submenu"><a href="#"><i class="fi fi-rr-users-alt"></i> <span> Users</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li class="<?php if($a==4){ echo 'active'; }?>"><a href="adminlist.php"><i class="fi fi-rr-circle-user"></i> <?php echo $adminuser['user_count']?> Administrators</a></li>
        <li class="<?php if($a==5){ echo 'active'; }?>"><a href="catallist.php"><i class="fi fi-rr-circle-user"></i> <?php echo $cataluser['user_count']?> Catalogers</a></li>
        <li class="<?php if($a==3){ echo 'active'; }?>"><a href="userlist.php"><i class="fi fi-rr-circle-user"></i> <?php echo $normaluser['user_count']?> users</a></li>
    </ul>
    </li>
   
    <li class="submenu" >
        <a href="#"><i class="fi fi-rr-settings-sliders"></i> <span>System Settings </span> <span class="menu-arrow"></span></a>
        <ul style="display: none;">
            <li class="<?php if($a==2){ echo 'active'; }?>"><a href="externalinfo.php"><i class="fi fi-rr-gears"></i> External information</a></li>
            <li class="<?php if($a==6){ echo 'active'; }?>"><a href="faq.php"><i class="fi fi-rr-gears"></i> Setting FAQ </a></li>
            <li class="<?php if($a==7){ echo 'active'; }?>"><a href="socialmedia.php"><i class="fi fi-rr-gears"></i> Setting Social Media </a></li>
            <li class="<?php if($a==17){ echo 'active'; }?>"><a href="core.php"><i class="fi fi-rr-gears"></i> System Core Functions</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="#"><i class="fi fi-rr-books"></i> <span> All About books <span class="menu-arrow"></span></span></a>
        <ul style="display: none;">
            <li class="<?php if($a==8){ echo 'active'; }?>"><a href="Sections.php"><i class="fi fi-rr-book-open-cover"></i> Sections</a></li>
            <li class="<?php if($a==9){ echo 'active'; }?>"><a href="booklist.php"><i class="fi fi-rr-book-open-cover"></i> List of Books</a></li>
            <li class="<?php if($a==13){ echo 'active'; }?>"><a href="borrow.php"><i class="fi fi-rr-book-open-cover"></i> OFF-site borrowers</a></li>
            <li class="<?php if($a==15){ echo 'active'; }?>"><a href="borrow-onsite.php"><i class="fi fi-rr-book-open-cover"></i> ON-site borrowers</a></li>
        </ul>
    </li>
    <li class="<?php if($a==10){ echo 'active'; }?>"><a href="blogs.php"><i class="fi fi-rr-blog-text"></i> <span>Blogs</span></a></li>
    <li class="<?php if($a==12){ echo 'active'; }?>"><a href="anouncement.php"><i class="fi fi-rr-bullhorn"></i> <span>Announcement</span></a></li>
    <li class="<?php if($a==11){ echo 'active'; }?>"><a href="gallery.php"><i class="fi fi-rr-gallery"></i> <span>Gallery</span></a></li>
    <li class="<?php if($a==14){ echo 'active'; }?>"><a href="library-space.php"><i class="fi fi-rr-distribute-spacing-vertical"></i> <span>Library Space</span></a></li>
    <li class="<?php if($a==16){ echo 'active'; }?>"><a href="events.php"><i class="fi fi-rr-calendar-star"></i> <span>Events</span></a></li>


</li>
</ul>
</li>
</ul>
</div>
</div>
</div>
