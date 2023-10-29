<?php
session_start();
if (isset($_REQUEST['status'])) {

    include_once '../model/dashboardModel.php'; //including login from loginModel

    $dashBdObj = new dashboard(); // make login object from login class

    $status = $_REQUEST['status'];

    switch ($status) {

        /*===================================================================================================================================================================
																						COUNT USERS
			===================================================================================================================================================================*/

        case 'getUserCounts':

            try {
                $userTotRes = $dashBdObj->countTotalUsers();
                $userTotRes2 = $dashBdObj->countActiveUsers();
                $userTotRes3 = $dashBdObj->countDeactiveUsers();
                $rows =  $userTotRes->num_rows;
                $rows2 = $userTotRes2->num_rows;
                $rows3 = $userTotRes3->num_rows;
                $result = '';
                $result2 = '';
                $result3 = '';
                if ($rows > 0 | $rows2 > 0 | $rows3 > 0) {
                    $result .= '<div>' . $rows . '</div>';
                    $result2 .= $rows2;
                    $result3 .= $rows3;
                    $msg = 1;
                } else {

                    throw new Exception('no users!');
                }

            } catch (Exception $th) {
                $error = $th->getMessage();
                $msg = 2;
                $result = $error;
            }
            $data[0] = $msg;
            $data[1] = base64_encode($result);
            $data[2] = base64_encode($result2);
            $data[3] = base64_encode($result3);
            echo json_encode($data);
            break;

            /*===================================================================================================================================================================
																						COUNT PRODUCTS
			===================================================================================================================================================================*/

            case 'getProductCounts':

                try {
                    $prodTotRes = $dashBdObj->countTotalProducts();
                    $prodTotRes2 = $dashBdObj->countVisibleProducts();
                    $prodTotRes3 = $dashBdObj->countHiddenProducts();
                    $rows =  $prodTotRes->num_rows;
                    $rows2 = $prodTotRes2->num_rows;
                    $rows3 = $prodTotRes3->num_rows;
                    $result = '';
                    $result2 = '';
                    $result3 = '';
                    if ($rows > 0 | $rows2 > 0 | $rows3 > 0) {
                        $result .= '<div>' . $rows . '</div>';
                        $result2 .= $rows2;
                        $result3 .= $rows3;
                        $msg = 1;
                    } else {
    
                        throw new Exception('no users!');
                    }
    
                } catch (Exception $th) {
                    $error = $th->getMessage();
                    $msg = 2;
                    $result = $error;
                }
                $data[0] = $msg;
                $data[1] = base64_encode($result);
                $data[2] = base64_encode($result2);
                $data[3] = base64_encode($result3);
                echo json_encode($data);
                break;

                case 'getStockTb':

                    try {


                       
                    } catch (Exception $th) {
                        $error = $th->getMessage();
                    }

                    break;
    }
}
