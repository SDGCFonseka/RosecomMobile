<?php
session_start();

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body class="body-control">
    <div class="login_bg"></div>

    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card ads border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-left">
                                    <div class="overlay rounded-right"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 ads">
                                <div class="p-5">
                                    <div class="mb-4 d-flex">
                                        <h3 class="h3 font-weight-bold text-theme">Admin Login</h3>
                                        <span class="admin-icon"><i class="fas fa-user-lock fa-2x"></i><span>
                                    </div>

                                    <h6 class="h5">Welcome back!</h6>
                                    <p class="text-muted mt-2">Enter your Username and Password to access admin panel.</p>
                                    
                                    <form id="loginForm" name="loginForm" method="post" action="../controller/loginController.php?status=login" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <!--------! ERROR MESSAGE START---------->
                                         <div class="error-msg">   
                                        <?php if(isset($_REQUEST['response'])){ ?>
                                            <div class="alert alert-danger text-center">
                                               <?php //display the error message from login controller
                                                    echo base64_decode($_REQUEST['response']);
                                                ?>
                                            </div>
                                       <?php } ?>
                                        </div>
                                            <!--------! ERROR MESSAGE END---------->
                                            <label>Username</label>
                                            <input type="text" class="form-control" id="usernme" name="usernme" oninput="usernameValidForm()">
                                            <span class="text-danger error-msg" id="usernmeErr"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" id="password" name="password" oninput="passwordValidForm()">
                                            <span class="text-danger error-msg" id="passWordErr"></span>
                                        </div>
                                        <div class="pt-3">
                                           <div class="mb-3"><input type="submit" value="Login" class="btn btn-theme float-right"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!---- footer start -------->
    <div>
        <?php include('../../common/footer.php'); ?>
    </div>
    <!------ footer end -------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../resources/jquery-3.6.js"></script>
    <script type="text/javascript" src="../../js/validation.js"></script>
    <script src="../../resources/sweetalert.min.js"></script>
    <script src="../../resources/popper.min.js"></script>
    <script src="../../resources/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>