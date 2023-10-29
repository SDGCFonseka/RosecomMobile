

<li class="nav-item">
    <a class="pro-dropdn-link" href="#" data-toggle="dropdown">
        <img src="../../img/user_profile_images/<?php echo base64_decode($_SESSION["user"][base64_encode("userImage")]) ?>" height="50px" width="50px" class="user-image">
    </a>
    <ul class="dropdown-menu menu2">
    
    <div class="dropdwnBoxImg">
           
           <img src="../../img/interface_images/userBackground.jpg" class="menuBgImg"/>
           <div class="dpdwntitle">Welcome Back !</div>
           <div class="dpdwntitle2"><?php echo base64_decode($_SESSION["user"][base64_encode("userFname")]) . " " . base64_decode($_SESSION["user"][base64_encode("userLname")]) ?></div>
           <div id="clock-disp2" class="clock-disp2">00:00:00 ..</div>
           <div id="date-disp" class="date-disp">00-00-0000</div>
    </div>   
   
        <li>
            <a href="#"><i class="fas fa-user-tie"></i> Profile</a>
        </li>
        <li>
            <a href="#"><i class="fas fa-cog"></i> Settings</a>
        </li>
        <li>
        <a href="../controller/loginController.php?status=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
    </ul>
</li>