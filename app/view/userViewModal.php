<?php
session_start();
include_once '../model/userModel.php';
$userObj = new user();
$userId = base64_decode($_REQUEST['id']);
$userViewResult = $userObj->getUserBy_id_fromUser($userId);
?>


<!-- Modal window start -->
<?php

while ($viewInfo = $userViewResult->fetch_assoc()) {

?>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <a class="btn btn-outline-danger close-btn" data-dismiss="modal">
            <span>&times;</span>
        </a>
    </div>
   <div class="modal-body">
        <table class="table table-borderless table-reponsive-*">

            <tr>
                <th class="col-sm-6">Profile Image :</th>
                <td class="col-sm-6"><img src="../../img/user_profile_images/<?php echo $viewInfo['user_profile_image']; ?>" style="width:100px;height:100px;border-radius:2px;" /></td>
            </tr>
            <tr>
                <th scope="col">Name :</th>
                <td scope="row"><?php echo $viewInfo['user_first_name'] . ' ' . $viewInfo['user_last_name']; ?></td>
            </tr>
            <tr>
                <th scope="col">Date of Birth :</th>
                <td scope="row"><?php echo $viewInfo['user_dob']; ?></td>
            </tr>
            <tr>
                <th scope="col">Gender :</th>
                <td scope="row"><?php if ($viewInfo['user_gender'] == 0){ ?><i class="fas fa-female"></i> Female<?php }else{ ?><i class="fas fa-male"></i> Male<?php } ?></td>
            </tr>
            <tr>
                <th scope="col">NIC No. :</th>
                <td scope="row"><?php echo $viewInfo['user_nic']; ?></td>
            </tr>
            <tr>
                <th scope="col">Landline No. :</th>
                <td scope="row"><?php echo $viewInfo['user_landline_no']; ?></td>
            </tr>
            <tr>
                <th scope="col">Mobile No. :</th>
                <td scope="row"><?php echo $viewInfo['user_mobile_no']; ?></td>
            </tr>
            <tr>
                <th scope="col">Address :</th>
                <td scope="row"><?php echo $viewInfo['user_address1'] . ', ' . $viewInfo['user_address2'] . ', ' . $viewInfo['user_city']; ?></td>
            </tr>
            <tr>
                <th scope="col">E-mail Address :</th>
                <td scope="row"><?php echo $viewInfo['user_email_address']; ?></td>
            </tr>
            <tr>
                <th scope="col">Role :</th>
                <td scope="row">
                    <?php 
                    $roleId = $viewInfo['role_role_id']; 
                    $viewRoleRes = $userObj->getUserRole_ById($roleId);
                    while($viewInfo2 = $viewRoleRes -> fetch_assoc()){
                        echo $viewInfo2['role_name']; // get role name
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th scope="col">Registered Date :</th>
                <td scope="row"><?php echo $viewInfo['user_reg_date']; ?></td>
            </tr>
            <tr>
                <th scope="col">Last Update :</th>
                <td scope="row"><?php echo $viewInfo['user_last_update']; ?></td>
            </tr>

        </table>
    </div>
<?php
}
?>
<!-- Modal window end -->