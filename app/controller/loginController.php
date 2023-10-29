<?php
session_start();
if (isset($_REQUEST['status'])) {

    include_once '../model/loginModel.php'; //including login from loginModel

    $loginObj = new login(); // make login object from login class

    $status = $_REQUEST['status'];

    switch ($status) {

        case 'login':

            try {

                $username = $_POST["usernme"];
                $password = $_POST["password"];

                $loginInfo = $loginObj->getUserBy_username($username);

                if ($loginInfo->num_rows > 0) {

                    $info_array = $loginInfo->fetch_assoc();
                    $getUsername = $info_array["login_username"];
                    $getPassword = $info_array["login_password"];
                    $getStatus = $info_array["login_status"];

                if($getStatus == 1){
                    if ($getUsername == $username && $getPassword == sha1($password)) {

                        $getUserId = $info_array["user_user_id"];
                        $getUserInfo = $loginObj->getUser_ByUserID_FromUser($getUserId); //get userinfo from login database table
                        $userInfo_array = $getUserInfo->fetch_assoc();

                        $user = array(
                            base64_encode("userId") => base64_encode($getUserId),
                            base64_encode("userFname") => base64_encode($userInfo_array["user_first_name"]),
                            base64_encode("userLname") => base64_encode($userInfo_array["user_last_name"]),
                            base64_encode("userImage") => base64_encode($userInfo_array["user_profile_image"]),
                            base64_encode("userRole") => base64_encode($userInfo_array["role_role_id"])
                        );

                        $_SESSION["user"] = $user;

                        header("Location: ../view/dashboard.php");
                    } else {
                        $response = "username and password doesn't match !";
                        $response = base64_encode($response);
                        $status = "0";
                        header("Location: ../view/userLogin.php?response=$response&res_status=$status");
                    }
                }else{
                    $response = "Sorry ! You are not an Active user !";
                    $response = base64_encode($response);
                    header("Location: ../view/userLogin.php?response=$response");
                }
                } else {
                    $response = "You are not a registered user !";
                    $response = base64_encode($response);
                    $status = "0";
                    header("Location: ../view/userLogin.php?response=$response&res_status=$status");
                }
                
            } catch (Exception $th) {
                $response = $th->getMessage();
            }

            break;

        case 'logout':

            try {

                unset($_SESSION["user"]);
                 
                header("Location: ../view/logoutProcess.php"); 
                //Location: ../view/userLogin.php?response=$response
            } catch (Exception $th) {
                $response = $th->getMessage();
            }

            break;
    }
}
