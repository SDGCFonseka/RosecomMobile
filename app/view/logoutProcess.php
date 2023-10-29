<?php
session_start();
// include_once '../model/userModel.php';
// $userObj = new user();
$response = "Logout successfully !";
$response = base64_encode($response);
header("refresh:2,url=userLogin.php?response=$response"); //Redirecting to a page   

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="../../resources/bootstrap/css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../css/login_style.css" />

</head>

<body>
   <div id="content">

      <div class="text-center">

         <div>You are successfully logged out from System</div>


         <div><i>(Redirecting to Login page within 5 seconds)</i></div>


         <div><a href="userLogin.php"><b>Login Out</b></a></div>

         <br />
         <div> <img src="../../img/gifs/1495.gif" height="100px" width="100px" /></div>

      </div>

   </div>

   <!---- footer start -------->
   <div>
      <?php include('../../common/footer.php'); ?>
   </div>
   <!------ footer end -------->

   <script src="../../resources/jquery-3.6.js"></script>
   <script src="../../resources/popper.min.js"></script>
   <script src="../../resources/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>