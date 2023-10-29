<?php
session_start();
include_once '../model/customerModel.php';
$customerObj = new customer();
$customerId = base64_decode($_REQUEST['id']);
$custViewResult = $customerObj->getCustomerBy_id_fromCustomer($customerId);
?>


<!-- Modal window start -->
<?php

while ($viewInfo = $custViewResult->fetch_assoc()) {

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
                <td class="col-sm-6"><img src="../../img/customer_profile_images/<?php echo $viewInfo['customer_profile_image']; ?>" style="width:100px;height:100px;border-radius:2px;" /></td>
            </tr>
            <tr>
                <th scope="col">Name :</th>
                <td scope="row"><?php echo $viewInfo['customer_first_name'] . ' ' . $viewInfo['customer_last_name']; ?></td>
            </tr>
            <tr>
                <th scope="col">Date of Birth :</th>
                <td scope="row"><?php echo $viewInfo['customer_dob']; ?></td>
            </tr>
            <tr>
                <th scope="col">Gender :</th>
                <td scope="row"><?php if ($viewInfo['customer_gender'] == 0){ ?>Female <i class="fas fa-female"></i><?php }else{ ?>Male <i class="fas fa-male"></i><?php } ?></td>
            </tr>
            <tr>
                <th scope="col">NIC No. :</th>
                <td scope="row"><?php echo $viewInfo['customer_nic']; ?></td>
            </tr>
            <tr>
                <th scope="col">Landline No. :</th>
                <td scope="row"><?php echo $viewInfo['customer_landline_no']; ?></td>
            </tr>
            <tr>
                <th scope="col">Mobile No. :</th>
                <td scope="row"><?php echo $viewInfo['customer_mobile_no']; ?></td>
            </tr>
            <tr>
                <th scope="col">Address :</th>
                <td scope="row"><?php echo $viewInfo['customer_address1'] . ', ' . $viewInfo['customer_address2'] . ', ' . $viewInfo['customer_city']; ?></td>
            </tr>
            <tr>
                <th scope="col">Postal Code :</th>
                <td scope="row"><?php echo $viewInfo['customer_postal_code'] ?></td>
            </tr>
            <tr>
                <th scope="col">E-mail Address :</th>
                <td scope="row"><?php echo $viewInfo['customer_email']; ?></td>
            </tr>
            <tr>
                <th scope="col">Registered Date :</th>
                <td scope="row"><?php echo $viewInfo['customer_reg_date']; ?></td>
            </tr>
            <tr>
                <th scope="col">Last Update :</th>
                <td scope="row"><?php echo $viewInfo['customer_last_update']; ?></td>
            </tr>

        </table>
    </div>
<?php
}
?>
<!-- Modal window end -->